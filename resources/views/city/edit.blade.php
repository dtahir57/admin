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
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
  </ol>
</nav>
<div class="card">
  <div class="card-header">Edit City</div>
  <div class="card-body">
    <form action="{{ route('city.update', $city->id) }}" method="POST">
    	{{ csrf_field() }}
      <input type="hidden" name="_method" value="PATCH">
    	<div class="form-group">
    		<label for="cityName">City Name</label>
    		<input type="text" name="city" required class="form-control" placeholder="City Name" value="{{ $city->city }}" />
    	</div>
    	<button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
</div>
@endsection