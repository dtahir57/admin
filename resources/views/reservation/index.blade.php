@extends('layouts.app')
<style type="text/css">
	.event_places {
		width: 100%;
		min-height: 250px;
		padding: 20px;
		vertical-align: middle;
		text-align: center;
		background: #fff;
	}
	.event_places:hover {
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}
</style>
@section('content')
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Reservations</h5>
  </div>
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Reservations</li>
  </ol>
</nav>
<section>
	<div class="container-fluid">
		<div class="row">
			@foreach($event_places as $event_place)
			<div class="col-md-4">
				<div class="event_places">
					<h5>{{ $event_place->name }}</h5>
					<form action="{{ route('reservation.update') }}" method="POST">
						@csrf
						<input type="hidden" name="_method" value="PATCH" />
						<input type="hidden" name="id" value="{{$event_place->id}}">
						@if($event_place->reserved == 1)
						<h1 class="text text-success">Reserved</h1>
						@else
						<button type="submit" class="btn btn-success">Reserve</button>
						@endif
						@if($event_place->reserved == 1 AND $event_place->user_id == Auth::user()->id)
						<button type="submit" class="btn btn-default">Remove Reservance</button>
						@endif
					</form>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
@endsection