


@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:5%">

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
   <table class="table table-hover" style="margin-top:15px">
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
       <td>{{$event->city->name}}</td>
       <td>{{$event->title}}</td>
       <td>{{$event->category->name}}</td>
       <td>{{$event->start_date}}</td>
        </tr>
       @endforeach

   </table>
</div>
@endsection
