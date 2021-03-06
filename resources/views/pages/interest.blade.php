@extends('pages.dashboard')
@section('title', 'KTP')

@section('container')
<div class="card">
  <div class="card card-gray-dark font-dashboard">
  <div class="card-header bg-teal  ">
    <h3 class="card-title text-menu font-weight-bold text-uppercase" >Interest</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form  class="form-box">
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="name" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">MSISD</label>
        <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div>
      <div class="form-group">
        <button type="submit" class="btn bg-teal">Submit</button>
      </div>
    </div>
    <!-- /.card-body -->

    
    </form>
</div>
<!-- /.card -->
  <div class="card-body p-0 pl-5 mb-3 tab-result">
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
          <td><span class="badge bg-danger">Yes/No%</span></td>
        </tr>
        <tr>
          <td>2.</td>
          <td>Clean database</td>
          <td><span class="badge bg-warning">70%</span></td>
        </tr>
        <tr>
          <td>3.</td>
          <td>Cron job running</td>
          <td><span class="badge bg-primary">30%</span></td>
        </tr>
        <tr>
          <td>4.</td>
          <td>Fix and squish bugs</td>
          <td><span class="badge bg-success">90%</span></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection
