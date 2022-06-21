<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\TestPaper;
use Illuminate\Http\Request;

class TeacherTestController extends Controller
{
    public function index(){
        $pengajar = Auth()->guard('pengajar')->user();
        $courses = Course::where('created_by', $pengajar->id_pengajar)->orderByDesc('created_at')->get();
        return view('pengajar.test', ['pengajar'=>$pengajar,'courses'=> $courses]);
    }
    public function store(Request $request){
        $course = Course::where('name', $request->courseName)->first();
        $validated = $request->validate([
            'courseName' => 'required',
            'testname' => 'required',
            'dueDate' => 'required|after_or_equal:today',
            'question' => 'required',
        ]);
        $testpaper = TestPaper::create([
            'name' => $request->testname,
            'due_date' => $request->dueDate,
            'question' => $request->question,
            'id_course' => $course->id_course,
        ]);
        return redirect()->to('/pengajar/dashboard');
    }
    public function edit($id){
        $testpaper = TestPaper::findOrFail($id);
        $pengajar = Auth()->guard('pengajar')->user();
        $courses = Course::where('created_by', $pengajar->id_pengajar)->orderByDesc('created_at')->get();
        return view('pengajar.edittest', compact('testpaper', 'courses', 'pengajar'));
    }
    public function update(Request $request, $id_testpaper){
        $validated = $request->validate([
            'courseName' => 'required',
            'testname' => 'required',
            'dueDate' => 'required|after_or_equal:today',
            'question' => 'required',
        ]);

        TestPaper::find($id_testpaper)->update($validated);
        return redirect()->to('pengajar/dashboard')->with('success', "Test berhasil diubah");
    }
    public function destroy($id_testpaper){
        TestPaper::findOrFail($id_testpaper)->delete();
        return redirect()->to('pengajar/dashboard')->with('success', "Test berhasil dihapus");
    }
}
