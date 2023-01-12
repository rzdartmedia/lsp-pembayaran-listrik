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
    // Controller untuk menampilan halaman dashboard
    public function index(Request $request)
    {
        // cek kalau user login sebagai admin
        if (in_array($request->user()->id_level, ['level-001'])) {
            // query builder untuk get data ke table penggunaan listrik order by id_penggunaan desc dengan paginate 10
            $penggunaanListriks = PenggunaanListrik::orderByDesc('id_penggunaan')->paginate(10);

            // menampilkan halaman dahboard yang ada di file dengan data penggunaanListriks
            // resource->views->dashboard-admin->index.blade.php
            return view('dashboard-admin.index', compact(['penggunaanListriks']));
        } else {
            // kalau user login tidak sebagai admin

            // get data pelanggan
            $user = Pelanggan::join('tarif', 'pelanggan.id_tarif', '=', 'tarif.id_tarif')
                ->select('pelanggan.*', 'tarif.daya', 'tarif.tarifperkwh')
                ->where('id_pelanggan', $request->user()->id_pelanggan)
                ->first();

            // merubah dan memasukan session hasil dari get data pelanggan
            $request->session()->put('dayaPelanggan', $user->daya);
            $request->session()->put('tarifPerKwhPelanggan', $user->tarifperkwh);


            // get data tagihan pelanggan sesuai dari pelanggan yang login, paginate 10
            $tagihans = Tagihan::join('penggunaan', 'tagihan.id_penggunaan', '=', 'penggunaan.id_penggunaan')
                ->where('tagihan.id_pelanggan', $request->user()->id_pelanggan)
                ->select(
                    'tagihan.*',
                    'penggunaan.meter_awal',
                    'penggunaan.meter_akhir',
                    DB::raw("jumlah_meter * $user->tarifperkwh as tagihan")
                )
                ->paginate(10);

            // menampilkan halaman dashboard-penggunna yang ada di file dengan data tagihans
            // resource->views->dashboard-pengguna->index.blade.php
            return view('dashboard-pengguna.index', compact(['tagihans']));
        }
    }
}
