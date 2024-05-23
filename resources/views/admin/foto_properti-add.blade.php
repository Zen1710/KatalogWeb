@extends('theme.admin.master')
@section('content')

<div class="card">
    <div class="card-header bg-primary">
        <h6 class="mb-0 text-white">Tambah Foto Properti
            <a href="{{url('admin/foto_properti/'.$properti)}}" class="btn btn-sm float-end btn-light">Kembali</a>
        </h6>
    </div>
 
<div class="card">
    <div class="card-body">
        <form action="{{url('admin/foto_propertis')}}" method="post" enctype="multipart/form-data">
            @csrf
          
          
            <div class="form-group">
                <label for="" class="form-label">Foto Properti</label>
                <input type="file" class="form-control @error('foto_properti') is-invalid @enderror" name="foto" accept="image/*">
            </div>
            <input type="hidden" class="form-control" name="properti" value="{{$properti}}">

            <button type="submit" class="btn btn-primary float-end mt-3">Tambah</button>

        </form>
    </div>
</div>

</div>

@endsection