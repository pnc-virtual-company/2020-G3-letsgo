@extends('admin.dashboard')
@section('content')
<div class="container mt-3">
    <div class="container">
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
    <div class="row" style="margin-left: 83%">
      <ul class="nav nav-tabs ml">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('exploreEvent') }}">Card</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('calendarview')}}">Calendar</a>
      </li>
      </ul>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div id="calendar"></div>
            {{-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> --}}

              <!-- Modal -->
              <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                      <p>Some text in the modal.</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>

                </div>
              </div>
        </div>
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