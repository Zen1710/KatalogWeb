@extends('theme.admin.master')
@section('content')

<!-- Modal -->
<div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserLabel">Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- form create user -->
                <form action="{{url('admin/user')}}" method="post">
                    @csrf
                    <!-- input name email pass-->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_hp">No Hp</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
           
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserLabel">Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- form create user -->
                <form action="" method="post">
                    @csrf
                    <!-- input name email pass-->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="no_hp">No Hp</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="*********">
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
           
        </div>
    </div>
</div>


<div class="card">
    <div class="card-header bg-primary">
        <h6 class="mb-0 text-white">User
            <button type="button" data-bs-toggle="modal" data-bs-target="#addUser" class="btn btn-sm btn-primary float-end">Tambah User</button>
        </h6>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no=1)
                    @forelse ($data as $item)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>
                            <button type="button" onClick="editUser({{$item}})" class="btn btn-sm btn-primary text-white">Edit</button>
                            <a href="{{url('admin/user/'.$item->id.'/delete')}}"
                                class="btn btn-sm btn-danger">Delete</a>
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
@push('js')
<script>
let editUser = (item) => {
    $('#editUser form').attr('action', `{{url('')}}/admin/user/${item.id}`);
    $('#editUser input[name="name"]').val(item.name);
    $('#editUser input[name="email"]').val(item.email);
    $('#editUser input[name="no_hp"]').val(item.no_hp);
    $('#editUser').modal('show');
}
</script>
@endpush