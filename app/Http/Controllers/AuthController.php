<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }


    public function submitLogin(LoginRequest $request, UserService $userService){
        $credentials = $request->validated();

        if ($userService->authenticate($credentials)) {
            return redirect()->route('homepage', ['section' => 'ranking']);
        } else {
            return redirect()->back()->with(['loginError' => 'Credenciais inválidas.']);
        }
    }


    public function logout(Request $request) {
        Auth::logout(); 
        $request->session()->invalidate(); 

        $request->session()->regenerateToken();  

        return redirect()->route('index');
    }
}
