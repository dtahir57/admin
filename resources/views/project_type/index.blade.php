@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Project Types</h5>
    <a href="{{ route('project_type.create') }}" class="btn btn-primary float-right">Project Type</a>
  </div>
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Project Types</li>
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
				<th>Project Type</th>
				@if(auth::user()->can('Edit_Project_Type') || auth::user()->can('Delete_Project_Type'))
				<th>Action</th>
				@endif
			</tr>
		</thead>
		<tbody>
			@foreach($project_types as $project_type)
			<tr>
				<td>{{ $loop->index + 1 }}</td>
				<td>{{ $project_type->project_type }}</td>
				@if(auth::user()->can('Edit_Project_Type') || auth::user()->can('Delete_Project_Type'))
				<td>
					@if(auth::user()->can('Edit_Project_Type'))
					<a href="{{ route('project_type.edit', $project_type->id) }}" class="btn btn-success btn-sm">Edit</a>
					@endif
					@if(auth::user()->can('Delete_Project_Type'))
					<button type="button" data-toggle="modal" data-target="#deleteRecord" data-url="{{ route('project_type.destroy', $project_type->id) }}" data-id="{{ $project_type->id }}" class="btn btn-danger remove-record btn-sm">Delete</button>
					@endif
				</td>
				@endif
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
                	<h4>Delete Project Type</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <h6>Are You Sure, You want to delete this Project Type?</h6>
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
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('custom.js') }}"></script>
@endsection