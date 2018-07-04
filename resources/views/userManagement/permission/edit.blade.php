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
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
  </ol>
</nav>
<div class="card">
  <div class="card-header">Update Permission</div>
  <div class="card-body">
    <form action="{{ route('permission.update', $permission->id) }}" method="POST">
      <input type="hidden" name="_method" value="PATCH">
    	{{ csrf_field() }}
    	<div class="form-group">
    		<label for="module">Module</label>
    		<input type="text" name="module" required class="form-control" placeholder="Module" value="{{ $permission->module }}" />
    	</div>
      <div class="form-group">
        <label for="PermissionName">Permission Name</label>
        <input type="text" name="name" required class="form-control" placeholder="Permission Name" value="{{ $permission->name }}" />
      </div>
    	<button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
</div>
@endsection