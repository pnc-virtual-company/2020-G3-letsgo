@extends('layouts.app')
@section('content')

<body class="body-background">
    <div class="container">
        <h1>Find your Event!</h1>
        <div class="card-search">
                <div class="col-4">
                  <input type="text" class="form-control" placeholder="Search..">
                  </div>
                <div class="col-4">
                 <label class="float-right">Not too far from city</label>
                </div>
                <div class="col-4">
                 <select name="city" id="" class="form-control" >
                   <option value="">City</option>
                 </select>
                </div>
        </div>
        <div class="event-join mt-5">
        <input type="checkbox" id="" name="" value=""> Event you join only
        </div>
          <div class="date mt-5">
             <p><strong>Friday,july 20</strong></p>
          </div>
            <div class="card ">
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
                    <h3>football matching</h3>
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
</body>
@endsection