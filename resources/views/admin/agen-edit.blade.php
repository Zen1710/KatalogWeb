@extends('theme.admin.master')
@section('content')

<div class="card">
    <div class="card-header bg-primary">
        <h6 class="mb-0 text-white">Edit Agen
            <a href="{{url('admin/agen')}}" class="btn btn-sm float-end btn-light">Kembali</a>
        </h6>
    </div>
 
<div class="card">
    <div class="card-body">
        <form action="{{url('admin/agen/'.$id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

          
            <div class="form-group">
                <label for="" class="form-label">Nama Agen</label>
                <input type="text" class="form-control @error('nama_agent') is-invalid @enderror" value="{{$agen->nama_agent}}" name="nama_agent">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{$agen->email}}" name="email">
            </div>
            <div class="form-group">
                <label for="" class="form-label">No  HP</label>
                <input type="text" class="form-control @error('nohp') is-invalid @enderror" name="nohp" value="{{$agen->nohp}}">
            </div>
   
            <div class="form-group">
                <label for="" class="form-label">Foto</label>
                <input type="file" class="form-control" name="foto" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary float-end mt-3">Ubah</button>

        </form>
    </div>
</div>

</div>

@endsection