@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-body">
    <h5 class="card-title">News</h5>
    <a href="{{ route('news.index') }}" class="btn btn-primary float-right">View All</a>
  </div>
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('news.index') }}">News</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
  </ol>
</nav>
@foreach($errors->all() as $error)
  <li class="alert alert-danger">{{ $error }}</li>
@endforeach
<div class="card">
  <div class="card-header">Create News</div>
  <div class="card-body">
    <form action="{{ route('news.store') }}" method="POST">
    	{{ csrf_field() }}
    	<div class="form-group">
    		<label for="title">Title</label>
    		<input type="text" name="title" required class="form-control" placeholder="News Title" value="{{ old('title') }}" />
    	</div>
      <div class="form-group">
        <label for="type">News Type</label>
        <select class="form-control" required name="type">
          <option selected disabled>Please Select an Option</option>
          <option value="local">Local</option>
          <option value="international">International</option>
          <option value="developer">Developer</option>
        </select>
      </div>
      <div class="form-group">
        <label for="body">News Body</label>
        <textarea class="form-control" name="body" cols="8" rows="10">{{ old('body') }}</textarea>
      </div>
    	<button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
</div>
@endsection