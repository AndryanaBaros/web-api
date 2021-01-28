@extends('pages.dashboard')
@section('title', 'KTP')

@section('container')
<div class="card ">
  <div class="card card-gray-dark font-dashboard">
  <div class="card-header bg-teal">
    <h3 class="card-title text-menu font-weight-bold text-uppercase " >KTP Match</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form  action="{{ route('matchktp') }}" class="form-box" method="POST"  >
    @csrf
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="name" class="form-control"  name="name" id="exampleInputEmail1" placeholder="Enter Name">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">NIK</label>
        <input type="number" class="form-control" name="nik" id="exampleInputPassword1" placeholder="NIK">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">MSISD</label>
        <input type="number" class="form-control" name="msisdn" id="exampleInputPassword1" placeholder="Phone Number">
      </div>
      <div class="form-group">
        <button type="submit" class="btn bg-teal">Submit</button>
      </div>
    </div>
    <!-- /.card-body -->
  </form>
</div>
<!-- /.card -->
@if(!empty($data_ktp))
  <div class="card-body p-0 pl-5 mb-3 tab-result ">
    <table class="table table-sm font-table">
      <thead>
        <tr>
          <th colspan="3" style="border: 0" ><center>{{ $nama_user }}</center></th>
        </tr>
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
          <td><span class="badge bg-danger">{{$data_ktp->score}}</span></td>
        </tr>
      </tbody>
    </table>
  </div>
  @endif
  
</div>
@endsection
