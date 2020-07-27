<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
@extends('admin.dashboard')

@section('content')
<div class="container" style="margin-top:5%">
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
<form action="/search" method="POST" role="search">
        {{ csrf_field() }}
        <div class="input-group">
            <input type="text" class="form-control" name="q"
                placeholder="Search users"> <span class="input-group-btn">
                <button type="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
        </div>
    </form>
    <h1 class="text-center mt-3">Event view</h1>
   <table class="table table-warning table-hover mt-3" style="margin-top:15px">
       <tr>
           <th>Organizer</th>
           <th>City</th>
           <th>Title</th>
           <th>Category</th>
           <th>Start date</th>
       </tr>

       @foreach ($events as $event)
       <tr>
       <td class="action">{{$event->user->firstname}}</td>
       <td class="action">{{$event->city}}</td>
       <td class="action">{{$event->title}}</td>
       <td class="action">{{$event->category->name}}</td>
       <td class="action">{{$event->start_date}}</td>
       <td class="action_hidden">
        <a href="{{route('deleteEvent',$event->id)}}" class="text-danger" data-toggle="modal" data-target="#delete{{$event->id}}"><span class="material-icons text-danger">delete</span></a>
        @method('DELETE')
    </td>
    <div class="modal" id="delete{{$event->id}}">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form action="{{route('deleteEvent',$event->id)}}"  method="POST">
                    @csrf
                    @method('DELETE')
                    <h3 class="mb-4"><b>Remove Event</b></h3>
                    <p>Are you sure you want to delete the event?</p>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">DISCARD</button>
                    <button type="submit" class="btn btn-warning float-right text-light ml-2">REMOVE</button>
                </form>
            </div>
        </div>
        </div>
    </div>
        </tr>
       @endforeach

   </table>
</div>
<div class="col-md-1"></div>
</div>
</div>
<style>
    .action_hidden{
        float: right;
        text: center;
        display: none;
    }
    .action:hover+ .action_hidden{
        display:block;
    }
</style
@endsection
