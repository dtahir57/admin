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
    <li class="breadcrumb-item active" aria-current="page">Create</li>
  </ol>
</nav>
@foreach($errors->all() as $error)
  <li class="alert alert-danger">{{$error}}</li>
@endforeach
<div class="card">
  <div class="card-header">New Company</div>
  <div class="card-body">
    <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
    	{{ csrf_field() }}
    	<div class="row">
        <div class="form-group col-md-6">
          <label for="CompanyType">Name</label>
          <input type="text" name="name" required class="form-control" placeholder="Company Name" value="{{ old('name') }}" />
        </div>
        <div class="form-group col-md-6">
          <label>Company Type</label>
          <select class="form-control" name="company_type">
            <option selected disabled>Please Select an Option</option>
            @foreach($company_types as $company_type)
            <option value="{{ $company_type->id }}">{{ $company_type->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group col-md-6">
          <label for="email">Email</label>
          <input type="email" name="email" required class="form-control" placeholder="Email" value="{{ old('email') }}" />
        </div>
        <div class="form-group col-md-6">
          <label for="tel">Phone</label>
          <input type="text" name="tel" required class="form-control" placeholder="Phone" value="{{ old('tel') }}" />
        </div>
        <div class="form-group col-md-6">
          <label for="logo">Logo</label>
          <input type="file" name="logo" required class="form-control" />
        </div>
      </div>
    	<button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
</div>
@endsection