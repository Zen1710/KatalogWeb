@extends('theme.admin.master')
@section('content')

<div class="card">
    <div class="card-header bg-primary">
        <h6 class="mb-0 text-white">Tambah FaQ
            <a href="{{url('admin/faq')}}" class="btn btn-sm float-end btn-light">Kembali</a>
        </h6>
    </div>
 
<div class="card">
    <div class="card-body">
        <form action="{{url('admin/faq')}}" method="post" enctype="multipart/form-data">
            @csrf
          
            <div class="form-group">
                <label for="" class="form-label">Question</label>
                <input type="text" class="form-control @error('question') is-invalid @enderror" name="question">
            </div>
   
            <div class="form-group">
                <label for="" class="form-label">Answer</label>
                <input type="text" class="form-control @error('answer') is-invalid @enderror" name="answer">
            </div>
            <button type="submit" class="btn btn-primary float-end mt-3">Tambah</button>

        </form>
    </div>
</div>

</div>

@endsection