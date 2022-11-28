<div class="sidebar" data-color="orange" data-background-color="white" >
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
  <a href="/" class="simple-text logo-normal"><img src="{{ env('FRONT_URL') }}/front/public/assets/images/five-splash-logo.svg" style="height:30px;"/>
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
	@if(Auth::user()->role == "HR Recruiter")
	<li class="nav-item dropdown {{ $activePage == 'job designation' || $activePage == 'job opening' ? 'active' : '' }}">
	  <a class="nav-link" data-toggle="collapse" href="#job" aria-expanded="{{ $activePage == 'job designation' || $activePage == 'job opening' ? 'true' : 'false' }}"><i class="material-icons">work</i><p>{{ __('Job') }}</p></a>
	  <ul class="collapse {{ $activePage == 'job designation' || $activePage == 'job opening' ? 'show' : '' }}" id="job">
		<li class="nav-item {{ $activePage == 'job designation' ? ' active' : '' }}">
		<a class="nav-link" href="{{ route('job-designation.index') }}">
			<i class="material-icons">badge</i>
			<p>{{ __('Designation') }}</p>
		</a>
		</li>
		<li class="nav-item{{ $activePage == 'job opening' ? ' active' : '' }}">
		<a class="nav-link" href="{{ route('job-opening.index') }}">
			<i class="material-icons">work</i>
			<p>{{ __('Opening') }}</p>
		</a>
		</li>
	  </ul>
	</li>	
	@else	
	<li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
		  <i class="material-icons">dashboard</i>
			<p>{{ __('Dashboard') }}</p>
		</a>
     </li>
	<li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
	  <a class="nav-link" href="{{ route('user.index') }}">
		 <i class="material-icons">bubble_chart</i>
	<p>{{ __('Users') }}</p>
	  </a>
	</li>
	<li class="nav-item{{ $activePage == 'user-logins' ? ' active' : '' }}">
	  <a class="nav-link" href="{{ route('userlogin.index') }}">
		<i class="material-icons">unarchive</i>
	<p>{{ __('User Logins') }}</p>
	  </a>
	</li>
	
	<li class="nav-item dropdown {{ $activePage == 'elements' || $activePage == 'pages' || $activePage == 'menus' ||  $activePage == 'medias' ? 'active' : '' }}">
	  <a class="nav-link" data-toggle="collapse" href="#web" aria-expanded="{{ $activePage == 'elements' || $activePage == 'pages' || $activePage == 'menus' ||  $activePage == 'medias' ? 'true' : 'false' }}"><i class="material-icons">preview</i><p>{{ __('Web Feature') }}</p></a>
	  <ul class="collapse {{ $activePage == 'elements' || $activePage == 'pages' || $activePage == 'menus' ||  $activePage == 'medias' ? 'show' : '' }}" id="web">
		<li class="nav-item {{ $activePage == 'elements' ? ' active' : '' }}">
		<a class="nav-link" href="{{ route('element.index') }}">
			<i class="material-icons">segment</i>
			<p>{{ __('Elements') }}</p>
		</a>
		</li>
		<li class="nav-item {{ $activePage == 'pages' ? ' active' : '' }}">
		<a class="nav-link" href="{{ route('page.index') }}">
			<i class="material-icons">content_paste</i>
			<p>{{ __('Pages') }}</p>
		</a>
		</li>
		<li class="nav-item {{ $activePage == 'menus' ? ' active' : '' }}">
		<a class="nav-link" href="{{ route('menu.index') }}">
			<i class="material-icons">menu</i>
			<p>{{ __('Menu') }}</p>
		</a>
		</li>
		<li class="nav-item {{ $activePage == 'medias' ? ' active' : '' }}">
		<a class="nav-link" href="{{ route('media.index') }}">
			<i class="material-icons">perm_media</i>
			<p>{{ __('Media') }}</p>
		</a>
		</li>
	  </ul> 
	</li>
	
	<li class="nav-item dropdown {{ $activePage == 'blogs' || $activePage == 'case study' || $activePage == 'case study category' || $activePage == 'event' ? 'active' : '' }}">
	  <a class="nav-link" data-toggle="collapse" href="#news" aria-expanded="{{ $activePage == 'blogs' || $activePage == 'case study' || $activePage == 'case study category' || $activePage == 'event' ? 'true' : 'false' }}"><i class="material-icons">article</i><p>{{ __('News') }}</p></a>
	  <ul class="collapse {{ $activePage == 'blogs' || $activePage == 'case study' || $activePage == 'case study category' || $activePage == 'event' ? 'show' : '' }}" id="news">
		<li class="nav-item {{ $activePage == 'blogs' ? ' active' : '' }}">
		<a class="nav-link" href="{{ route('blog.index') }}">
			<i class="material-icons">feed</i>
			<p>{{ __('Blogs') }}</p>
		</a>
		</li>
		<li class="nav-item {{ $activePage == 'case study category' ? ' active' : '' }}">
		<a class="nav-link" href="{{ route('case-study-category.index') }}">
			<i class="material-icons">category</i>
			<p>{{ __('Case Study Category') }}</p>
		</a>
		</li>
		<li class="nav-item {{ $activePage == 'case study' ? ' active' : '' }}">
		<a class="nav-link" href="{{ route('case-study.index') }}">
			<i class="material-icons">play_lesson</i>
			<p>{{ __('Case Study') }}</p>
		</a>
		</li>
		<li class="nav-item {{ $activePage == 'event' ? ' active' : '' }}">
		<a class="nav-link" href="{{ route('event.index') }}">
			<i class="material-icons">event</i>
			<p>{{ __('Event') }}</p>
		</a>
		</li>
	  </ul>
	</li>
	<li class="nav-item dropdown {{ $activePage == 'inquiries' || $activePage == 'inquiry report' || $activePage == 'call request' ? 'active' : '' }}">
	  <a class="nav-link" data-toggle="collapse" href="#inquiry" aria-expanded="{{ $activePage == 'inquiries' || $activePage == 'inquiry report' ? 'true' : 'false' }}"><i class="material-icons">contact_support</i><p>{{ __('Inquiries') }}</p></a>
	  <ul class="collapse {{ $activePage == 'inquiries' || $activePage == 'inquiry report' ? 'show' : '' }}" id="inquiry">
		<li class="nav-item {{ $activePage == 'inquiries' ? ' active' : '' }}">
		<a class="nav-link" href="{{ route('inquiry.index') }}">
			<i class="material-icons">live_help</i>
			<p>{{ __('Inquiry List') }}</p>
		</a>
		</li>
		<li class="nav-item {{ $activePage == 'call request' ? ' active' : '' }}">
		<a class="nav-link" href="{{ route('call-request-inquiry') }}">
			<i class="material-icons">live_help</i>
			<p>{{ __('Call Reuqest') }}</p>
		</a>
		</li>
		<li class="nav-item {{ $activePage == 'Event Request' ? ' active' : '' }}">
		<a class="nav-link" href="{{ route('event-request') }}">
			<i class="material-icons">live_help</i>
			<p>{{ __('Event Request') }}</p>
		</a>
		</li>
		<li class="nav-item {{ $activePage == 'inquiry report' ? ' active' : '' }}">
		<a class="nav-link" href="{{ route('inquiry-report') }}">
			<i class="material-icons">description</i>
			<p>{{ __('Report') }}</p>
		</a>
		</li>
		<li class="nav-item {{ $activePage == 'Client Location' ? ' active' : '' }}">
		<a class="nav-link" href="{{ route('Client-Location') }}">
			<i class="material-icons">description</i>
			<p>{{ __('Client Location') }}</p>
		</a>
		</li>
	  </ul>
	</li>
	<li class="nav-item dropdown {{ $activePage == 'job designation' || $activePage == 'job opening' ? 'active' : '' }}">
	  <a class="nav-link" data-toggle="collapse" href="#job" aria-expanded="{{ $activePage == 'job designation' || $activePage == 'job opening' ? 'true' : 'false' }}"><i class="material-icons">work</i><p>{{ __('Job') }}</p></a>
	  <ul class="collapse {{ $activePage == 'job designation' || $activePage == 'job opening' ? 'show' : '' }}" id="job">
		<li class="nav-item {{ $activePage == 'job designation' ? ' active' : '' }}">
		<a class="nav-link" href="{{ route('job-designation.index') }}">
			<i class="material-icons">badge</i>
			<p>{{ __('Designation') }}</p>
		</a>
		</li>
		<li class="nav-item{{ $activePage == 'job opening' ? ' active' : '' }}">
		<a class="nav-link" href="{{ route('job-opening.index') }}">
			<i class="material-icons">work</i>
			<p>{{ __('Opening') }}</p>
		</a>
		</li>
		<li class="nav-item{{ $activePage == 'Applications' ? ' active' : '' }}">
		<a class="nav-link" href="{{ route('application.index') }}">
			<i class="material-icons">work</i>
			<p>{{ __('Applications') }}</p>
		</a>
		</li>
	  </ul>
	</li>
	<li class="nav-item{{ $activePage == 'notification' ? ' active' : '' }}">
	  <a class="nav-link" href="{{ route('notification.index') }}">
		<i class="material-icons">notifications</i>
	<p>{{ __('Notification') }}</p>
	  </a>
	</li>
	<li class="nav-item{{ $activePage == 'settings' ? ' active' : '' }}">
	  <a class="nav-link" href="{{ route('setting.index') }}">
		<i class="material-icons">language</i>
		<p>{{ __('Settings') }}</p>
	  </a>
	</li>
	<li class="nav-item{{ $activePage == 'seo' ? ' active' : '' }}">
	  <a class="nav-link" href="{{ route('seo.index') }}">
		<i class="material-icons">travel_explore</i>
		<p>{{ __('SEO') }}</p>
	  </a>
	</li>
	@endif
    </ul>
  </div>
</div>
