@extends('layouts.app', ['activePage' => 'case study category', 'titlePage' => __('Case Study Category Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('case-study-category.update', $caseCategory->id) }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit Case Study Category') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('case-study-category.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-5 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('name') }}" value="{{ old('name', $caseCategory->name) }}"/>
                      @if ($errors->has('name'))
                        <span id="title-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
				</div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.ckeditor.com/4.11.4/standard-all/ckeditor.js"></script>
  <script>
	$(document).ready(function(){
      CKEDITOR.disableAutoInline = true;

	   CKEDITOR.replace(  'input-html' , {
	extraPlugins: 'sourcedialog',
	removePlugins: 'sourcearea'
}); 
CKEDITOR.config.allowedContent = true;
 
	});
  </script>
@endsection
