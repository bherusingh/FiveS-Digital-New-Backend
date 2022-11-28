@extends('layouts.app', ['activePage' => 'medias', 'titlePage' => __('Media Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Medias List') }}</h4>
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
<b>Filter records by name:</b>&nbsp;<input type="text" maxlength="100" name="q" value="<?=(isset($_GET['q'])?$_GET['q']:'')?>" placeholder="type name..."/>&nbsp;<button type="submit" class="btn btn-sm btn-secondary">FILTER</button><a href="{{ route('media.index') }}" class="btn btn-sm btn-primary">CLEAR</a>


</form>
                  </div>

                  <div class="col-6 text-right">
                    <a href="{{ route('media.create') }}" class="btn btn-sm btn-primary">{{ __('Add Media') }}</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                          {{ __('Media Name') }}
                      </th>
                      <th>
                        {{ __('Path') }}
                      </th>
                      <th>
                        {{ __('Creation Date') }}
                      </th>
                      <th class="text-right">
                        {{ __('Actions') }}
                      </th>
                    </thead>
                    <tbody>
                      @foreach($medias as $m)
                        <tr>
                          <td>
                            {{ $m->name }}
                          </td>
                          <td>
                          <a href="{{env('FRONT_URL')}}assets/images/{{ $m->path }}" target="_blank">
                            {{ $m->path }}</a>
                          </td>
                          <td>
                            {{ $m->created_at->format('Y-m-d H:m:s') }}
                          </td>
                          <td class="td-actions text-right">
                            @if ($m->created == auth()->id())
                              <form action="{{ route('media.destroy', $m->id) }}" method="post">
                                  @csrf
                                  @method('delete')
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this media?") }}') ? this.parentElement.submit() : ''">
                                      <i class="material-icons">close</i>
                                      <div class="ripple-container"></div>
                                  </button>
                              </form>
                            @endif
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
				  {{ $medias->appends(['q' => (isset($_GET['q'])?$_GET['q']:'')])->links() }}
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection