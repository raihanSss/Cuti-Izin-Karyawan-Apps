<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class RiwayatPermohonanController extends Controller
{
    
    
    public function disetujui()
    {
        if(Auth::user()->role === 'karyawan'){
            $id = Auth::user()->id;
            $permohonan = DB::table('users')
            ->join('permohonan_cuti','users.id','=','permohonan_cuti.user_id')
            ->select('permohonan_cuti.id','users.name','permohonan_cuti.alasan_cuti','permohonan_cuti.tgl_mulai','permohonan_cuti.tgl_akhir','permohonan_cuti.status')
            ->where('permohonan_cuti.status','disetujui')
            ->where('users.id',$id)
            ->get();
        }else{
            $permohonan = DB::table('users')
                ->join('permohonan_cuti','users.id','=','permohonan_cuti.user_id')
                ->select('permohonan_cuti.id','users.name','permohonan_cuti.alasan_cuti','permohonan_cuti.tgl_mulai','permohonan_cuti.tgl_akhir','permohonan_cuti.status')
                ->where('permohonan_cuti.status','disetujui')
                ->get();
        }

        return view('pages.permohonanCuti.disetujui',['permohonan' => $permohonan]);
    }
    
    public function ditolak()
    {
        if(Auth::user()->role === 'karyawan'){
            $id = Auth::user()->id;
            $permohonan = DB::table('users')
                ->join('permohonan_cuti','users.id','=','permohonan_cuti.user_id')
                ->select('permohonan_cuti.id','users.name','permohonan_cuti.alasan_cuti','permohonan_cuti.tgl_mulai','permohonan_cuti.tgl_akhir','permohonan_cuti.status')
                ->where('permohonan_cuti.status','ditolak')
                ->where('users.id',$id)

                ->get();
        }else{
            $permohonan = DB::table('users')
                ->join('permohonan_cuti','users.id','=','permohonan_cuti.user_id')
                ->select('permohonan_cuti.id','users.name','permohonan_cuti.alasan_cuti','permohonan_cuti.tgl_mulai','permohonan_cuti.tgl_akhir','permohonan_cuti.status')
                ->where('permohonan_cuti.status','ditolak')
                ->get();
        }

        return view('pages.permohonanCuti.ditolak',['permohonan' => $permohonan]);

    }
}
