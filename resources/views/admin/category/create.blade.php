@extends('templateBackend.home')

@section('subJudul', 'Tambah Kategori')
@section('content')
	@if(count($errors)>0)
		@foreach($errors->all() as $error)
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong>{{ $error }}</strong>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
		@endforeach
	@endif

	<form action="{{ route('category.store') }}" method="post">
		@csrf
		<div class="form-group">
	        <label><strong>Kategori</strong></label>
	        <input type="text" class="form-control" name="name">
	    </div>
	    <div class="row">
	    <div class="col-lg-1">
	    <div class="form-group">
	        <a href="{{ route('category.index') }}" class="btn btn-sm btn-danger btn-block">Kembali</a>
	    </div>
	</div>
	<div class="col-lg-11">
	    <div class="form-group">
	        <button class="btn btn-sm btn-primary btn-block">Simpan Kategori</button>
	    </div>
	    </div>
	    </div>
    </form>
@endsection
