 <div class="card shadow mb-4">
     <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Penggunaan Listrik</h6>
     </div>
     <div class="card-body">
         <div class="table-responsive">
             <table class="table table-striped" id="dataTable" width="100%" cellspacing="0" style="overflow: auto">
                 <thead>
                     <tr>
                         <th>Action</th>
                         <th>Action</th>
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
                             <td>
                                 <button type="submit" class="btn btn-danger"
                                     value-penggunaan="{{ $penggunaan->id_penggunaan }}" id="btn-delete-penggunaan"
                                     data-toggle="modal" data-target="#deletePenggunaanModal">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                         fill="currentColor" class="bi bi-trash2-fill" viewBox="0 0 16 16">
                                         <path
                                             d="M2.037 3.225A.703.703 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2a.702.702 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225zm9.89-.69C10.966 2.214 9.578 2 8 2c-1.58 0-2.968.215-3.926.534-.477.16-.795.327-.975.466.18.14.498.307.975.466C5.032 3.786 6.42 4 8 4s2.967-.215 3.926-.534c.477-.16.795-.327.975-.466-.18-.14-.498-.307-.975-.466z" />
                                     </svg>
                                 </button>
                             </td>
                             <td>
                                 <a href="{{ url("get-update-penggunaan-listrik/$penggunaan->id_penggunaan") }}"
                                     class="btn btn-success">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                         fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                         <path
                                             d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                         <path fill-rule="evenodd"
                                             d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                     </svg>
                                 </a>
                             </td>
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
                             <td class="{{ $penggunaan->status ? 'text-danger' : 'text-success' }} font-weight-bold">
                                 {{ $penggunaan->status ? 'Belum Bayar' : 'Lunas' }}</td>
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
 @include('dashboard-admin.modalDeletePenggunaan');
