@extends('theme.admin.master')
@section('content')

<div class="card">
    <div class="card-header bg-primary">
        <h6 class="mb-0 text-white">Edit Property
            <a href="{{url('admin/property')}}" class="btn btn-sm float-end btn-light">Kembali</a>
        </h6>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{url('admin/property/'.$property->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')

                <div class="form-group">
                    <label for="" class="form-label">Nama Properti</label>
                    <input type="text" class="form-control @error('nama_properti') is-invalid @enderror" name="nama_properti" value="{{$property->nama_properti}}">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Type Properti</label>
                    <div class="form-group">
                    <label for="" class="form-label @error('type_properti') is-invalid @enderror">Type Properti</label>
                    <select name="type_properti" id="" class="form-control">
                        <option value="Rumah" {{ old('type_properti', $property->type_properti) == 'Rumah' ? 'selected' : '' }}>Rumah</option>
                        <option value="Apartement" {{ old('type_properti', $property->type_properti) == 'Apartement' ? 'selected' : '' }} >Apartement</option>
                        <option value="Villa" {{ old('type_properti', $property->type_properti) == 'Villa' ? 'selected' : '' }} >Villa</option>
                        <option value="Hotel" {{ old('type_properti', $property->type_properti) == 'Hotel' ? 'selected' : '' }}>Hotel</option>
                    </select>
                </div>
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Nomor Rumah</label>
                    <input type="text" class="form-control @error('nomor_rumah') is-invalid @enderror" name="nomor_rumah" value="{{$property->nomor_rumah}}">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Deskripsi</label>
                    <textarea type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi">{{$property->deskripsi}}</textarea>
                </div>

                <div class="form-group">
                    <label for="" class="form-label">Tahun Pembuatan</label>
                    <input type="date" class="form-control @error('tahun_pembuatan') is-invalid @enderror" name="tahun_pembuatan" value="{{$property->tahun_pembuatan}}">
                </div>
                <div class="form-group">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                        <option disabled {{ old('status', $property->status) == '' ? 'selected' : '' }}>Pilih Status</option>
                        <option value="Dijual" {{ old('status', $property->status) == 'Dijual' ? 'selected' : '' }}>Dijual</option>
                        <option value="Disewakan" {{ old('status', $property->status) == 'Disewakan' ? 'selected' : '' }}>Disewakan</option>
                    </select>
                    @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <br>

                <div class="row">

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="" class="form-label">Garasi</label>
                            <input type="number" class="form-control @error('garasi') is-invalid @enderror" name="garasi" value="{{$property->garasi}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="" class="form-label">Luas</label>
                            <input type="number" class="form-control @error('luas') is-invalid @enderror" name="luas" value="{{$property->luas}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="" class="form-label">Jumlah Kamar Tidur</label>
                            <input type="number" class="form-control @error('jumlah_kamar_mandi') is-invalid @enderror" name="jumlah_kamar_mandi" value="{{$property->jumlah_kamar_mandi}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="" class="form-label">Jumlah Kamar Tidur</label>
                            <input type="number" class="form-control @error('jumlah_kamar_tidur') is-invalid @enderror" name="jumlah_kamar_tidur" value="{{$property->jumlah_kamar_tidur}}">
                        </div>
                    </div>
                </div>
                <br>

                <div class="row">
                   
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="form-label">Harga</label>
                            <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{$property->harga}}">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Latitude</label>
                            <input type="text" class="form-control @error('latitude') is-invalid @enderror" name="latitude" value="{{$property->latitude}}">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Longitude</label>
                            <input type="text" class="form-control @error('longitude') is-invalid @enderror" name="longitude" value="{{$property->longitude}}">
                        </div>
                    </div>


                </div>
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="form-label">Informasi Tambahan</label>
                            <textarea type="text" class="form-control @error('informasi_tambahan') is-invalid @enderror" name="informasi_tambahan">{{$property->informasi_tambahan}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="form-label">Alamat</label>
                            <textarea type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat">{{$property->alamat}}</textarea>
                        </div>
                    </div>

                </div>

                <br>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-check">
                            <input type="hidden" name="ac" value="false">

                            <input type="checkbox" class="form-check-input-bg-primary" id="ac" name="ac" value="true" {{ $property->ac == 'true' ? 'checked' : '' }}>
                            <label class="form-check-label" for="ac">AC</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-check">
                            <input type="hidden" name="wifi" value="false">

                            <input type="checkbox" class="form-check-inputbg-primary" id="wifi" name="wifi" value="true" {{ $property->wifi == 'true' ? 'checked' : '' }}>
                            <label class="form-check-label" for="wifi">WiFi</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-check">
                            <input type="hidden" name="tv" value="false">

                            <input type="checkbox" class="form-check-inputbg-primary" id="tv" name="tv" value="true" {{ $property->tv == 'true' ? 'checked' : '' }}>
                            <label class="form-check-label" for="tv">TV</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-check">
                            <input type="hidden" name="gym" value="false">
                            <input type="checkbox" class="form-check-inputbg-primary" id="gym" name="gym" value="true" {{ $property->gym == 'true' ? 'checked' : '' }}>
                            <label class="form-check-label" for="gym">Gym</label>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-check">
                            <input type="hidden" name="kulkas" value="false">
                            <input type="checkbox" class="form-check-inputbg-primary" id="kulkas" name="kulkas" value="true" {{ $property->kulkas == 'true' ? 'checked' : '' }}>
                            <label class="form-check-label" for="kulkas">Kulkas</label>
                        </div>
                    </div>

                </div>


                <button type="submit" class="btn btn-primary float-end mt-3">Ubah</button>

            </form>
        </div>
    </div>

</div>

@endsection