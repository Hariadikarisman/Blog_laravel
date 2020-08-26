@extends('templateBackend.home')

@section('subJudul', 'Tambah Post')
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

	<form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
	        <label><strong>Judul</strong></label>
	        <input type="text" class="form-control" name="judul">
	    </div>
	    <div class="form-group">
	        <label><strong>Kategori</strong></label>
	        <select class="form-control" name="category_id">
	        	<option value="" holder>Pilih Kategori</option>
	        @foreach($category as $result)
	        	<option value="{{ $result->id }}">{{ $result->name }}</option>
	        @endforeach
	        </select>
	    </div>
	    <div class="form-group">
            <label><strong>Pilih Tag</strong></label>
            <select class="form-control select2" multiple="" name="tags[]">
            	@foreach($tags as $tag)
                	<option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>
	    <div class="form-group">
	        <label><strong>Konten</strong></label>
	        <textarea class="form-control" name="content"></textarea>
	    </div>
	    <div class="form-group">
	        <label><strong>Thumbnail</strong></label>
	        <input type="file" name="gambar" class="form-control">
	    </div>

	    <div class="row">
	    <div class="col-lg-1">
	    <div class="form-group">
	        <a href="{{ route('post.index') }}" class="btn btn-sm btn-danger btn-block">Kembali</a>
	    </div>
	</div>
	<div class="col-lg-11">
	    <div class="form-group">
	        <button class="btn btn-sm btn-primary btn-block">Simpan Post</button>
	    </div>
	    </div>
	    </div>
    </form>
@endsection
