@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Companies</h5>
    <a href="{{ route('company.index') }}" class="btn btn-primary float-right">View All</a>
  </div>
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('company.index') }}">Companies</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
  </ol>
</nav>
@foreach($errors->all() as $error)
  <li class="alert alert-danger">{{$error}}</li>
@endforeach
<div class="card">
  <div class="card-header">Update Company</div>
  <div class="card-body">
    <form action="{{ route('company.update', $company->id) }}" method="POST">
    	{{ csrf_field() }}
      <input type="hidden" name="_method" value="PATCH">
    	<div class="row">
        <div class="form-group col-md-6">
          <label for="CompanyType">Name</label>
          <input type="text" name="name" required class="form-control" placeholder="Company Name" value="{{ $company->name }}" />
        </div>
        <div class="form-group col-md-6">
          <label>Company Type</label>
          <select class="form-control" name="company_type">
            <option selected disabled>Please Select an Option</option>
            @foreach($company_types as $company_type)
            <option value="{{ $company_type->id }}" @if($company_type->id == $company->company_type->id) selected @endif>{{ $company_type->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group col-md-6">
          <label for="email">Email</label>
          <input type="email" name="email" required class="form-control" placeholder="Email" value="{{ $company->email }}" />
        </div>
        <div class="form-group col-md-6">
          <label for="tel">Phone</label>
          <input type="text" name="tel" required class="form-control" placeholder="Phone" value="{{ $company->tel }}" />
        </div>
        <div class="form-group col-md-6">
          <input type="checkbox" name="is_active" @if($company->is_active == 1) checked @endif />
          <label for="isActive">Is Active</label>
        </div>
      </div>
    	<button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
</div>
@endsection