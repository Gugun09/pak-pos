<?php

namespace App\Http\Controllers;

use App\Models\DataPegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DataPegawaiController extends Controller
{
    public function index()
    {
        return view('pegawai.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);
        DataPegawai::create([
            'no' => Str::random(8),
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
        ]);

        return redirect()->back();
    }
}
