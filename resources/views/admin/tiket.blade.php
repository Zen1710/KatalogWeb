@extends('theme.admin.master')
@section('content')

<div class="card">
    <div class="card-header bg-primary">
        <h6 class="mb-0 text-white">Tiket
        </h6>
    </div>
    <div class="card-body">

        <div class="nav-align-top mb-4">
            <ul class="nav nav-tabs nav-fill" role="tablist">
                <li class="nav-item" role="presentation">
                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-justified-profile" aria-controls="navs-justified-profile"
                        aria-selected="false" tabindex="-1"><i class="tf-icons bx bx-user me-1"></i><span
                            class="d-none d-sm-block"> New</span></button>
                </li>
                <li class="nav-item" role="presentation">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-justified-messages" aria-controls="navs-justified-messages"
                        aria-selected="false" tabindex="-1"><i class="tf-icons bx bx-message-square me-1"></i><span
                            class="d-none d-sm-block"> Jadwal</span></button>
                </li>
            </ul>
            <div class="tab-content">

                <div class="tab-pane fade active show" id="navs-justified-profile" role="tabpanel">

                    <div class="table-responsive mt-2">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No Hp</th>
                                    <th>Nama Property</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($no=1)
                                @forelse ($data as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->nama}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->no_hp}}</td>
                                    <td>{{$item->property->nama_property}}</td>
                                    <td>
                                        <a href="{{url('admin/tiket/'.$item->id.'/edit')}}"
                                            class="btn btn-sm btn-primary">Tentukan Jadwal</a>
                                        <a href="{{url('admin/tiket/'.$item->id.'/delete')}}"
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
                <div class="tab-pane fade" id="navs-justified-messages" role="tabpanel">

                    <div class="table-responsive mt-2">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No Hp</th>
                                    <th>Nama Property</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($no=1)
                                @forelse ($data as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->nama}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->no_hp}}</td>
                                    <td>{{$item->property->nama_property}}</td>
                                    <td>
                                        <a href="{{url('admin/tiket/'.$item->id.'/edit')}}"
                                            class="btn btn-sm btn-primary">Tentukan Jadwal</a>
                                        <a href="{{url('admin/tiket/'.$item->id.'/delete')}}"
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
        </div>

    </div>


</div>

@endsection