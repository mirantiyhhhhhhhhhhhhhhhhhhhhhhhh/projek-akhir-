<?php

namespace App\Http\Controllers;

use App\Models\PresensiPulang;
use App\Models\dataguru;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PresensiPulangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Kepulangan';
        $data = DB::table('presensipulang')->join('dataguru', 'dataguru.id_dataguru', '=','presensipulang.id_dataguru')->get();
        return view('presensipulang.index', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $result = DB::table('presensipulang')
            ->where('id_pulang', $id)
            ->join('dataguru', 'dataguru.id_dataguru', '=','presensipulang.id_dataguru')
            ->first();

        return view('presensipulang.show', [
            'title' => 'Detail Data Presensi',
            'result' => $result
        ]);
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
