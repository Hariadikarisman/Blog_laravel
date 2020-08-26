@extends('templateBackend.home')

@section('subJudul', 'Tambah User')
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

	<form action="{{ route('user.store') }}" method="post">
		@csrf
		<div class="form-group">
	        <label><strong>Nama User</strong></label>
	        <input type="text" class="form-control" name="name">
	    </div>
	    <div class="form-group">
	        <label><strong>Email</strong></label>
	        <input type="email" class="form-control" name="email">
	    </div>
	    <div class="form-group">
	        <label><strong>Tipe User</strong></label>
	        <select class="form-control" name="tipe">
	        	<option value="" holder>Pilih Tipe User</option>
	        	<option value="1" holder>Administrator</option>
	        	<option value="0" holder>Author</option>
	        </select>
	    </div>
	    <div class="form-group">
	        <label><strong>Password</strong></label>
	        <input type="text" class="form-control" name="password">
	    </div>
	    <div class="form-group">
	        <button class="btn btn-sm btn-primary btn-block">Tambah User</button>
	    </div>
    </form>
@endsection
