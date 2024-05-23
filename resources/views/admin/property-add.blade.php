@extends('theme.admin.master')
@section('content')

<div class="card">
    <div class="card-header bg-primary">
        <h6 class="mb-0 text-white">Tambah Property
            <a href="{{url('admin/property')}}" class="btn btn-sm float-end btn-light">Kembali</a>
        </h6>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{url('admin/property')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="" class="form-label">Nama Properti</label>
                    <input type="text" class="form-control @error('nama_properti') is-invalid @enderror" name="nama_properti">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Type Properti</label>
                    <input type="text" class="form-control @error('type_properti') is-invalid @enderror" name="type_properti">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Nomor Rumah</label>
                    <input type="number" class="form-control @error('nomor_rumah') is-invalid @enderror" name="nomor_rumah">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Deskripsi</label>
                    <textarea type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi"></textarea>
                </div>

                <div class="form-group">
                    <label for="" class="form-label">Tahun Pembuatan</label>
                    <input type="date" class="form-control @error('tahun_pembuatan') is-invalid @enderror" name="tahun_pembuatan">
                </div>
                <div class="form-group">
                    <label for="status_pembuatan" class="form-label">Status</label>
                    <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                        <option disabled="">Pilih Status</option>
                        <option value="Ada">Ada</option>
                        <option value="Tidak Ada">Tidak Ada</option>
                    </select>
                    @error('status_pembuatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <br>

                <div class="row">

                <div class="col-md-3">
                        <div class="form-group">
                            <label for="" class="form-label">Garasi</label>
                            <input type="number" class="form-control @error('garasi') is-invalid @enderror" name="garasi">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="" class="form-label">Luas</label>
                            <input type="number" class="form-control @error('luas') is-invalid @enderror" name="luas">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="" class="form-label">Jumlah Kamar Tidur</label>
                            <input type="number" class="form-control @error('jumlah_kamar_mandi') is-invalid @enderror" name="jumlah_kamar_mandi">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="" class="form-label">Jumlah Kamar Tidur</label>
                            <input type="number" class="form-control @error('jumlah_kamar_tidur') is-invalid @enderror" name="jumlah_kamar_tidur">
                        </div>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="form-label">Longitude</label>
                            <input type="text" class="form-control @error('longitude') is-invalid @enderror" name="longitude">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="form-label">Latitude</label>
                            <input type="text" class="form-control @error('latitude') is-invalid @enderror" name="latitude">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="form-label">Harga</label>
                            <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga">

                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="form-label">Informasi Tambahan</label>
                            <textarea type="text" class="form-control @error('informasi_tambahan') is-invalid @enderror" name="informasi_tambahan"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="form-label">Alamat</label>
                            <textarea type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"></textarea>
                        </div>
                    </div>

                </div>

                <br>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-check">
                            <input type="hidden" name="ac" value="false">

                            <input type="checkbox" class="form-check-input-bg-primary" id="ac" name="ac" value="true">
                            <label class="form-check-label" for="ac">AC</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-check">
                            <input type="hidden" name="wifi" value="false">

                            <input type="checkbox" class="form-check-inputbg-primary" id="wifi" name="wifi" value="true">
                            <label class="form-check-label" for="wifi">WiFi</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-check">
                            <input type="hidden" name="tv" value="false">

                            <input type="checkbox" class="form-check-inputbg-primary" id="tv" name="tv" value="true">
                            <label class="form-check-label" for="tv">TV</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-check">
                            <input type="hidden" name="gym" value="false">
                            <input type="checkbox" class="form-check-inputbg-primary" id="gym" name="gym" value="true">
                            <label class="form-check-label" for="gym">Gym</label>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-check">
                            <input type="hidden" name="kulkas" value="false">
                            <input type="checkbox" class="form-check-inputbg-primary" id="kulkas" name="kulkas" value="true">
                            <label class="form-check-label" for="kulkas">Kulkas</label>
                        </div>
                    </div>

                </div>


                <button type="submit" class="btn btn-primary float-end mt-3">Tambah</button>

            </form>
        </div>
    </div>

</div>

@endsection