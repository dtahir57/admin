@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Project Units</h5>
    <a href="{{ route('project_unit.index') }}" class="btn btn-primary float-right">View All</a>
  </div>
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('project_unit.index') }}">Project Units</a></li>
    <li class="breadcrumb-item active" aria-current="page">Show</li>
  </ol>
</nav>
<section>
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">{{ $project_unit->name }}</h4>
		</div>
		<div class="card-body">
			<h5>Rate Card: {{ $project_unit->rate_card }}</h5>
			<h5>Cost: {{ $project_unit->cost }}</h5>
			<h5>Down Payment: {{ $project_unit->down_payment }}</h5>
			<h5>Installment: {{ $project_unit->installment }}</h5>
			<h5>Year Of Installment: {{ $project_unit->year_of_installment }}</h5>
			<h5>Area: {{ $project_unit->area }}</h5>
			<h5>City: {{ $project_unit->city }}</h5>
			<h5>Type: {{ $project_unit->type }}</h5>
			<h5>Monthly Installment: {{ $project_unit->installment_monthly }}</h5>
			<h5>Installment Quarter: {{ $project_unit->installment_quarter }}</h5>
			<h5>Flexible Plan: 
			@if($project_unit->flexible_plan)
			<span class="badge badge-success">YES</span>
			@else 
			<span class="badge badge-danger">NO</span>
			@endif
			</h5>
			<h5>Offer Discount: {{ $project_unit->offer_discount }}</h5>
		</div>
	</div>
</section>
@endsection