@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Cities</h5>
    <a href="{{ route('city.index') }}" class="btn btn-primary float-right">View All</a>
  </div>
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('city.index') }}">Cities</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
  </ol>
</nav>
@foreach($errors->all() as $error)
  <li class="alert alert-danger">{{ $error }}</li>
@endforeach
<div class="card">
  <div class="card-header">New City</div>
  <div class="card-body">
    <form action="{{ route('city.store') }}" method="POST">
    	{{ csrf_field() }}
    	<div class="form-group">
    		<label for="cityName">City Name</label>
    		<input type="text" name="city" required class="form-control" placeholder="City Name" value="{{ old('city') }}" />
    	</div>
    	<button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
</div>
@endsection