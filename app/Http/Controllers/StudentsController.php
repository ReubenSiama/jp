<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\StudentDetail;

class StudentsController extends Controller
{
    public function getStudents()
    {
        return 'Test';
    }

    public function postRegister(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role_id = 1;
        if($user->save()){
            $details = new StudentDetail;
            $details->user_id = $user->id;
            $details->fathers_name = $request->father_name;
            $details->contact_no = $request->contact;
            $details->course_id = $request->course;
            
            if($details->save()){
                return back()->withSuccess('Registered Successfully');
            }else{
                return back()->withError('Oops! Something Went Wrong');
            }
        }else{
            return back()->withError('Oops! Something Went Wrong');
        }
    }
}
