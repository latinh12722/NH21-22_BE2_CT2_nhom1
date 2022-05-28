<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function redirectTo()
    {
        if (isset(Auth::user()->role)) {
            if (Auth::user()->role == 1) {
                return redirect()->intended(RouteServiceProvider::ADMIN);
            } else {
                return redirect()->intended(RouteServiceProvider::HOME);
            }
        } else {
            return view('auth.login');
        }
    }
    public function AuthLogin(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if (auth()->user()->role == 1) {
                return redirect()->route('admin')->with('error', 'Email and password are wrong');
            } else {
                return redirect()->route('customer.index');
            }
        } else {
            return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
        'approve' => 'Wrong password or this account not approved yet.',
    ]);
        }
    }
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();
        if (Auth::user()->role == 1) {
            return redirect()->intended(RouteServiceProvider::ADMIN);
        } else {
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
