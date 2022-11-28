@extends('layouts.app', ['activePage' => 'case study category', 'titlePage' => __('Case Study Category Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Case Study Category List') }}</h4>
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
							<b>Filter records by title:</b>&nbsp;<input type="text" maxlength="100" name="q" value="<?=(isset($_GET['q'])?$_GET['q']:'')?>" placeholder="type title..."/>&nbsp;<button type="submit" class="btn btn-sm btn-secondary">FILTER</button><a href="{{ route('case-study-category.index') }}" class="btn btn-sm btn-primary">CLEAR</a>
						</form>
					</div>
					<div class="col-6 text-right">
						<a href="{{ route('case-study-category.create') }}" class="btn btn-sm btn-primary">{{ __('Add Case Study') }}</a>
					</div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                          {{ __('Title') }}
                      </th> 
                      <th>
                        {{ __('Creation date') }}
                      </th>
                      <th class="text-right">
                        {{ __('Actions') }}
                      </th>
                    </thead>
                    <tbody>
                      @foreach($caseCategories as $caseCategory)
                        <tr>
                          <td>
                            {{ $caseCategory->name }}
                          </td> 
                          <td>
                            {{ $caseCategory->created_at->format('Y-m-d H:m:s') }}
                          </td>
                          <td class="td-actions text-right">
							  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('case-study-category.edit', $caseCategory->id) }}" data-original-title="" title="">
								<i class="material-icons">edit</i>
								<div class="ripple-container"></div>
							  </a>
                                 
                              </form>
                            
                          </td>
						  </tr>
                      @endforeach
                    </tbody>
                  </table>
				  {{ $caseCategories->appends(['q' => (isset($_GET['q'])?$_GET['q']:'')])->links() }}

                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
