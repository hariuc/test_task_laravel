<?php

namespace App\Application\Modules\User\Controllers;

use App\Http\Controllers\Controller;
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

    public function store()
    {

    }

    public function logout(Request $request):void
    {
        Auth::logout();
    }
}
