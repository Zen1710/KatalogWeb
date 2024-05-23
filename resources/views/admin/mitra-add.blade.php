@extends('theme.admin.master')
@section('content')

<div class="card">
    <div class="card-header bg-primary">
        <h6 class="mb-0 text-white">Tambah Mitra
            <a href="{{url('admin/mitra')}}" class="btn btn-sm float-end btn-light">Kembali</a>
        </h6>
    </div>
 
<div class="card">
    <div class="card-body">
        <form action="{{url('admin/mitra')}}" method="post" enctype="multipart/form-data">
            @csrf
          
            <div class="form-group">
                <label for="" class="form-label">Nama Mitra</label>
                <input type="text" class="form-control @error('nama_mitra') is-invalid @enderror" name="nama_mitra">
            </div>
   
            <div class="form-group">
                <label for="" class="form-label">Foto</label>
                <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary float-end mt-3">Tambah</button>

        </form>
    </div>
</div>

</div>

@endsection