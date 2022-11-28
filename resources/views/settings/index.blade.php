@extends('layouts.app', ['activePage' => 'settings', 'titlePage' => __('Settings')])

@section('content')
  <link href="./bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet">
  <script src="./bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('setting.update', $setting) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit Settings') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
			  <div class="row">
                  <div class="col-sm-2"></div>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('maintenance_mode') ? ' has-danger' : '' }}">
                      <input class="form-check-input{{ $errors->has('maintenance_mode') ? ' is-invalid' : '' }}" type="checkbox" name="maintenance_mode" id="maintenance_mode" value="1"  /> <label>{{ __('Turn Maintenance Mode ON') }}</label>
                       @if ($errors->has('maintenance_mode'))
                        <span id="maintenance_mode-error" class="error text-danger" for="input-maintenance_mode">{{ $errors->first('maintenance_mode') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
			  <div class="row">
                   <div class="col-sm-12">
                   <h5>Please write or paste your HTML code for Message to be shown during "Maintenance Mode" below. You can include images/css/js uploaded in Media here too.</h5>
                    </div>
                   <div class="col-sm-12">
				    <div class="form-group{{ $errors->has('maintenance_msg') ? ' has-danger' : '' }}">
					<textarea id="input-maintenance_msg" name="maintenance_msg" class="form-control{{ $errors->has('maintenance_msg') ? ' is-invalid' : '' }}"  >
                    {{ old('maintenance_msg', ($setting->maintenance_msg)) }}
                    </textarea>
                       @if ($errors->has('maintenance_msg'))
                        <span id="maintenance_msg-error" class="error text-danger" for="input-maintenance_msg">{{ $errors->first('maintenance_msg') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
				 <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Site Title') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('site_title') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('site_title') ? ' is-invalid' : '' }}" name="site_title" id="input-site_title" type="text" placeholder="{{ __('Site Title') }}" value="{{ old('site_title', $setting->site_title) }}" required />
                      @if ($errors->has('site_title'))
                        <span id="site_title-error" class="error text-danger" for="input-site_title">{{ $errors->first('site_title') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
				 <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Keywords') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('meta_keywords') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('meta_keywords') ? ' is-invalid' : '' }}" name="meta_keywords" id="input-meta_keywords" type="text" placeholder="{{ __('Put your Meta Keywords here') }}" value="{{ old('meta_keywords', $setting->meta_keywords) }}" required />
                      @if ($errors->has('meta_keywords'))
                        <span id="meta_keywords-error" class="error text-danger" for="input-meta_keywords">{{ $errors->first('meta_keywords') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
				 <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('meta_desc') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('meta_desc') ? ' is-invalid' : '' }}" name="meta_desc" id="input-meta_desc" type="text" placeholder="{{ __('Put your Meta Description here') }}" value="{{ old('meta_desc', $setting->meta_desc) }}" required />
                      @if ($errors->has('meta_desc'))
                        <span id="meta_desc-error" class="error text-danger" for="input-meta_desc">{{ $errors->first('meta_desc') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
				 <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Primary Color') }}</label>
                  <div class="col-sm-10">
                    <div id="primary_color" class="input-group form-group{{ $errors->has('primary_color') ? ' has-danger' : '' }}">
						<input type="text" name="primary_color" class="form-control input-lg" value="{{ old('primary_color', $setting->primary_color) }}" required/>
						<span class="input-group-append">
							<span class="input-group-text colorpicker-input-addon"><i></i></span>
						</span>
					</div>
					@if ($errors->has('primary_color'))
						<span id="primary_color-error" class="error text-danger" for="input-primary_color">{{ $errors->first('primary_color') }}</span>
					@endif
                  </div>
                </div>
				  <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Secondary Color') }}</label>
                  <div class="col-sm-10">
                    <div id="secondary_color" class="input-group form-group{{ $errors->has('secondary_color') ? ' has-danger' : '' }}">
						<input type="text" name="secondary_color" class="form-control input-lg" value="{{ old('secondary_color', $setting->secondary_color) }}" required/>
						<span class="input-group-append">
							<span class="input-group-text colorpicker-input-addon"><i></i></span>
						</span>
					</div>
					@if ($errors->has('secondary_color'))
						<span id="secondary_color-error" class="error text-danger" for="input-secondary_color">{{ $errors->first('secondary_color') }}</span>
					@endif
                  </div>
                </div>
				<div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Tertiary Color') }}</label>
                  <div class="col-sm-10">
                    <div id="tertiary_color" class="input-group form-group{{ $errors->has('tertiary_color') ? ' has-danger' : '' }}">
						<input type="text" name="tertiary_color" class="form-control input-lg" value="{{ old('tertiary_color', $setting->tertiary_color) }}" required/>
						<span class="input-group-append">
							<span class="input-group-text colorpicker-input-addon"><i></i></span>
						</span>
					</div>
					@if ($errors->has('tertiary_color'))
						<span id="tertiary_color-error" class="error text-danger" for="input-tertiary_color">{{ $errors->first('tertiary_color') }}</span>
					@endif
                  </div>
                </div>
				   
			 <div class="row">
                   <div class="col-sm-12">
                   <h5>Please write or paste your "FOOTER HTML" code below. You can include images/css/js uploaded in Media here too.</h5>
                    </div>
                   <div class="col-sm-12">
				    <div class="form-group{{ $errors->has('footer_html') ? ' has-danger' : '' }}">
					<textarea id="input-footer_html" name="footer_html" class="form-control{{ $errors->has('footer_html') ? ' is-invalid' : '' }}"  >
                    {{ old('footer_html', ($setting->footer_html)) }}
                    </textarea>
                       @if ($errors->has('footer_html'))
                        <span id="footer_html-error" class="error text-danger" for="input-footer_html">{{ $errors->first('footer_html') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Save Settings') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.ckeditor.com/4.11.4/standard-all/ckeditor.js"></script>
  <script>
  $(function () {
	  $('#primary_color').colorpicker({"color": "{{$setting->primary_color}}"});
	  $('#secondary_color').colorpicker({"color": "{{$setting->secondary_color}}"});
	  $('#tertiary_color').colorpicker({"color": "{{$setting->tertiary_color}}"});
	  $("#maintenance_mode").prop('checked',{{ (1==old('maintenance_mode', $setting->maintenance_mode))?true:false }});
  });
</script>
  <script>
	$(document).ready(function(){
      CKEDITOR.disableAutoInline = true;

	   CKEDITOR.replace(  'input-maintenance_msg' , {
	extraPlugins: 'sourcedialog',
	removePlugins: 'sourcearea'
}); 

  CKEDITOR.replace(  'input-footer_html' , {
	extraPlugins: 'sourcedialog',
	removePlugins: 'sourcearea'
}); 
 
        CKEDITOR.config.allowedContent = true;
	});
  </script>
@endsection
