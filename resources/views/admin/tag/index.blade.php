@extends('templateBackend.home')

@section('subJudul', 'Tag')
@section('content')

	@if(Session::has('success'))
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			 <strong>{{  Session('success') }}</strong>
			 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			   <span aria-hidden="true">&times;</span>
			 </button>
		</div>
	@endif

	<a href="{{ route('tag.create') }}" class="btn btn-sm btn-info mb-2">Tambah Tag</a>

		<table class="table table-striped table-hover table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Tag</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($tag as $result => $hasil)
				<tr>
					<td>{{ $result + $tag->firstitem() }}.</td>
					<td>{{ $hasil->name }}</td>
					<td>
						<form action="{{ route('tag.destroy', $hasil->id) }}" method="post">
							@csrf
							@method('delete')
							<a href="{{ route('tag.edit', $hasil->id) }}" class="btn btn-sm btn-primary">Edit</a>
							<button type="submit" href="" class="btn btn-sm btn-danger">Delete</button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{{ $tag->links() }}
@endsection
