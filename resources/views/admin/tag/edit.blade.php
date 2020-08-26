@extends('templateBackend.home')

@section('subJudul', 'Edit Tag')
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

	<form action="{{ route('tag.update', $tags->id) }}" method="post">
		@csrf
		@method('patch')
		<div class="form-group">
	        <label><strong>Tag</strong></label>
	        <input type="text" class="form-control" name="name" value="{{ $tags->name }}">
	    </div>
	    <div class="form-group">
	        <button class="btn btn-sm btn-primary btn-block">Update Tag</button>
	    </div>
    </form>
@endsection
