@extends('layouts.app', ['activePage' => 'settings', 'titlePage' => __('Settings')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ url('/seo/upload-sitemap') }}"  class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    @method('post')

                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Site Map') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-sm-7">
				                    <div class="fileinput fileinput-new" data-provides="fileinput">
       
                                        <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
                                        <div>
                                            <span class="btn btn-raised btn-round btn-rose btn-file">
    	                                        <input type="file" name="sitemap"  id="sitemap"/>
    	                                    </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Save Site Map') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ url('seo/upload-robots') }}" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    @method('post')

                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Robots') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-sm-7">
				                    <div class="fileinput fileinput-new" data-provides="fileinput">
       
                                        <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
                                        <div>
                                            <span class="btn btn-raised btn-round btn-rose btn-file">
    	                                        <input type="file" name="robots"  id="robots"/>
    	                                    </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Save Robots Txt') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection