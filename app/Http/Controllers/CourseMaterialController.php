<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\CourseMaterial;

class CourseMaterialController extends Controller
{
    public function index(){
        $pengajar = Auth()->guard('pengajar')->user();
        $courses = Course::where('created_by', $pengajar->id_pengajar)->orderByDesc('created_at')->get();
        return view('pengajar.coursematerial', ['courses'=> $courses]);
    }
    public function store(Request $request){
        $validated = $request->validate([
            'coursename' => 'required',
        ]);
        $course = Course::where('name', $request->coursename)->first();
        $cm = $course->coursematerial;
        if($cm==null){
            $material = CourseMaterial::create([
                'slide'=> $request->slide,
                'video'=> $request->video,
                'kuis'=> $request->kuis,
                'tugas'=> $request->tugas,
                'referensi'=> $request->referensi]);
            $course->update(['course_material'=>$material->id_course_material]);
        }else{
            $this->update($request, $cm->id_course_material);
        }

        return redirect()->to('/pengajar/dashboard');
    }
    public function edit($id){
        $pengajar = Auth()->guard('pengajar')->user();
        $material = CourseMaterial::findOrFail($id);
        $course = Course::where('course_material',$material->id_course_material)->first();
        $courses = Course::where('created_by', $pengajar->id_pengajar)->orderByDesc('created_at')->get();
        // return dd($course);
        return view('pengajar.editcoursematerial', ['course'=> $course->name, 'material'=>$material]);
    }
    public function update(Request $request, $id){
        CourseMaterial::find($id)->update([
            'slide'=> $request->slide,
            'video'=> $request->video,
            'kuis'=> $request->kuis,
            'tugas'=> $request->tugas,
            'referensi'=> $request->referensi]);
        return redirect()->to('/pengajar/dashboard')->with('success', 'Course material berhasil diubah');
    }
    public function destroy($id){
        CourseMaterial::findOrFail($id)->delete();
        return redirect()->back();
    }
}
