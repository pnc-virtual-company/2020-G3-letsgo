<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js">
</script>
@extends('admin.dashboard')
@section('content')

<body class="body-background">
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
            <input type="checkbox" id="" name="" value=""> Event you join only
          </div>
          @foreach ($exploreEvents as $item)
            @if ((Auth::user()->id != $item->user_id))  
            @if ($item->start_date)
            {{-- <p><strong>{{$item->created_at}}</strong></p> --}}
            <?php $date = new DateTime($item->start_date);?>
              <?php echo date_format($date, 'l,F Y'); ?>
            @endif
              <div class="card">
                  <div class="div-style">
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
                    <div class="row">
                  <form action="{{route('join',$item->id)}}" method="POST">
                      @csrf
                      <button class="btn btn-success" style="margin-top:50%"><i id="join" class="fa fa-check-circle">Join</i></button>
                    </form>
                    <button type="button" style="margin:30px" class="btn btn-warning" data-toggle="modal" data-target="#myModal{{$item->id}}" style="border-radius: 5px; border:none;"><i class="fa fa-info-circle" aria-hidden="true"> Detail</i></button>
                  </div>
                  </div>
              </div>
            </div>
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
                          <button href="#" type="submit" id="member" class="btn-edit float-right" style="border-radius: 10px;"><i class="fa fa-check-circle">Join</i></button>                 
                        </div>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                      <p>{{$item->description}}</p>
                      </div>
                    </div>
                  </div>
                </div>

              <br>
              @endif
              @endforeach
        </div>
        <div class="col-md-1"></div>
      
    </div>

</body>



{{-- =============== script to view city from json ============= --}}
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
    var select = document.getElementById("cityOfEvent");

// Loop options of city:
    for(var i = 0; i < array.length; i++) {
     var city = array[i];
     select.innerHTML += "<option value=\"" + city + "\">" + city + "</option>";
    }
   },
 });

</script>

{{-- ============= script to search ===========  --}}

<script>
  $(document).ready(function(){
    $("#searchs").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $(".card").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
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

