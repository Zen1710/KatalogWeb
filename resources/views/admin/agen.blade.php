@extends('theme.admin.master')
@section('content')

<div class="card">
    <div class="card-header bg-primary">
        <h6 class="mb-0 text-white">Agen
            <a href="{{url('admin/agen/create')}}" class="btn btn-sm float-end btn-light">Add</a>
        </h6>
    </div>
    <div class="card-body">

        <div class="table-responsive mt-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Agent</th>
                        <th>Email</th>
                        <th>No Hp</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->nama_agent}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->nohp}}</td>
                        <td>
                            <img src="{{asset('images/agen/'.$item->foto)}}" width="50" alt="">
                        </td>
                        <td>
                            <a href="{{url('admin/agen/'.$item->id.'/edit')}}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{url('admin/agen/'.$item->id)}}" method="post" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
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