@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Permissions</h5>
    <a href="{{ route('permission.index') }}" class="btn btn-primary float-right">View All</a>
  </div>
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('permission.index') }}">Permissions</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
  </ol>
</nav>
<div class="card">
  <div class="card-header">New Permission</div>
  <div class="card-body">
    <form action="{{ route('permission.store') }}" method="POST">
    	{{ csrf_field() }}
    	<div class="form-group">
    		<label for="module">Module</label>
    		<input type="text" name="module" required class="form-control" placeholder="Module" value="{{ old('module') }}" />
    	</div>
      <div class="form-group">
        <label for="PermissionName">Permission Name</label>
        <input type="text" name="name" required class="form-control" placeholder="Permission Name" value="{{ old('name') }}" />
      </div>
    	<button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
</div>
@endsection