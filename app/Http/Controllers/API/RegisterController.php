<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Hash;
use App\Models\Peoples;

class RegisterController extends BaseController
{
    /**
     * Register raw on api
     * it can return name and token to interactor vie e.g. via postman
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request, Peoples $people)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $resp = User::where('email', $request->email)->get();
        if (count($resp) > 0) return $this->sendResponse($resp, 'Already it account!!');

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);

        $success['name'] =  $user->name;
        $success['access_token'] =  $user->createToken('authToken')->accessToken;
        return $this->sendResponse($success, 'User register successfully.');
        
    }

    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {

            $user = Auth::user();

            $success['token'] =  $user->createToken('authToken')->accessToken;
            $success['name'] =  $user->name;

            return $this->sendResponse($success, 'User login successfully.');
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }
    }
}
