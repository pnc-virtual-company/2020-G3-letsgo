<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Styles -->
    <link re l="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<style>
    .div-style{
        display: flex;
    }
    .btn-cancel,
    .btn-edit{
        border-radius: 5px;
        margin-top: 10%;
        border: none;
        padding: 10px;
    }
    .time{
        margin-top: 5%;
        margin-left:40px ;
    }
    .image{
        margin-top: 5%;
    }
    .card{
        border-radius: 20px;
    }
    .col-4{
        float: left;
    }
</style>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Let Go') }}
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
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                                <li class="nav-item">
                                </li>
                            @endif
                        @else
                        <li class="nav-item dropdown">
                            <a  class="nav-link " href="{{route('exploreEvent.index')}}" role="button" >
                            <span class="">Explore Event</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{route('yourEvent.create')}}">Your Event</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <span class="caret">Manage</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('event.index')}}">Event</a>
                                <a class="dropdown-item" href="{{route('Category.index')}}">Categories</a>
                            </div>
                        </li>
                        <div class="modal" id="userPopup">
                            <div class="modal-dialog">
                             <div class="modal-content">
                         
                               <!-- Modal Header -->
                               <div class="modal-header">
                                 <h4 class="modal-title">Edit User</h4>
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                               </div>
                         
                               <!-- Modal body -->
                               <div class="modal-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-9 div-styles">
                                          
                                        
                                            <form action="{{route('user.update',Auth::user()->id)}}" method="POST" >
                                                @csrf
                                                @method('PUT')
                                                @foreach ($errors->all() as $error)
                      {{-- <p class="text-danger">{{ $error }}</p> --}}
                      <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $error }}</strong>
                       </div>
                   @endforeach  
                                                <div class="form-group">
                                                    <label for="">Firstname</label>
                                                        <input type="text" class="form-control" name="firstname" value="{{Auth::user()->firstname}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Lastname</label>
                                                        <input type="text" class="form-control" name="lastname" value="{{Auth::user()->lastname}}">
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="">Email</label>
                                                        <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}">
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="password">New Password</label>
                                                    <input  type="password" class="form-control" name="password" required  placeholder="new password">
                                                </div> 
                                                
                        
                                               
                                                <div class="form-group">
                                                    <label for="password-confirm" class="">Confirm Password</label>
                                                    <input  type="password" class="form-control" name="confirm" required  placeholder="confirm password">
                                                </div>
                                               
                                
                                                <button type="submit" class="btn btn-warning float-right" >UPDATE</button>
                                                <button type="submit" class="btn btn-primary " data-dismiss="modal">DISCARD</button>
                                            </form>

                                           
                                        </div>
                                        <div class="col-3">
                                            <img src="1.png" width="100px;" height="100px;">
                                            <br>
                                            <i class="material-icons">add</i>
                                            <i class="material-icons">edit</i>
                                            <i class="material-icons">delete</i>
                                        </div>
                                    </div>
                                </div>
                               </div>
                             </div>
                           </div>
                         </div>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->firstname }} <span class="caret"></span>
                            </a>
                                <!-- The Modal -->
       
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a data-toggle="modal" data-target="#userPopup" class="dropdown-item " href="{{Auth::user()->id}}">Profile</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
</body>
</html>

