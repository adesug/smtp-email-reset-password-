<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\User;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    //update pass
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'email'=>'required|email|exists:users',
            'password'=>'required|min:8|confirmed',
        ]);

        $user=User::whereActivation_token($id)->first();
        if($request->email !==$user->email){
            return redirect()->back()->with('error','Email yang anda masukan salah');

        }else{
            $user->update([
                'password'=>bcrypt($request['password']),
                'activation_token'=>null,

            ]);

            return redirect('login')->with('success','password NT anyar');
           

        }
    }
}
