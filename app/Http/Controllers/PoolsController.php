<?php

namespace App\Http\Controllers;

use App\Models\Pool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PoolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->user_role != 1) {
            return redirect('/');
        }

        $pool = Pool::orderBy('id', 'desc')->paginate(15);
        $title = 'All Pool';
        return view('admin.pool.list', compact('pool', 'title'));
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
        $data['title'] = 'Add New Pool';

        return view('admin.pool.create', $data);
    }

    public function supplierPools(): \Illuminate\Http\JsonResponse
    {
        $pools = \auth()->user()->pools;
        $res['pools'] = $pools;
        return response()->json($res);
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
        $pool = new Pool();
        $pool->pool_name = $request->get('pool_name');
        $pool->pool_type = $request->get('pool_type');

        if ($request->get('pool_type') == '2') {
            $pool->distance = str_replace(',', '', $request->get('distance'));
        }
        $pool->save();

        return redirect('/pools');
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
        $data['pool'] = Pool::where('id', $id)->first();
        $data['title'] = 'Edit Pool';

        return view('admin.pool.edit', $data);
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

        $pool = Pool::where('id', $id)->first();
        $pool->pool_name = $request->get('pool_name');
        $pool->pool_type = $request->get('pool_type');
        if ($request->get('pool_type') == '2') {
            $pool->distance = str_replace(',', '', $request->get('distance'));
        }
        $pool->save();

        return redirect('/pools');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function poolSearch($search)
    {
        if (Auth::user()->user_role != 1) {
            return redirect('/');
        }

        $user = Pool::where("pool_name", "like", "%" . $search . "%")
            ->paginate();

        $data = array();
        $data['pool'] = $user;
        $data['search'] = $search;
        $data['title'] = 'All Product';

        return view('admin.pool.list', $data);
    }

    public function poolAction(Request $request)
    {
        if (Auth::user()->user_role != 1) {
            return redirect('/');
        }

        $search = $request->get('search');
        if ($search != '') {
            return redirect('/pool/search/' . $search);
        } else {
            $cid = $request->get('cid');
            $bulk_action = $request->get('bulk_action');
            if ($bulk_action != '') {
                switch ($bulk_action) {
                    case 'delete':
                    {
                        foreach ($cid as $id) {
                            Pool::where('id', $id)->delete();
                        }
                        return redirect('/pools');
                        break;
                    }
                } //end switch
            } // end if statement

            return redirect('/pools')->with('fail', 'Please Enter a Keyword');
        }
    }
}
