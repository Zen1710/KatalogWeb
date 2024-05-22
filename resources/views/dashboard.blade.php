@extends('theme.admin.master')
@section('content')

<div class="card mb-3 bg-primary">
    <div class="card-body">
        <h6 class="text-white mb-0">Dashboard</h6>
    </div>
</div>

<div class="row">

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                        <i class="bx bxl-magento" style="font-size:34px;"></i>
                    </div>
                    
                </div>
                <small class="text-success fw-medium">Agen</small>
                <h3 class="card-title mb-2">72</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                        <i class="bx bxl-trip-advisor" style="font-size:34px;"></i>
                    </div>
                    
                </div>
                <small class="text-success fw-medium">Mitra</small>
                <h3 class="card-title mb-2">72</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                        <i class="bx bx-arch" style="font-size:34px;"></i>
                    </div>
                    
                </div>
                <small class="text-success fw-medium">Property</small>
                <h3 class="card-title mb-2">72</h3>
            </div>
        </div>
    </div>

</div>


@endsection