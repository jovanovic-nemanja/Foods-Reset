<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return User
     */
    protected function create(array $data)
    {
        $city = $data['city'];
        $state = $data['state'];
        $street = $data['street'];
        $zipcode = $data['zipcode'];
        $country = $data['country'];
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

        if ($data['user_role'] == 4) {
            $data['user_role'] = 2;
        } else if ($data['user_role'] == 5) {
            $data['user_role'] = 3;
        }
        return User::create([
            'name' => $data['name'],
            'registration_step' => 1,
            'email' => $data['email'],
            'address' => $address,
            'company_name' => $data['company_name'],
//		    'text_notification' => $data['text_notification'],
//		    'email_notification' => $data['email_notification'],
            'user_role' => $data['user_role'],
//            'delivery_service' => isset($data['delivery_service']) ? implode(',', $data['delivery_service']) : '',
//            'delivery_location' => $data['delivery_location'],
//            'delivery_window' => date("Y-m-d H:i:s", strtotime($data['delivery_window'])),
//            'delivery_window_to' => date("Y-m-d H:i:s", strtotime($data['delivery_window_to'])),
            'mobile' => $data['mobile'] ?? '',
            'noti_email' => $data['noti_email'] ?? '',
            'description' => $data['description'] ?? '',
            'geo_boundary' => $data['geo_boundary'] ?? '',
            'pool' => '',
            'pikup' => $data['pikup'] ?? '',
//            'bank' => $data['bank'],
//            'branch' => $data['branch'],
//            'transit' => $data['transit'],
//            'account_number' => $data['account_number'],
//            'details' => $data['details'],
            'lat' => $data['lat'] ?? 'nil',
            'lng' => $data['lng'] ?? 'nil',
            'street' => $data['street'],
            'city' => $data['city'] ?? 'nil',
            'state' => $data['state'] ?? 'nil',
            'zipcode' => $data['zipcode'] ?? 'nil',
            'country' => $data['country'] ?? 'nil',
            'password' => bcrypt($data['password']),
        ]);
    }
}
