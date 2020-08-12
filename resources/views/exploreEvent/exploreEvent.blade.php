<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

@extends('admin.dashboard')
@section('content')

<body class="body-background">
    <div class="container"  style="margin-top:100px;">
    <div class="row">

      <div class="col-md-1"></div>
        <div class="col-md-10">
        <h1 class="text-center mt-3">Explore Events</h1>
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
                  <input name="city"  class="form-control autoSuggestion"   list="result" placeholder="Country..." id="searchLocation" required>
                  <datalist id="result"></datalist>
                  </div>
          </div><br>
          <div class="event-join mt-5">

          {{--====== checkbox  ==========--}}
                        <div class="form-check " style="margin-left:30px">
                            @if (Auth::user()->check != 1)
                                <input type="checkbox" id="checkbox" name="checkbox[]" value="{{Auth::user()->check}}" class="form-check-input"> 
                            @endif
                            <label class="form-check-label" for="checkbox">Event you join only</label>
                        </div>
                        <form id="userNotCheck" action="{{route('userNotCheck',1)}}" method="post">
                            @csrf
                            @method('put')
                        </form>
                        {{--======end checkbox  ==========--}}

                        <div class="container">
                          <div class="row float-right">
                            <ul class="nav nav-tabs ml">
                            <li class="nav-item">
                              <a class="nav-link btn btn-secondary" href="{{ url('exploreEvent') }}"><i class="fa fa-id-card-o" aria-hidden="true">Card</i></a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link btn btn-secondary" href="{{route('calendarview')}}"><i class="fa fa-calendar" aria-hidden="true">Calendar</i></a>
                            </li>
                            </ul>
                          </div>
                      </div>
                      <br>
                      <br>
            <?php
            $date = date('Y-m-d');
          ?>
          @foreach ($exploreEvents as $item)
            @if (Auth::id() != $item->user_id)
          <div class="contain">
            <p>{{$item->start_date}}</p>
          <div class="card ">
          <div class="div-style mt-3">
            <div class="col-2 time">
              <h5 class="text-secondary">
                  <?php
                  $currentDateTime = $item['start_time'];
                  echo $newDateTime = date(' h:i A', strtotime($currentDateTime));
                  ?>
              </h5>
          </div>
          <div class="col-3 mt-4">
              <h6>{{$item->category->name}}</h6>
              <h5>{{$item->title}}</h5>
              <h5 style="display:none;">{{$item->city}}</h5>
                @if ($item->joins->count('user_id')>1)
                <p>{{$item->joins->count('user_id')}} members going</p>                      
                @else
                <p>{{$item->joins->count('user_id')}} member going</p>                        
                @endif
          </div>
          <div class="col-3 image mt-2">
            <img src="{{asset('image/' .$item->picture)}}" width="100px" height="100px" style="border-radius:15px">
          </div>
          <div class="col-4 mt-2">
            <div class="row" style="display: flex; justify-content:center; align-items:center">
              @foreach ($item->joins as $join)
              @if ($item->id == $join->event_id && $join->user_id == Auth::id())
              <form action="{{route('quit', $join->id)}}" method="post">
              @csrf
              @method("delete")
              <button type="submit" class="btn btn-sm btn btn-danger mt-4 quit-nutton">
              <i class="fa fa-times-circle"></i>
              <b>Quit</b>
              </button>
              </form>
              @endif
              @endforeach

              {{-- Don't change class name --}}
              <form action="{{route('join', $item->id)}}" method="post">
              @csrf
              <div class="join_button">
              <input type="hidden" class="event_id" value="{{$item->id}}">
              </div>
              <div class="show_join_button" >
              </div>
              </form>
              {{-- end --}}
              <button type="button" style="margin:10px; margin-top:20px; border-radius: 5px; border:none;" class="btn btn-warning" data-toggle="modal" data-target="#myModal{{$item->id}}"><i class="fa fa-info-circle" aria-hidden="true">Detail</i></button>
          </div>
          </div>
      </div>
    </div>
    </div>
          @endif


              <!-- The Modal Detail of explore Event -->
                <div class="modal fade" id="myModal{{$item->id}}" >
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <div class="col-6 mt-5">
                          <img src="{{asset('image/' .$item->picture)}}" width="200px" height="200px">
                        </div>
                        <div class="col-6">
                          <p><strong>{{$item->category->name}}</strong></p>
                          <h2><strong>{{$item->title}}</strong></h2>
                          <p><i class="fa fa-map-marker" aria-hidden="true"></i> {{$item->city}}</p>
                          <p><i class="fa fa-users" aria-hidden="true"></i>
                            @if ($item->joins->count('user_id')>1)
                            {{$item->joins->count('user_id')}} members going                  
                            @else
                            {{$item->joins->count('user_id')}} member going                        
                            @endif</p>
                          <p><i class="fa fa-user" aria-hidden="true"></i> Organized by: {{$item->user->firstname}}</p>
                          <p><i class="fa fa-clock-o" aria-hidden="true"></i> {{$item->start_date}}  
                          <?php
                            $startTime = $item['start_time'];
                            $endTime = $item['end_time'];
                            echo $newDateTime = date(' h:i A', strtotime($startTime));
                            echo "</br> to";
                            echo $newDateTime = date(' h:i A', strtotime($endTime));
                          ?></p>
                           <div class="col-4 mt-2">
                            <div class="row" style="display: flex; justify-content:center; align-items:center">
                              @foreach ($item->joins as $join)
                              @if ($item->id == $join->event_id && $join->user_id == Auth::id())
                              <form action="{{route('quit', $join->id)}}" method="post">
                              @csrf
                              @method("delete")
                              <button type="submit" class="btn btn-sm btn btn-danger mt-4 quit-nutton">
                              <i class="fa fa-times-circle"></i>
                              <b>Quit</b>
                              </button>
                              </form>
                              @endif
                              @endforeach
                              
                              {{-- Don't change class name --}}
                              <form action="{{route('join', $item->id)}}" method="post">
                              @csrf
                              <div class="join_button">
                              <input type="hidden" class="event_id" value="{{$item->id}}">
                              </div>
                              <div class="show_join_button" >
                              </div>
                              </form>
                          </div>
                          </div>
                        </div>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                      <p style="word-wrap: break-word;">{{$item->description}}</p>
                      </div>
                    </div>
                  </div>
                </div>
              <br>
              @endforeach
                          
        </div>
        <div class="col-md-1"></div>
      
    </div>

</body>

{{-- =============== script to view city from json ============= --}}
<script>
 //    List the city not far from
 var value = {!! json_encode(Auth::user()->city, JSON_HEX_TAG) !!}.toLowerCase()
                $(".contain").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
                $("#searchLocation").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $(".contain").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });

</script>

{{-- ============= script to search ===========  --}}

<script>
  
  $(document).ready(function(){
    $("#searchs").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $(".contain").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
     // check only user event
     $("#checkbox").on('click', function () {
                var data = checkbox_event();
                if (data == 0) {
                    $('#userNotCheck').submit();
                }
     });
  });

   // ------------------- importand ---------------------//
   joinButton()
        function joinButton(){
            var eventJoin = {!! json_encode($joinEvent, JSON_HEX_TAG) !!}
            var user_id = {!! json_encode(Auth::id(), JSON_HEX_TAG) !!}
            var event_id = document.getElementsByClassName('join_button');
            var show_join_button = document.getElementsByClassName('show_join_button');
            var data;
            var arrayEvent = [];
            for (let i = 0; i < event_id.length; i++) {
                eventJoin.forEach(items => {
                    data = event_id[i].getElementsByClassName('event_id')[0];
                    if(data.value == items.event_id){
                        arrayEvent.push(items.event_id)
                    }
                });
                if (arrayEvent[i] === undefined){
                    arrayEvent.push('!join');
                    show_join_button[i].innerHTML = `
                    <button class="btn btn-sm btn btn-success mt-4 float-right join-button">
                        <i class="fa fa-check-circle"></i>
                        <b>Join</b>
                    </button>
                    `;
                }
            }
        }
        // -----------------------end---------------------------


   // return value of checkbox
   function checkbox_event(){
                var checkBox = document.getElementById('checkbox');
                if (checkBox.checked === true)
                {
                    var value = document.getElementById('checkbox').value;
                    return value;
                }
                else
                {
                    var value = document.getElementById('checkbox').value;
                    return value;
                }
        }
        // end click

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