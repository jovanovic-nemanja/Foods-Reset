<?php

namespace App\Http\Controllers;

use App\Models\Preference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PreferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function supplierPreferences(): \Illuminate\Http\JsonResponse
    {
        $res['preference'] = Preference::all();

        return response()->json($res);
    }

    public function index()
    {
        if (Auth::user()->user_role != 1) {
            return redirect('/');
        }
        $data = array();
        $data['preference'] = Preference::get();
        $data['title'] = 'All Preference';

        return view('admin.preference.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->user_role != 1) {
            return redirect('/');
        }

        $data = array();
        $data['title'] = 'Add New Preference';

        return view('admin.preference.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->user_role != 1) {
            return redirect('/');
        }

        $exist_preference = Preference::where('name', $request->get('preference'))->first();

        if (!$exist_preference) {
            $preference = new Preference();
            $preference->name = $request->get('preference');
            $preference->save();
        }

        return redirect('/preference');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->user_role != 1) {
            return redirect('/');
        }
        $data = array();
        $data['preference'] = Preference::where('id', $id)->first();
        $data['title'] = 'Edit Preference';

        return view('admin.preference.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        if (Auth::user()->user_role != 1) {
            return redirect('/');
        }
        $exist_preference = Preference::where('name', $request->get('preference'))->first();

        if (!$exist_preference) {
            $preference = Preference::where('id', $id)->first();
            $preference->name = $request->get('preference');
            $preference->save();
        }

        return redirect('/preference');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function preferenceSearch($search)
    {
        if (Auth::user()->user_role != 1) {
            return redirect('/');
        }

        $preference = Preference::where("name", "like", "%" . $search . "%")->get();

        $data = array();
        $data['preference'] = $preference;
        $data['search'] = $search;
        $data['title'] = 'All Preference';

        return view('admin.preference.list', $data);
    }

    public function preferenceAction(Request $request)
    {

        if (Auth::user()->user_role != 1) {
            return redirect('/');
        }
        $search = $request->get('search');
        if ($search != '') {
            return redirect('/preference/search/' . $search);
        } else {
            $cid = $request->get('cid');
            $bulk_action = $request->get('bulk_action');
            if ($bulk_action != '') {
                switch ($bulk_action) {
                    case 'delete':
                    {
                        foreach ($cid as $id) {

                            Preference::where('id', $id)->delete();
                        }
                        return redirect('/preference');
                        break;
                    }
                } //end switch
            } // end if statement

            return redirect('/preference');
        }
    }

    public function updateSupplierPreferences(Request $request)
    {
        $user = \auth()->user();
        $preferences = $request->preferences;

        $user->preference = implode(',', $preferences);
        if ($user->save()) {
            $res['success'] = true;
            $res['message'] = 'Profile Updated.';
        } else {
            $res['success'] = false;
            $res['message'] = 'Server Error.';
        }

        return response()->json($res);
    }
}
