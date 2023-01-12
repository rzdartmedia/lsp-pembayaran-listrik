<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Penggunaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenggunaanListrikController extends Controller
{
    // function untuk menampilkan halaman penggunaan listrik
    public function index()
    {
        // mengambil data pelanggan pada table pelanggan
        $pelanggans = Pelanggan::select('id_pelanggan', 'nomor_kwh', 'nama')->get();

        // menampilkan halaman dashboard-penggunna yang ada di file
        // resource->views->add-penggunaan-listrik->index.blade.php dengan data pelanggans
        return view('add-penggunaan-listrik.index', compact(['pelanggans']));
    }

    public function insertPenggunaanListrik(Request $request)
    {
        // $request yaitu data dari inputan request yang dikirimkan pada input html
        $minYear = date('Y') - 1;
        $maxYear = date('Y');
        $maxMeterAwal = $request->meterAkhir - 1;
        $minMeterAkhir = $request->meterAwal + 1;

        // validasi data inputan
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

        // create data ke dalama table penggunaan
        DB::table('penggunaan')->insert([
            'id_penggunaan' => 'penggunaan-' . time(),
            'id_pelanggan' => $request->pelanggan,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'meter_awal' => $request->meterAwal,
            'meter_akhir' => $request->meterAkhir,
        ]);

        // kembali ke halaman dashboard dengan session success dan message
        return Redirect('/dashboard')->with('success', 'Berhasil menambahkan penggunaan listrik');
    }

    // function untuk menghapus data penggunaan listrik by id
    public function deletePenggunaanListrikById(Request $request)
    {
        // menghapus data penggunaan di table penggunaan dimana hanya id penggunaan;
        DB::table('penggunaan')->where('id_penggunaan', $request->id_penggunaan)->delete();

        // kembali ke halaman dashboard dengan session success dan message
        return Redirect('/dashboard')->with('success', 'Berhasil menghapus data penggunaan listrik');
    }

    // function untuk mengambil data penggunaan berdasarkan id penggunaan dan akan ditampilkan pada halaman 
    // edit penggunaan listrik
    public function getUpdatePenggunaanListrik($id)
    {
        // get data pelanggan
        $pelanggans = Pelanggan::select('id_pelanggan', 'nomor_kwh', 'nama')->get();
        // get data penggunaan berdasarkan id penggunaan
        $penggunaan = Penggunaan::where('id_penggunaan', $id)->first();

        // menampilkan halaman edit penggunaan yang ada di file
        // resource->views->edit-penggunaan-listrik->index.blade.php dengan data pelanggans dan penggunaan
        return view('edit-penggunaan-listrik.index', compact(['penggunaan', 'pelanggans']));
    }

    // function untuk merubah data penggunaan listrik
    public function updateDataPenggunaanListrik(Request $request)
    {
        $minYear = date('Y') - 1;
        $maxYear = date('Y');
        $maxMeterAwal = $request->meterAkhir - 1;
        $minMeterAkhir = $request->meterAwal + 1;
        // validasi inputan
        $request->validate([
            'bulan' => 'required|string|max:20',
            'tahun' => "required|integer|min:$minYear|max:$maxYear",
            'meterAwal' => "required|integer|max:$maxMeterAwal",
            'meterAkhir' => "required|integer|min:$minMeterAkhir",
        ], [
            'meterAwal.max' => 'Meter awal tidak boleh lebih besar dari meter akhir',
            'meterAkhir.min' => 'Meter akhir tidak boleh lebih kecil dari meter awal'
        ]);

        // merubah data penggunaan listrik pada table pengguanaan
        DB::table('penggunaan')->where('id_penggunaan', $request->id_penggunaan)
            ->update([
                'bulan' => $request->bulan,
                'tahun' => $request->tahun,
                'meter_awal' => $request->meterAwal,
                'meter_akhir' => $request->meterAkhir,
            ]);


        // menampilkan halaman edit penggunaan yang ada di file
        // resource->views->edit-penggunaan-listrik->index.blade.php dengan data pelanggans dan penggunaan
        return Redirect('/dashboard')->with('success', 'Berhasil merubah data penggunaan listrik');
    }
}
