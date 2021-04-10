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
                  <h4 class="card-title">History</h4>
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
                           <h5> # </h5>
                          </th>
                          <th>
                           <h5>Serial Number</h5> 
                          </th>
                          <th>
                            <h5>Location</h5> 
                          </th>
                          <th>
                            <h5>Date/Time</h5> 
                          </th>
                          <th>
                            <h5>Action</h5>
                          </th>
                        </h4>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                         $count = 1;
                        @endphp
                        @foreach($histories as $row)
                        <tr>
                          <td>
                            <h5> {{ $count++ }} </h5>
                          </td>
                          <td>
                            <h5>{{ $row->serial_number }}</h5>                          
                          </td>
                          <td>
                            <h5>{{ $row->current_location }}</h5>                          
                          </td>
                          <td>
                            <h5>{{ $row->created_at }}</h5>                          
                          </td>                        
                          <td>
                            <a href="{{ route('show.history', ['id' => $row->serial_number]) }}"><button type="button" class="btn btn-outline-primary btn-icon-text">
                              <i class="ti-book btn-icon-prepend"></i>
                              View
                            </button> </a>
                          </td>
                          </td>
                        </tr>
                         @endforeach
                      </tbody>
                    </table>
                    
                  </div>
                  <section class="container">
                        <nav aria-label="Page navigation example" class="pagination-body">
                            {{ $histories->links() }}
                        </nav>
                    </section>
                </div>
              </div>
            </div>
</div>

@endsection