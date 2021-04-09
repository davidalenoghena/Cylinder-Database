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
      <h4 class="card-title">Edit Cylinder</h4>
      @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach

      <form action="{{ route('update.cylinder', ['id' => $cylinder->id]) }}" method="POST" enctype="multipart/form-data" class="forms-sample" >
        @csrf
        <div class="form-group">
          <label for="exampleInputName1">Serial Number</label>
          <input type="text" class="form-control" name="serial_number" value="{{ $cylinder->serial_number }}" id="exampleInputName1" required>
        </div>
        <div class="form-group">
          <label for="exampleInputName1">Weight</label>
          <input type="text" class="form-control" name="weight" value="{{ $cylinder->weight }}" id="exampleInputName1" required>
        </div>
        <div class="form-group">
        <label for="exampleInputName1">Date of Manufacture</label>
          <input type="text" class="form-control" name="manufacture_date" value="{{ $cylinder->manufacture_date }}" id="exampleInputName1" required>
        </div>
        <div class="form-group">
        <label for="exampleInputName1">Shelf Life</label>
          <input type="text" class="form-control" name="shelf_life" value="{{ $cylinder->shelf_life }}" id="exampleInputName1" required>
        </div>
        <div class="form-group">
        <label for="exampleInputName1">Country of Origin</label>
          <input type="text" class="form-control" name="country_of_origin" value="{{ $cylinder->country_of_origin }}" id="exampleInputName1" required>
        </div>
        <div class="form-group">
        <label for="exampleInputName1">Cylinder Source</label>
          <input type="text" class="form-control" name="source" value="{{ $cylinder->source }}" id="exampleInputName1" required>
        </div>
        <div class="form-group">
        <label for="exampleInputName1">Address of Source</label>
          <input type="text" class="form-control" name="source_address" value="{{ $cylinder->source_address }}" id="exampleInputName1" required>
        </div>
        <div class="form-group">
          <label for="exampleInputName1">Current Location</label>
          <input type="text" class="form-control" name="current_location" value="{{ $cylinder->current_location }}" id="exampleInputName1" required>
        </div>
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
      </form>
    </div>
  </div>
</div>

@endsection