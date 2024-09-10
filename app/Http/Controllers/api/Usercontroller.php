<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Usercontroller extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required | alpha',
            'email' => 'required | unique:users,email',
            'number' => 'required | numeric | unique:users,number | min:10',
            'address' => 'required | alpha',
            'password' => 'required | min:8',
            'profile_photo_path' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([$validator->errors()->first()]);
        } else {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'number' => $request->number,
                'address' => $request->address,
                'password' => Hash::make($request->password)
            ];

            User::create($data);
        }
    }
}
