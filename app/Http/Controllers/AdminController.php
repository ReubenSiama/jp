<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\StudyMaterial;
use Illuminate\Http\Request;
use App\Models\StudentDetail;
use App\Models\Setting;
use App\Models\Course;
use App\Models\User;
use Carbon\Carbon;
use Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }

    public function getStudents()
    {
        $students = [];
        $courses = Course::get();
        return view('admin.group-course', compact('students', 'courses'));
    }

    public function getSpecificStudents($id)
    {
        $unfiltered = User::where('role_id',1)->get();
        $students = $unfiltered->where('studentDetail.course_id',$id);
        $courses = Course::get();
        return view('admin.group-course', compact('students', 'courses'));
    }

    public function getFaculties()
    {
        $faculties = User::where('role_id', '!=', 1)->get();
        return view('admin.faculties', compact('faculties'));
    }

    public function getCourses()
    {
        $courses = Course::get();
        return view('admin.courses', compact('courses'));
    }

    public function addCourse(Request $request)
    {
        $course = new Course;
        $course->course_name = $request->course_name;
        $course->duration = $request->course_duration;
        $course->fee = $request->course_fee;
        if($course->save()){
            return back()->withSuccess('New Course Added Successfully');
        }else{
            return back()->withError('Oops! Something Went Wrong');
        }
    }

    public function updateCourse(Request $request)
    {
        $course = Course::findOrFail($request->edit_course_id);
        $course->course_name = $request->edit_course_name;
        $course->duration = $request->edit_course_duration;
        $course->fee = $request->edit_course_fee;
        $course->save();
        return back()->withSuccess('Course Updated');
    }

    public function addFaculty(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role_id = $request->role;
        if($user->save()){
            return back()->withSuccess('New Faculty Added Successfully');
        }else{
            return back()->withError('Oops! Something Went Wrong');
        }
    }

    public function updateFaculty(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role;
        $user->save();
        return back()->withSuccess('Faculty Updated');
    }

    public function deleteFaculty(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->delete();
        return back()->withSuccess('Faculty Deleted');
    }

    public function approve($id)
    {
        $detail = StudentDetail::where('user_id',$id)->first();
        $detail->status = 'Approved';
        $detail->save();
        return back();
    }

    public function decline($id)
    {
        $detail = StudentDetail::where('user_id',$id)->first();
        $detail->status = 'Declined';
        $detail->save();
        return back();
    }

    public function getStudyMaterial()
    {
        $studyMaterials = StudyMaterial::when(Auth::user()->role_id == 1, function($q){
            return $q->where('course_id', Auth::user()->studentDetail->course_id)->where('status','Public')->get();
        })->when(Auth::user()->role_id == 2, function($q){
            return $q->where('user_id', Auth::user()->id)->get();
        })->when(Auth::user()->role_id == 3, function($q){
            return $q->get();
        });
        $courses = Course::get();
        return view('admin.study_materials', compact('studyMaterials', 'courses'));
    }

    public function addStudyMaterial(Request $request)
    {
        $date = Carbon::now()->timestamp;
        $file = $request->file;
        $filename = $request->title.$date.'.'.$file->getClientOriginalExtension();
        Storage::putFileAs('public/study_materials', $file, $filename);

        $studyMaterial = new StudyMaterial;
        $studyMaterial->course_id = $request->course;
        $studyMaterial->title = $request->title;
        $studyMaterial->url = '/study_materials'.'/'.$filename;
        $studyMaterial->description = $request->description;
        $studyMaterial->batch = '2020-2021';
        $studyMaterial->user_id = Auth::user()->id;
        if($studyMaterial->save()){
            return back()->withSuccess('Study Material Added successfully');
        }else{
            return back()->withError('Oops! Something Went wrong');
        }
    }

    public function getSettings()
    {
        $settings = Setting::get();
        return view('admin.settings', compact('settings'));
    }

    public function addSetting(Request $request)
    {
        $setting = new Setting;
        $setting->key = $request->key;
        $setting->value = $request->value;
        $setting->save();
        return back()->withSuccess('Setting Added');
    }

    public function changeVideo(Request $request, $id)
    {
        $material = StudyMaterial::findOrFail($id);
        $material->status = $request->status;
        $material->save();
        return back();
    }
}
