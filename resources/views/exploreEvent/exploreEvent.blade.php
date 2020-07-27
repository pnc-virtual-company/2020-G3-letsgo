<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
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
                    <input type="text" name="searchs" id="searchs" class="form-control" placeholder="Search..">
                    </div>
                  <div class="col-4">
                   <label class="float-right">Not too far from city</label>
                  </div>
                  <div class="col-4">
                  <select class="form-control" name="city" id="city">
                    <option name="city" value="{{Auth::user()->city}}" selected>{{Auth::user()->city}}</option>
                  </select>
                  </div>
          </div>
          <div class="event-join mt-5">
            <input type="checkbox" id="" name="" value=""> Event you join only
          </div>
          <div class="date mt-5">
            <p><strong>Friday,july 20</strong></p>
          </div>
          @foreach ($exploreEvents as $item)
              <div class="card">
                  <div class="div-style">
                  <div class="col-2 time">
                      <h5 class="text-secondary">{{$item->start_time}}</h5>
                  </div>
                  <div class="col-4 mt-3">
                      <h6>{{$item->category->name}}</h6>
                      <h5>{{$item->title}}</h5>
                      <p>5 Member</p>
                  </div>
                  <div class="col-2 image ">
                    <img src="{{asset('image/' .$item->picture)}}" width="100px" height="100px" style="border-radius:15px;">
                  </div>
                  <div class="col-4 ">
                     <button href="" type="submit" id="member" class=" btn-edit btn-success"><i class="fa fa-check-circle">Join</i></button>
                    
                    </div>
                  </div>
              </div>
              <br>
              @endforeach
  
        </div>
        <div class="col-md-1"></div>
      
    </div>
    </div>
</body>

{{-- ===================sript to increase member when click join button =====  --}}

<script>

$(document).ready(function(){
    $('#member').on('click',function(){
        var sum = $('#input').val();
        increse(sum);
    })
    $('#one').on('click',function(){
        var sum = $('#input').val();
        dicrese(sum);
    })
})

var increse = (member) => {
     var add = parseInt(member) + 1;
    if(add <= 15){
        $('#input').val(add);
        //  var count = add * 5;
        //  $('#result').html(count);
        compute(add);
    }
}

var dicrese = (member) => {
     var no = parseInt(member) - 1;
     if(no >=0){
        $('#input').val(no);
        // var count =  no / 5;
        //  $('#result').html(count);
        compute(no);
     }
}

function compute(num){
    var computes = num * 5;
    if(number == 0){
        progressBar(result);
    }else{
        progressBar(result + 25);
    }
    $('#result').html(computes);
}

function progresssBar (pro){
    $('#progress').width(pro + "%")
    $('#progress').html(pro + "%")
}




</script>



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
    var select = document.getElementById("city");

// Loop options of city:
    for(var i = 0; i < array.length; i++) {
     var city = array[i];
     select.innerHTML += "<option value=\"" + city + "\">" + city + "</option>";
    }
   },
 });

</script>
@endsection

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

