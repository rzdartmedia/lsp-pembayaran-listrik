<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Update Penggunaan Listrik</h6>
    </div>
    <div class="card-body">
        <form action="{{ url('update-penggunaan-listrik') }}" method="post">
            @csrf
            <input type="hidden" value="{{ $penggunaan->id_penggunaan }}">
            <div class="mb-3">
                <label for="pelanggan" class="form-label">Pelanggan</label>
                <select id="pelanggan" name="pelanggan" class="form-control @error('pelanggan') is-invalid @enderror"
                    disabled>
                    @foreach ($pelanggans as $pelanggan)
                        <option value="{{ $pelanggan->id_pelanggan }}"
                            {{ $penggunaan->id_pelanggan == $pelanggan->id_pelanggan ? 'selected' : '' }}
                            class="text-capitalize">
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
                <select id="bulan" name="bulan" class="form-control">
                    <option {{ $penggunaan->bulan == 'januari' ? 'selected' : '' }} value="Januari">Januari</option>
                    <option {{ $penggunaan->bulan == 'february' ? 'selected' : '' }} value="February">February</option>
                    <option {{ $penggunaan->bulan == 'maret' ? 'selected' : '' }} value="Maret">Maret</option>
                    <option {{ $penggunaan->bulan == 'april' ? 'selected' : '' }} value="April">April</option>
                    <option {{ $penggunaan->bulan == 'mei' ? 'selected' : '' }} value="Mei">Mei</option>
                    <option {{ $penggunaan->bulan == 'juni' ? 'selected' : '' }} value="Juni">Juni</option>
                    <option {{ $penggunaan->bulan == 'juli' ? 'selected' : '' }} value="Juli">Juli</option>
                    <option {{ $penggunaan->bulan == 'agustus' ? 'selected' : '' }} value="Agustus">Agustus</option>
                    <option {{ $penggunaan->bulan == 'september' ? 'selected' : '' }} value="September">September
                    </option>
                    <option {{ $penggunaan->bulan == 'oktober' ? 'selected' : '' }} value="Oktober">Oktober</option>
                    <option {{ $penggunaan->bulan == 'november' ? 'selected' : '' }} value="November">November</option>
                    <option {{ $penggunaan->bulan == 'desember' ? 'selected' : '' }} value="Desember">Desember</option>
                </select>
                @error('bulan')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tahun" class="form-label">Tahun</label>
                <input type="number" id="tahun" class="form-control @error('tahun') is-invalid @enderror"
                    name="tahun" placeholder="2022" min="{{ date('Y') - 1 }}" max="{{ date('Y') }}"
                    value="{{ $penggunaan->tahun }}">
                @error('tahun')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="meterAwal" class="form-label">Meter Awal</label>
                <input type="number" name="meterAwal" placeholder="19412"
                    class="form-control @error('meterAwal') is-invalid @enderror" id="meterAwal"
                    value="{{ $penggunaan->meter_awal }}">
                @error('meterAwal')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="meterAkhir" class="form-label">Meter Akhir</label>
                <input type="number" name="meterAkhir" placeholder="19520"
                    class="form-control @error('meterAkhir') is-invalid @enderror" id="meterAkhir"
                    value="{{ $penggunaan->meter_akhir }}">
                @error('meterAkhir')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>
</div>
