<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SetPasswordMail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    /**
     * Constructor.
     *
     */
    public function __construct()
    {

        $this->middleware('guest');
    }

    /**
     * Display the form to request a password reset link.
     *
     * If no token is present, display the link request form.
     *
     * @param \Illuminate\Http\Request $request
     * @param string|null              $token
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLinkRequestForm(Request $request, $token = null)
    {
        return view('auth.passwords.email',[ 
            'token' => $token
        ]);
    }

    /**
     * Send a reset link to the given user.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @throws \Illuminate\Validation\ValidationException
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
            'username' => 'nullable',
        ]);

        $user = User::where('email', $request->email)
                    ->where('username', $request->username)
                    ->first();

        $full_name = "$user->first_name "."$user->last_name";

        $mail = Mail::to($request->email, $full_name);
        $mail->send(new SetPasswordMail($user));

        flash('Password reset link sent to your email.')->success();

        return redirect()->route('login');
    }

    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @param \Illuminate\Http\Request $request
     * @param string|null              $token
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.reset')->with(
            ['token' => $token, 'user' => $request->user]
        );
    }

    /**
     * Reset the given user's password.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @throws \Illuminate\Validation\ValidationException
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reset(Request $request)
    {
        $this->validate($request, [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ]);

        // $route = 'auth/password/reset/'.$request->token;

        flash('Password has been reset.')->success();

        return redirect()->route('login');
    }
}
