<?php

namespace App\Http\Middleware;

use Imhotep\Contracts\Encryption\Encrypter;
use Imhotep\Contracts\Encryption\EncryptionException;
use Imhotep\Contracts\Http\Request;
use Imhotep\Contracts\Http\Response;
use Imhotep\Facades\Auth;
use Imhotep\Facades\View;
use Throwable;

class AuthToView
{
    public function handle(Request $request, \Closure $next)
    {
        $auth = Auth::user();

        View::share('auth', $auth ? $auth : (object)[
            'id' => null,
            'login' => ''
        ]);

        $locale = session()->get('locale', app()->locale());

        config()->set('app.locale', $locale);

        View::share('language', $locale);

        return $next($request);
    }
}