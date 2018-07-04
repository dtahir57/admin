@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Projects</h5>
    <a href="{{ route('project.index') }}" class="btn btn-primary float-right">View All</a>
  </div>
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('project.index') }}">Projects</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
  </ol>
</nav>
<div class="card">
  <div class="card-header">Edit Project</div>
  <div class="card-body">
    <form action="{{ route('project.update', $project->id) }}" method="POST">
    	{{ csrf_field() }}
      <input type="hidden" name="_method" value="PATCH">
    	<div class="form-group">
    		<label for="CompanyName">Company Name</label>
    		<select class="form-control" name="company_name" required>
          <option selected disabled>Please Select an Option</option>
          @foreach($companies as $company)
          <option value="{{ $company->id }}" @if($company->id == $project->company_id) selected @endif>{{ $company->name }}</option>
          @endforeach
        </select>
    	</div>
      <div class="form-group">
        <label for="Name">Name</label>
        <input type="text" name="name" required class="form-control" value="{{ $project->name }}" placeholder="Project Name" />
      </div>
      <div class="form-group">
        <label for="Latitude">Latitude</label>
        <input type="text" name="lat" required class="form-control" value="{{ $project->lat }}" placeholder="latitude" />
      </div>
      <div class="form-group">
        <label for="Longitude">Longitude</label>
        <input type="text" name="lng" required class="form-control" value="{{ $project->lng }}" placeholder="Longitude" />
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" rows="8" name="description" required placeholder="Project Description">{{ $project->description }}</textarea>
      </div>
    	<button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
</div>
@endsection