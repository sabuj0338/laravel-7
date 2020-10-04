<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Notifications\SendEmailVerificationNotification;
use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function authenticatedUserInfo(Request $request)
    {
        return response()->json(new UserResource(Auth::user()));
        // return response()->json($request->user());
    }

    public function authenticatedUserInfoUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255|in:whole seller,farmer,agent',
            'location' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'zip' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpeg,jpg,png,gif|max:500',
            'nid' => 'required|image|mimes:jpeg,jpg,png,gif|max:500',
            'phone' => ['required','max:20',Rule::unique('users')->ignore(Auth::user()->id, 'id')],
            'email' => ['required','max:255',Rule::unique('users')->ignore(Auth::user()->id, 'id')],
        ]);

        $user = User::findOrFail(Auth::user()->id);

        if ($user) {
            $user->address = [
                'location' => $request->location,
                'city' => $request->city,
                'zip' => $request->zip,
                'country' => $request->country,
            ];
            $user->name = $request->name;
            $user->type = strtolower($request->type);
            $user->email = $request->email;
            $user->phone = $request->phone;

            if(!$request->hasFile('photo') || !$request->hasFile('nid')){
                return response()->json(["message"=>'upload_file_not_found'], 400);
            }

            $user->photo = Helper::uploadThumb($request, 'photo', 'public/users',300);
            $user->nid = Helper::uploadThumb($request, 'nid', 'public/users/nid',300);
            $user->save();
            return response()->json($user);
            // return response()->json(new UserResource($user));
        }
        return response()->json(["message"=>'User Unauthorized']);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        // return $request->device_name;
        $token = $user->createToken("api")->plainTextToken;

        $user->last_login = Carbon::now();

        $response = [
            'user' => new UserResource($user),
            // 'user' => $user,
            'token' => $token
        ];

        return response($response, 200);
    }

    public function register(Request $request)
    {
        // return $request;
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        // return $request;
        $user = User::create([
            'name' => $request->name,
            'photo' => null,
            'type' => strtolower($request->type) ?? null,
            'phone' => $request->phone ?? null,
            'address' => null,
            'email' => $request->email,
            'email_verified_at' => null,
            'last_login' => Carbon::now(),
            'is_active' => false,
            'secret_code' => null,
            'password' => Hash::make($request->password) ?? Hash::make('password'),
            'status' => true,
        ]);

        $secret_code = rand(10000, 999999);
        $user->secret_code = $secret_code;
        $user->is_active = true;
        $user->save();

        $user->notify(new SendEmailVerificationNotification($secret_code));

        return response()->json($user, 201);
    }

    public function send_verify_code(Request $request)
    {
        $user = User::findOrFail($request->user()->id);

        if (!$user->email) {
            return response(["message"=>"User does not have a email address"], 203);
        }

        $secret_code = rand(10000, 999999);
        $user->secret_code = $secret_code;
        $user->is_active = true;
        $user->save();

        $user->notify(new SendEmailVerificationNotification($secret_code));

        return response(["message"=>"Verify code sent successully"], 200);
    }

    public function verify(Request $request)
    {
        $user = User::findOrFail($request->user()->id);

        if (!$user->email) {
            return response(["message"=>"User does not have a email address"], 203);
        }


        if ($user->secret_code == $request->secret_code) {
            $user->secret_code = null;
            $user->is_active = false;
            $user->email_verified_at = Carbon::today();
            $user->save();

            return response(["message"=>"Email Verified successully"], 200);
        } else {
            return response(["message"=>"Your secret code is wrong"], 203);
        }
    }

    public function logout(Request $request)
    {
        // remove login token
        $request->user()->tokens()->delete();
        return response(["message"=>"Logout Successfully Done!"], 200);
        // Revoke all tokens...
        // $user->tokens()->delete();

        // Revoke a specific token...
        // $user->tokens()->where('id', $id)->delete();
    }
}
