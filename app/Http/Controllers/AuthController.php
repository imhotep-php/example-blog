<?php

namespace App\Http\Controllers;

use App\Models\User;
use Imhotep\Contracts\Http\Request;
use Imhotep\Facades\Auth;
use Imhotep\Facades\View;
use Imhotep\Validation\ValidationException;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            return redirect()->to('/');
        }

        return View::make('auth.login', [
            'login' => $request->old('login', '')
        ]);
    }

    public function login(Request $request)
    {
        $auth = $request->validate([
           'login' => 'string|required|min:4',
           'password' => 'string|required|min:4',
        ]);

        if (! Auth::attempt($auth) ) {
            if (User::hasByLogin($auth['login'])) {
                throw ValidationException::withMessages([
                    'login' => 'Login or password is incorrect'
                ]);
            }

            $user = User::create($auth['login'], $auth['password']);

            Auth::login($user);
        }

        return redirect()->to('/');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->to('/');
    }
}