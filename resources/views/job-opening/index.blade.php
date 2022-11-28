@extends('layouts.app', ['activePage' => 'job opening', 'titlePage' => __('Jobs Management')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">{{ __('Jobs List') }}</h4>
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
              <div class="col-6 text-left">
                <form>
                  <b>Filter records by title:</b>&nbsp;<input type="text" maxlength="100" name="q" value="<?= (isset($_GET['q']) ? $_GET['q'] : '') ?>" placeholder="type title..." />&nbsp;<button type="submit" class="btn btn-sm btn-secondary">FILTER</button><a href="{{ route('case-study-category.index') }}" class="btn btn-sm btn-primary">CLEAR</a>
                </form>
              </div>
              <div class="col-6 text-right">
                <a href="{{ route('job-opening.create') }}" class="btn btn-sm btn-primary">{{ __('Add Job') }}</a>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    {{ __('Location') }}
                  </th>
                  <th>
                    {{ __('Department') }}
                  </th>
                  <th>
                    {{ __('Designation') }}
                  </th>
                  <th>
                    {{ __('Experience') }}
                  </th>
                  <th>
                    {{ __('Count') }}
                  </th>
                  <th>
                    {{ __('Post Start At') }}
                  </th>
                  <th>
                    {{ __('Post Expire At') }}
                  </th>
                  <th>
                    {{ __('Status') }}
                  </th>
                  <th>
                    {{ __('Created At') }}
                  </th>
                  <th>
                    {{ __('Updated At') }}
                  </th>
                  <th class="text-right">
                    {{ __('Actions') }}
                  </th>
                </thead>
                <tbody>
                  @php $location = config('fivesdigital.location'); @endphp
                  @foreach($jobOpenings as $data)
                  <tr>
                    <td>
                      {{ array_key_exists($data->location,$location) ? $location[$data->location] : '' }}
                    </td>
                    <td>
                      {{ !empty($data->deprt_opening) ? $data->deprt_opening->name : '' }}
                    </td>
                    <td>
                      {{ !empty($data->opening_design) ? $data->opening_design->name : '' }}
                    </td>
                    <td>
                      {{ $data->min_experience.'-'.$data->max_experience }}
                    </td>
                    <td>
                      {{ $data->count }}
                    </td>
                    <td>
                      {{ date("d-m-Y",strtotime($data->start_date)) }}
                    </td>
                    <td>
                      {{ !empty($data->end_date) ? date("d-m-Y",strtotime($data->end_date)) : '' }}
                    </td>
                    <td>
                      {!! ($data->is_active == 1) ? '<span class="text-success">Active</span>' : '<span class="text-danger">Deactive</span>'; !!}
                    </td>
                    <td>
                      {{ date("d-m-Y h:i A",strtotime($data->created_at)) }}
                    </td>
                    <td>
                      {{ date("d-m-Y h:i A",strtotime($data->updated_at)) }}
                    </td>
                    <td class="td-actions text-right">
                      <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('job-opening.edit', $data->id) }}" data-original-title="" title="">
                        <i class="material-icons">edit</i>
                        <div class="ripple-container"></div>
                      </a>

                      </form>

                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{ $jobOpenings->appends(['q' => (isset($_GET['q'])?$_GET['q']:'')])->links() }}

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection