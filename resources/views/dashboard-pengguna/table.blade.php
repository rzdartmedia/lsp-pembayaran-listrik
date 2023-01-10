 <div class="card shadow mb-4">
     <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Tagihan Listrik</h6>
     </div>
     <div class="card-body">
         <div class="table-responsive">
             <table class="table table-striped" id="dataTable" width="100%" cellspacing="0" style="overflow: auto">
                 <thead>
                     <tr>
                         <th>Bulan</th>
                         <th>Tahun</th>
                         <th>Meter Awal</th>
                         <th>Meter Akhir</th>
                         <th>Pemakaian</th>
                         <th>Tagihan</th>
                         <th>Status</th>
                     </tr>
                 </thead>
                 <tbody>
                     @foreach ($tagihans as $tagihan)
                         <tr>
                             <td class="text-capitalize">{{ $tagihan->bulan }}</td>
                             <td>{{ $tagihan->tahun }}</td>
                             <td>{{ number_format($tagihan->meter_awal, 0, ',', '.') }}</td>
                             <td>{{ number_format($tagihan->meter_akhir, 0, ',', '.') }}</td>
                             <td>{{ $tagihan->jumlah_meter }}</td>
                             <td class="text-dark font-weight-bold">
                                 {{ 'Rp. ' . number_format($tagihan->tagihan, 0, ',', '.') }}</td>
                             <td class="{{ $tagihan->status ? 'text-success' : 'text-danger' }} font-weight-bold">
                                 {{ $tagihan->status ? 'Lunas' : 'Belum Bayar' }}</td>
                         </tr>
                     @endForeach
                 </tbody>
             </table>

             <div class="d-flex justify-content-end">
                 {!! $tagihans->links() !!}
             </div>
         </div>
     </div>
 </div>
