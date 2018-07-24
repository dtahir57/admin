@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Event Places</h5>
    <a href="{{ route('event_place.index') }}" class="btn btn-primary float-right">View All</a>
  </div>
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('event_place.index') }}">Event Places</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
  </ol>
</nav>
<div class="card">
  <div class="card-header">New Event Place</div>
  <div class="card-body">
    <form action="{{ route('event_place.store') }}" method="POST">
    	{{ csrf_field() }}
    	<div class="form-group">
    		<label for="name">Event Place Name</label>
    		<input type="text" name="name" required class="form-control" placeholder="Event Name" value="{{ old('name') }}" />
    	</div>
      <div class="form-group">
        <label for="EventID">Events</label>
        <select class="form-control" name="event_id" required>
          <option selected disabled>Please Select an Option</option>
          @foreach($events as $event)
          <option value="{{ $event->id }}">{{ $event->name }}</option>
          @endforeach
        </select>
      </div>
    	<button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
</div>
@endsection