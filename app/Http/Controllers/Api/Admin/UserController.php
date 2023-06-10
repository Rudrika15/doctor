<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->email;
        $name = $request->name;
        $user = User::where('email', $email)
            ->first();
        if ($user) {
            $token = $user->createToken('my-app-token')->plainTextToken;
            $role = $user->getRoleNames();
            $response = [
                'success' => true,
                'data' => $user,
                'token' => $token,
            ];
            return response($response, 200);
        } else {
            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->assignRole('User');
            $user->save();
            $token = $user->createToken('my-app-token')->plainTextToken;
            $role = $user->getRoleNames();
            $response = [
                'success' => true,
                'data' => $user,
                'token' => $token,
            ];
            return response($response, 200);
        }
    }

    public function updateNumber(Request $request)
    {

        $rules = array(
            'userId' => 'required',
            'contactNumber' => 'required',
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }

        $userId = $request->userId;
        $contactNumber = $request->contactNumber;

        $user = User::find($userId);
        if ($user) {
            $user->contactNumber = $contactNumber;
            $user->save();
            $response = [
                'success' => true,
                'data' => $user,
            ];
            return response($response, 200);
        } else {
            return response([
                'message' => ['User not Found']
            ], 404);
        }
    }
}
