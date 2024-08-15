<?php

namespace App\Http\Controllers;

use App\Models\PresensiHadir;
use App\Models\dataguru;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PresensiHadirLandingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Form Presensi Hadir';
        return view('presensihadirLanding.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $guruId = $request->input('id_dataguru');

        $today = Carbon::now()->isoFormat('dddd, D MMMM Y');
        $todayhour = Carbon::now()->isoFormat('HH:mm');



        // Periksa apakah guru telah melakukan presensi pada hari ini

        $presensiHariIni = PresensiHadir::where('id_dataguru', $guruId)->where('waktu_presensi_hari', $today)->first();

        if ($presensiHariIni) {
            return back()->with('gagal', 'Anda Sudah Absensi Hari Ini!!!');
        }else{
            // Jika guru belum melakukan presensi hari ini, simpan presensi baru
            DB::table('presensihadir')->insert([
            'id_dataguru' => $guruId,
            'status_kehadiran' => 'Hadir',
            'waktu_presensi_hari' => $today,
            'waktu_presensi_jam' => $todayhour,
        ]);

        return back()->with('sukses', 'Absensi Berhasil!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
