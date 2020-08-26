@extends('templateBackend.home')

@section('subJudul', 'User')
@section('content')

	@if(Session::has('success'))
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			 <strong>{{  Session('success') }}</strong>
			 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			   <span aria-hidden="true">&times;</span>
			 </button>
		</div>
	@endif

	<a href="{{ route('user.create') }}" class="btn btn-sm btn-info mb-2">Tambah User</a>

		<table class="table table-striped table-hover table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama User</th>
					<th>Email</th>
					<th>Type</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($user as $result => $hasil)
				<tr>
					<td>{{ $result + $user->firstitem() }}.</td>
					<td>{{ $hasil->name }}</td>
					<td>{{ $hasil->email }}</td>
					<td>
						@if($hasil->tipe)
							<h6><span class="badge badge-info">Administrator</span></h6>
						@else
							<h6><span class="badge badge-warning">Author</span></h6>
						@endif
					</td>
					<td>
						<form action="{{ route('user.destroy', $hasil->id) }}" method="post">
							@csrf
							@method('delete')
							<a href="{{ route('user.edit', $hasil->id) }}" class="btn btn-sm btn-primary">Edit</a>
							<button type="submit" href="" class="btn btn-sm btn-danger">Delete</button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	{{ $user->links() }}
@endsection
