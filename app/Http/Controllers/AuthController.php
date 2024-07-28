<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function showLogin(): View
    {
        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $user = $request->validate([
            'email' => 'required|email|exists:users,email|max:255|string',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($user)) {
            return redirect()->intended(route('home'));
        }
        return redirect()->back()->withErrors(['err' => 'Thông tin đăng nhập không đúng.']);
    }

    public function showRegister(): View
    {
        return view('auth.register');
    }

    public function register(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|min:5|confirmed',
        ]);
        $data['permission_id'] = 1;
        User::create($data);
        session()->flash('success', 'Đăng ký tài khoản thành công !, mời bạn đăng nhập.');
        return redirect()->route('login');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('login.show');
    }
}
