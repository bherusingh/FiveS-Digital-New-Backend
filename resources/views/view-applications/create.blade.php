@extends('layouts.app', ['activePage' => 'job designation', 'titlePage' => __('Designation Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('job-designation.store') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Add Designation') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('job-designation.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Department') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <select class='form-control' name='department' required="true" aria-required="true">
						<option value='' selected>Select Department</option>
						@foreach($departments as $dpid=>$dpnm)
							<option value="{{$dpid}}" {{ old('department') == $dpid ? 'selected' : '' }}>{{$dpnm}}</option>
						@endforeach
					  </select>
                      @if ($errors->has('department'))
                        <span id="department-error" class="error text-danger" for="input-department">{{ $errors->first('department') }}</span>
                      @endif
                    </div>
                  </div>
				  <label class="col-sm-2 col-form-label">{{ __('Designation') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('designation') }}" value="{{ old('name') }}" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="title-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
				</div> 
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Add Designation') }}</button>
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

	   CKEDITOR.replace(  'input-html' , {
	extraPlugins: 'sourcedialog',
	removePlugins: 'sourcearea'
}); 
 
        CKEDITOR.config.allowedContent = true;
});
  </script>
@endsection
