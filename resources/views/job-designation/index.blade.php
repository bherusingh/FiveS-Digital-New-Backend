@extends('layouts.app', ['activePage' => 'job designation', 'titlePage' => __('Designation Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Designation List') }}</h4>
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
                <div class="row">
					<div class="col-6 text-left">
						<form>
							<b>Filter records by title:</b>&nbsp;<input type="text" maxlength="100" name="q" value="<?=(isset($_GET['q'])?$_GET['q']:'')?>" placeholder="type title..."/>&nbsp;<button type="submit" class="btn btn-sm btn-secondary">FILTER</button><a href="{{ route('case-study-category.index') }}" class="btn btn-sm btn-primary">CLEAR</a>
						</form>
					</div>
					<div class="col-6 text-right">
						<a href="{{ route('job-designation.create') }}" class="btn btn-sm btn-primary">{{ __('Add Designation') }}</a>
					</div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                          {{ __('Department') }}
                      </th>
					  <th>
                          {{ __('Designation') }}
                      </th> 
                      <th>
                        {{ __('Creation date') }}
                      </th>
                      <th class="text-right">
                        {{ __('Actions') }}
                      </th>
                    </thead>
                    <tbody>
                      @foreach($jobDesignations as $data)
                        <tr>
						  <td>
                            {{ $data->job_deprt->name }}
                          </td>	
                          <td>
                            {{ $data->name }}
                          </td> 
                          <td>
                            {{ date("d-m-Y h:i A",strtotime($data->created_at)) }}
                          </td>
                          <td class="td-actions text-right">
							  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('job-designation.edit', $data->id) }}" data-original-title="" title="">
								<i class="material-icons">edit</i>
								<div class="ripple-container"></div>
							  </a>
                              </form>
                          </td>
						  </tr>
                      @endforeach
                    </tbody>
                  </table>
				  {{ $jobDesignations->appends(['q' => (isset($_GET['q'])?$_GET['q']:'')])->links() }}

                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
