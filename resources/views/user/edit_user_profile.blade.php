@extends('layouts.app')

@section('content')
<body>
    

    <div class="container">
        <div class="row">
            <div class="col-9 div-styles">
                <form action="">
                    <div class="form-group">
                        <label for="">Firstname</label>
                            <input type="text" class="form-control" name="firstname"   value="{{$user->firstname}}">
                    </div>
                    <div class="form-group">
                        <label for="">Lastname</label>
                            <input type="text" class="form-control" name="lastname"   value="{{$user->lastname}}">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                            <input type="text" class="form-control" name="email"   value="{{$user->email}}">
                    </div>
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" class="form-control" name="password">
                    </div> 
                    <div class="form-group">
                        <label for="password">Confirm Password</label>
                        <input type="password" class="form-control" name="password">
                    </div> 
                    <button type="submit" class="btn btn-warning float-right" data-dismiss="modal">UPDATE</button>
                    <button type="submit" class="btn btn-primary ">DISCARD</button>
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
    </body>
@endsection


{{-- <style>
.div-styles{
    margin-top : 4rem;
    padding : 2rem;
    background: white;
    border-radius: 20px;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 0.5rem 1rem 0px;
display: flex;
        

}

</style> --}}

{{-- <style>
    body {
        color: #fff;
        background: #d47677;
    }
     .form-control {
        min-height: 41px;
        background: rgb(175, 109, 109);
        box-shadow: rgba(0, 0, 0, 0.1) 0px 0.5rem 1rem 0px;
        border-color: #e3e3e3;
    }
    .form-control:focus {
        border-color: #70c5c0;
    }
    .form-control, .btn {        
        border-radius: 2px;
    }
    .login-form {
        width: 400px;
        margin: 0 auto;
        padding: 100px 0 30px;		
    }
    .col-3{
        width: 400px;
       
        padding: 200px 0 30px;	
    }
    .login-form form{
        color: #7a7a7a;
        border-radius: 2px;
        margin-bottom: 15px;
        font-size: 13px;
        background: #ececec;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;	
        position: relative;	
    }
   
    /* .login-form h2 {
        font-size: 22px;
        margin: 35px 0 25px;
    } */
    .login-form .avatar {
        position: absolute;
        margin: 0 auto;
        left: 0;
        right: 0;
        top: -50px;
        width: 95px;
        height: 95px;
        border-radius: 50%;
        z-index: 9;
        background: #70c5c0;
        padding: 15px;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
    }
    .login-form .avatar img {
        width: 100%;
    }	
   
    .login-form .btn, .login-form .btn:active {        
        font-size: 16px;
        font-weight: bold;
        background: #70c5c0 !important;
        border: none;
        margin-bottom: 20px;
    } 
     .login-form .btn:hover, .login-form .btn:focus {
        background: #50b8b3 !important;
    }     
      .login-form a {
        color: #fff;
        text-decoration: underline;
    } 
     .login-form a:hover {
        text-decoration: none;
    } 
     .login-form form a {
        color: #7a7a7a;
        text-decoration: none;
    }  
     .login-form form a:hover {
        text-decoration: underline;
    }  
    
    </style> --}}
    <style>
        .div-style{
            display: flex;
        }
        .btn-cancel,
        .btn-edit{
            border-radius: 5px;
            margin-top: 15%;
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
    </style>
