@extends('layouts.app', ['activePage' => 'Event Request', 'titlePage' => __('Event Request Management')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">{{ __('Event Request List') }}</h4>
          </div>
          <div class="card-body">
            @if (session('status'))
            <div class="row">
              <div class="col-sm-12">
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="material-icons">close</i>
                  </button>
                  <span>{{ session('status') }}</span>
                </div>
              </div>
            </div>
            @endif
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>Name</th>
                  <th>Event</th>
                  <th>Email</th>
                  <th>Company Name</th>
                  <th>Designation</th>
                </thead>
                <tbody>
                  @foreach($inquiries as $inquiry)
                  <tr>
                    <td>{{ $inquiry -> name }}</td>
                    <td>{{ $inquiry -> inquiry_event-> title }}</td>
                    <td>{{ $inquiry -> email }}</td>
                    <td>{{ $inquiry -> company_name }}</td>
                    <td>{{ $inquiry -> designation }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{ $inquiries->links() }}

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection