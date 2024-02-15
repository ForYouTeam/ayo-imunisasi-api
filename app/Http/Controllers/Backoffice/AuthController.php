<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if(!Auth::validate($credentials)):

            return redirect()->to('login')
                ->withErrors([
                    'email' => "Periksa Kembali Username dan Password anda",
                ]);
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return $this->authenticated($request, $user);
    }

    protected function authenticated(Request $request, $user) 
    {
        return redirect()->intended('/dashboard');
    }

    public function perform()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
}
