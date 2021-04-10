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
                  <h4 class="card-title">{{ $serial }} History</h4>
                  <div class="table-responsive">
                    
                    <table class="table table-striped">
                      <thead>
                        <tr> 
                          <th>
                           <h4> # </h5>
                          </th>
                          <th>
                           <h4>Location</h5> 
                          </th>
                          <th>
                           <h4>Date/Time</h5> 
                          </th>
                        </h4>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                         $count = 1;
                        @endphp
                        @foreach($history_datas as $history_data)
                        <tr>
                          <td>
                            <h5> {{ $count++ }} </h5>
                          </td>
                          <td>
                            <h5>{{ $history_data->current_location }}</h5>                          
                          </td>
                          <td>
                            <h5>{{ $history_data->created_at }}  ({{ \Carbon\Carbon::parse($history_data->created_at)->diffForHumans() }})</h5>                          
                          </td>                    
                        </tr>
                         @endforeach
                      </tbody>
                    </table>
                  </div>
                  <section class="container">
                        <nav aria-label="Page navigation example" class="pagination-body">
                            {{ $history_datas->links() }}
                        </nav>
                    </section>
                </div>
              </div>
            </div>
</div>

@endsection