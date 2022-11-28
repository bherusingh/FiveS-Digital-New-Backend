@extends('layouts.app', ['activePage' => 'inqury report', 'titlePage' => __('Inquiry Report')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
			<form method="post" action="{{ route('inquiry-report-save') }}" autocomplete="off" class="form-horizontal">
				@csrf
				@method('post')
				<div class="card ">
					<div class="card-header card-header-primary">
						<h4 class="card-title">{{ __('Inquiry Report') }}</h4>
						<p class="card-category"></p>
					</div>
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
					<div class="card-body ">
						<div class="row">
							<label class="col-sm-2 col-form-label">{{ __('Start Date') }}</label>
							<div class="col-sm-4">
								<div class="form-group {{ $errors->has('start_date') ? ' has-danger' : '' }}">
									<input class="form-control{{ $errors->has('start_date') ? ' is-invalid' : '' }}" name="start_date" id="input-start_date" type="date" placeholder="{{ __('Start Date') }}" value="{{ old('start_date') }}">
									@if ($errors->has('start_date'))
										<span id="start_date-error" class="error text-danger" for="input-start_date">{{ $errors->first('start_date') }}</span>
									@endif
								</div>
							</div>
							
							<label class="col-sm-2 col-form-label">{{ __('End Date') }}</label>
							<div class="col-sm-4">
								<div class="form-group {{ $errors->has('end_date') ? ' has-danger' : '' }}">
									<input class="form-control{{ $errors->has('end_date') ? ' is-invalid' : '' }}" name="end_date" id="input-end_date" type="date" placeholder="{{ __('End Date') }}" value="{{ old('end_date') }}">
									@if ($errors->has('end_date'))
										<span id="end_date-error" class="error text-danger" for="input-end_date">{{ $errors->first('end_date') }}</span>
									@endif
								</div>
							</div>
							
							<label class="col-sm-2 col-form-label">{{ __('Inquiry Type') }}</label>
							<div class="col-sm-4">
								<div class="form-group {{ $errors->has('inquiry_type') ? ' has-danger' : '' }}">
									<select class='form-control' name='inquiry_type'>
										<option value='' selected>Select Inquiry Type</option>
										<option value="Sales_And_Solutions">Sales And Solutions</option>
										<option value="Partnership">Partnership</option>
										<option value="Recruitment">Career</option>
										<option value="Send_Proposal">Send Proposal</option>
										<option value="Request_Call">Request Call</option>
										<option value="Case_Study">Case Study</option>
										<option value="quick_inquiry">Quick Inquiry</option>
										<option value="inquiry_event_report">Coffee Chat Report</option>


									</select>
									@if ($errors->has('inquiry_type'))
										<span id="name-inquiry_type" class="error text-danger" for="input-inquiry_type">{{ $errors->first('inquiry_type') }}</span>
									@endif
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer ml-auto mr-auto">
						<button type="submit" class="btn btn-primary">{{ __('Get Inquiry Report') }}</button>
					</div>
				</div>
			</form>
        </div>
      </div>
    </div>
  </div>
@endsection