@extends('theme.admin.master')
@section('content')

<div class="card">
    <div class="card-header bg-primary">
        <h6 class="mb-0 text-white">Tambah Agen
            <a href="{{url('admin/agen')}}" class="btn btn-sm float-end btn-light">Kembali</a>
        </h6>
    </div>
 
<div class="card">
    <div class="card-body">
        <form action="{{url('admin/agen')}}" method="post" enctype="multipart/form-data">
            @csrf
          
            <div class="form-group">
                <label for="" class="form-label">Nama Agen</label>
                <input type="text" class="form-control @error('nama_agent') is-invalid @enderror" name="nama_agent">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email">
            </div>
            <div class="form-group">
                <label for="" class="form-label">No  HP</label>
                <input type="text" class="form-control @error('nohp') is-invalid @enderror" name="nohp">
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