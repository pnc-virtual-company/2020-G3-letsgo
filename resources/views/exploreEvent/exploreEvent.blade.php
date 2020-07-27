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
                  <input type="text" class="form-control" placeholder="Search..">
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
            <div class="card">
                <div class="div-style">
                <div class="col-2 time">
                    <h5 class="text-secondary">2:00 PM</h5>
                </div>
                <div class="col-4 mt-3">
                    <h6>Music</h6>
                    <h5>The Party for finish project</h5>
                    <p>5 Member</p>
                </div>
                <div class="col-2 image">
                    <p>picture</p>
                </div>
                <div class="col-4 ">
                   <button href="" type="submit" class=" btn-edit btn-success"><i class="fa fa-check-circle">Join</i></button>
                </div>
                </div>
            </div>
            <br>

            <div class="card ">
                <div class="div-style">
                <div class="col-2 time">
                    <h5 class="text-secondary">3:00 PM</h5>
                </div>
                <div class="col-4 mt-3">
                    <h6>Sport</h6>
                    <h5>football matching</h5>
                    <p>10 Member</p>
                </div>
                <div class="col-2 image">
                    <p>picture football</p>
                </div>
                <div class="col-4 ">
                    <button href="" type="submit" class="btn-cancel btn-danger"><i class="fa fa-times-circle">Quit</i></button>
                </div>
                </div>
            </div>
      </div>
      <div class="col-md-1"></div>
    </div>
    </div>
</body>
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

