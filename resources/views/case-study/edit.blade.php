@extends('layouts.app', ['activePage' => 'case study', 'titlePage' => __('Case Study Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('case-study.update', $caseStudy) }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit Case Study') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('case-study.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-5 col-form-label">{{ __('Title') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="input-title" type="text" placeholder="{{ __('Title') }}" value="{{ old('title', $caseStudy->title) }}" required="true" aria-required="true"/>
                      @if ($errors->has('title'))
                        <span id="title-error" class="error text-danger" for="input-title">{{ $errors->first('title') }}</span>
                      @endif
                    </div>
                  </div>
                  </div>
                  <div class="row">
                  <label class="col-sm-5 col-form-label">{{ __('Slug') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('slug') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" id="input-slug" type="text" placeholder="{{ __('Enter Slug In Small Letter With - Seperated') }}" value="{{ old('slug',$caseStudy->slug) }}" required="true" aria-required="true"/>
                      @if ($errors->has('slug'))
                        <span id="slug-error" class="error text-danger" for="input-slug">{{ $errors->first('slug') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
					<label class="col-sm-3 col-form-label">{{ __('Featured Image') }}</label>
						<div class="col-sm-7">
							<div class="fileinput fileinput-new text-center" data-provides="fileinput">
								<div class="fileinput-preview fileinput-exists thumbnail img-raised">
									@if($caseStudy->img_path)
										<img src='/../front/public/assets/images/{{$caseStudy->img_path}}' style='max-width:95%;'/>
									@endif  
								</div>
								<div>
									<span class="btn btn-raised btn-round btn-rose btn-file">
										<input type="file" name="img_path" />
									</span>
								</div>
								@if ($errors->has('img_path'))
									<span id="img_path-error" class="error text-danger" for="input-img_path">{{ $errors->first('img_path') }}</span>
								@endif
							</div>
					  </div>
                </div>
				<input type='hidden' value="{{ old('old_img_path',$caseStudy->img_path) }}" name="old_img_path">
				<div class="row">
                  <label class="col-sm-5 col-form-label">{{ __('Industry') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('industry') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('industry') ? ' is-invalid' : '' }}" name="industry" id="input-industry" placeholder="Select Industry">
						<option value='' selected>Select Industry</option>
						@foreach($industryData as $inid=>$inname)
							<option value='{{ $inid }}' @if($inid == $caseStudy->industry) selected @endif>{{ $inname }}</option>
						@endforeach
					  </select>
					  @if ($errors->has('industry'))
                        <span id="industry-error" class="error text-danger" for="input-industry">{{ $errors->first('industry') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-5 col-form-label">{{ __('Categories') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('category') ? ' has-danger' : '' }}">
					  <select class="form-control select2 {{ $errors->has('category') ? ' is-invalid' : '' }}" name="category[]" id="input-category" placeholder="Select Category" required="true" aria-required="true" multiple="multiple">
						@foreach($categoryData as $cid=>$cname)
							<option value='{{ $cid }}' {{ old('category',in_array($cid,$caseStudy->category))  ? 'selected' : '' }}>{{ $cname }}</option>
						@endforeach
					  </select>
                      @if ($errors->has('category'))
                        <span id="category-error" class="error text-danger" for="input-category">{{ $errors->first('category') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-5 col-form-label">{{ __('Tag') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('tag') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('tag') ? ' is-invalid' : '' }}" name="tag" id="input-tag" type="text" placeholder="{{ __('Tag') }}" value="{{ old('tag',$caseStudy->tag) }}" required="true" aria-required="true"/>
                      @if ($errors->has('tag'))
                        <span id="tag-error" class="error text-danger" for="input-tag">{{ $errors->first('tag') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class='row'>
					<label class="col-sm-5 col-form-label">{{ __('Case Study Page') }}</label>
					<div class="col-sm-7">
						<div class="form-group{{ $errors->has('page_id') ? ' has-danger' : '' }}">
						  <select class="form-control select2 {{ $errors->has('page_id') ? ' is-invalid' : '' }}" name="page_id[]" id="input-page_id" multiple="multiple" placeholder="Select Page">
							@foreach($pages as $pid=>$pname)
								<option value='{{ $pid }}' {{ old('page_id',in_array($pid,$caseStudypageids))  ? 'selected' : '' }}>{{ $pname }}</option>
							@endforeach
						  </select>
						  @if ($errors->has('page_id'))
							<span id="page_id-error" class="error text-danger" for="input-page_id">{{ $errors->first('page_id') }}</span>
						  @endif
						</div>
				  </div>
				</div>
                <div class="row">
                  <label class="col-sm-5 col-form-label">{{ __('Meta Keyword') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('meta_keyword') ? ' has-danger' : '' }}">
                      <textarea class="form-control{{ $errors->has('meta_keyword') ? ' is-invalid' : '' }}" name="meta_keyword" id="input-meta_keyword" type="text" placeholder="{{ __('Meta Keyword') }}">{{ old('meta_keyword',$caseStudy->meta_keyword) }}</textarea>
                      @if ($errors->has('meta_keyword'))
                        <span id="meta_keyword-error" class="error text-danger" for="input-meta_keyword">{{ $errors->first('meta_keyword') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
				<div class="row">
                  <label class="col-sm-5 col-form-label">{{ __('Meta Description') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('meta_description') ? ' has-danger' : '' }}">
                      <textarea class="form-control{{ $errors->has('meta_description') ? ' is-invalid' : '' }}" name="meta_description" id="input-meta_description" placeholder="{{ __('Meta Description') }}">{{ old('meta_description',$caseStudy->meta_description) }}</textarea>
                      @if ($errors->has('meta_description'))
                        <span id="meta_description-error" class="error text-danger" for="input-meta_description">{{ $errors->first('meta_description') }}</span>
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
					<textarea id="input-html" name="html" class="form-control{{ $errors->has('html') ? ' is-invalid' : '' }}" required="true" aria-required="true"/ >
                    {{ old('html', ($caseStudy->html)) }}
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
  <script src="https://cdn.ckeditor.com/4.11.4/standard-all/ckeditor.js"></script>
  <script>
	$(document).ready(function(){
      CKEDITOR.disableAutoInline = true;

	   CKEDITOR.replace(  'input-html' , {
	extraPlugins: 'sourcedialog',
	removePlugins: 'sourcearea'
}); 
CKEDITOR.config.allowedContent = true;
	$(".select2").select2();
 
	});
	 $('#input-slug').focus(function() {
     var slug = $('#input-title').val();
     var slug = slug.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-').toLowerCase();
	 var slug =  slug.replace("--", "-");
	 $('#input-slug').val(slug);
  });
  </script>
@endsection
