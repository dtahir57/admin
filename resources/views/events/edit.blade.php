@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Events</h5>
    <a href="{{ route('event.index') }}" class="btn btn-primary float-right">View All</a>
  </div>
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('event.index') }}">Events</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
  </ol>
</nav>
<div class="card">
  <div class="card-header">Edit Event</div>
  <div class="card-body">
    <form action="{{ route('event.update', $event->id) }}" method="POST">
    	{{ csrf_field() }}
      <input type="hidden" name="_method" value="PATCH">
    	<div class="form-group">
    		<label for="name">Name</label>
    		<input type="text" name="name" required class="form-control" placeholder="Event Name" value="{{ $event->name }}" />
    	</div>
      <div class="form-group">
        <label for="DateFrom">Date From</label>
        <input type="date" name="date_f" required class="form-control" placeholder="Date From" value="{{ $event->date_f }}" />
      </div>
      <div class="form-group">
        <label for="DateTo">Date To</label>
        <input type="date" name="date_t" required class="form-control" placeholder="Date To" value="{{ $event->date_t }}" />
      </div>
    	<button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
</div>
@endsection