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
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
     <!-- Trigger the modal with a button -->
     <button type="button" class="btn btn-warning float-right btn-lg" data-toggle="modal" data-target="#myModal" class="btn"><i class="fa fa-plus"></i> Create</button>
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Create Event</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-9">
                            <form action="">
                                <div class="form-group">
                                    <select name="category" id="" class="form-control" >
                                        <option value="">event Category..</option>
                                        <option value="Soccer">Soccer</option>
                                        <option value="Music">Music</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            StartDate: <input type="date" class="form-control" name="start-date" id="start-date" placeholder="Start Date">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            Time: <br> 
                                            <input type="time" name="start_time" placeholder="Time">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            EndDate: <input type="date" class="form-control" name="end-date" id="end-date" placeholder="Start Date">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            Time: <br>
                                            <input type="time" name="end_time" placeholder="Time">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <select name="city" id="city" class="form-control">
                                        <option value="">city...</option>
                                        <option value="Cambodia">Cambodia</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <textarea name="description" id="" cols="63" rows="5" class="form-control" placeholder="Description"></textarea>
                                </div>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Discard</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                        <div class="col-3">
                        @if(Auth::user()->picture)
                                {{-- get profile from user insert --}}
                            <img src="{{asset('asset/image/'.Auth::user()->picture)}}" width="100px" height="100px" id="">
                        @else
                                {{-- default profile --}}
                            <img src="{{asset('asset/image/user.png')}}" width="100px" height="100px" id="">
                        @endif
                            <input id="file" style="display:none;" type="file" name="picture">
                            <label for="file" class="btn"><i class="fa fa-plus text-dark"></i></label>
                            <a href="#"><i class="material-icons">delete</i></a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <br>
        <p><strong>Friday,july 20</strong></p>    
            <div class="card">
                <div class="div-style">
                <div class="col-2 time">
                    <h5 class="text-secondary">2:00 PM</h5>
                </div>
                <div class="col-4 mt-3">
                    <h6>Music</h6>
                    <h3>The Party for finish project</h3>
                    <p>5 Member</p>
                </div>
                <div class="col-2 image">
                   <img src="" alt="png">
                </div>
                <div class="col-4 ">
                    <a href="#"><button type="submit" class="btn-cancel"><strong>Cancel</strong></button></a>
                    <!-- Trigger the modal with a button -->
                    <button type="button" class="btn btn-secondary btn-lg" data-toggle="modal" data-target="#myModal1">Edit</button>
                    <!-- Modal -->
                    <div id="myModal1" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Edit Event</h3>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-9">
                                        <form action="">
                                            <div class="form-group">
                                                <select name="category" id="" class="form-control" >
                                                    <option value="">event Category..</option>
                                                    <option value="Soccer">Soccer</option>
                                                    <option value="Music">Music</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        StartDate: <input type="date" class="form-control" name="start-date" id="start-date" placeholder="Start Date">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        Time: <br>
                                                        <input type="time" name="start_time" placeholder="Time">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        EndDate: <input type="date" class="form-control" name="end-date" id="end-date" placeholder="Start Date">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        Time: <br>
                                                        <input type="time" name="end_time" placeholder="Time">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <select name="city" id="city" class="form-control">
                                                    <option value="">city...</option>
                                                    <option value="Cambodia">Cambodia</option>
                                                    <option value="Thailand">Thailand</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <textarea name="description" id="" cols="63" rows="5" class="form-control" placeholder="Description"></textarea>
                                            </div>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Discard</button>
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </form>
                                    </div>
                                    <div class="col-3">
                                        <img src="1.png" width="100px;" height="100px;">
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
                </div>
                </div>
            </div>
            <br>

            <div class="card">
                <div class="div-style">
                <div class="col-2 time">
                    <h5 class="text-secondary">3:00 PM</h5>
                </div>
                <div class="col-4 mt-3">
                    <h6>Sport</h6>
                    <h3>football matching</h3>
                    <p>10 Member</p>
                </div>
                <div class="col-2 image">
                    <img src="" alt="png">
                </div>
                <div class="col-4 ">
                    <a href="#"><button class="btn-cancel"><strong>Cancel</strong></button></a>
                   <!-- Trigger the modal with a button -->
                   <button type="button" class="btn btn-secondary btn-lg" data-toggle="modal" data-target="#myModal1">Edit</button>
                   <!-- Modal -->
                   <div id="myModal1" class="modal fade" role="dialog">
                   <div class="modal-dialog">
                       <!-- Modal content-->
                       <div class="modal-content">
                       <div class="modal-header">
                           <h3 class="modal-title">Edit Event</h3>
                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                       </div>
                       <div class="modal-body">
                           <div class="container">
                               <div class="row">
                                   <div class="col-9">
                                       <form action="">
                                           <div class="form-group">
                                               <select name="category" id="" class="form-control" >
                                                   <option value="">event Category..</option>
                                                   <option value="Soccer">Soccer</option>
                                                   <option value="Music">Music</option>
                                               </select>
                                           </div>
                                           <div class="form-group">
                                               <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                                           </div>
                                           <div class="form-group">
                                               Time: <input type="time" class="form-control" name="time" id="time" placeholder="Time">
                                           </div>
                                           <div class="form-group">
                                               StartDate: <input type="date" class="form-control" name="start-date" id="start-date" placeholder="Start Date">
                                           </div>
                                           <div class="form-group">
                                               EndDate: <input type="date" class="form-control" name="end-date" id="end-date" placeholder="End Date">
                                           </div>
                                           <div class="form-group">
                                               <select name="city" id="city" class="form-control">
                                                   <option value="">city...</option>
                                                   <option value="Cambodia">Cambodia</option>
                                                   <option value="Thailand">Thailand</option>
                                               </select>
                                           </div>
                                           <div class="form-group">
                                               <textarea name="description" id="" cols="63" rows="5" class="form-control" placeholder="Description"></textarea>
                                           </div>
                                           <button type="button" class="btn btn-default" data-dismiss="modal">Discard</button>
                                           <button type="submit" class="btn btn-success">Submit</button>
                                       </form>
                                   </div>
                                   <div class="col-3">
                                       <img src="1.png" width="100px;" height="100px;">
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
               </div>
               </div>
                </div>
                </div>
            </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</body>
@endsection
