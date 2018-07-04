@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Permissions</h5>
    <a href="{{ route('permission.create') }}" class="btn btn-primary float-right">Permission</a>
  </div>
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Permissions</li>
  </ol>
</nav>
<section>
	@if(session('created'))
	<li class="alert alert-success">{{ session('created') }}</li>
	@endif
	@if(session('updated'))
	<li class="alert alert-success">{{ session('updated') }}</li>
	@endif
	@if(session('deleted'))
	<li class="alert alert-success">{{ session('deleted') }}</li>
	@endif
	<table class="table">
		<thead>
			<tr>
				<th>#</th>
				<th>Module</th>
				<th>Permission</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($permissions as $permission)
			<tr>
				<td>{{ $loop->index + 1 }}</td>
				<td>{{ $permission->module }}</td>
				<td>{{ $permission->name }}</td>
				<td>
					<a href="{{ route('permission.edit', $permission->id) }}" class="btn btn-success btn-sm">Edit</a>
					<button type="button" data-toggle="modal" data-target="#deleteRecord" data-url="{{ route('permission.destroy', $permission->id) }}" data-id="{{ $permission->id }}" class="btn btn-danger remove-record btn-sm">Delete</button>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</section>
<form method="POST" class="remove-record-model">
	{{ csrf_field() }}
    <div id="deleteRecord" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deleteRecordLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                	<h4>Delete Permission</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <h6>Are You Sure, You want to delete this Permission?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light">Delete</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('script')
<script src="{{ asset('custom.js') }}"></script>
@endsection