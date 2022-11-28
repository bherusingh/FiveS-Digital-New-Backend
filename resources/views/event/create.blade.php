@extends('layouts.app', ['activePage' => 'event', 'titlePage' => __('Event Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('event.store') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Add Event') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('event.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>
                <div class="row">
				  <label class="col-sm-2 col-form-label">{{ __('Title') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="input-title" type="text" placeholder="{{ __('Title') }}" value="{{ old('title') }}" required="true" aria-required="true"/>
                      @if ($errors->has('title'))
                        <span id="title-error" class="error text-danger" for="input-title">{{ $errors->first('title') }}</span>
                      @endif
                    </div>
                  </div>
				  <label class="col-sm-2 col-form-label">{{ __('Status') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('is_active') ? ' has-danger' : '' }}">
					  <select class='form-control' name='is_active' required="true" aria-required="true">
						<option value='1' {{ old('is_active') == 1 ? 'selected' : '' }}>Active</option>
						<option value='0' {{ old('is_active') == 0 ? 'selected' : '' }}>Deactive</option>
					  </select>	
					  @if ($errors->has('is_active'))
                        <span id="is_active-error" class="error text-danger" for="input-is_active">{{ $errors->first('is_active') }}</span>
                      @endif
                    </div>
                  </div>
				  <label class="col-sm-2 col-form-label">{{ __('Event Start Date') }}</label>
				  <div class="col-sm-4">
					<div class="form-group {{ $errors->has('start_date') ? ' has-danger' : '' }}">
						<input class="form-control{{ $errors->has('start_date') ? ' is-invalid' : '' }}" name="start_date" id="input-start_date" type="datetime-local" placeholder="{{ __('Start Date') }}" value="{{ old('start_date') }}">
						@if ($errors->has('start_date'))
							<span id="start_date-error" class="error text-danger" for="input-start_date">{{ $errors->first('start_date') }}</span>
						@endif
					</div>
				  </div>
				  <label class="col-sm-2 col-form-label">{{ __('Event End Date') }}</label>
				  <div class="col-sm-4">
					<div class="form-group {{ $errors->has('end_date') ? ' has-danger' : '' }}">
						<input class="form-control{{ $errors->has('end_date') ? ' is-invalid' : '' }}" name="end_date" id="input-end_date" type="datetime-local" placeholder="{{ __('End Date') }}" value="{{ old('end_date') }}">
						@if ($errors->has('end_date'))
							<span id="end_date-error" class="error text-danger" for="input-end_date">{{ $errors->first('end_date') }}</span>
						@endif
					</div>
				  </div>
				  <label class="col-sm-2 col-form-label">{{ __('Event Image') }}</label>
				  <div class="col-sm-4">
					   <div class="fileinput fileinput-new text-center" data-provides="fileinput">
							<div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
								<div>
									<span class="btn btn-raised btn-round btn-rose btn-file">
									<input type="file" name="img_path" required="true" aria-required="true"/>
									</span>
								</div>
							 @if($errors->has('img_path'))
								<span id="img_path-error" class="error text-danger" for="input-img_path">{{ $errors->first('img_path') }}</span>
							@endif
						</div>
				  </div>
				  <input type='hidden' value="{{ old('old_img_path') }}" name="old_img_path">
				</div>
				<div class="row">
				  <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                  <div class="col-sm-10">
                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                      <textarea rows="5" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="input-description" placeholder="{{ __('Description') }} " required="true" aria-required="true">{{ old('description') }}</textarea>
                      @if ($errors->has('description'))
                        <span id="description-error" class="error text-danger" for="input-description">{{ $errors->first('description') }}</span>
                      @endif
                    </div>
                  </div>
				</div> 
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Add Event') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.ckeditor.com/4.11.4/standard-all/ckeditor.js"></script>

  <script>
	$(document).ready(function() {
		CKEDITOR.disableAutoInline = true;
	    CKEDITOR.replace(  'input-description' , {
	      extraPlugins: 'sourcedialog',
	      removePlugins: 'sourcearea'
        });
        CKEDITOR.config.allowedContent = true;
	});
</script>
@endsection
