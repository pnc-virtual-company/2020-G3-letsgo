<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    {{-- font-awesome --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
    {{-- javascript link --}}
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
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
    .py-4{
        background-color: #f1fcfd;
    }
</style>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="">
                    <h5>Let's Go</h5>
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
                            <a class="nav-link" href="{{route('event.create')}}">Your Event</a>
                        </li>
                        @if(auth::user()->role == 1)
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <span class="caret">Manage</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('event.index')}}">Event</a>
                            <a class="dropdown-item" href="{{route('Category.index')}}">Categories</a>
                            </div>
                        </li>
                        @endif
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
                                    <div class="col-12 div-styles">
                                            <div class="form-image text-center">
                                                @if(Auth::user()->picture)
                                                {{-- get profile from user insert --}}
                                                    <img src="{{asset('image/'.Auth::user()->picture)}}" style="border-radius: 40px;" width="80" height="80"  class="img-thumnail"  id="img">
                                                @else
                                                {{-- default profile --}}
                                                    <img class="mx-auto d-block" src="image/user.png"  width="80" style="border-radius: 40px;" height="80" alt="User" class="img-fluid img-circle">
                                                @endif
                                                <br><br>
                                                 {{-- <!-- Trigger the modal with a button --> --}}
                                                <a href="" data-toggle="modal" data-target="#apdatePic"><i class="fa fa-edit fa-lg"></i></a> 

                                                <!-- Modal -->
                                                <div id="apdatePic" class="modal fade" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Update User Profile</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <form action="{{route('updatepic',Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
                                                             @csrf
                                                            @method('PUT')
                                                            <input type="file" name="picture" class="style:display=non">
                                                            <button type="submit" class="btn btn-secondary">add</button>
                                                        </form>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        <div class="form-row ">
                                            <div class="col-2"></div>
                                            <div class="col-8">
                                            </div>
                                            <div class="col-2"></div>
                                        </div>
                                        <form action="{{route('user.update',Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="">Firstname</label>
                                                            <input type="text" class="form-control" name="firstname" value="{{Auth::user()->firstname}}">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                    <label for="">Lastname</label>
                                                        <input type="text" class="form-control" name="lastname" value="{{Auth::user()->lastname}}">
                                                </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Email</label>
                                                    <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="city" class="col-md-12">City</label>
                                                    <select class="form-control" name="city" id="city">
                                                        <option name="city" value="{{Auth::user()->city}}" selected>{{Auth::user()->city}}</option>
                                                    </select>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                    <label for="password">New Password</label>
                                                        <input  type="password" class="form-control" name="password" required  placeholder="new password">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                    <label for="password-confirm" class="">Confirm Password</label>
                                                        <input  type="password" class="form-control" name="confirm" required  placeholder="confirm password">
                                                </div>
                                                </div>
                                                <button type="submit" class="btn btn-warning float-right" >UPDATE</button>
                                                <button type="submit" class="btn btn-primary " data-dismiss="modal">DISCARD</button>
                                            </form>

                                            {{-- -------------------------form delete profile-----------------------  --}}

                                            <form action="{{route('user.destroy',Auth::user()->id)}}" method="POST" id="deleteProfile">
                                            @csrf
                                            @method('delete')
                                        </form>
                                        {{-- ------------------------------------------------  --}}
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
         <!------------------ Change password------------->
         <div id="pwdPopup" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Change Password</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="{{route('changePassword')}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <input id="old-password" placeholder="Password" type="password" class="form-control" name="old-password" required >
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                             <div class="form-group">
                                <input id="new-password"  type="password" class="form-control " name="new-password" placeholder="new password" required  >

                                @error('new-password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <input id="password-confirm"  type="password" class="form-control " placeholder="Confirm password"  name="password-confirmation" required autocomplete="new-password">
                                  <span id="error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-default text-primary float-right">Save Change</button>
                    </form>
                </div>
                </div>
            </div>
            </div>
{{----------------- End change password -------------------}}

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
<script>
$.ajax({
//get api
  url:
    "https://raw.githubusercontent.com/russ666/all-countries-and-cities-json/6ee538beca8914133259b401ba47a550313e8984/countries.json?fbclid=IwAR0JKHrJJ4WeGRDp33cx87OuZljnPaouHhDZiad56_TRqF6tPxsc_CX3oPM",
  dataType: "json",
  success: function (data) {
//declare array variable to store city of each country
    let array =[];
//loop city of Afghanistan country
    for (let i = 0; i < data.Afghanistan.length; i++) {
      array.push(data.Afghanistan[i])
    }
 //loop city of Albania country
    for (let i = 0; i < data.Albania.length; i++) {
      array.push(data.Albania[i])
    }
//loop city of Algeria country
    for (let i = 0; i < data.Algeria.length; i++) {
      array.push(data.Algeria[i])
    }
//loop city of Andorra country
    for (let i = 0; i < data.Andorra.length; i++) {
      array.push(data.Andorra[i])
    }
//declare select variable to give value to select box
    var select = document.getElementById("city");
    //declare select variable to give value to select box
    var eventCity = document.getElementById("eventCity");
// Loop options of event city:
    for(var i = 0; i < array.length; i++) {
     var city = array[i];
     eventCity.innerHTML += "<option value=\"" + city + "\">" + city + "</option>";
    }
// Loop options of city:
    for(var i = 0; i < array.length; i++) {
     var city = array[i];
     select.innerHTML += "<option value=\"" + city + "\">" + city + "</option>";
    }
   },
 });
</script>