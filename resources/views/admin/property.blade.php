@extends('theme.admin.master')
@section('content')

<div class="card">
    <div class="card-header bg-primary">
        <h6 class="mb-0 text-white">Property
            <a href="{{url('admin/property/create')}}" class="btn btn-sm float-end btn-light">Add</a>
        </h6>
    </div>
    <div class="card-body">

        <div class="table-responsive mt-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Property</th>
                        <th>Type Property</th>
                        <th>Alamat</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->nama_properti}}</td>
                        <td>{{$item->type_properti}}</td>
                        <td>{{$item->alamat}}</td>
                        <td>{{$item->harga}}</td>
                        <td>{{$item->status}}</td>
                        <td>
                            <a href="{{url('admin/property/'.$item->id.'/edit')}}" class="btn btn-sm btn-primary">Edit</a>
                            <a href="{{url('admin/property/'.$item->id.'/delete')}}" class="btn btn-sm btn-danger">Delete</a>
                            <a href="{{url('admin/foto_denah/'.$item->id)}}" class="btn btn-sm btn-success">Foto Denah</a>
                            <a href="{{url('admin/foto_properti/'.$item->id)}}" class="btn btn-sm btn-success">Foto properti</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
        
    </div>
</div>

@endsection