@extends('layouts.app', ['activePage' => 'user-logins', 'titlePage' => __('User Logins')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Users\' Logins Information') }}</h4>
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
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                          {{ __('User') }}
                      </th>
                      <th>
                        {{ __('IP Address') }}
                      </th>
                     <th>
                        {{ __('Session') }}
                      </th>
                     <th>
                        {{ __('Browser') }}
                      </th>
                      <th>
                        {{ __('Creation date') }}
                      </th>
                      <th class="text-right">
                        {{ __('Actions') }}
                      </th>
                    </thead>
                    <tbody>
                      @foreach($userlogins as $ul)
                        <tr>
                          <td>
                            {{ $ul->user->display_name }}
                          </td>
                          <td>
                            {{ $ul->ipAddress }}
                          </td>
                          <td>
                            {{ $ul->session_id }}
                          </td>
                          <td>
                            {{ $ul->browser }}
                          </td>
                          <td>
                            {{ $ul->created_at->format('Y-m-d H:m:s') }}
                          </td>
                          <td class="td-actions text-right">
                            @if ($ul->user_id != auth()->id())
                              <form action="{{ route('userlogin.destroy', $ul) }}" method="post">
                                  @csrf
                                  @method('delete')
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this user login?") }}') ? this.parentElement.submit() : ''">
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
				  {{ $userlogins->links() }}
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection