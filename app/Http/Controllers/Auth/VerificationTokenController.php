<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class VerificationTokenController extends Controller
{
    public function veriftoken()
    {
        return view('auth.passwords.verificationToken');
    }

    public function postveriftoken(Request $request)
    {
        $user=User::whereActivation_token($request->activation_token)->first();

        // dd($user);

        if($user==null){
            return redirect()->back()->with('error','token salah');
        }else{
            $user->update([
                'activation_token'=>rand(100000,999999),
            ]);
            return redirect()->route('password.reset',[$user->activation_token])->with('success','silahkan perbarui password you');
        }
    }
}
