@extends('theme.admin.master')
@section('content')

<div class="card">
    <div class="card-header bg-primary">
        <h6 class="mb-0 text-white">Edit Mitra
            <a href="{{url('admin/mitra')}}" class="btn btn-sm float-end btn-light">Kembali</a>
        </h6>
    </div>
 
<div class="card">
    <div class="card-body">
        <form action="{{url('admin/mitra/'.$mitra->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="" class="form-label">Nama Mitra</label>
                <input type="text" class="form-control @error('nama_mitra') is-invalid @enderror" value="{{$mitra->nama_mitra}}" name="nama_mitra">
            </div>
   
            <div class="form-group">
                <label for="" class="form-label">Foto</label>
                <input type="file" class="form-control" value="{{asset('mitra/'.$mitra->foto)}}" name="foto" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary float-end mt-3">Ubah</button>

        </form>
    </div>
</div>

</div>

@endsection