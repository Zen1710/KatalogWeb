


@extends('theme.admin.master')
@section('content')

<div class="card">
    <div class="card-header bg-primary">
        <h6 class="mb-0 text-white">Edit Foto Denah
            <a href="{{url('admin/foto_denah/'.$data->properti_id)}}" class="btn btn-sm float-end btn-light">Kembali</a>
        </h6>
    </div>
 
<div class="card">
    <div class="card-body">
        <form action="{{url('admin/foto_denahs/'.$data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
          
          
            <div class="form-group">
                <label for="" class="form-label">Foto Denah</label>
                <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary float-end mt-3">Ubah</button>

        </form>
    </div>
</div>

</div>

@endsection