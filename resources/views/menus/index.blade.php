@extends('layouts.app', ['activePage' => 'menus', 'titlePage' => __('Menu Management')])

@section('content')
<link rel='stylesheet' href='./nestable/nestable.css'/>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Menu Management') }}</h4>
              </div>
              <div class="card-body">
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
					<div class="row">
						<div class="col-sm-6">
							<p>Drag items to change order & click SAVE MENU ORDER</p>
							<div class="ajaxResponse">&nbsp;</div>

							<div class="dd" id="nestable">
							{!! $menuTree !!}
							</div>
							<div class="ml-auto mr-auto">
								<button type="submit" id="saveMenuOrder" class="btn btn-primary">{{ __('SAVE MENU ORDER') }}</button>
							</div>
						</div>
						<div class="col-sm-6">
							<form method="post" action="{{ route('menu.store') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
								@csrf
								@method('post')
							
								<div class="row">
								  <label class="col-sm-3 col-form-label">{{ __('Text') }}</label>
								  <div class="col-sm-7">
									<div class="form-group{{ $errors->has('text') ? ' has-danger' : '' }}">
									  <input class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" name="text" id="input-text" type="text" placeholder="{{ __('Text') }}" value="{{ old('text') }}" required="true" aria-required="true"/>
									  <input type="hidden" name="sort_order" value="0" />
									  <input type="hidden" name="id" value="0" />
									
									  @if ($errors->has('text'))
										<span id="text-error" class="error text-danger" for="input-text">{{ $errors->first('text') }}</span>
									  @endif
									</div>
								  </div>
								</div>  
								  <div class="row">
								  <label class="col-sm-3 col-form-label">{{ __('FA Icon') }}</label>
								  <div class="col-sm-7">
									<div class="form-group{{ $errors->has('icon') ? ' has-danger' : '' }}">
									  <input class="form-control{{ $errors->has('icon') ? ' is-invalid' : '' }}" name="icon" id="input-icon" type="text" placeholder="{{ __('Icon') }}" value="{{ old('icon') }}"/>
									  @if ($errors->has('icon'))
										<span id="icon-error" class="error icon-danger" for="input-icon">{{ $errors->first('icon') }}</span>
									  @endif
									</div>
								  </div>
								</div>
							   <div class="row">
								  <label class="col-sm-3 col-form-label">{{ __('Or Image') }}</label>
								  <div class="col-sm-7">
								  <div class="fileinput fileinput-new text-center" data-provides="fileinput">
									<div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
									<div>
									<span class="btn btn-raised btn-round btn-rose btn-file">
									<input type="file" name="img_path" />
									</span>
									</div>
									</div>
								  </div>
								</div>
								<div class="row">
								  <div class="col-sm-3"></div>
								  <div class="col-sm-7">
									<div class="form-group{{ $errors->has('new_tab') ? ' has-danger' : '' }}">
									  <input class="form-check-input{{ $errors->has('new_tab') ? ' is-invalid' : '' }}" type="checkbox" name="new_tab" value="new_tab"  /> <label  >{{ __('Open In New Tab') }}</label>
									   @if ($errors->has('new_tab'))
										<span id="new_tab-error" class="error text-danger" for="input-new_tab">{{ $errors->first('new_tab') }}</span>
									  @endif
									</div>
								  </div>
								</div>
								 <div class="row">
								  <label class="col-sm-3 col-form-label">{{ __('Parent Menu') }}</label>
								  <div class="col-sm-7">
									  <select id="selMenu" class="form-control" name="parent_id">
									  <option value=''>-Select-</option>
									  </select>
								  </div>
								</div>
								<div class="row">
								  <label class="col-sm-3 col-form-label">{{ __('Linked Page') }}</label>
								  <div class="col-sm-7">
										<select id="selPage" class="form-control" name="page_id">
										<option value=''>-Select-</option>
										  </select>
								  </div>
								</div>
								<div class="row">
								  <label class="col-sm-3 col-form-label">{{ __('OR URL') }}</label>
								  <div class="col-sm-7">
									<div class="form-group{{ $errors->has('url') ? ' has-danger' : '' }}">
									  <input class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}" name="url" id="input-url" type="text" placeholder="{{ __('URL') }}" value="{{ old('url') }}" />
									  @if ($errors->has('url'))
										<span id="url-error" class="error url-danger" for="input-url">{{ $errors->first('url') }}</span>
									  @endif
									</div>
								  </div>
								</div>
								<div class="row">
								  <label class="col-sm-3 col-form-label">{{ __('Short Description') }}</label>
								  <div class="col-sm-7">
									<div class="form-group{{ $errors->has('url') ? ' has-danger' : '' }}">
									  <textarea class="form-control{{ $errors->has('short_description') ? ' is-invalid' : '' }}" name="short_description" id="input-short_description" placeholder="{{ __('Short Description') }}" rows="4">{{ old('short_description') }}</textarea>
									  @if ($errors->has('short_description'))
										<span id="short_description-error" class="error short_description-danger" for="input-short_description">{{ $errors->first('short_description') }}</span>
									  @endif
									</div>
								  </div>
								</div>
								<input type='hidden' id='input-old_img_path' value='' name='old_img_path'>
							  <div class="ml-auto mr-auto">
								<button type="submit" class="btn btn-tertiary">{{ __('Save Menu') }}</button>
							  </div>
						  </form>
						</div>
					</div>
				</div>
			</div>
        </div>
      </div>
    </div>
  </div>
 
<script type="text/javascript" src='./nestable/jquery.nestable.js'>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#saveMenuOrder").click(function(e){
			e.preventDefault();
			$.ajax({
				type:'POST',
				url:'./menu/saveOrder',// /front/public
				data: {
                list: $('.dd').nestable('serialize')
				},
				success:function(data){
					$(".ajaxResponse").append("<div class='text-"+data.r+"'>"+data.msg+"</div>");
					//$(".btn-primary").show();
				} 
			}); 
		});
	});

function buildSelect(_menu, _parentid,_preFix) 
{ 
	var _menuFilter=_menu.filter(m=>m.parent_id==_parentid);
	if(_parentid==0)
		_menuFilter=_menu.filter(m=>!m.parent_id);
		
	for(var i=0; i<_menuFilter.length; i++){
		var id = _menuFilter[i].id;
		var name = _menuFilter[i].text;

		var option = "<option value='"+id+"'>"+_preFix+name+"</option>"; 

		$("#selMenu").append(option); 
		
		buildSelect(_menu,id,_preFix+"-");
	}
} 
function getQSValue (key) {  
  return decodeURIComponent(window.location.search.replace(new RegExp("^(?:.*[&\\?]" + encodeURIComponent(key).replace(/[\.\+\*]/g, "\\$&") + "(?:\\=([^&]*))?)?.*$", "i"), "$1"));  
}  
$(function() {
	
	$.ajax({
	   url: './menu/getMenuOptions',
	   type: 'get',
	   dataType: 'json',
	   success: function(response){

		 var len = 0;
		 if(response['data'] != null){
		   len = response['data'].length;
		 }

		 if(len > 0){
		   // Read data and create <option >
		  buildSelect(response['data'],0,"");
		 }
		 
		 if(getQSValue('id')>0)
		{
			$.ajax({
			   url: './menu/getMenuInfo/'+getQSValue('id'),
			   type: 'get',
			   dataType: 'json',
			   success: function(r){
					$("input[name=id]").val(r['data'].id);
					//$("input[name=img_path]").val(r['data'].img_path);
					if(r['data'].img_path)
						$(".fileinput-preview").html("<img src='/uploads/"+r['data'].img_path+"' style='max-width:95%;'/>");
					$("input[name=new_tab]").prop('checked',(r['data'].new_tab==1)?true:false);
					$("select[name=page_id]").val(r['data'].page_id);
					$("input[name=url]").val(r['data'].url);
					$("select[name=parent_id]").val(r['data'].parent_id);
					$("input[name=sort_order]").val(r['data'].sort_order);
					$("input[name=text]").val(r['data'].text);
					$("textarea[name=short_description]").val(r['data'].short_description);
					$("input[name=old_img_path]").val(r['data'].img_path);
				}
			});
		}
	   }
	});
	
	$.ajax({
	   url: './page/getPageOptions',
	   type: 'get',
	   dataType: 'json',
	   success: function(response){
		   for(var i=0; i<response['data'].length; i++){
				var id = response['data'][i].id;
				var name = response['data'][i].name;

				var option = "<option value='"+id+"'>"+name+"</option>"; 

				$("#selPage").append(option); 
			}
		}
	});
	
	
  $('.dd').nestable({ 
    dropCallback: function(details) {
       
       var order = new Array();
       $("li[data-id='"+details.destId +"']").find('ol:first').children().each(function(index,elem) {
         order[index] = $(elem).attr('data-id');
       });

       if (order.length === 0){
        var rootOrder = new Array();
        $("#nestable > ol > li").each(function(index,elem) {
          rootOrder[index] = $(elem).attr('data-id');
        });
       }
	//console.log(   $('.dd').nestable('serialize'));
     }
   });

  $('.delete_toggle').each(function(index,elem) {
      $(elem).click(function(e){
        e.preventDefault();
        $('#postvalue').attr('value',$(elem).attr('rel'));
        $('#deleteModal').modal('toggle');
      });
  });
});
</script>
@endsection
