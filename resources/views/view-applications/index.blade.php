@extends('layouts.app', ['activePage' => 'Applications', 'titlePage' => __('Application Management')])

@section('content')
<div class="content">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="http://localhost/front/public/assets/interview_app/css/interview.css" rel="stylesheet">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">{{ __('Application List') }}</h4>
          </div>
          <div id="all_data" class="card-body">
            @if (session('status'))
            <div class="row">
              <div class="col-sm-12">
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="material-icons">close</i>
                  </button>
                  <span class="span_alert">{{ session('status') }}</span>
                </div>
              </div>
            </div>
            @endif
            <div class="row">
              <div class="col-6 text-left">
                <form method="get">
                  <b>Filter records :</b>&nbsp;<input type="text" maxlength="100" name="q" value="<?= (isset($_GET['q']) ? $_GET['q'] : '') ?>" placeholder="type something..." />&nbsp;
                  <a class="text-white btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">FILTER</a>
                  <a href="{{ route('application.index') }}" class="btn btn-sm btn-primary">CLEAR</a>
                  <div class=" col-sm-6 card-body dropdown-menu dropdown-menu-end filter-drop" style="">

                    <div class="mb-3">
                      <label>Position</label>
                      <select name="filter_position" id="filter_position" class="form-select">
                        <option value="">Select</option>
                        @foreach($position as $key => $position_data)
                        <option  value="{{ !empty($key) ? $key : '' }}" @php if (isset($_GET['filter_position' ]) && $_GET['filter_position'] == $key) { echo 'selected'; } @endphp >{{ !empty($position_data) ? $position_data : '' }} </option>
                        @endforeach
                      </select>
                    </div>
                    <div class="mb-3">
                      <label>Location - Branch</label>
                      <select name="Location_Branch" id="Location_Branch" class="form-select">
                        <option value="">Select</option>
                        @foreach($Location_Branch as $key => $Location_Branch_data)
                        <option value="{{ !empty($key) ? $key : '' }}" @php if (isset($_GET['Location_Branch' ]) && $_GET['Location_Branch'] == $key) { echo 'selected'; } @endphp >{{ !empty($Location_Branch_data) ? $Location_Branch_data : '' }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="mb-3">
                      <label>Experience</label>
                      <select name="filter_Experience" id="filter_Experience" class="form-select">
                        <option value="">Select</option>
                        @foreach($filter_Experience as $key => $filter_Experience_data)
                        <option value="{{ !empty($key) ? $key : '' }}" @php if (isset($_GET['filter_Experience' ]) && $_GET['filter_Experience'] == $key) { echo 'selected'; } @endphp >{{ !empty($filter_Experience_data) ? $filter_Experience_data : '' }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="mb-3">
                      <label>Qualification</label>
                      <select name="filter_Qualification" id="filter_Qualification" class="form-select">
                        <option value="">Select</option>
                        @foreach($filter_Qualification as $key => $filter_Qualification_data)
                        <option value="{{ !empty($key) ? $key : '' }}" @php if (isset($_GET['filter_Qualification' ]) && $_GET['filter_Qualification'] == $key) { echo 'selected'; } @endphp >{{ !empty($filter_Qualification_data) ? $filter_Qualification_data : '' }}</option>
                        @endforeach
                      </select>
                    </div>
                    <button type="Submit" class="filter_submit_class btn btn-warning">Submit</button>
                  </div>
              </div>
              <div class="col-6 text-right">
                <input class="btn btn-sm btn-primary Download_Filtered_data" type="button" value="Download list" />
              </div>
            </div>
            <div class="table-responsive">
              <table class="table">
                <thead class="text-warning">
                  <th>
                    {{ __('Reference ID') }}
                  </th>
                  <th>
                    {{ __('Position Applied for') }}
                  </th>
                  <th>
                    {{ __('Location - Branch') }}
                  </th>
                  <th>
                    {{ __('Name') }}
                  </th>
                  <th>
                    {{ __('Mobile') }}
                  </th>
                  <th>
                    {{ __('Email ID') }}
                  </th>
                  <th>
                    {{ __('Age') }}
                  </th>
                  <th>
                    {{ __('Experience') }}
                  </th>
                  <th>
                    {{ __('Action') }}
                  </th>
                </thead>
                <tbody>
                  @php $location = config('fivesdigital.location');
                  function ageCalculator($dob){
                  if(!empty($dob)){
                  $birthdate = new DateTime($dob);
                  $today = new DateTime('today');
                  $age = $birthdate->diff($today)->y;
                  return $age;
                  }else{
                  return 0;
                  }
                  }
                  @endphp

                  @foreach($data_all as $data)
                  <tr>
                    <td>
                      RFID0{{ !empty($data->id) ? $data->id : '' }}
                    </td>
                    <td>
                      {{ !empty($position[$data->position_id]) ? $position[$data->position_id] : '' }}
                    </td>
                    <td>
                      {{ !empty($Location_Branch[$data->location_id]) ? $Location_Branch[$data->location_id] : '' }}
                    </td>
                    <td>
                      {{ !empty($data->name) ? $data->name : '' }}
                    </td>
                    <td>
                      {{ !empty($data->mobile) ? $data->mobile : '' }}
                    </td>
                    <td>
                      {{ !empty($data->email) ? $data->email : '' }}
                    </td>
                    <td class="text-right">
                      @php
                      echo (ageCalculator($data->dob));
                      @endphp
                    </td>
                    <td>
                      @if ($data->experience == 1)
                      {{'Yes'}}
                      @else
                      {{'No'}}
                      @endif
                    </td>

                    <td class="td-actions text-right">

                      <a class="" href="{{ route('application.edit', $data->id) }}">
                        <img src="http://localhost/front/public/assets/images/arrow.svg" alt=">">
                      </a>
                    </td>
                    </form>


                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{ $data_all->appends(['q' => (isset($_GET['q'])?$_GET['q']:'')])->appends(['filter_position' => (isset($_GET['filter_position'])?$_GET['filter_position']:'')])->appends(['Location_Branch' => (isset($_GET['Location_Branch'])?$_GET['Location_Branch']:'')])->appends(['filter_Experience' => (isset($_GET['filter_Experience'])?$_GET['filter_Experience']:'')])->appends(['filter_Qualification' => (isset($_GET['filter_Qualification'])?$_GET['filter_Qualification']:'')])->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</div>
@endsection