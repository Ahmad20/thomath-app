<?php

namespace App\Http\Controllers;

use App\Models\WaliMurid;
use App\Models\Konsultasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KonsultasiController extends Controller
{
    /**
     * Function untuk menampilkan view konsultasi dari wali
     */
    public function view(){
        $wali = Auth::guard('walimurid')->user();
        return view('wali.konsultasi', ['wali'=>$wali]);
    }

    /**
     * Function untuk membuat konsultasi baru
     * dengan parameter request, id_wali_murid
     */
    public function store(Request $request, $id_wali_murid){

        /**
         * Memvalidasi inputan email, topik
         * tahun, tanggal, deskripsi
         */
        $validated = $request->validate([
            'email' => 'required|email',
            'topik' => 'required',
            'tahun' => 'required',
            'tanggal' => 'required|after_or_equal:today',
            'deskripsi' => 'required',
        ]);

        /** Create data ke database ke table konsultasi */
        $konsultasi = Konsultasi::create(request(['email', 'topik', 'tahun', 'tanggal', 'deskripsi']));
        /** Mencari wali murid dengan id = id_wali_murid */
        $wali = WaliMurid::findOrFail($id_wali_murid);
        /** Mengupdate  attribut id_konsultasi pada wali
         * dengan id konsultasi yang baru
        */
        // $wali->update(array('id_konsultasi' => $konsultasi->id_konsultasi));
        $wali->konsultasi()->associate($konsultasi);
        $wali->save();
        /** redirect ke dashboard walimurid */
        return redirect()->to('walimurid/dashboard');
    }
    /**Function untuk menampilkan semua data konsultasi yang ada didatabase */
    public function show(){
        $konsultasi = Konsultasi::get();

        return view('pengajar.konsultasi', ['data'=>$konsultasi]);
    }
    public function edit($id_konsultasi){
        $konsultasi = Konsultasi::findOrFail($id_konsultasi);
        return view('wali.editkonsultasi', compact('konsultasi'));
    }
    public function update(Request $request, $id_konsultasi){
        $validated = $request->validate([
            'email' => 'required|email',
            'topik' => 'required',
            'tahun' => 'required',
            'tanggal' => 'required|after_or_equal:today',
            'deskripsi' => 'required',
        ]);
        $konsultasi = Konsultasi::findOrFail($id_konsultasi);
        $konsultasi->update(request(['email', 'topik', 'tahun', 'tanggal', 'deskripsi']));
        return redirect()->to('walimurid/dashboard')->with('success', 'Konsultasi sudah diubah');
    }
    public function destroy($id_konsultasi){
        /**
         * @description Membuat public function bernama destroy yang akan menghapus data course berdasarkan id
         * @param  int $id_konsultasi
         * @return view back
        */
        $pengajar = Auth::guard('pengajar')->user();
        $wali = Auth::guard('walimurid')->user();
        $konsultasi = Konsultasi::findOrFail($id_konsultasi);
        if($wali){
            $wali->konsultasi()->dissociate();
            $wali->save();
            $view = 'walimurid/dashboard';
            $konsultasi->delete();
        }else{
            $pengajar->konsultasi()->dissociate();
            $pengajar->save();
            $view = 'pengajar/dashboard';
        }
        return redirect()->to($view)->with('success', 'Konsultasi sudah dihapus');
    }
    public function singleKonsultasiView($id_konsultasi){
        $konsultasi = Konsultasi::findOrFail($id_konsultasi);
        return view('pengajar.singlekonsultasi', ['konsultasi'=>$konsultasi]);
    }
    /** function Menambahkan konsultasi ke pengajar */
    public function assign(Request $request, $id_konsultasi){
        $konsultasi = Konsultasi::findOrFail($id_konsultasi);
        $pengajar = Auth::guard('pengajar')->user();
        if ($pengajar->id_konsultasi!=null){
            return redirect()->to('pengajar/dashboard')->with('warning', 'Masih ada konsultasi yang belum selesai');
        }
        /** Mengupdate  attribut id_konsultasi pada pengajar
         * dengan id konsultasi yang baru
        */
        $pengajar->update(array('id_konsultasi' => $konsultasi->id_konsultasi));
        /**redirect ke dashboard pengajar */
        return redirect()->to('pengajar/dashboard')->with('success', 'Jadwal onsultasi berhasil ditambahkan');
    }
}