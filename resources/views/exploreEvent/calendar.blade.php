@extends('admin.dashboard')
@section('content')
<div class="container"  style="margin-top:100px;">
        <div class="row">
          <div class="col-md-1"></div>
            <div class="col-md-10">
            <h3>Find your Event!</h3>
              <div class="card-search">
                      <div class="col-4">
                        <div class="form-group">
                          <i class="large material-icons form-control-feedback">search</i>
                          <input type="text"  name="searchs" id="searchs" class="form-control search_event" placeholder="Search" onkeyup="myFunction()" id="searching">
                        </div>
                        </div>
                      <div class="col-4">
                       <label class="float-right">Not too far from city</label>
                      </div>
                      <div class="col-4">
                      <select class="form-control" name="city" id="cityOfEvent">
                        <option name="city" value="{{Auth::user()->city}}" selected>{{Auth::user()->city}}</option>
                      </select>
                      </div>
              </div><br>
              <div class="event-join mt-5">
    
              {{--====== checkbox  ==========--}}
                            <div class="form-check " style="margin-left:30px">
                                @if (Auth::user()->check != 1)
                                    <input type="checkbox" id="checkbox" name="checkbox[]" value="{{Auth::user()->check}}" class="form-check-input"> 
                                @endif
                                <label class="form-check-label" for="checkbox">Event you join only in calendar</label>
                            </div>
                            <form id="userNotCheck" action="{{route('userNotCheck',1)}}" method="post">
                                @csrf
                                @method('put')
                            </form>
                            {{--======end checkbox  ==========--}}
                            </div>
</div>

<div class="container">
    <div class="row">
       <div class="col-1"></div>
       <div class="col-10">
          <ul class="nav nav-tabs ml" style="float: right;">
          <li class="nav-item">
            <a class="btn btn-secondary" class="nav-link" href="{{ url('exploreEvent') }}"><i class="fa fa-id-card-o" aria-hidden="true">Card</i></a>
          </li>
          <li class="nav-item">
            <a class="btn btn-secondary" class="nav-link" href="{{route('calendarview')}}"><i class="fa fa-calendar" aria-hidden="true">Calendar</i></a>
          </li>
          </ul>
       </div>
       <div class="col-1"></div>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div id="calendar"></div>
        </div>
        <div class="col-1"></div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    timeZone: 'UTC',
    initialView: 'dayGridMonth',
    events:[
      @foreach($events as $event)
        {
          title: '{{$event->title}}: <?php $date = new DateTime($event->start_time); echo date_format($date, 'g:iA');?>',
          start: '{{$event->start_date}}',
          end: '{{$event->end_date}}'
        },
      @endforeach
    ] ,
    editable: true,
    selectable: true
  });

  calendar.render();
});
</script>
<style>
  .search_event {
width: 100%;
padding-left: 2rem;
border-radius: 20px;
}
.form-control-feedback {
position: absolute;
width: 2.375rem;
text-align: center;
color: rgb(56, 55, 55);
margin-top: 8px;
}
</style>
@endsection