@extends('layouts.app', ['activePage' => 'inquiries', 'titlePage' => __('Inquiry Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Inquiries List') }}</h4>
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
                      <th>
                          {{ __('Inquiry Type') }}
                      </th>	    
                      <th>
                          {{ __('Name') }}
                      </th>
                      <th>
                        {{ __('Email') }}
                      </th>
                     <th>
                        {{ __('Mobile') }}
                      </th>
                       <th>
                        {{ __('Company Name') }}
                      </th>
    				  <th>
                        {{ __('No Of Emp') }}
                      </th>
    				  <th>
                        {{ __('Designation') }}
                      </th>
    				  <th>
                        {{ __('Cv') }}
                      </th>
                     <th>
                        {{ __('Subject') }}
                      </th>
                     <th>
                        {{ __('Message') }}
                      </th>
                     <th>
                        {{ __('IP Address') }}
                      </th>
                     <th>
                        {{ __('Browser') }}
                      </th>
                      <th>
                        {{ __('Creation date') }}
                      </th>
                      <th class="text-right">
                        {{ __('Actions') }}
                      </th>
                    </thead>
                    <tbody>
                      @foreach($inquiries as $inquiry)
                        <tr>
                          <td>
                            {{ str_replace("_"," ",$inquiry->inquiry_type) }}
                          </td>    
                          <td>
                            {{ $inquiry->name }}
                          </td>
                          <td>
                            {{ $inquiry->email }}
                          </td>
                          <td>
                            {{ $inquiry->mobile }}
                          </td>
                          <td>
                            {{ $inquiry->company_name }}
                          </td>
						  <td>
                            {{ $inquiry->no_of_employee }}
                          </td>
						  <td>
                            {{ $inquiry->designation }}
                          </td>
						  <td>
                            @if(!empty($inquiry->cv_upload))
							  <a href="{{ ('/uploads/employee_cv/'.$inquiry->cv_upload) }}" download>{{ $inquiry->cv_upload }}</a>
							@endif
                          </td>
                          <td>
                            {{ $inquiry->subject }}
                          </td>
                         <td>
                            {{ $inquiry->msg }}
                          </td>
                         <td>
                            {{ $inquiry->ipAddress }}
                          </td>
                         <td>
                            {{ $inquiry->browser }}
                          </td>
                          <td>
                            {{ $inquiry->created_at->format('Y-m-d') }}
                          </td>
                          <td class="td-actions text-right">
                            <form action="{{ route('inquiry.destroy', $inquiry) }}" method="post">
                                  @csrf
                                  @method('delete')
                              
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this inquiry?") }}') ? this.parentElement.submit() : ''">
                                      <i class="material-icons">close</i>
                                      <div class="ripple-container"></div>
                                  </button>
                              </form>
                          </td>
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