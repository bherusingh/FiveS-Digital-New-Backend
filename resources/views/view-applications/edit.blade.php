@extends('layouts.app', ['activePage' => 'Application', 'titlePage' => __('Application Management')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="post" action="{{ route('application.update', $InterviewData->id) }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
          @csrf
          @method('put')

          <div class="card ">
            <div class="card-header card-header-primary">
              <h4 class="card-title">{{ __('Edit Application [ '.$InterviewData->id.' ]')}}</h4>
              <p class="card-category"></p>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12 text-right">
                  <a href="{{ route('application.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Applicant Name</label>
                  <input name="applicant_name" type="text" class="form-control" disabled="" value="{{ $InterviewData->name}}" >
                </div>
                <div class="col-md-6">
                  <label>Position Applied For</label>
                  <select disabled="" class='form-control designation' name='Designation' required="true" aria-required="true">
                      <option value='' selected>Select Designation</option>
                      @foreach($designations as $dgid=>$dgnm)
                      <option value="{{$dgid}}" @if($InterviewData->position_id == $dgid) selected @endif>{{$dgnm}}</option>
                      @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                  <label>Recruiter Name</label>
                  <input name="Recruiter_Name" value="{{ $InterviewData->Recruiter_Name}}" type="text" class="form-control">
                </div>
                <div class="col-md-6">
                  <label>{{ __('HR Interview Status') }}</label>
                  <select class='form-control' name='HR_Interview_Status' required="true" aria-required="true">
                    <option value='' @if($InterviewData->HR_Interview_Status == '') selected @endif >Select </option>
                    <option value='on-going' @if($InterviewData->HR_Interview_Status == 'on-going') selected @endif >On-Going</option>
                    <option value='selected' @if($InterviewData->HR_Interview_Status == 'selected') selected @endif >Selected</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label>{{ __('Panel Interview Status') }}</label>
                  <select class='form-control' name='Panel_Interview_Status' required="true" aria-required="true">
                  <option value='' @if($InterviewData->Panel_Interview_Status == '') selected @endif >Select </option>
                    <option value='on-going' @if($InterviewData->Panel_Interview_Status == 'on-going') selected @endif >On-Going</option>
                    <option value='selected' @if($InterviewData->Panel_Interview_Status == 'selected') selected @endif >Selected</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label>Panel Name</label>
                  <input name="Panel_Name" value="{{ $InterviewData->Panel_Name}}" type="text" class="form-control">
                </div>
                <div class="col-md-6">
                  <label>{{ __('Client Interview Status') }}</label>
                  <select name="Client_Interview_Status" class='form-control' required="true" aria-required="true">
                  <option value='' @if($InterviewData->Client_Interview_Status == '') selected @endif >Select </option>
                    <option value='on-going' @if($InterviewData->Client_Interview_Status == 'on-going') selected @endif >On-Going</option>
                    <option value='selected' @if($InterviewData->Client_Interview_Status == 'selected') selected @endif >Selected</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label>Client Name</label>
                  <input name="Client_Name" value="{{ $InterviewData->Client_Name}}" type="text" class="form-control">
                </div>
                <div class="col-md-6">
                  <label>Versant TIN</label>
                  <input name="Versant_TIN" value="{{ $InterviewData->Versant_TIN}}" type="text" class="form-control">
                </div>
                <div class="col-md-6">
                  <label>Versnat Score</label>
                  <input name="Versnat_Score" value="{{ $InterviewData->Versnat_Score}}" type="text" class="form-control">
                </div>
                <div class="col-md-6">
                  <label>VCCT / HCCT Appeared</label>
                  <input name="VCCT_HCCT_Appeared" value="{{ $InterviewData->VCCT_HCCT_Appeared}}" type="text" class="form-control">
                </div>
                <div class="col-md-6">
                  <label>VCCT / HCCT Status</label>
                  <input name="VCCT_HCCT_Status" value="{{ $InterviewData->VCCT_HCCT_Status}}" type="text" class="form-control">
                </div>
                <div class="col-md-6">
                  <label>Final Interview Status</label>
                  <input name="Final_Interview_Status" value="{{ $InterviewData->Final_Interview_Status}}" type="text" class="form-control">
                </div>
                <div class="col-md-6">
                  <label>Process Selected For</label>
                  <input name="Process_Selected_For" value="{{ $InterviewData->Process_Selected_For}}" type="text" class="form-control">
                </div>
                <div class="col-md-6">
                  <label>Take Home Salary Given</label>
                  <input name="Take_home_Salary_Given" value="{{ $InterviewData->Take_home_Salary_Given}}" type="text" class="form-control">
                </div>
                <div class="col-md-6">
                  <label>Joined Status</label>
                  <input name="Joined_Status" type="text" value="{{ $InterviewData->Joined_Status}}" class="form-control">
                </div>
                <div class="col-md-6">
                  <label>Date of Joining Given</label>
                  <input name="Date_of_Joining_Given" value="{{ $InterviewData->Date_of_Joining_Given}}" type="text" class="form-control">
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


@endsection