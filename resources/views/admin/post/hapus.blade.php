@extends('templateBackend.home')

@section('subJudul', 'Post Yang Terhapus')
@section('content')

	@if(Session::has('success'))
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			 <strong>{{  Session('success') }}</strong>
			 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			   <span aria-hidden="true">&times;</span>
			 </button>
		</div>
	@endif
<div class="table-responsive">
		<table class="table table-striped table-hover table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Post</th>
					<th>Kategory</th>
					<th>Tags</th>
					<th>Thumbnail</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($post as $result => $hasil)
				<tr>
					<td>{{ $result + $post->firstitem() }}.</td>
					<td>{{ $hasil->judul }}</td>
					<td>{{ $hasil->category->name }}</td>
					<td>
						@foreach($hasil->tags as $tag)
							<span class="badge badge-primary">{{ $tag->name }}</span>
						@endforeach
					</td>
					<td><img src="{{ asset($hasil->gambar) }}" class="img-fluid" width="100"></td>
					<td>
						<form action="{{ route('post.kill', $hasil->id) }}" method="post">
							@csrf
							@method('delete')
							<a href="{{ route('post.restore', $hasil->id) }}" class="btn btn-sm btn-info">Restore</a>
							<button type="submit" href="" class="btn btn-sm btn-danger">Delete</button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
		{{ $post->links() }}
@endsection
