<?php

namespace App\Application\Modules\User\Controllers;

use App\Application\Modules\User\Repositories\UserRepository;
use App\Application\Modules\User\Requests\AuthUserRequest;
use App\Application\Modules\User\Requests\StoreUserRequest;
use App\Application\Modules\User\Services\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{

    public function register(): View
    {
        return view("layouts.auth.register");
    }

    public function login(): View
    {
        return view("layouts.auth.login");
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        $service = new UserService(new UserRepository());
        if ($service->store($request)) {
            $credentials = $request->only("email", 'password');
            Auth::attempt($credentials);
            $request->session()->regenerate();
            return redirect()->route("currency.list");
        }

        return redirect()->route('register');

    }

    public function authenticate(AuthUserRequest $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route("currency.list");
        }

        return back();
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route("currency.list");
    }
}
