@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Project Types</h5>
    <a href="{{ route('project_type.index') }}" class="btn btn-primary float-right">View All</a>
  </div>
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('project_type.index') }}">Project Types</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
  </ol>
</nav>
<div class="card">
  <div class="card-header">Edit Project Type</div>
  <div class="card-body">
    <form action="{{ route('project_type.update', $project_type->id) }}" method="POST">
    	{{ csrf_field() }}
      <input type="hidden" name="_method" value="PATCH">
    	<div class="form-group">
    		<label for="ProjectType">Project Type</label>
    		<input type="text" name="project_type" required class="form-control" placeholder="Project Type" value="{{ $project_type->project_type }}" />
    	</div>
    	<button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
</div>
@endsection