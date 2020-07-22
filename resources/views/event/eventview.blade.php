
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
       <td>{{$event->user->firstname}}</td>
       <td>{{$event->city}}</td>
       <td>{{$event->title}}</td>
       <td>{{$event->category->name}}</td>
       <td>{{$event->start_date}}</td>
        </tr>
       @endforeach

   </table>
</div>
<div class="col-md-1"></div>
</div>
</div>
@endsection
