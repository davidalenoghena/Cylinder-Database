@extends ('admin.layouts.master')
@section('content')

<div class="content-wrapper">
<br>
<div class="row">
    <div class="col-lg-12 grid-margin">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <h4 class="font-weight-bold mb-0">Admin Dashboard</h4>
        </div>
      </div>
    </div>
</div>
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Add Cylinder</h4>
      <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>

      <form action="{{ route('store.cylinder') }}" method="POST" enctype="multipart/form-data" class="forms-sample" >
        @csrf
        <div class="form-group">
          <label for="exampleInputName1">Serial Number</label>
          <input type="text" class="form-control" name="serial_number" id="exampleInputName1" placeholder="Serial Number of Cylinder" required>
        </div>
        <div class="form-group">
          <label for="exampleInputName1">Tare Weight</label>
          <input type="text" class="form-control" name="weight" id="exampleInputName1" placeholder="Tare Weight of Cylinder in kg" required>
        </div>
        <div class="form-group">
          <label for="exampleInputName1">Date of Manufacture</label>
          <input type="text" class="form-control" name="manufacture_date" id="exampleInputName1" placeholder="Manufacturing Date" required>
        </div>
        <div class="form-group">
          <label for="exampleInputName1">Shelf Life</label>
          <input type="text" class="form-control" name="shelf_life" id="exampleInputName1" placeholder="Number of years left" required>
        </div>
        <div class="form-group">
          <label for="exampleInputName1">Country of Origin</label>
          <input type="text" class="form-control" name="country_of_origin" id="exampleInputName1" placeholder="Country of Origin" required>
        </div>
        <div class="form-group">
        <label for="exampleInputName1">Source</label>
          <select name="source" id="source" class="form-control-sm form-control" required>
              <option value="" disabled selected hidden>Please select</option>
              <option value="Hub">Hub</option>
              <option value="Customer">Customer</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputName1">Address of Source</label>
          <input type="text" class="form-control" name="source_address" id="exampleInputName1" placeholder="Address of Source" required>
        </div>
        <div class="form-group">
          <label for="exampleInputName1">Current Location</label>
          <input type="text" class="form-control" name="current_location" id="exampleInputName1" placeholder="USER-ID or HUB-ID" required>
        </div>
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
      </form>
    </div>
  </div>
</div>

@endsection