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

    public function updateStudent(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($user->save()){
            $details = StudentDetail::where('user_id', $request->id)->first();
            $details->fathers_name = $request->father_name;
            $details->contact_no = $request->contact;
            $details->course_id = $request->course;
            $details->status = $request->status;
            if($details->save()){
                return back()->withSuccess('Updated Successfully');
            }else{
                return back()->withError('Oops! Something Went Wrong');
            }
        }else{
            return back()->withError('Oops! Something Went Wrong');
        }
    }

    public function deleteStudent(Request $request)
    {
        $student = User::findOrFail($request->id);
        $student->delete();
        $detail = StudentDetail::where('user_id', $request->id)->first();
        $detail->delete();
        return back()->withSuccess('Student Deleted');
    }
}
