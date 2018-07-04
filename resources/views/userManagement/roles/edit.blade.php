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
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
  </ol>
</nav>
<div class="card">
  <div class="card-header">New Role</div>
  <div class="card-body">
    <form action="{{ route('role.update', $role->id) }}" method="POST">
      <input type="hidden" name="_method" value="PATCH">
    	{{ csrf_field() }}
    	<div class="form-group">
    		<label for="RoleName">Role Name</label>
    		<input type="text" name="name" required class="form-control" placeholder="Role Name" value="{{ $role->name }}" />
    	</div>
      <h4>Permissions given to {{ $role->name }}</h4>
      <div class="row">
      @foreach(Spatie\Permission\Models\Permission::all() as $permission)
        <div class="form-group col-md-3">
            <label>
              <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" class="form-control" @if ($role->hasPermissionTo($permission)) checked @endif>
               {{ $permission->name }}
            </label>
          </div>
      @endforeach
      </div>
    	<button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
</div>
@endsection