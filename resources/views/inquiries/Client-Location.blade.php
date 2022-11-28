@extends('layouts.app', ['activePage' => 'Client Location', 'titlePage' => __('Inquiry Report')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">{{ __('Client Location') }}</h4>
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
                  <th>Ip</th>
                  <th>Location</th>
                  <th>Creation Time</th>
                  <th>Browser</th>
                </thead>
                <tbody>
                  @foreach($Clientlocation as $inquiry)
                  <tr>
                    <td>{{ ucwords(str_replace("_"," ",$inquiry->ip)) }}</td>
                    <td>{{ $inquiry->country  }}</td>
                    <td>{{ $inquiry->created_at }}</td>
                    <td>{{ $inquiry->browser }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{ $Clientlocation->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection