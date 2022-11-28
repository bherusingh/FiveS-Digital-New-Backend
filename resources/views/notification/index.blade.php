@extends('layouts.app', ['activePage' => 'notification', 'titlePage' => __('Notification Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
			<form method="post" action="{{ route('notification.store') }}" autocomplete="off" class="form-horizontal">
				@csrf
				@method('post')
				<div class="card ">
					<div class="card-header card-header-primary">
						<h4 class="card-title">{{ __('Update Notification') }}</h4>
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
							<label class="col-sm-2 col-form-label">{{ __('Title') }}</label>
							<div class="col-sm-4">
								<div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
									<input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="input-title" type="text" placeholder="{{ __('Title') }}" value="{{ old('title',$notification['title']) }}">
									@if ($errors->has('title'))
										<span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('title') }}</span>
									@endif
								</div>
							</div>
							
							<label class="col-sm-2 col-form-label">{{ __('Url') }}</label>
							<div class="col-sm-4">
								<div class="form-group {{ $errors->has('url') ? ' has-danger' : '' }}">
									<input class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}" name="url" id="input-url" type="text" placeholder="{{ __('Url') }}" value="{{ old('url',$notification['url']) }}">
									@if ($errors->has('url'))
										<span id="name-error" class="error text-danger" for="input-url">{{ $errors->first('url') }}</span>
									@endif
								</div>
							</div>
							
							<label class="col-sm-2 col-form-label">{{ __('Start Date') }}</label>
							<div class="col-sm-4">
								<div class="form-group {{ $errors->has('start_date') ? ' has-danger' : '' }}">
									<input class="form-control{{ $errors->has('start_date') ? ' is-invalid' : '' }}" name="start_date" id="input-start_date" type="date" placeholder="{{ __('Start Date') }}" value="{{ old('start_date',$notification['start_date']) }}">
									@if ($errors->has('start_date'))
										<span id="start_date-error" class="error text-danger" for="input-start_date">{{ $errors->first('start_date') }}</span>
									@endif
								</div>
							</div>
							
							<label class="col-sm-2 col-form-label">{{ __('End Date') }}</label>
							<div class="col-sm-4">
								<div class="form-group {{ $errors->has('end_date') ? ' has-danger' : '' }}">
									<input class="form-control{{ $errors->has('end_date') ? ' is-invalid' : '' }}" name="end_date" id="input-end_date" type="date" placeholder="{{ __('End Date') }}" value="{{ old('end_date',$notification['end_date']) }}">
									@if ($errors->has('end_date'))
										<span id="end_date-error" class="error text-danger" for="input-end_date">{{ $errors->first('end_date') }}</span>
									@endif
								</div>
							</div>
							
							<label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
							<div class="col-sm-4">
								<div class="form-group {{ $errors->has('description') ? ' has-danger' : '' }}">
									<textarea class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="input-description" rows="5" placeholder="{{ __('Description') }}">{{ old('description',$notification['description']) }}</textarea>
									@if ($errors->has('description'))
										<span id="name-error" class="error text-danger" for="input-description">{{ $errors->first('description') }}</span>
									@endif
								</div>
							</div>
							
							<label class="col-sm-2 col-form-label">{{ __('Status') }}</label>
							<div class="col-sm-4">
								<div class="form-group {{ $errors->has('description') ? ' has-danger' : '' }}">
									<select class='form-control' name='is_active'>
										<option value='' selected>Select Status</option>
										<option value='1' @if($notification['is_active'] == 1) selected @endif>Active</option>
										<option value='0' @if($notification['is_active'] == 0) selected @endif>Deactive</option>
									</select>
									@if ($errors->has('is_active'))
										<span id="name-is_active" class="error text-danger" for="input-is_active">{{ $errors->first('is_active') }}</span>
									@endif
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer ml-auto mr-auto">
						<button type="submit" class="btn btn-primary">{{ __('Save Notification') }}</button>
					</div>
				</div>
			</form>
        </div>
      </div>
    </div>
  </div>
@endsection