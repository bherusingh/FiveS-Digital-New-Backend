@extends('layouts.app', ['activePage' => 'blogs', 'titlePage' => __('Blogs Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('blog.update', $blog) }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit Blog') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('blog.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-5 col-form-label">{{ __('Title') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="input-title" type="text" placeholder="{{ __('Title') }}" value="{{ old('title', $blog->title) }}" required="true" aria-required="true"/>
                      @if ($errors->has('title'))
                        <span id="title-error" class="error text-danger" for="input-title">{{ $errors->first('title') }}</span>
                      @endif
                    </div>
                  </div>
                  </div>
                  <div class="row">
                  <label class="col-sm-5 col-form-label">{{ __('Slug of the blog') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('slug') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" id="input-slug" type="text" placeholder="{{ __('Enter Slug In Small Letter With - Seperated') }}" value="{{ old('slug',$blog->slug) }}" required="true" aria-required="true"/>
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
                  @if($blog->img_path)
                    <img src='/../front/public/assets/images/{{$blog->img_path}}' style='max-width:95%;'/>
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
                <div class="row">
                  <label class="col-sm-5 col-form-label">{{ __('Categories (CSV)') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('csv_cats') ? ' has-danger' : '' }}">
                      <!--<input class="form-control{{ $errors->has('csv_cats') ? ' is-invalid' : '' }}" name="csv_cats" id="input-csv_cats" type="text" placeholder="{{ __('Enter Comma-seperated Category names') }}" value="{{ old('csv_cats', $blog->csv_cats) }}" required="true" aria-required="true"/>-->
                      <select class="form-control select2 {{ $errors->has('csv_cats') ? ' is-invalid' : '' }}" name="csv_cats[]" id="input-csv_cats" multiple="multiple" placeholder="Select Category">
						  @foreach($categories as $cid=>$cname)
								<option value='{{ $cid }}' {{ old('csv_cats',in_array($cid,$blogCatIds))  ? 'selected' : '' }}>{{ $cname }}</option>
                          @endforeach
					  </select>
                      @if ($errors->has('csv_cats'))
                        <span id="csv_cats-error" class="error text-danger" for="input-csv_cats">{{ $errors->first('csv_cats') }}</span>
                      @endif
                    </div>
                  </div>
                </div> 
                <div class="row">
                  <label class="col-sm-5 col-form-label">{{ __('Tags (CSV)') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('csv_tags') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('csv_tags') ? ' is-invalid' : '' }}" name="csv_tags" id="input-csv_tags" type="text" placeholder="{{ __('Enter Comma-seperated Tags names') }}" value="{{ old('csv_tags', $blog->csv_tags) }}" required="true" aria-required="true"/>
                      @if ($errors->has('csv_tags'))
                        <span id="csv_tags-error" class="error text-danger" for="input-csv_tags">{{ $errors->first('csv_tags') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class='row'>
					<label class="col-sm-5 col-form-label">{{ __('Blog Page') }}</label>
					<div class="col-sm-7">
						<div class="form-group{{ $errors->has('page_id') ? ' has-danger' : '' }}">
						  <select class="form-control select2 {{ $errors->has('page_id') ? ' is-invalid' : '' }}" name="page_id[]" id="input-page_id" multiple="multiple" placeholder="Select Page">
							@foreach($pages as $pid=>$pname)
								<option value='{{ $pid }}' {{ old('page_id',in_array($pid,$blogPageIds))  ? 'selected' : '' }}>{{ $pname }}</option>
							@endforeach
						  </select>
						  @if ($errors->has('page_id'))
							<span id="page_id-error" class="error text-danger" for="input-page_id">{{ $errors->first('page_id') }}</span>
						  @endif
						</div>
				  </div>
				</div>
				<div class="row">
					<label class="col-sm-5 col-form-label">{{ __('Meta Title') }}</label>
					<div class="col-sm-7">
					  <div class="form-group{{ $errors->has('meta_title') ? ' has-danger' : '' }}">
						<input class="form-control{{ $errors->has('meta_title') ? ' is-invalid' : '' }}" name="meta_title" id="input-meta_title" type="text" placeholder="{{ __('Meta Title') }}" value="{{ old('meta_title',$blog->meta_title) }}" />
					  </div>
					</div>
				</div> 
				<div class="row">
                  <label class="col-sm-5 col-form-label">{{ __('Meta Keywords') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('meta_keywords') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('meta_keywords') ? ' is-invalid' : '' }}" name="meta_keywords" id="input-meta_keywords" type="text" placeholder="{{ __('Meta Keywords') }}" value="{{ old('meta_keywords', $blog->meta_keywords) }}"/>
                      @if ($errors->has('meta_keywords'))
                        <span id="meta_keywords-error" class="error text-danger" for="input-meta_keywords">{{ $errors->first('meta_keywords') }}</span>
                      @endif
                    </div>
                  </div>
				</div> 
				<div class="row">
                  <label class="col-sm-5 col-form-label">{{ __('Meta Description') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('meta_desc') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('meta_desc') ? ' is-invalid' : '' }}" name="meta_desc" id="input-meta_desc" type="text" placeholder="{{ __('Meta Description') }}" value="{{ old('meta_desc', $blog->meta_desc) }}"/>
                      @if ($errors->has('meta_desc'))
                        <span id="meta_desc-error" class="error text-danger" for="input-meta_desc">{{ $errors->first('meta_desc') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
				<div class="row">
					<label class="col-sm-5 col-form-label">{{ __('Meta Robot') }}</label>
					<div class="col-sm-7">
					  <div class="form-group{{ $errors->has('robots') ? ' has-danger' : '' }}">
						  <div class="col-sm-6" style="float:left;">
							  <input class="form-check-input" type="checkbox" name="robots[]" id="chk_follow" value="nofollow" @if(is_array(old('robots',$blog->robots)) && in_array('nofollow', old('robots',$blog->robots))) checked @endif> 
							  <label for="chk_follow">No Follow</label>
						  </div>
						  <div class="col-sm-6" style="float:left;">	
							  <input class="form-check-input" type="checkbox" name="robots[]" id="chk_index" value="noindex" @if(is_array(old('robots',$blog->robots)) && in_array('noindex', old('robots',$blog->robots))) checked @endif> 
							  <label for="chk_index">No Index</label>
						  </div>
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
                    {{ old('html', ($blog->html)) }}
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
	// $("#input-status").val('{{ old('status', $blog->status) }}');
      CKEDITOR.disableAutoInline = true;

	   CKEDITOR.replace(  'input-html' , {
	extraPlugins: 'sourcedialog',
	removePlugins: 'sourcearea'
}); 
CKEDITOR.config.allowedContent = true;

 
	});
	$(".select2").select2();
  </script>
@endsection
