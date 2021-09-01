<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] =  Hash::make($data['password']);
        $user = User::create($data);
        return response()->json([
            'message' => 'You have successfully registered!',
            "data" => $user,
            'status' => 'success',
            "success" => false
        ], 201);
    }
}
