<!-- App layout for Student view -->
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="app">
           <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

<!-- Students view -->
<div class=head>
<h1>Student details</h1>
</div>
<br>
<div class=form>
<form action="{{route('students.store')}}" method="POST">
@csrf
<label><h5>Name</h5></label><br>
<input type="text" name=name placeholder="enter name" required>
<br><br>
<label><h5>Email id</h5></label><br>
<input type="text" name=email placeholder="enter email" required>
<br><br>
<label><h5>Phone no</h5></label><br>
<input type="text" name=number placeholder="enter phone number" required><br>
<br><br>
<button type=submit>Submit</button>
</form>
</div>
<br>
<!-- Table for fetching data -->
<div class=tbl>
<h1>Data of students</h1>
<table border='1'>
<tr>
    <th>Name</th>
    <th>Email id</th>
    <th>Phone number</th>
    <th>Update</th>
    <th>Delete</th>
</tr>
@foreach($s1 as $s1)
<tr>
    <td>{{$s1->name}}</td>
    <td>{{$s1->email}}</td>
    <td>{{$s1->number}}</td>
    <td><a href="{{route('students.edit',$s1->id)}}"><button>Update</button></a></td>
    <!-- Delete form for destroying data -->
     <td>
     <form action="{{route('students.destroy',$s1->id)}}" method='POST'>
         @csrf
         @METHOD('DELETE')
         <button type=submit>Delete</button>
     </form>
     </td>
</tr>
@endforeach
</table>
</div>
</div>



<style>
.app{
    background: #FFC0CB;
    
    
}
    .head h1{
        margin-left:20px;
        margin-top:-30px;
       
    }
    .form{
        margin-left:20px;
    }
    .tbl{
        margin-left:20px;
    }
    .tbl td{
        padding:5px;
    }
    .tbl th{
        padding:5px;
    }
</style>

</body>
</html>