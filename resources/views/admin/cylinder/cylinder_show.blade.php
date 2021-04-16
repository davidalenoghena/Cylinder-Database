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
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h1 class="card-title"><strong> Serial Number: {{ $cylinder_data->serial_number }} </strong></h1>
            <div class="table-responsive">
                <div class="col-md-12">
                    <div class="card">
                            <div class="card-body">
                              <strong><h4>Tare Weight: {{ $cylinder_data->weight }}</h4> </strong>
                            </div>
                    </div>
                    <div class="card">
                            <div class="card-body">
                              <strong><h4>Date of Manufacture: {{ $cylinder_data->manufacture_date }}</h4> </strong>
                            </div>
                    </div>
                    <div class="card">
                            <div class="card-body">
                              <strong><h4>Shelf Life: {{ $cylinder_data->shelf_life }}</h4> </strong>
                            </div>
                    </div>
                    <div class="card">
                            <div class="card-body">
                              <strong><h4>Country of Origin: {{ $cylinder_data->country_of_origin }}</h4> </strong>
                            </div>
                    </div>
                    <div class="card">
                            <div class="card-body">
                              <strong><h4>Source: {{ $cylinder_data->source }}</h4> </strong>
                            </div>
                    </div>
                    <div class="card">
                            <div class="card-body">
                              <strong><h4>Address of Source: {{ $cylinder_data->source_address }}</h4> </strong>
                            </div>
                    </div>
                    <div class="card">
                            <div class="card-body">
                              <strong><h4>Current Location: {{ $cylinder_data->current_location }}</h4> </strong>
                            </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

@endsection