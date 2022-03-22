<?php

namespace App\Http\Controllers;

use App\Models\DataPegawai;
use App\Models\Presensi;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class PresensiController extends Controller
{
    public function index()
    {
        return view('presensi.index');
    }

    public function keluar()
    {
        return view('presensi.keluar');
    }

    public function store(Request $request)
    {
        $timezone = 'Asia/Makassar';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');
        $absen = Presensi::where(['id_no' => $request->no, 'tanggal' => date('Y-m-d')])->first();
        $valid = DataPegawai::where(['no' => $request->no])->first();
        // return $valid['nama'];
        // return $absen;
        if ($absen) {
            return redirect()->back()->with('status', 'Sudah ada');
        } else {
            if ($valid == NULL) {
                return redirect()->back()->with('status', 'Tidak terdaftar');
            } else {
                $masuk = Presensi::create([
                    'id_no' => $request->no,
                    'tanggal' => $tanggal,
                    'masuk' => $localtime,
                    'nama' => $valid['nama']
                ]);
            }
        }
        return redirect()->back();
    }

    public function kstore(Request $request)
    {
        $timezone = 'Asia/Makassar';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');
        $absen = Presensi::where(['id_no' => $request->no, 'tanggal' => date('Y-m-d')])->first();
        $valid = DataPegawai::where(['no' => $request->no])->first();

        if ($valid == NULL) {
            return redirect()->back()->with('status', 'Tidak terdaftar');
        } else {
            if ($absen->keluar == NULL) {
                $a = $absen->update([
                    'keluar' => $localtime
                ]);
            } else {
                return redirect()->back()->with('status', 'Sudah ada');
            }
        }
        // return $absen;
        return redirect(route('pulang', [$absen->id]));
    }

    public function pulang($id)
    {
        $idx = Presensi::findorfail($id);
        return view('presensi.laporan', compact('idx'));
    }
}
