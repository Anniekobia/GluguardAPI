<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Validator;
use Illuminate\Support\Facades\Redirect;
use App\User;

class AuthController extends Controller
{
    /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'user_type' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
            ]);

            if ($validator->fails()) {
                return response()->json(["status"=>0,"message"=>"User was not created","error"=>$validator->errors()], 200);
            }
            else{
                $user = new User([
                            'user_type' => $request->user_type,
                            'username' => $request->username,
                            'email' => $request->email,
                            'password' => bcrypt($request->password)
                        ]);
                        $user->save();
                        $savedUser = User::where('email', $request->email)->first();
                        return response()->json([
                            "status"=>$savedUser->id,
                            'message' => 'Successfully created user',
                            "error"=> ["email"=>["Validated"]],
                        ], 201);
            }
    }

    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
            return response()->json(["status"=>0,
                'message' => 'Wrong username or password',
                "user"=>["id"=>null,
                        "username"=> null,
                        "email"=> null,
                        "user_type"=> null,
                        "created_at"=> null,
                        "updated_at"=> null]
            ], 401);

        $user = $request->user();
        return response()->json(["status"=>0,"message"=>"Login successful","user"=>$user], 200);
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
            $token->save();
            return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }

    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}
