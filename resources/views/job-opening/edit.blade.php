@extends('layouts.app', ['activePage' => 'job opening', 'titlePage' => __('Jobs Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('job-opening.update', $jobOpening->id) }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit Job') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('job-opening.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>
				<div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Location') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <select class='form-control' name='location' required="true" aria-required="true">
						<option value='' selected>Select Location</option>
						@foreach($locations as $lid=>$lnm)
							<option value="{{$lid}}" @if(old('location',$jobOpening->location) == $lid) selected @endif>{{$lnm}}</option>
						@endforeach
					  </select>
                      @if ($errors->has('location'))
                        <span id="location-error" class="error text-danger" for="input-location">{{ $errors->first('location') }}</span>
                      @endif
                    </div>
                  </div>
				  <label class="col-sm-2 col-form-label">{{ __('Department') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <select class='form-control department' name='department' required="true" aria-required="true">
						<option value='' selected>Select Department</option>
						@foreach($departments as $dpid=>$dpnm)
							<option value="{{$dpid}}" @if(old('department',$jobOpening->department) == $dpid) selected @endif>{{$dpnm}}</option>
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
					  <select class='form-control designation' name='designation' required="true" aria-required="true">
						<option value='' selected>Select Designation</option>
						@foreach($designations as $dgid=>$dgnm)
							<option value="{{$dgid}}" @if(old('designation',$jobOpening->designation) == $dgid) selected @endif>{{$dgnm}}</option>
						@endforeach
					  </select>
                      @if ($errors->has('designation'))
                        <span id="title-error" class="error text-danger" for="input-designation">{{ $errors->first('designation') }}</span>
                      @endif
                    </div>
                  </div>
				  <label class="col-sm-2 col-form-label">{{ __('Experience') }}</label>
                  <div class="col-sm-2">
                    <div class="form-group{{ $errors->has('min_experience') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('min_experience') ? ' is-invalid' : '' }}" name="min_experience" id="input-min_experience" type="number" placeholder="{{ __('Min') }}" value="{{ old('min_experience',$jobOpening->min_experience) }}" required="true" aria-required="true"/>
                      @if ($errors->has('min_experience'))
                        <span id="min_experience-error" class="error text-danger" for="input-min_experience">{{ $errors->first('min_experience') }}</span>
                      @endif
                    </div>
                  </div>
				  <div class="col-sm-2">
                    <div class="form-group{{ $errors->has('max_experience') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('max_experience') ? ' is-invalid' : '' }}" name="max_experience" id="input-max_experience" type="number" placeholder="{{ __('Max') }}" value="{{ old('max_experience',$jobOpening->max_experience) }}" required="true" aria-required="true"/>
                      @if ($errors->has('max_experience'))
                        <span id="max_experience-error" class="error text-danger" for="input-max_experience">{{ $errors->first('max_experience') }}</span>
                      @endif
                    </div>
                  </div>
				  <label class="col-sm-2 col-form-label">{{ __('Total Post') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('count') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('count') ? ' is-invalid' : '' }}" name="count" id="input-count" type="number" placeholder="{{ __('Total Post') }}" value="{{ old('count',$jobOpening->count) }}" required="true" aria-required="true"/>
                      @if ($errors->has('count'))
                        <span id="count-error" class="error text-danger" for="input-count">{{ $errors->first('count') }}</span>
                      @endif
                    </div>
                  </div>
				  <label class="col-sm-2 col-form-label">{{ __('Status') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('is_active') ? ' has-danger' : '' }}">
					  <select class='form-control' name='is_active' required="true" aria-required="true">
						<option value='1' @if(old('is_active',$jobOpening->is_active) == 1) selected @endif>Active</option>
						<option value='0' @if(old('is_active',$jobOpening->is_active) == 0) selected @endif>Deactive</option>
					  </select>	
					  @if ($errors->has('is_active'))
                        <span id="is_active-error" class="error text-danger" for="input-is_active">{{ $errors->first('is_active') }}</span>
                      @endif
                    </div>
                  </div>
				  <label class="col-sm-2 col-form-label">{{ __('Post Start Date') }}</label>
				  <div class="col-sm-4">
					<div class="form-group {{ $errors->has('start_date') ? ' has-danger' : '' }}">
						<input class="form-control{{ $errors->has('start_date') ? ' is-invalid' : '' }}" name="start_date" id="input-start_date" type="date" placeholder="{{ __('Start Date') }}" value="{{ old('start_date',$jobOpening->start_date) }}">
						@if ($errors->has('start_date'))
							<span id="start_date-error" class="error text-danger" for="input-start_date">{{ $errors->first('start_date') }}</span>
						@endif
					</div>
				  </div>
				  <label class="col-sm-2 col-form-label">{{ __('Post End Date') }}</label>
				  <div class="col-sm-4">
					<div class="form-group {{ $errors->has('end_date') ? ' has-danger' : '' }}">
						<input class="form-control{{ $errors->has('end_date') ? ' is-invalid' : '' }}" name="end_date" id="input-end_date" type="date" placeholder="{{ __('End Date') }}" value="{{ old('end_date',$jobOpening->end_date) }}">
						@if ($errors->has('end_date'))
							<span id="end_date-error" class="error text-danger" for="input-end_date">{{ $errors->first('end_date') }}</span>
						@endif
					</div>
				  </div>
				  <label class="col-sm-2 col-form-label">{{ __('Apply Form Link') }}</label>
				  <div class="col-sm-10">
					<div class="form-group {{ $errors->has('apply_form_link') ? ' has-danger' : '' }}">
						<input class="form-control{{ $errors->has('apply_form_link') ? ' is-invalid' : '' }}" name="apply_form_link" id="input-apply_form_link" type="text" placeholder="{{ __('Apply Form Link') }}" value="{{ old('apply_form_link',$jobOpening->apply_form_link) }}">
						@if ($errors->has('apply_form_link'))
							<span id="apply_form_link-error" class="error text-danger" for="input-apply_form_link">{{ $errors->first('apply_form_link') }}</span>
						@endif
					</div>
				  </div>
				  <label class="col-sm-2 col-form-label">{{ __('Short Description') }}</label>
                  <div class="col-sm-10">
                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="input-description" type="text" placeholder="{{ __('Short Description') }}" value="{{ old('description',$jobOpening->description) }}" required="true" aria-required="true"/>
                      @if ($errors->has('description'))
                        <span id="description-error" class="error text-danger" for="input-description">{{ $errors->first('description') }}</span>
                      @endif
                    </div>
                  </div>
				  <label class="col-sm-2 col-form-label">{{ __('Job Description Points') }} <a href="#" id="addSummaryPoint" class='btn btn-sm btn-primary'><i class='fa fa-plus'></i> Add More</a></label>
				  <div class='col-sm-10'>
					<div class="form-group summary_points-inputs {{ $errors->has('summary_points.*') ? ' has-danger' : '' }}">
						@if(!empty($jobOpening->summary_points))
							@foreach($jobOpening->summary_points as $k=>$summary)
							<input type="text" class="form-control" name="summary_points[]" placeholder="" value="{{ $summary }}" id="summary_points_{{$k}}">
							@endforeach
						@else	
							<input type="text" class="form-control" name="summary_points[]" placeholder="" id="summary_points_1">
						@endif
					</div>
					<a href="#" id="removeSummaryPoint" class='pull-right' style='margin-top:-10px;'><i class='fa fa-close'></i></a>
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
  <script>
	$(document).ready(function(){
		//$(".department").change();
	});
	$('#addSummaryPoint').on('click',function (e) {
		e.preventDefault();
		var length = $('input[name="summary_points[]"]').length + 1;
		$('.summary_points-inputs').append("\n"+"<input type='text' class='form-control' name='summary_points[]' placeholder='' id='summary_points_"+length+"'>");
	});
	$(".department").change(function() {
		var department = $(this).val();
		$.ajax({
			type:'POST',
			url:'{{ route('job-opening-designation') }}',
			data:{'department':department},
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			cache: false,
			success:function(data){
				if(data.status == 'success'){
					$('.designation option').remove();
					$('.designation').append(data.html);
					$(".designation option[value='{{ old("designation") }}']").attr('selected', 'selected');
				}
			}
		});
	});
	$('#removeSummaryPoint').on('click',function (e) {
		e.preventDefault();
		var length = $('input[name="summary_points[]"]').length;
		$('#summary_points_'+length).remove();
	});
  </script>
@endsection
