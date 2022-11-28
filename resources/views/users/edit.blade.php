@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('User Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('user.update', $user) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit User') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Display Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('display_name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('display_name') ? ' is-invalid' : '' }}" name="display_name" id="input-display_name" type="text" placeholder="{{ __('Display Name') }}" value="{{ old('display_name', $user->display_name) }}" required="true" aria-required="true"/>
                      @if ($errors->has('display_name'))
                        <span id="display_name-error" class="error text-danger" for="input-display_name">{{ $errors->first('display_name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                 <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="text" placeholder="{{ __('Email') }}" value="{{ old('email', $user->email) }}" required />
                      @if ($errors->has('email'))
                        <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
				 <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Mobile') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('mobile') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" id="input-mobile" type="text" placeholder="{{ __('Mobile') }}" value="{{ old('mobile', $user->mobile) }}" required />
                      @if ($errors->has('mobile'))
                        <span id="mobile-error" class="error text-danger" for="input-mobile">{{ $errors->first('mobile') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
               <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Role') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('role') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}" name="role" id="input-role"   placeholder="{{ __('Role') }}"  required>
					  <option value="Content Manager" @if(old('role',$user->department) == "Content Manager") selected @endif>Content Manager</option>
					  <option value="Admin" @if(old('role',$user->department) == "Admin") selected @endif>Admin</option>
					  <option value="HR Recruiter" @if(old('role',$user->department) == "HR Recruiter") selected @endif>HR Recruiter</option>
					  </select>
                      @if ($errors->has('role'))
                        <span id="role-error" class="error text-danger" for="input-role">{{ $errors->first('role') }}</span>
                      @endif
					  
                    </div>
                  </div>
                </div>
				<div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Status') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status" id="input-status"   placeholder="{{ __('Status') }}" value="{{ old('status') }}" required>
					  <option value="Active">Active</option>
					  <option value="Inactive">Inactive</option>
					  </select>
                      @if ($errors->has('status'))
                        <span id="status-error" class="error text-danger" for="input-status">{{ $errors->first('status') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
               <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password">{{ __(' Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"   type="password" name="password" id="input-password" placeholder="{{ __('Password') }}" value="{{ old('password') }}" />
                      @if ($errors->has('password'))
                        <span id="password-error" class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password-confirmation">{{ __('Confirm Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('Confirm Password') }}" value="{{ old('password') }}" />
                    </div>
                  </div>
                </div>
				      <div class="row">
                  <div class="col-sm-2"></div>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('force_change_pwd') ? ' has-danger' : '' }}">
                      <input class="form-check-input{{ $errors->has('force_change_pwd') ? ' is-invalid' : '' }}" type="checkbox" name="force_change_pwd" id="force_change_pwd" value="1"  /> <label>{{ __('Force Change Password on Next Login') }}</label>
                       @if ($errors->has('force_change_pwd'))
                        <span id="force_change_pwd-error" class="error text-danger" for="input-force_change_pwd">{{ $errors->first('force_change_pwd') }}</span>
                      @endif
                    </div>
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
	  $("#input-role").val('{{ old('role', $user->role) }}');
	 $("#input-status").val('{{ old('status', $user->status) }}');
	  $("#force_change_pwd").prop('checked',{{ (1==old('force_change_pwd', $user->force_change_pwd))?true:false }});
	});
  </script>
@endsection