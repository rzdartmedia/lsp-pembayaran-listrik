<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Penggunaan;
use App\Models\PenggunaanListrik;
use App\Models\Tagihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if (in_array($request->user()->id_level, ['level-001'])) {
            $penggunaanListriks = PenggunaanListrik::orderByDesc('id_penggunaan')->paginate(10);

            return view('dashboard-admin.index', compact(['penggunaanListriks']));
        } else {
            $user = Pelanggan::join('tarif', 'pelanggan.id_tarif', '=', 'tarif.id_tarif')
                ->select('pelanggan.*', 'tarif.daya', 'tarif.tarifperkwh')
                ->where('id_pelanggan', $request->user()->id_pelanggan)
                ->first();

            $request->session()->put('dayaPelanggan', $user->daya);
            $request->session()->put('tarifPerKwhPelanggan', $user->tarifperkwh);


            $tagihans = Tagihan::join('penggunaan', 'tagihan.id_penggunaan', '=', 'penggunaan.id_penggunaan')
                ->where('tagihan.id_pelanggan', $request->user()->id_pelanggan)
                ->select(
                    'tagihan.*',
                    'penggunaan.meter_awal',
                    'penggunaan.meter_akhir',
                    DB::raw("jumlah_meter * $user->tarifperkwh as tagihan")
                )
                ->paginate(10);
            return view('dashboard-pengguna.index', compact(['tagihans']));
        }
    }
}
