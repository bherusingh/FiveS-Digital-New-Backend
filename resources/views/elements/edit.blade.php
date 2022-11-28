@extends('layouts.app', ['activePage' => 'elements', 'titlePage' => __('Elements Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('element.update', $element) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit Element') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('element.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-5 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name', $element->name) }}" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                  </div>
                  <div class="row">
                   <div class="col-sm-12">
                   <h5>Please write or paste your HTML code below. You can include images/css/js uploaded in Media here too.</h5>
                    </div>
                   <div class="col-sm-12">
				    <div class="form-group{{ $errors->has('html') ? ' has-danger' : '' }}">
					<textarea id="input-html" name="html" class="form-control{{ $errors->has('html') ? ' is-invalid' : '' }}"  >
                    {{ old('html', ($element->html)) }}
                    </textarea>
                       @if ($errors->has('html'))
                        <span id="html-error" class="error text-danger" for="input-html">{{ $errors->first('html') }}</span>
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
  <!--<script src="https://cdn.tiny.cloud/1/r00mah5ok3hkawyrksf7anmnzeex56nbbrrbmgse11mcfjcq/tinymce/5/tinymce.min.js"></script>//-->
  <script src="https://cdn.ckeditor.com/4.11.4/standard-all/ckeditor.js"></script>

  <script>
  $(document).ready(function() {

  CKEDITOR.disableAutoInline = true;

	   CKEDITOR.replace(  'input-html' , {
	extraPlugins: 'sourcedialog',
	removePlugins: 'sourcearea'
}); 
 
        CKEDITOR.config.allowedContent = true;

//CKEDITOR.instances['input-html'].setData(el2Add.html);
/*
    

var demoBaseConfig = {
  selector: "textarea#input-html",
  height: 500,
  resize: false,
  autosave_ask_before_unload: true,
  powerpaste_allow_local_images: true,
  plugins: [
    "a11ychecker advcode advlist anchor autolink codesample fullscreen help image ",
    " lists link media noneditable powerpaste preview",
    " searchreplace table tinymcespellchecker visualblocks wordcount mentions"
  ],
  toolbar:
    "a11ycheck undo redo | bold italic | forecolor backcolor | codesample | alignleft aligncenter alignright alignjustify | bullist numlist | link image",
  content_css: [
    "//fonts.googleapis.com/css?family=Lato:300,300i,400,400i",
    "//www.tiny.cloud/css/content-standard.min.css"
  ],
};

tinymce.init(demoBaseConfig);
*/

});

  </script>

@endsection
