<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Penggunaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenggunaanListrikController extends Controller
{
    public function index()
    {
        $pelanggans = Pelanggan::select('id_pelanggan', 'nomor_kwh', 'nama')->get();
        return view('add-penggunaan-listrik.index', compact(['pelanggans']));
    }

    public function insertPenggunaanListrik(Request $request)
    {
        $minYear = date('Y') - 1;
        $maxYear = date('Y');
        $maxMeterAwal = $request->meterAkhir - 1;
        $minMeterAkhir = $request->meterAwal + 1;
        $request->validate([
            'pelanggan' => 'required|string|max:50',
            'bulan' => 'required|string|max:20',
            'tahun' => "required|integer|min:$minYear|max:$maxYear",
            'meterAwal' => "required|integer|max:$maxMeterAwal",
            'meterAkhir' => "required|integer|min:$minMeterAkhir",
        ], [
            'meterAwal.max' => 'Meter awal tidak boleh lebih besar dari meter akhir',
            'meterAkhir.min' => 'Meter akhir tidak boleh lebih kecil dari meter awal'
        ]);

        DB::table('penggunaan')->insert([
            'id_penggunaan' => 'penggunaan-' . time(),
            'id_pelanggan' => $request->pelanggan,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'meter_awal' => $request->meterAwal,
            'meter_akhir' => $request->meterAkhir,
        ]);

        return Redirect('/dashboard')->with('success', 'Berhasil menambahkan penggunaan listrik');
    }

    public function deletePenggunaanListrikById(Request $request)
    {
        DB::table('penggunaan')->where('id_penggunaan', $request->id_penggunaan)->delete();

        return Redirect('/dashboard')->with('success', 'Berhasil menghapus data penggunaan listrik');
    }

    public function getUpdatePenggunaanListrik(Request $request)
    {
        $penggunaan = Penggunaan::where('id_penggunaan', $request->idPengguanaan)->first();
        return view('edit-penggunaan-listrik.index', compact(['pengguanaan']));
    }
}
