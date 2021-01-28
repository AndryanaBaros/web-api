@extends('pages.dashboard')
@section('title', 'Location')

@section('container')
<div class="card" >
  <div class="card card-gray-dark font-dashboard">
  <div class="card-header bg-teal ">
    <h3 class="card-title text-menu font-weight-bold text-uppercase" >Location Scoring Insight</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form  class="form-box" action="{{ route('matchlocation') }}" method="POST">
    @csrf
    
    {{-- @if($messages = Session::get('error'))
    <div class="alert alert-danger ">
      <div class="strong text-align-center text-center">{{ $messages }}</div>
    </div>
    @endif --}}
                
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="name" class="form-control" name="name" id="exampleInputEmail1" placeholder="Name">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">MSISD</label>
        <input type="number" class="form-control" name="msisdn"  id="exampleInputPassword1" placeholder="MSISDN">
      </div>
      <div class="row edit-check form-group" name="verify" >
        <label for="verify" class="check1">Verify :</label>
        <div class="custom-control custom-radio check1">
          <input class="custom-control-input"  type="radio" id="customRadio1" name="customRadio">
          <label for="customRadio1" class="custom-control-label">Home</label>
        </div>
        <div class="custom-control custom-radio">
          <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio" checked>
          <label for="customRadio2" class="custom-control-label">Work</label>
        </div>
      </div>
      <div class="form-group ">
        <label for="exampleInputPassword1">Address</label>
        <input type="text" class="form-control" name="address" id="exampleInputPassword1" placeholder="Address">
      </div>
      <div class="form-group">
        <button type="submit" class="btn bg-teal">Submit</button>
      </div>
    </div>
    <!-- /.card-body -->

    
  </form>
</div>
<!-- /.card -->
@if(!empty($data_location))
  <div class="card-body p-0 pl-5 mb-3 mb-3 tab-result">
    <table class="table table-sm">
      <thead>
        <tr>
          <th style="width: 10px">#</th>
          <th>Result</th>
          <th style="width: 40px">Label</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1.</td>
          <td>Score</td>
          <td><span class="badge bg-danger">{{$data_location->score}}</span></td>
        </tr>
      </tbody>
    </table>
  </div>
@endif

</div>
  @endsection
