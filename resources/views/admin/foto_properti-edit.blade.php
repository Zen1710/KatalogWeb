@extends('theme.admin.master')
@section('content')

<div class="card">
    <div class="card-header bg-primary">
        <h6 class="mb-0 text-white">Edit Foto Properti
            <a href="{{url('admin/foto_properti/'.$data->properti_id)}}" class="btn btn-sm float-end btn-light">Kembali</a>
        </h6>
    </div>
 
<div class="card">
    <div class="card-body">
        <form action="{{url('admin/foto_propertis/'.$data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
        
            <div class="form-group">
                <label for="" class="form-label">Foto Properti</label>
                <input type="file" class="form-control @error('foto_properti') is-invalid @enderror" name="foto" accept="image/*">
            </div>
           

            <button type="submit" class="btn btn-primary float-end mt-3">Ubah</button>

        </form>
    </div>
</div>

</div>

@endsection