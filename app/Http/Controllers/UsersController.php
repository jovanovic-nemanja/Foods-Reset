<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Setting;
use App\Models\Pool;
use App\Models\DistributionEstriction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function index()
    {
        if (Auth::user()->user_role != 1)
            return redirect('/');

        $title = 'All Users';
        $users = User::with('poolName')->where('user_status', 'active')->paginate(10);
        $pools = Pool::whereIn('pool_type', array(1, 3))->orderby('pool_type', 'desc')->get();
        return view('admin.users.list', compact('title', 'users', 'pools'));
    }

    public function create()
    {
        if (Auth::user()->user_role != 1) {
            return redirect('/');
        }
        $data = array();
        $data['title'] = 'Add Buyer';

        return view('admin.users.create', $data);
    }

    public function store(Request $request)
    {
        if (Auth::user()->user_role != 1) {
            return redirect('/');
        }


        $this->validate($request, [
            'email' => 'required|email|max:255|unique:users',
            'name' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $city = $request->get('city');
        $state = $request->get('state');
        $street = $request->get('street');
        $zipcode = $request->get('zipcode');
        $country = $request->get('country');

        $address = $street . ' ' . $city . ' ' . $state . ' ' . $zipcode . ' ' . $country;

        $user = new User();

        $pass = $request->get('password');

        $user->email = $request->get('email');
        $user->address = $address;
        $user->city = $city;
        $user->state = $state;
        $user->street = $street;
        $user->zipcode = $zipcode;
        $user->country = $country;
        $user->name = $request->get('name');
        $user->company_name = $request->get('company_name');
        $user->delivery_location = $request->get('delivery_location');
        $user->delivery_window = $request->get('delivery_window');
        $user->delivery_window_to = $request->get('delivery_window_to');
        $user->description = $request->get('description');
        if ($request->get('delivery_service') != '') {
            $user->delivery_service = implode(',', $request->get('delivery_service'));
        }

        $user->lng = $request->get('lng');
        $user->lat = $request->get('lat');
        $user->pikup = $request->get('pikup');
        $user->geo_boundary = $request->get('geo_boundary');
        $user->bank = $request->get('bank');
        $user->branch = $request->get('branch');
        $user->transit = $request->get('transit');
        $user->account_number = $request->get('account_number');
        $user->details = $request->get('details');
        $user->password = bcrypt($pass);
        $user->user_role = '2';

        $user->save();
        $data11['user'] = $user;
        $data11['pass'] = $pass;
        if ($user->id > 0) {
            Mail::send('emails.newBuyer', $data11, function ($message) use ($user) {
                $message->to($user->email, $user->name)
                    ->subject('New Registration');
            });
        }

        return redirect('/users');
    }

    public function edit($id)
    {
        if (Auth::user()->user_role != 1) {
            return redirect('/');
        }
        $data = array();
        $data['user'] = User::where('id', $id)->first();
        $data['title'] = 'Edit Buyer';

        return view('admin.users.edit', $data);
    }

    public function updateLogistics(Request $request)
    {
        if (Auth::user()->user_role != 3) {
            return redirect('/');
        }
        $user = User::find(Auth::user()->id);
        $user->delivery_service = implode(',', $request->get('delivery_service'));
        $user->delivery_location = $request->get('delivery_location');
        $user->delivery_window = $request->get('delivery_window');
        $user->delivery_window_to = $request->get('delivery_window_to');
        $user->description = $request->get('description');
        $user->save();
    }

    public function updatePreference(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->pool = implode(',', $request->get('pool'));
        if ($user->registration_step == 1) {

            $user->registration_step = 2;

        }

        $user->save();

        return redirect(route('home'));
    }

    public function finishRegistration(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->registration_step = 3;
        $user->is_active = 1;
        $user->save();

        return redirect(route('home'));
    }

    public function addpool(Request $request, $id)
    {
        if (Auth::user()->user_role != 1) {
            return redirect('/');
        }
        $user = User::find($id);

        if ($request->get('pool_name') != '') {
            $user->pool = implode(',', $request->get('pool_name'));

        } else {
            $user->pool = '';
        }


        $user->save();

        return redirect('/users');
    }

    public function updateDistributionEstrictions(Request $request)
    {
        if (Auth::user()->user_role != 3) {
            return redirect('/');
        }

        $user = User::find(Auth::user()->id);
        $user->pool = $request->get('pool_name');
        $user->save();

        $dis1 = DistributionEstriction::where('user_id', Auth::user()->id)->first();
        if ($dis1) {
            $dis = DistributionEstriction::find($dis1->id);
            $dis->user_id = Auth::user()->id;
            $dis->type1 = $request->get('type1');
            $dis->type3 = $request->get('type3');
            $dis->content = $request->get('other');
            $dis->save();
        } else {
            $dis = new DistributionEstriction();
            $dis->user_id = Auth::user()->id;
            $dis->type1 = $request->get('type1');
            $dis->type3 = $request->get('type3');
            $dis->content = $request->get('other');
            $dis->save();
        }

    }

    public function profile()
    {
        if (Auth::user()->user_role == 1) {
            return redirect('/');
        }

        $data = array();
        $data['user'] = User::find(Auth::user()->id);
        $data['title'] = 'Profile';

        return view('frontend.users.profile', $data);
    }


    public function profileUpdate(Request $request)
    {
        if (Auth::user()->user_role == 1) {
            return redirect('/');
        }

        $city = $request->get('city');
        $state = $request->get('state');
        $street = $request->get('street');
        $zipcode = $request->get('zipcode');
        $country = $request->get('country');

        $address = $street;
        if ($city != '') {
            $address = $address . ', ' . $city;
        }
        if ($state != '') {
            $address = $address . ', ' . $state;
        }
        if ($zipcode != '') {
            $address = $address . ', ' . $zipcode;
        }

        $user = User::find(Auth::user()->id);
        $user->address = $address;
        $user->city = $city;
        $user->street = $street;
        $user->state = $state;
        $user->zipcode = $zipcode;
        $user->country = $country;
        $user->name = $request->get('name');
        $user->company_name = $request->get('company_name');
        $user->delivery_location = $request->get('delivery_location');
        $user->delivery_window = date("Y-m-d H:i:s", strtotime($request->get('delivery_window')));
        $user->delivery_window_to = date("Y-m-d H:i:s", strtotime($request->get('delivery_window_to')));
        $user->description = $request->get('description');


        if ($request->get('delivery_service') != '') {
            $user->delivery_service = implode(',', $request->get('delivery_service'));

        }
        if ($request->get('preference') != '') {
            $user->pool = implode(',', $request->get('preference'));

        }

        $user->lng = $request->get('lng');
        $user->lat = $request->get('lat');
        $user->pikup = $request->get('pikup');
        $user->geo_boundary = $request->get('geo_boundary');
        $user->bank = $request->get('bank');
        $user->branch = $request->get('branch');
        $user->transit = $request->get('transit');
        $user->account_number = $request->get('account_number');
        $user->details = $request->get('details');


        $user->save();

        return redirect()->back();
    }

    public function update($id, Request $request)
    {
        if (Auth::user()->user_role != 1) {
            return redirect('/');
        }

        $city = $request->get('city');
        $state = $request->get('state');
        $street = $request->get('street');
        $zipcode = $request->get('zipcode');
        $country = $request->get('country');

        $address = $street;
        if ($city != '') {
            $address = $address . ', ' . $city;
        }
        if ($state != '') {
            $address = $address . ', ' . $state;
        }
        if ($zipcode != '') {
            $address = $address . ', ' . $zipcode;
        }

        $user = User::find($id);
        $user->address = $address;
        $user->city = $city;
        $user->state = $state;
        $user->street = $street;
        $user->zipcode = $zipcode;
        $user->country = $country;
        $user->name = $request->get('name');
        $user->company_name = $request->get('company_name');
        $user->delivery_location = $request->get('delivery_location');
        $user->delivery_window = date("Y-m-d H:i:s", strtotime($request->get('delivery_window')));
        $user->delivery_window_to = date("Y-m-d H:i:s", strtotime($request->get('delivery_window_to')));
        $user->description = $request->get('description');
        if ($request->get('delivery_service') != '') {
            $user->delivery_service = implode(',', $request->get('delivery_service'));
        }

        $user->lng = $request->get('lng');
        $user->lat = $request->get('lat');
        $user->pikup = $request->get('pikup');
        $user->geo_boundary = $request->get('geo_boundary');
        $user->bank = $request->get('bank');
        $user->email_notification = $request->get('email_notification');
        $user->branch = $request->get('branch');
        $user->transit = $request->get('transit');
        $user->account_number = $request->get('account_number');
        $user->details = $request->get('details');
        $user->save();

        return redirect('/users');
    }


    public function deleteUser($id)
    {
        if (Auth::user()->user_role != 1) {
            return redirect('/');
        }
        $user = User::find($id);
        $user->user_status = 'deactive';
        $user->save();

        return redirect('/users');
    }
}
