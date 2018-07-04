@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Calender</h5>
  </div>
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Calender</li>
  </ol>
</nav>
<section>
	<div class="card">
		<div class="card-body">
			{!! $calender_details->calendar() !!}
			{!! $calender_details->script() !!}
		</div>
	</div>
</section>
@endsection