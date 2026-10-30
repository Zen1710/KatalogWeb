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
                        <th>Terjual</th>
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
                        <td>{{$item->terjual == 1 ? 'Ya' : 'Tidak'}}</td>
                        <td>
                            <a href="{{url('admin/property/'.$item->id.'/edit')}}" class="btn btn-sm mb-1 btn-primary">Edit</a>
                            <a href="{{url('admin/property/'.$item->id.'/delete')}}" class="btn btn-sm mb-1 btn-danger">Delete</a>
                            <a href="{{url('admin/foto_denah/'.$item->id)}}" class="btn btn-sm mb-1 btn-success">Foto Denah</a>
                            <a href="{{url('admin/foto_properti/'.$item->id)}}" class="btn btn-sm mb-1 btn-success">Foto properti</a>
                            <button class="btn btn-sm btn-primary" onClick="editStatus({{$item->id}})" >Status Terjual</button>
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

<!-- create modal form edit status -->
<div class="modal fade" id="editStatus" tabindex="-1" aria-labelledby="editStatusLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editStatusLabel">Edit Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('admin/property/status')}}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id">
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="terjual" id="status" class="form-select">
                            <option value="0">Belum Terjual</option>
                            <option value="1">Terjual</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@push('js')

<script>
    function editStatus(id) {
        $('#editStatus').find('input[name="id"]').val(id);
        $('#editStatus').modal('show');
    }
</script>



@endpush