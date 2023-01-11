<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Add Penggunaan Listrik</h6>
    </div>
    <div class="card-body">
        <form>
            <div class="mb-3">
                <label for="pelanggan" class="form-label">Pelanggan</label>
                <select id="pelanggan" name="pelanggan" class="form-control">
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                    <option value="fiat">Fiat</option>
                    <option value="audi">Audi</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="bulan" class="form-label">Bulan</label>
                <select id="bulan" name="bulan" class="form-control">
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
            </div>
            <div class="mb-3">
                <label for="tahun" class="form-label">Tahun</label>
                <input type="number" id="tahun" class="form-control" placeholder="2022" min="{{ date('Y') - 1 }}"
                    max="{{ date('Y') }}">
            </div>
            <div class="mb-3">
                <label for="meterAwal" class="form-label">Meter Awal</label>
                <input type="number" placeholder="19412" class="form-control" id="meterAwal">
            </div>
            <div class="mb-3">
                <label for="meterAkhir" class="form-label">Meter Akhir</label>
                <input type="number" placeholder="19520" class="form-control" id="meterAkhir">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>
</div>
