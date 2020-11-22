<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
            return redirect('/dashboard');
        }else{
            return back()->withError('Invalid Credentials')->withInput();
        }
    }

    public function postLogout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function getRegister()
    {
        $courses = Course::all();
        return view('auth.register', compact('courses'));
    }
}
