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
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
  </ol>
</nav>
<div class="card">
  <div class="card-header">Edit News</div>
  <div class="card-body">
    <form action="{{ route('news.update', $news->id) }}" method="POST">
    	{{ csrf_field() }}
      <input type="hidden" name="_method" value="PATCH">
    	<div class="form-group">
    		<label for="title">Title</label>
    		<input type="text" name="title" required class="form-control" placeholder="News Title" value="{{ $news->title }}" />
    	</div>
      <div class="form-group">
        <label for="type">News Type</label>
        <select class="form-control" required name="type">
          <option selected disabled>Please Select an Option</option>
          <option value="local" {{ ($news->type == 'local' ? 'selected' : '') }}>Local</option>
          <option value="international" {{ ($news->type == 'international' ? 'selected' : '') }}>International</option>
          <option value="developer" {{ ($news->type == 'developer' ? 'selected' : '') }}>Developer</option>
        </select>
      </div>
      <div class="form-group">
        <label for="body">News Body</label>
        <textarea class="form-control" name="body" cols="8" rows="10">{{ $news->body }}</textarea>
      </div>
    	<button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
</div>
@endsection