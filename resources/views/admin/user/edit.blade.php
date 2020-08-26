@extends('templateBackend.home')

@section('subJudul', 'Edit User')
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

	<form action="{{ route('user.update', $user->id) }}" method="post">
		@csrf
		@method('put')
		<div class="form-group">
	        <label><strong>Nama User</strong></label>
	        <input type="text" class="form-control" name="name" value="{{ $user->name }}">
	    </div>
	    <div class="form-group">
	        <label><strong>Email</strong></label>
	        <input type="email" class="form-control" name="email" value="{{ $user->email }}" readonly>
	    </div>
	    <div class="form-group">
	        <label><strong>Tipe User</strong></label>
	        <select class="form-control" name="tipe">
	        	<option value="" holder>Pilih Tipe User</option>
	        	<option value="1" holder
	        	@if($user->tipe ==1)
	        		selected
	        	@endif
	        	>Administrator</option>
	        	<option value="0" holder
	        	@if($user->tipe ==0)
	        		selected
	        	@endif
	        	>Author</option>
	        </select>
	    </div>
	    <div class="form-group">
	        <label><strong>Password</strong></label>
	        <input type="text" class="form-control" name="password">
	    </div>
	    <div class="form-group">
	        <button class="btn btn-sm btn-primary btn-block">Update User</button>
	    </div>
    </form>
@endsection
