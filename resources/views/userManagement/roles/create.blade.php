@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Roles</h5>
    <a href="{{ route('role.index') }}" class="btn btn-primary float-right">View All</a>
  </div>
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('role.index') }}">Roles</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
  </ol>
</nav>
<div class="card">
  <div class="card-header">New Role</div>
  <div class="card-body">
    <form action="{{ route('role.store') }}" method="POST">
    	{{ csrf_field() }}
    	<div class="form-group">
    		<label for="RoleName">Role Name</label>
    		<input type="text" name="name" required class="form-control" placeholder="Role Name" value="{{ old('name') }}" />
    	</div>
    	<button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
</div>
@endsection