<option value="" selected>Select Designation</option>
@foreach($designations as $dgid=>$dgnm)
	<option value="{{$dgid}}" {{ old('designation') == $dgid ? 'selected' : '' }}>{{$dgnm}}</option>
@endforeach
