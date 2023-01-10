 <div class="card shadow mb-4">
     <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Penggunaan Listrik</h6>
     </div>
     <div class="card-body">
         <div class="table-responsive">
             <table class="table table-striped" id="dataTable" width="100%" cellspacing="0" style="overflow: auto">
                 <thead>
                     <tr>
                         <th>Bulan</th>
                         <th>Tahun</th>
                         <th>Name</th>
                         <th>Nomor KWH</th>
                         <th>Alamat</th>
                         <th>Daya</th>
                         <th>Tarif/KWH</th>
                         <th>Meter Awal</th>
                         <th>Meter Akhir</th>
                         <th>Pemakaian</th>
                         <th>Tagihan</th>
                         <th>Status</th>
                     </tr>
                 </thead>
                 <tbody>
                     @foreach ($penggunaanListriks as $penggunaan)
                         <tr>
                             <td class="text-capitalize">{{ $penggunaan->bulan }}</td>
                             <td>{{ $penggunaan->tahun }}</td>
                             <td>{{ $penggunaan->nama }}</td>
                             <td>{{ $penggunaan->nomor_kwh }}</td>
                             <td>{{ $penggunaan->alamat }}</td>
                             <td>{{ $penggunaan->daya }}</td>
                             <td>{{ number_format($penggunaan->tarifperkwh, 0, ',', '.') }}</td>
                             <td>{{ number_format($penggunaan->meter_awal, 0, ',', '.') }}</td>
                             <td>{{ number_format($penggunaan->meter_akhir, 0, ',', '.') }}</td>
                             <td>{{ number_format($penggunaan->jumlah_meter, 0, ',', '.') }}</td>
                             <td class="text-dark font-weight-bold">
                                 {{ 'Rp. ' . number_format($penggunaan->tagihan, 0, ',', '.') }}</td>
                             <td class="{{ $penggunaan->status ? 'text-success' : 'text-danger' }} font-weight-bold">
                                 {{ $penggunaan->status ? 'Lunas' : 'Belum Bayar' }}</td>
                         </tr>
                     @endForeach
                 </tbody>
             </table>

             <div class="d-flex justify-content-end">
                 {!! $penggunaanListriks->links() !!}
             </div>
         </div>
     </div>
 </div>
