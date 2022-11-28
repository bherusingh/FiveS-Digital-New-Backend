@extends('layouts.app', ['activePage' => 'call request', 'titlePage' => __('Call Reuqest Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Call Request List') }}</h4>
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
					  <th>Inquiry Type</th>
                      <th>Source</th>
                      <th>Data</th>
                      <th>Created At</th>
                    </thead>
                    <tbody>
                      @foreach($inquiries as $inquiry)
                        <tr>
						  <td>{{ ucwords(str_replace("_"," ",$inquiry->inquiry_type)) }}</td>
                          <td>{{ ($inquiry->inquiry_type == 'Send_Proposal') ? 'Email' : 'Mobile No.' }}</td>
                          <td>{{ ($inquiry->inquiry_type == 'Send_Proposal') ? $inquiry->email : $inquiry->mobile }}</td>
                          <td>{{ date('d-m-Y h:i A',strtotime($inquiry->created_at)) }}</td>
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