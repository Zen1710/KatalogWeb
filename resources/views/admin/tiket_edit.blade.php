@extends('theme.admin.master')
@section('content')

<div class="card">
    <div class="card-header bg-primary">
        <h6 class="mb-0 text-white">Tiket
        </h6>
    </div>
    <div class="card-body">

        <form action="{{url('admin/tiket/'.$data->id)}}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group mt-3">
                <label for="">Pilih Nama Agen</label>
                <select name="agent_id" id="" required class="form-control">
                    <option value="">Pilih Agen</option>
                    @foreach ($agen as $item)
                    <option value="{{$item->id}}">{{$item->nama_agent}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mt-3">
                <label for="">Pilih Tanggal Jadwal</label>
                <input type="date" name="jadwal" value="{{$data->jadwal}}" class="form-control" required>
            </div>

            <button class="btn btn-primary mt-3">Atur Jadwal</button>
         
        </form>

    </div>


</div>

@endsection