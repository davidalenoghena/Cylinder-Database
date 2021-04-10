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
                  <h4 class="card-title">Cylinders</h4>
                  @if(Session::has('success'))
                  <div class="alert  alert-success alert-dismissible fade show">
                      <span class="badge badge-pill badge-success">Success</span>
                      {{ Session::get('success') }}
                  </div>
                  @endif
                  <div class="table-responsive">
                    
                    <table class="table table-striped">
                      <thead>
                        <tr> 
                          <th>
                           <h4> # </h5>
                          </th>
                          <th>
                           <h4>Serial Number</h5> 
                          </th>
                          <th>
                           <h4>Weight</h5> 
                          </th>
                          <th>
                           <h4>Current Location</h5> 
                          </th>
                          <th>
                            <h4>Action</h5>
                          </th>
                        </h4>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                         $count = 1;
                        @endphp
                        @foreach($cylinders as $cylinder)
                        <tr>
                          <td>
                            <h5> {{ $count++ }} </h5>
                          </td>
                          <td>
                            <h5>{{ $cylinder->serial_number }}</h5>                          
                          </td>
                          <td>
                            <h5>{{ $cylinder->weight }}</h5>                          
                          </td>
                          <td>
                            <h5>{{ $cylinder->current_location }}</h5>                          
                          </td>                      
                          <td>
                            <a href="{{ route('show.cylinder', ['id' => $cylinder->id]) }}"><button type="button" class="btn btn-outline-primary btn-icon-text">
                              <i class="ti-book btn-icon-prepend"></i>
                              Read
                            </button> </a>
                          </td>
                          <td>
                            <a href="{{ route('edit.cylinder', ['id' => $cylinder->id]) }}"><button type="button" class="btn btn-outline-warning btn-icon-text">
                              <i class="ti-pencil-alt btn-icon-append"></i> 
                               Edit
                            </button> </a>
                          </td>
                          <td>
                            <a href="{{ route('show.history', ['id' => $cylinder->serial_number]) }}"><button type="button" class="btn btn-outline-warning btn-icon-text">
                              <i class="ti-pencil-alt btn-icon-append"></i> 
                               View History
                            </button> </a>
                          </td>
              
                          <td>
                            <a href="{{ route('delete.cylinder', ['id' => $cylinder->id]) }}"  onclick="return confirm('Are you sure?')"><button type="button" class="btn btn-outline-danger btn-icon-text">
                              <i class="ti-trash btn-icon-prepend"></i>                                                    
                              Delete
                            </button></a>
                          </td>
                        </tr>
                         @endforeach
                      </tbody>
                    </table>
                  </div>
                  
                </div>
                <section  class="container">
                      <nav aria-label="Page navigation example" class="pagination-body">
                        {{ $cylinders->links() }}
                      </nav>
                  </section>
              </div>
            </div>
</div>

@endsection