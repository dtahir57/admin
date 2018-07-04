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
    <li class="breadcrumb-item active" aria-current="page">Create</li>
  </ol>
</nav>
<div class="card">
  <div class="card-header">New Project</div>
  <div class="card-body">
    <form action="{{ route('project_unit.store') }}" method="POST">
    	{{ csrf_field() }}
    	<div class="form-group">
    		<label for="ProjectName">Project Name</label>
    		<select class="form-control" name="project_name" required>
          <option selected disabled>Please Select an Option</option>
          @foreach($projects as $project)
          <option value="{{ $project->id }}">{{ $project->name }}</option>
          @endforeach
        </select>
        <div class="form-group">
          <label for="cityName">City</label>
          <select class="form-control" name="city" required>
            <option selected disabled>Please Select an Option</option>
            @foreach($cities as $city)
            <option value="{{ $city->id }}|{{ $city->city }}">{{ $city->city }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="projectType">Project Type</label>
          <select class="form-control" name="type" required>
            <option selected disabled>Please Select an Option</option>
            @foreach($project_types as $project_type)
            <option value="{{ $project_type->id }}|{{ $project_type->project_type }}">{{ $project_type->project_type }}</option>
            @endforeach
          </select>
        </div>
    	</div>
      <div class="form-group">
        <label for="Name">Name</label>
        <input type="text" name="name" required class="form-control" value="{{ old('name') }}" placeholder="Project Unit Name" />
      </div>
      <div class="form-group">
        <label for="RateCard">Rate Card</label>
        <input type="text" name="rate_card" required class="form-control" value="{{ old('rate_card') }}" placeholder="Rate Card" />
      </div>
      <div class="form-group">
        <label for="Cost">Cost</label>
        <input type="text" name="cost" required class="form-control" value="{{ old('cost') }}" placeholder="Cost" />
      </div>
      <div class="form-group">
        <label for="Downpayment">Down Payment</label>
        <input type="text" name="down_payment" required class="form-control" value="{{ old('down_payment') }}" placeholder="Down Payment" />
      </div>
      <div class="form-group">
        <label for="installment">Installment</label>
        <input type="text" name="installment" required class="form-control" value="{{ old('installment') }}" placeholder="Installment" />
      </div>
      <div class="form-group">
        <label for="YearOfInstallment">Year Of Installment</label>
        <input type="text" name="year_of_installment" required class="form-control" value="{{ old('year_of_installment') }}" placeholder="Year Of Installment" />
      </div>
      <div class="form-group">
        <label for="area">Area</label>
        <input type="text" name="area" required class="form-control" value="{{ old('area') }}" placeholder="Area" />
      </div>
      <div class="form-group">
        <label for="InstallmentMonthly">Installment Monthly</label>
        <input type="text" name="installment_monthly" required class="form-control" value="{{ old('installment_monthly') }}" placeholder="Installment Monthly" />
      </div>
      <div class="form-group">
        <label for="InstallmentQuarterly">Installment Quarterly</label>
        <input type="text" name="installment_quarter" required class="form-control" value="{{ old('installment_quarter') }}" placeholder="Installment Quarter" />
      </div>
      <div class="form-group">
        <label for="Halfyear">Half Year</label>
        <input type="text" name="half_year" required class="form-control" value="{{ old('half_year') }}" placeholder="Half Year" />
      </div>
      <div class="form-group">
        <label for="InstallmentAnnually">Installment Annually</label>
        <input type="text" name="installment_annually" required class="form-control" value="{{ old('installment_annually') }}" placeholder="Installment Annually" />
      </div>
      <div class="form-group">
        <label for="OfferDiscount">Offer Discount</label>
        <input type="text" name="offer_discount" required class="form-control" value="{{ old('offer_discount') }}" placeholder="Offer Discount" />
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" rows="8" name="description" required placeholder="Project Unit Description">{{ old('description') }}</textarea>
      </div>
    	<button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
</div>
@endsection