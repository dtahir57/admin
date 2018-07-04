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
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
  </ol>
</nav>
<div class="card">
  <div class="card-header">Edit Project Unit</div>
  <div class="card-body">
    <form action="{{ route('project_unit.update', $project_unit->id) }}" method="POST">
    	{{ csrf_field() }}
      <input type="hidden" name="_method" value="PATCH">
    	<div class="form-group">
    		<label for="Projectname">Project Name</label>
    		<select class="form-control" name="project_name" required>
          <option selected disabled>Please Select an Option</option>
          @foreach($projects as $project)
          <option value="{{ $project->id }}" @if($project->id == $project_unit->project_id) selected @endif>{{ $project->name }}</option>
          @endforeach
        </select>
    	</div>
      <div class="form-group">
        <label for="Name">Name</label>
        <input type="text" name="name" required class="form-control" value="{{ $project_unit->name }}" placeholder="Project Name" />
      </div>
      <div class="form-group">
        <label for="RateCard">Rate Card</label>
        <input type="text" name="rate_card" required class="form-control" value="{{ $project_unit->rate_card }}" placeholder="Rate Card" />
      </div>
      <div class="form-group">
        <label for="Cost">Cost</label>
        <input type="text" name="cost" required class="form-control" value="{{ $project_unit->cost }}" placeholder="Cost" />
      </div>
      <div class="form-group">
        <label for="Downpayment">Down Payment</label>
        <input type="text" name="down_payment" required class="form-control" value="{{ $project_unit->down_payment }}" placeholder="Down Payment" />
      </div>
      <div class="form-group">
        <label for="installment">Installment</label>
        <input type="text" name="installment" required class="form-control" value="{{ $project_unit->installment }}" placeholder="Installment" />
      </div>
      <div class="form-group">
        <label for="YearOfInstallment">Year Of Installment</label>
        <input type="text" name="year_of_installment" required class="form-control" value="{{ $project_unit->year_of_installment }}" placeholder="Year Of Installment" />
      </div>
      <div class="form-group">
        <label for="area">Area</label>
        <input type="text" name="area" required class="form-control" value="{{ $project_unit->area }}" placeholder="Area" />
      </div>
      <div class="form-group">
        <label for="InstallmentMonthly">Installment Monthly</label>
        <input type="text" name="installment_monthly" required class="form-control" value="{{ $project_unit->installment_monthly }}" placeholder="Installment Monthly" />
      </div>
      <div class="form-group">
        <label for="InstallmentQuarterly">Installment Quarterly</label>
        <input type="text" name="installment_quarter" required class="form-control" value="{{ $project_unit->installment_quarter }}" placeholder="Installment Quarter" />
      </div>
      <div class="form-group">
        <label for="Halfyear">Half Year</label>
        <input type="text" name="half_year" required class="form-control" value="{{ $project_unit->half_year }}" placeholder="Half Year" />
      </div>
      <div class="form-group">
        <label for="InstallmentAnnually">Installment Annually</label>
        <input type="text" name="installment_annually" required class="form-control" value="{{ $project_unit->installment_annually }}" placeholder="Installment Annually" />
      </div>
      <div class="form-group">
        <label for="OfferDiscount">Offer Discount</label>
        <input type="text" name="offer_discount" required class="form-control" value="{{ $project_unit->offer_discount }}" placeholder="Offer Discount" />
      </div>
      <div class="form-group">
        <label for="flexiblePlan">
          <input type="checkbox" name="flexible_plan" @if($project_unit->flexible_plan) checked @endif />
          Flexible Plan
        </label>
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" rows="8" name="description" required placeholder="Project Description">{{ $project_unit->description }}</textarea>
      </div>
    	<button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
</div>
@endsection