<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Add Penggunaan Listrik</h6>
    </div>
    <div class="card-body">
        <form action="/add-penggunaan-listrik" method="post">
            @csrf
            <div class="mb-3">
                <label for="pelanggan" class="form-label">Pelanggan</label>
                <select id="pelanggan" name="pelanggan" class="form-control @error('pelanggan') is-invalid @enderror">
                    <option value="" selected>Pilih pelanggan</option>
                    @foreach ($pelanggans as $pelanggan)
                        <option value="{{ $pelanggan->id_pelanggan }}" class="text-capitalize">
                            {{ $pelanggan->nomor_kwh }} -
                            {{ $pelanggan->nama }}</option>
                    @endforeach
                </select>
                @error('pelanggan')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="bulan" class="form-label">Bulan</label>
                <select id="bulan" name="bulan" class="form-control @error('bulan') is-invalid @enderror">
                    <option value="" selected>Pilih bulan</option>
                    <option value="Januari">Januari</option>
                    <option value="February">February</option>
                    <option value="Maret">Maret</option>
                    <option value="April">April</option>
                    <option value="Mei">Mei</option>
                    <option value="Juni">Juni</option>
                    <option value="Juli">Juli</option>
                    <option value="Agustus">Agustus</option>
                    <option value="September">September</option>
                    <option value="Oktober">Oktober</option>
                    <option value="November">November</option>
                    <option value="Desember">Desember</option>
                </select>
                @error('bulan')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tahun" class="form-label">Tahun</label>
                <input type="number" id="tahun" class="form-control @error('tahun') is-invalid @enderror"
                    name="tahun" placeholder="2022" min="{{ date('Y') - 1 }}" max="{{ date('Y') }}">
                @error('tahun')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="meterAwal" class="form-label">Meter Awal</label>
                <input type="number" name="meterAwal" placeholder="19412"
                    class="form-control @error('meterAwal') is-invalid @enderror" id="meterAwal">
                @error('meterAwal')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="meterAkhir" class="form-label">Meter Akhir</label>
                <input type="number" name="meterAkhir" placeholder="19520"
                    class="form-control @error('meterAkhir') is-invalid @enderror" id="meterAkhir">
                @error('meterAkhir')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>
</div>
