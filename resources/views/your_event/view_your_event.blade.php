@extends('admin.dashboard')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
@section('content')
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
    .btn-create {
        background-color: rgb(245, 232, 47);
        border: none;
        padding: 10px 12px;
        font-size: 16px;
        cursor: pointer;
        border-radius: 10px;
        float: right;
}
</style>
<body class="body-background">
    <div class="container" style="margin-top:100px;">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
            <h1 class="text-center mt-3">Your Events</h1>
                {{-- ======================== create event =================== --}}
     <button type="button" class="btn btn-warning float-right btn-lg" data-toggle="modal" data-target="#myModal" class="btn"><i class="fa fa-plus"></i>Add</button>
        <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Create Event</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-9">
                        <form  action="{{route('event.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                                <div class="form-group">
                                    <select name="category" id="" class="form-control" >
                                    <option selected disabled>Choose Category</option>
                                    @foreach($categories as $category)
                                        <option name="category" value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            StartDate: <input type="date" class="form-control" name="start_date" id="startDate">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            Start Time: <br>
                                            <input type="time" name="start_time"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            EndDate: <input type="date" class="form-control" name="end_date" id="endDate">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            End Time: <br>
                                            <input type="time" name="end_time" placeholder="Time">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                <select class="form-control" name="city" id="cityEvent">
                                <option name="city" value="{{Auth::user()->city}}" selected >{{Auth::user()->city}}</option>
                                </select>
                                </div>
                                <div class="form-group">
                                    <textarea name="description" minLength="50" required cols="63" rows="5" class="form-control" placeholder="Description"></textarea>
                                </div>
                        </div>
                        <div class="col-3">
                                {{-- default profile --}}
                            <img src="{{asset('image/event.png')}}" width="100px" height="100px" style="border-radius:15px;">

                            <input id="file" style="display:none;" type="file" name="picture">
                            <label for="file" class="btn"><i class="fa fa-plus text-dark"></i></label>
                        </div>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Discard</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <br><br>
        {{-- ======================== view event ================== --}}
        <?php $data = $events?>
        @foreach ($data as $item =>$events)
            
        @foreach($events as $yourEvents)
        @if(auth::user()->id == $yourEvents->user_id)
        @if ($yourEvents->start_date)
        <?php $date = new DateTime($yourEvents->start_date);?>
        <?php echo date_format($date, 'l,F Y'); ?>
        @endif
            <div class="card">
                <div class="div-style">
                <div class="col-2 time" style="margin-top:8%">
                    <h5 class="text-secondary">
                        <?php
                        $currentDateTime = $yourEvents['start_time'];
                        echo $newDateTime = date(' h:i A', strtotime($currentDateTime));
                        ?>
                    </h5>
                </div>
                <div class="col-3 mt-5">
                    <h6>{{$yourEvents->category->name}}</h6>
                    <h3>{{$yourEvents->title}}</h3>
                    <p>
                        @if ($yourEvents->joins->count('user_id')>1)
                        {{$yourEvents->joins->count('user_id')}} members going                  
                        @else
                        {{$yourEvents->joins->count('user_id')}} member going                        
                        @endif
                    </p>
                </div>
                <div class="col-3 image mt-4">
            <img src="{{asset('image/'.$yourEvents->picture)}}" width="100" height="100" style="border-radius:15px;" alt="">
                </div>
                <div class="col-4 mt-4">
                  {{-- delete Event button --}}
                    <button type="submit" class="btn btn-danger btn-md mt-5" data-toggle="modal" data-target="#removeEvent{{$yourEvents->id}}" ><i class="fa fa-ban" aria-hidden="true">Cancel</i></button>
                     <!-- Form Remove Category -->
            <div class="modal fade" id="removeEvent{{$yourEvents->id}}">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="{{route('delete',$yourEvents->id)}}"  method="POST">
                            @csrf
                            @method('DELETE')
                            <h3 class="mb-4"><b>Remove Event</b></h3>
                            <p>Are you sure you want to delete the event?</p>
                            <a type="button" class="text-primary float-right" data-dismiss="modal">DISCARD</a>
                            <button type="submit" class="text-danger btn btn-outline-default float-right">REMOVE</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>
                    {{-- Edit Event --}}
                    <button type="button" class="btn btn-primary btn-md mt-5" data-toggle="modal" data-target="#myModal1{{$yourEvents->id}}"><i class="fa fa-pencil-square-o">Edit</i></button>


                    <div id="myModal1{{$yourEvents->id}}" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Edit Event</h3>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-9">
                                    <form action="{{route('event.update',$yourEvents->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                            <div class="form-group">
                                                <select name="category" id="" class="form-control" >
                                                        @foreach ($categories as $category)
                                                      <option value="{{$category->id}}" {{$category->id==$yourEvents->category_id ?
                                                        'selected' : '' }} >{{$category->name}}
                                                    </option>
                                                        @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                            <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{$yourEvents->title}}">
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        StartDate: <input type="date" id="startDate" class="form-control" name="start_date" id="start-date" placeholder="Start Date" value="{{$yourEvents->start_date}}">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        Time: <br>
                                                        <input type="time" name="start_time"  placeholder="Time" value="{{$yourEvents->start_time}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        EndDate: <input type="date" id="endDate" class="form-control" name="end_date" id="end-date" placeholder="End Date" value="{{$yourEvents->end_date}}">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        Time: <br>
                                                        <input type="time" name="end_time" placeholder="Time" value="{{$yourEvents->end_time}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                            
                                                <select class="form-control" name="city" id="cityEvent">
                                                    <option value="{{$yourEvents->city}}" selected>{{$yourEvents->city}}</option>
                                                 </select>
                                            </div>
                                            <div class="form-group">
                                                <textarea name="description" id="" cols="63" rows="5" class="form-control" placeholder="Description">{{$yourEvents->description}}</textarea>
                                            </div>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Discard</button>
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </form>
                                    </div>
                                    <div class="col-3">
                                                @if($yourEvents->picture)
                                                {{-- get profile from user insert --}}
                                                    <img src="{{asset('image/'.$yourEvents->picture)}}" style="border-radius: 15px;" width="100" height="100"  class="img-thumnail"  id="img">
                                                @else
                                                {{-- default profile --}}
                                                    <img class="mx-auto d-block" src="image/event.png"  width="100" style="border-radius: 15px;" height="100" alt="User" class="img-fluid img-circle">
                                                @endif
                                                    {{-- edit button --}}
                                                    <div class="row">
                                                        
                                                        {{-- delete button --}}
                                                        <form action="{{route('event.destroy',$yourEvents->id)}}" method="POST" >
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" style="margin-left: 20px" class="btn bnt-outline-default"> <li class="fa fa-trash text-primary" style="font-size:20px"></li></button>
                                                        </form> 
                                                        <a href="" style="margin-top:10%;margin:left:10px" data-toggle="modal" data-target="#apdatePic{{$yourEvents->id}}"><i class="fa fa-lg fa-edit"></i></a>
                                                    </div>
                                                <!-- Modal -->
                                                <div id="apdatePic{{$yourEvents->id}}" class="modal fade" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Update Profile</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <form action="{{route('updateProfilePicEvent',$yourEvents->id)}}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="file" name="picture" >
                                                            <button type="submit" class="btn btn-secondary">add</button>
                                                        </form>
                                                    </div>
                                                    </div>

                                                </div>
                                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <br>
            @endif
        @endforeach
        @endforeach

                </div>
                </div>
            </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</body>{{-- script to show city from json  --}}

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
        var cityEvent = document.getElementById("cityEvent");
    
    // Loop options of event city:
        for(var i = 0; i < array.length; i++) {
         var city = array[i];
         cityEvent.innerHTML += "<option value=\"" + city + "\">" + city + "</option>";
        }
    // Loop options of city:
        for(var i = 0; i < array.length; i++) {
         var city = array[i];
         select.innerHTML += "<option value=\"" + city + "\">" + city + "</option>";
        }
       },
     });
    </script>
@endsection




