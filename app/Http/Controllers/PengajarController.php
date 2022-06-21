<?php

namespace App\Http\Controllers;
use Auth;
use Config;
use App\Models\Siswa;
use App\Models\Course;
use App\Models\Pengajar;
use App\Models\TestPaper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CourseController;

class PengajarController extends Controller
{
    public function dashboard(){
        $pengajar = Auth()->guard('pengajar')->user();
        $course = Course::where('created_by', $pengajar->id_pengajar)->get();
        $arr = array();
        $i = 0;
        foreach($course as $c){
            $arr[$i] = TestPaper::where('id_course', $c->id_course)->get();
            $i = $i+1;
        }
        return view('pengajar.dashboard', ['courses'=>$course, 'testpaper' => $arr, 'pengajar'=>$pengajar]);
    }
    public function singleTestView(Request $request, $id_test){
        $test = TestPaper::find($id_test);
        return view('pengajar.singletest', ['test'=>$test]);
    }
    public function singleCourseView(Request $request, $id_course){
        $course = Course::find($id_course);
        $coursematerial = $course->coursematerial;
        return view('pengajar.singlecourse', ['course'=>$course, 'cm'=>$coursematerial]);
    }
    public function siswaTaskView($id_test, $id_siswa){
        $siswa = Siswa::findOrFail($id_siswa);
        $test = TestPaper::findOrFail($id_test);
        $test_siswa = DB::table('siswa_test_paper')
                        ->where('test_paper_id_testpaper', $id_test)
                        ->where('siswa_id_siswa', $id_siswa)->first();
        // return dd($test_siswa);
        if ($test_siswa==null){
            return redirect()->back();
        }
        return view('pengajar.givescore', ['test_siswa'=>$test_siswa, 'test'=>$test, 'siswa'=>$siswa]);
    }
    public function giveScore(Request $request, $id_test, $id_siswa){
        $validated = $request->validate([
          'score'=>'required|integer|max:100|min:0',  
        ]);
        DB::table('siswa_test_paper')
                    ->where('test_paper_id_testpaper', $id_test)
                    ->where('siswa_id_siswa', $id_siswa)
                    ->update(['score' => $request->score]);
        return redirect()->to('/pengajar/dashboard');
    }
    public function loginPengajarView(){
        return view('pengajar.login');
    }
    
    public function registerPengajarView(){
        return view('pengajar.register');
    }
    public function loginPengajar(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $email = $request->email;
        $password = $request->password;
        if(Auth::guard('pengajar')->attempt(['email' => $email, 'password' => $password])){

             return redirect()->to('/pengajar/dashboard');
        }
        else {
            return redirect("/pengajar/login")->withSuccess('Login details are not valid');
        }
    }
    public function registerPengajar(Request $request){
        $validated = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email:dns|unique:pengajar',
            'password' => 'required|min:5',
            'phone_number' => 'required|regex:/^(08)[0-9]{6,15}/'
        ]);
        $validated['password'] = bcrypt($validated['password']);
        $user = Pengajar::create($validated);

        Auth::guard('pengajar')->login($user);

        return redirect()->to('pengajar/dashboard');
    }
    public function logout(Request $request){
        Auth::guard('pengajar')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function profile(){
        return view('pengajar.profile');
    }
    public function editPassword(){
        return view('pengajar.editpassword');
    }
    public function updatePassword(Request $request, $id_pengajar){
        
        $pengajar = Pengajar::find($id_pengajar);
        if($request->oldPassword == $request->newPassword){
            return redirect()->back()->with('warning', 'Password baru tidak boleh sama dengan yang lama');
        }
        $validated = $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required|min:5',
        ]);
        $validated['newPassword'] = bcrypt($validated['newPassword']);
        $pengajar->update([
            'password' => $validated['newPassword']
        ]);
        return redirect()->intended('pengajar/dashboard')->with('success', 'Password berhasil diubah');

    }
    public function updateProfile(Request $request, $id_pengajar){
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phoneNumber,
        ];
        $pengajar = Pengajar::find($id_pengajar);
        //jika email baru = email lama
        if($pengajar->email==$request->email){
            $validated = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'phoneNumber' => 'required|regex:/^(08)[0-9]{6,15}/'
            ]);
        }else{
            $validated = $request->validate([
                'name' => 'required',
                'email' => 'required|unique:pengajar',
                'phoneNumber' => 'required|regex:/^(08)[0-9]{6,15}/'
            ]);
        }
        $pengajar->update($data);
        return redirect()->intended('pengajar/dashboard')->with('success', 'Profile berhasil diubah');
    }
}
