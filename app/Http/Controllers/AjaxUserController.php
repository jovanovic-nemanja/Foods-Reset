<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxUserController extends Controller
{
    public function updateProfile(Request $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->all();
        $user = auth()->user();

        if ($user->update($data)) {
            $res['success'] = true;
            $res['message'] = 'Profile Updated.';
        } else {
            $res['success'] = false;
            $res['message'] = 'Server Error.';
        }

        return response()->json($res);
    }

    public function updatePassword(Request $request): \Illuminate\Http\JsonResponse
    {
        $data['password'] = \Hash::make($request->password);
        $user = auth()->user();
        if ($user->update($data)) {
            $res['success'] = true;
            $res['message'] = 'Password Updated.';
        } else {
            $res['success'] = false;
            $res['message'] = 'Server Error.';
        }

        return response()->json($res);
    }

    public function updateNotification(Request $request)
    {
        $user = auth()->user();
        $data['email_notification'] = $request->email_notification  ? 1 : 0;
        $data['text_notification'] = $request->text_notification   ? 1 : 0;

        if ($user->update($data)) {
            $res['success'] = true;
            $res['message'] = 'Notification Settings Updated.';
        } else {
            $res['success'] = false;
            $res['message'] = 'Server Error.';
        }

        return response()->json($res);
    }
}
