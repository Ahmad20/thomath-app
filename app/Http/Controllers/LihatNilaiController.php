<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LihatNilaiController extends Controller
{
    /** Menampilkan view nilai dari pengajar */
    public function view(){
        return view('pengajar.nilai');
    }
    /**
     * Menambahkan course baru
     */
    public function scoreView(){
        
        $siswa = Auth()->guard('siswa')->user();
        $wali_murid = Auth()->guard('walimurid')->user();
        $view = 'siswa.showscore';
        if ($wali_murid){
            $siswa = $wali_murid->siswa;
            $view = 'wali.showscore';  
        }
        $test = DB::table('testpaper')
                ->join('siswa_test_paper', 'testpaper.id_testpaper', '=', 'siswa_test_paper.test_paper_id_testpaper')
                ->join('course', 'testpaper.id_course','=', 'course.id_course')
                ->where('siswa_test_paper.siswa_id_siswa', $siswa->id_siswa)
                ->select('course.name as coursename','testpaper.name as testname','testpaper.question','siswa_test_paper.score')
                ->orderBy('siswa_test_paper.test_paper_id_testpaper')
                ->get();
        // return dd($test);
        return view($view, ['test_siswa'=> $test]);
    }
}
