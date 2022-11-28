@extends('layouts.app', ['activePage' => 'event', 'titlePage' => __('Event Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Event List') }}</h4>
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
							<b>Filter records by title:</b>&nbsp;<input type="text" maxlength="100" name="q" value="<?=(isset($_GET['q'])?$_GET['q']:'')?>" placeholder="type title..."/>&nbsp;<button type="submit" class="btn btn-sm btn-secondary">FILTER</button><a href="{{ route('event.index') }}" class="btn btn-sm btn-primary">CLEAR</a>
						</form>
					</div>
					<div class="col-6 text-right">
						<a href="{{ route('event.create') }}" class="btn btn-sm btn-primary">{{ __('Add Event') }}</a>
					</div>
                </div>
                <div class="table-responsive">
					<table class="table">
						<thead class=" text-primary">
							<th>Title</th>
							<th>Start Date</th>
							<th>End Date</th>
							<th>Status</th>
							<th>Action</th>
						</thead>
						<tbody>
						  @foreach($events as $data)
							<tr>
								<td>{{ $data->title }}</td>	
								<td>{{ date("d-m-Y h:i A",strtotime($data->start_date)) }}</td>
								<td>{{ date("d-m-Y h:i A",strtotime($data->end_date)) }}</td>
								<td>{!! ($data->is_active == 1) ? '<span class="text-success">Active</span>' : '<span class="text-danger">Deactive</span>'; !!}</td>
								<td class="td-actions">
									<a rel="tooltip" class="btn btn-success btn-link" href="{{ route('event.edit', $data->id) }}" data-original-title="Edit" title="">
										<i class="material-icons">edit</i>
										<div class="ripple-container"></div>
									</a>
									<a rel="tooltip" class="btn btn-success btn-link" href="{{ route('event-video', $data->id) }}" data-original-title="Upload Video" title="">
										<i class="material-icons">upload</i>
										<div class="ripple-container"></div>
									</a>
									</form>
								</td>
							</tr>
						  @endforeach
						</tbody>
					</table>
					{{ $events->appends(['q' => (isset($_GET['q'])?$_GET['q']:'')])->links() }}
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
