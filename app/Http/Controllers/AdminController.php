<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index(){
        $admins=Admin::get();
        return view('Admin.AdminTable',compact('admins'));
    }

    public function register (){

        return view('Admin.Register');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6',
        ]);

        $admin = Admin::create([
            'password' => Hash::make($validatedData['password']),
            'email' => $validatedData['email'],
        ]);

        Auth::guard('admin')->login($admin);

        return redirect()->route('medicine');
    }
    public function login (){

        return view('Admin.Login');
    }
    
    public function save(Request $request)
    {
    
        $emailValidator = Validator::make($request->only('email'), [
            'email' => 'exists:admins,email|min:10|required',
        ], [
            'email.exists' => 'الايميل ليس مسجلاً',
            'email.required' => 'هذا الحقل مطلوب',
            'email.min' => 'الايميل يجب أن يتألف من 10 محارف أو أكثر',
        ]);
    
        if ($emailValidator->fails()) {
            return redirect()->back()->withErrors($emailValidator->errors());
        }
    
        $passwordValidator = Validator::make($request->only('password'), [
            'password' => 'required|min:8'
        ], [
            'password.required' => 'هذا الحقل مطلوب',
            'password.min' => 'كلمة السر يجب أن تتألف من 8 محارف أو أكثر'
        ]);
    
        if ($passwordValidator->fails()) {
            return redirect()->back()->withErrors($passwordValidator->errors());
        }
    
        $data = $request->only(['email', 'password']);
        if (Auth::guard('admin')->attempt($data)) {
            return redirect()->route('medicine');
        }
    
        return redirect()->back()->withErrors(['email' => 'The provided credentials are incorrect.']);
    }
    
    
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')->with('message', 'Logged out successfully');
    }

}