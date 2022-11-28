@extends('layouts.app', ['activePage' => 'event', 'titlePage' => __('Event Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
			<form method="post" action="{{ route('event-video-upload') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('post')
				<div class="card">
				  <div class="card-header card-header-primary">
					<h4 class="card-title ">{{ __('Event Video Upload') }}</h4>
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
						<div class="col-md-12 text-right">
							<a href="{{ route('event.index') }}" class="btn btn-sm btn-primary">{{ __('Back to Event list') }}</a>
						</div>
					</div>
					<div class="row">
						<label class="col-sm-2 col-form-label">{{ __('Event Video Type') }}</label>
						<div class="col-sm-4">
						   <div class="form-group{{ $errors->has('video_type') ? ' has-danger' : '' }}">
							  <select class="form-control{{ $errors->has('video_type') ? ' is-invalid' : '' }}" name="video_type" id="input-video_type" placeholder="Select Video Type">
								<option value='' selected>Select Video Type</option>
								<option value='manual' {{ old('video_type') == 'manual' ? 'selected' : '' }}>Manual</option>
								<option value='youtube' {{ old('video_type') == 'youtube' ? 'selected' : '' }}>Youtube</option>
								</select>
							  @if ($errors->has('video_type'))
								<span id="video_type-error" class="error text-danger" for="input-video_type">{{ $errors->first('video_type') }}</span>
							  @endif
							</div>
						</div>
						<label class="col-sm-2 col-form-label">{{ __('Event Video') }}</label>
						<div class="col-sm-4">
							<div class="manual_video hide fileinput fileinput-new text-center" data-provides="fileinput">
								<div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
									<div>
										<span class="btn btn-raised btn-round btn-rose btn-file">
										<input type="file" name="video_path"/>
										</span>
									</div>
								@if($errors->has('video_path'))
									<span id="video_path-error" class="error text-danger" for="input-video_path">{{ $errors->first('video_path') }}</span>
								@endif
							</div>
							<div class="youtube_video hide form-group{{ $errors->has('video_path') ? ' has-danger' : '' }}">
								<input class="form-control{{ $errors->has('video_path') ? ' is-invalid' : '' }}" name="video_path" id="input-video_path" type="text" placeholder="{{ __('Enter Youtube Link') }}" value="{{ old('video_path') }}"/>
								@if ($errors->has('video_path'))
									<span id="video_path-error" class="error text-danger" for="input-video_path">{{ $errors->first('video_path') }}</span>
								@endif
							</div>
						</div>
						<input type='hidden' value="{{ old('event_id',$event->id) }}" name="event_id">
						@if($errors->has('event_id'))
							<span id="event_id-error" class="error text-danger" for="input-event_id">{{ $errors->first('event_id') }}</span>
						@endif
					</div>
				  </div>	
				  <div class="card-footer">
					<button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
				  </div>
				</div>
			</form>
			<div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Event Video Upload') }}</h4>
              </div>
			  <div class="card-body">
                <div class="row">
					<div class="col-6 text-left">
						<form>
							<b>Filter records by title:</b>&nbsp;<input type="text" maxlength="100" name="q" value="<?=(isset($_GET['q'])?$_GET['q']:'')?>" placeholder="type title..."/>&nbsp;<button type="submit" class="btn btn-sm btn-secondary">FILTER</button><a href="{{ route('event-video',$event->id) }}" class="btn btn-sm btn-primary">CLEAR</a>
						</form>
					</div>
                </div>
                <div class="table-responsive">
					<table class="table">
						<thead class=" text-primary">
							<th>Title</th>
							<th>Type</th>
							<th>Created At</th>
							<th>Action</th>
						</thead>
						<tbody>
						  @foreach($eventVideos as $data)
							<tr>
								<td>{{ $data->video_path }}</td>
								<td>{{ $data->video_type }}</td>
								<td>{{ date("d-m-Y h:i A",strtotime($data->created_at)) }}</td>
								<td class="td-actions">
									<a rel="tooltip" class="btn btn-danger btn-link" href="{{ route('event-video-delete', $data->id) }}" data-original-title="Delete Video" title="">
										<i class="material-icons">delete</i>
										<div class="ripple-container"></div>
									</a>
									</form>
								</td>
							</tr>
						  @endforeach
						</tbody>
					</table>
					{{ $eventVideos->appends(['q' => (isset($_GET['q'])?$_GET['q']:'')])->links() }}
                </div>
              </div>
			</div> 
        </div>
      </div>
    </div>
  </div>
  <script>
		$(document).ready(function(){
			$('#input-video_type').trigger('change');
		});
		$('#input-video_type').change(function() {
			var video_type = $(this).val();
			if(video_type == 'manual') {
				$('.manual_video').removeClass('hide');
				$('.youtube_video').addClass('hide');
			} 
			else if(video_type == 'youtube') {
				$('.youtube_video').removeClass('hide');
				$('.manual_video').addClass('hide');
			} 
			else {
				$('.youtube_video').addClass('hide');
				$('.manual_video').addClass('hide');
			}
		});
  </script>
@endsection
