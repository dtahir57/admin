<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    @yield('calendar')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }}
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @guest
            <main class="py-4">
                @yield('content')
            </main>
        @else
        <div class="container">
          <div class="row">
            <nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                  <a class="nav-link {{ (Request::is('home') ? 'active' : '') }}" href="{{ route('home') }}">Overview <span class="sr-only">(current)</span></a>
                </li>
                @if (auth::user()->can('View_Company_Type'))
                <li class="nav-item">
                  <a class="nav-link 
                  {{(Request::is('admin/company_types') ? 'active' : '')}}
                  {{(Request::is('admin/company_types/create') ? 'active' : '')}}
                  {{(Request::is('admin/company_types/'.request()->route('id').'/edit') ? 'active' : '')}}" href="{{ route('company_type.index') }}">Company Types</a>
                </li>
                @endif
                @if (auth::user()->can('View_Company'))
                <li class="nav-item">
                  <a class="nav-link
                  {{(Request::is('admin/companies') ? 'active' : '')}}
                  {{(Request::is('admin/companies/create') ? 'active' : '')}}
                  {{(Request::is('admin/companies/'.request()->route('id').'/edit') ? 'active' : '')}}" href="{{ route('company.index') }}">Companies</a>
                </li>
                @endif
                @if (auth::user()->can('View_Event'))
                <li class="nav-item">
                  <a class="nav-link
                  {{(Request::is('admin/events') ? 'active' : '')}}
                  {{(Request::is('admin/events/create') ? 'active' : '')}}
                  {{(Request::is('admin/events/'.request()->route('id').'/edit') ? 'active' : '')}}" href="{{ route('event.index') }}">Events</a>
                </li>
                @endif
                @if(auth::user()->can('View_Calender'))
                <li class="nav-item">
                  <a class="nav-link
                  {{(Request::is('admin/calender')? 'active' : '')}}" href="{{ route('calender.index') }}">Calender</a>
                </li>
                @endif
                @if(auth::user()->can('View_Event_Place'))
                <li class="nav-item">
                  <a class="nav-link
                  {{(Request::is('admin/event_places') ? 'active' : '')}}
                  {{(Request::is('admin/event_places/create') ? 'active' : '')}}
                  {{(Request::is('admin/event_places/'.request()->route('id').'/edit') ? 'active' : '')}}" href="{{ route('event_place.index') }}">Event Place</a>
                </li>
                @endif
                @if(auth::user()->can('View_Reservation'))
                <li class="nav-item">
                  <a class="nav-link
                  {{(Request::is('admin/reservations') ? 'active' : '')}}" href="{{ route('reservation.index') }}">Reservation</a>
                </li>
                @endif
                @if(auth::user()->can('View_Project'))
                <li class="nav-item">
                  <a class="nav-link
                  {{(Request::is('admin/projects') ? 'active' : '')}}
                  {{(Request::is('admin/projects/create') ? 'active' : '')}}
                  {{(Request::is('admin/projects/'.request()->route('id').'/edit') ? 'active' : '')}}" href="{{ route('project.index') }}">Project</a>
                </li>
                @endif
                @if(auth::user()->can('View_City'))
                <li class="nav-item">
                  <a class="nav-link
                  {{(Request::is('admin/cities') ? 'active' : '')}}
                  {{(Request::is('admin/cities/create') ? 'active' : '')}}
                  {{(Request::is('admin/cities/'.request()->route('id').'/edit') ? 'active' : '')}}" href="{{ route('city.index') }}">City</a>
                </li>
                @endif
                @if(auth::user()->can('View_Project_Type'))
                <li class="nav-item">
                  <a class="nav-link
                  {{(Request::is('admin/project_types') ? 'active' : '')}}
                  {{(Request::is('admin/project_types/create') ? 'active' : '')}}
                  {{(Request::is('admin/project_types/'.request()->route('id').'/edit') ? 'active' : '')}}" href="{{ route('project_type.index') }}">Project Type</a>
                </li>
                @endif
                @if(auth::user()->can('View_Project_Unit'))
                <li class="nav-item">
                  <a class="nav-link
                  {{(Request::is('admin/project_units') ? 'active' : '')}}
                  {{(Request::is('admin/project_units/create') ? 'active' : '')}}
                  {{(Request::is('admin/project_units/show/'.request()->route('id')) ? 'active' : '')}}
                  {{(Request::is('admin/project_units/'.request()->route('id').'/edit') ? 'active' : '')}}" href="{{ route('project_unit.index') }}">Project Units</a>
                </li>
                @endif
                @if(auth::user()->can('View_News'))
                <li class="nav-item">
                  <a class="nav-link
                  {{(Request::is('admin/news') ? 'active' : '')}}
                  {{(Request::is('admin/news/create') ? 'active' : '')}}
                  {{(Request::is('admin/news/'.request()->route('id').'/edit') ? 'active' : '')}}" href="{{ route('news.index') }}">News</a>
                </li>
                @endif
                @if(auth::user()->can('View_Permission'))
                <li class="nav-item">
                  <a class="nav-link
                  {{(Request::is('admin/permissions') ? 'active' : '')}}
                  {{(Request::is('admin/permissions/create') ? 'active' : '')}}
                  {{(Request::is('admin/permissions/'.request()->route('id').'/edit') ? 'active' : '')}}" href="{{ route('permission.index') }}">Permissions</a>
                </li>
                @endif
                @if(auth::user()->can('View_Role'))
                <li class="nav-item">
                  <a class="nav-link
                  {{(Request::is('admin/roles') ? 'active' : '')}}
                  {{(Request::is('admin/roles/create') ? 'active' : '')}}
                  {{(Request::is('admin/roles/'.request()->route('id').'/edit') ? 'active' : '')}}" href="{{ route('role.index') }}">Roles</a>
                </li>
                @endif
              </ul>
            </nav>
            <main class="col-sm-9">
              @yield('content')
            </main>
          </div>
        </div>
        @endguest
    </div>
<!-- Scripts -->
@yield('script')
</body>
</html>
