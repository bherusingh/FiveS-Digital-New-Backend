@extends('layouts.app', ['activePage' => 'pages', 'titlePage' => __('Page Management')])

@section('content')
<link rel='stylesheet' href='../../nestable/nestable.css'/>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('page.update', $page) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit Page') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('page.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>
				<div class="row">
                  <div class="col-md-9">
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-10">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name', $page->name) }}" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
				</div>
				<div class="row">
					<label class="col-sm-2 col-form-label">{{ __('Title') }}</label>
					<div class="col-sm-10">
					  <div class="form-group{{ $errors->has('meta_title') ? ' has-danger' : '' }}">
						<input class="form-control{{ $errors->has('meta_title') ? ' is-invalid' : '' }}" name="meta_title" id="input-meta_title" type="text" placeholder="{{ __('Meta Title') }}" value="{{ old('meta_title',$page->meta_title) }}" />
					  </div>
					</div>
				</div> 
				<div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Keywords') }}</label>
                  <div class="col-sm-10">
                    <div class="form-group{{ $errors->has('meta_keywords') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('meta_keywords') ? ' is-invalid' : '' }}" name="meta_keywords" id="input-meta_keywords" type="text" placeholder="{{ __('Meta Keywords') }}" value="{{ old('meta_keywords', $page->meta_keywords) }}" required="true" aria-required="true"/>
                      @if ($errors->has('meta_keywords'))
                        <span id="meta_keywords-error" class="error text-danger" for="input-meta_keywords">{{ $errors->first('meta_keywords') }}</span>
                      @endif
                    </div>
                  </div>
				</div>
				<div class="row">
					<label class="col-sm-2 col-form-label">{{ __('Robot') }}</label>
					<div class="col-sm-10">
					  <div class="form-group{{ $errors->has('robots') ? ' has-danger' : '' }}">
						  <div class="col-sm-6" style="float:left;">
							  <input class="form-check-input" type="checkbox" name="robots[]" id="chk_follow" value="nofollow" @if(is_array(old('robots',$page->robots)) && in_array('nofollow', old('robots',$page->robots))) checked @endif> 
							  <label for="chk_follow">No Follow</label>
						  </div>
						  <div class="col-sm-6" style="float:left;">	
							  <input class="form-check-input" type="checkbox" name="robots[]" id="chk_index" value="noindex" @if(is_array(old('robots',$page->robots)) && in_array('noindex', old('robots',$page->robots))) checked @endif> 
							  <label for="chk_index">No Index</label>
						  </div>
					  </div>
					</div>
				  </div> 
				<div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                  <div class="col-sm-10">
                    <div class="form-group{{ $errors->has('meta_desc') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('meta_desc') ? ' is-invalid' : '' }}" name="meta_desc" id="input-meta_desc" type="text" placeholder="{{ __('Meta Description') }}" value="{{ old('meta_desc', $page->meta_desc) }}" required="true" aria-required="true"/>
                      @if ($errors->has('meta_desc'))
                        <span id="meta_desc-error" class="error text-danger" for="input-meta_desc">{{ $errors->first('meta_desc') }}</span>
                      @endif
                    </div>
                  </div>
                </div> 
				<div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Status') }}</label>
                  <div class="col-sm-10">
                    <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status" id="input-status"   placeholder="{{ __('Status') }}"  required>
					  <option value="Active" @if(old('status',$page->status) == "Active") selected @endif)>Active</option>
					  <option value="Inactive" @if(old('status',$page->status) == "Inactive") selected @endif)>Inactive</option>
					  </select>
                      @if ($errors->has('status'))
                        <span id="status-error" class="error text-danger" for="input-status">{{ $errors->first('status') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
				<div class="row">
				<div class="col-sm-12">
				<h2>Page Sections</h2>
					<div class="accordion" id="accordionExample">
					 
					</div>
				 
				</div>
				</div>
                </div>
				<div class="col-md-3">
				<h4>Elements</h4>
				<p>Please add Elements from here to Sections and then you can edit them.</p>
				<div class="dd">			
					<ol class="dd-list nav nav-stacked">	
					</ol>
				</div> 
				</div>
				</div>
				</div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Save Page') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
				$( function() {
					$( "#accordionExample" ).sortable();
				  } );
				</script>
<script src="https://cdn.ckeditor.com/4.11.4/standard-all/ckeditor.js"></script>

<!--<script src="https://cdn.tiny.cloud/1/r00mah5ok3hkawyrksf7anmnzeex56nbbrrbmgse11mcfjcq/tinymce/5/tinymce.min.js"></script> //-->
	 <script type="text/javascript"> 
  var Elements=[];
  var iSec=0;
  function addSection(elID){
 	var el2Add=Elements.find(e=>e.id==elID);
	
 	if(el2Add)
	{
		var c = '<div class="card bg-primary m-0 p-0"> <div id="heading'+iSec+'"><div class="pull-right"><a class="btn btn-link btn-danger" href="#" onclick="$(this).closest(\'.card\').remove();">[<i class="fa fa-close"></i>]</a></div> <a href="#" class="text-white"><h5 class="m-1 p-1"   data-toggle="collapse" data-target="#collapse'+iSec+'" aria-expanded="false" aria-controls="collapseOne">'+el2Add.name+'</h5></a> </div> <div id="collapse'+iSec+'" class="collapse m-0 p-1 bg-white text-secondary" aria-labelledby="heading'+iSec+'" data-parent="#accordionExample"><textarea id="txt'+iSec+'" class="form-control" name="html'+iSec+'"></textarea><input id="nm'+iSec+'" type="hidden" name="nm'+iSec+'" value="'+el2Add.name+'"/></div> </div>'; 
	
		$("#accordionExample").append(c); 

		CKEDITOR.disableAutoInline = true;

	   CKEDITOR.replace(  'txt'+iSec+'' , {
	extraPlugins: 'sourcedialog',
	removePlugins: 'sourcearea'
}); 
 
        CKEDITOR.config.allowedContent = true;
        CKEDITOR.dtd.a.div = 1;
        CKEDITOR.dtd.a.p = 1;
CKEDITOR.instances['txt'+iSec].setData(el2Add.html);
/*
$("textarea#txt"+iSec).html(el2Add.html);

tinymce.init({
  selector: "textarea#txt"+iSec,
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
});
*/
		iSec++;
	}	
  }
$(function() {
	 $("#input-status").val('{{ old('status', $page->status) }}');
$.ajax({
	   url: '../../page/getSections/{{$page->id}}',
	   type: 'get',
	   dataType: 'json',
	   success: function(r){
		   Sections=r['sections'].slice(0);
		   for(var i=0; i<Sections.length; i++){
				var c = '<div class="card bg-primary m-0 p-0"> <div id="heading'+iSec+'"><div class="pull-right"><a class="btn btn-link btn-danger" href="#" onclick="$(this).closest(\'.card\').remove();">[<i class="fa fa-close"></i>]</a></div> <a href="#" class="text-white"><h5 class="m-1 p-1"   data-toggle="collapse" data-target="#collapse'+iSec+'" aria-expanded="false" aria-controls="collapseOne">'+Sections[i].name+'</h5></a> </div> <div id="collapse'+iSec+'" class="collapse m-0 p-1 bg-white text-secondary" aria-labelledby="heading'+iSec+'" data-parent="#accordionExample"><textarea id="txt'+iSec+'" class="form-control" name="html'+iSec+'"></textarea><input id="nm'+iSec+'" type="hidden" name="nm'+iSec+'" value="'+Sections[i].name+'"/></div> </div>'; 
	
		$("#accordionExample").append(c); 
CKEDITOR.disableAutoInline = true;

	   CKEDITOR.replace(  'txt'+iSec+'' , {
	extraPlugins: 'sourcedialog',
	removePlugins: 'sourcearea'
}); 
 
        CKEDITOR.config.allowedContent = true;
        CKEDITOR.dtd.a.div = 1;
        CKEDITOR.dtd.a.p = 1;
		CKEDITOR.instances['txt'+iSec].setData(Sections[i].html);
/*
$("textarea#txt"+iSec).html(Sections[i].html);

tinymce.init({
  selector: "textarea#txt"+iSec,
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
});
*/
		iSec++;
			}
		}
	});
	
	$.ajax({
	   url: '../../element/getElements',
	   type: 'get',
	   dataType: 'json',
	   success: function(r){
		   Elements=r['data'].slice(0);
		   for(var i=0; i<r['data'].length; i++){
				var option = '<li class="panel dd-item nested-list-item"><div class="dd-handle nested-list-handle" onclick="addSection('+r['data'][i].id+')"><i class="fa fa-plus"></i></div><div class="nested-list-content">'+r['data'][i].name+'</div></li>'; 

				$(".dd-list").append(option); 
			}
		}
	});
});
</script>
@endsection