@extends('theme.admin.master')
@section('content')

<div class="card">
    <div class="card-header bg-primary">
        <h6 class="text-white">About</h6>
    </div>
    <div class="card-body">

        <form action="{{url('admin/about')}}" method="post" enctype="multipart/form-data"   >
            @csrf
            <div class="form-group mt-4 mb-2">
                <label for="">Gambar</label>
                <input type="file" class="form-control" accept="image/*">
            </div>
            <div class="form-group">
                <label for="">Deskripsi</label>
                <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>

            <button class="btn btn-primary mt-4">Simpan</button>
        </form>
        
    </div>
</div>

@endsection