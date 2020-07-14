@extends('layouts.app')
@section('content')
<style>
    .div-style{
        display: flex;
    }
    .btn-cancel,
    .btn-edit{
        border-radius: 5px;
        margin-top: 15%;
        border: none;
        padding: 10px;
    }
    .time{
        margin-top: 5%;
        margin-left:40px ;
    }
    .image{
        margin-top: 5%;
    }
    .card{
        border-radius: 20px;
    }
    .btn-create {
        background-color: rgb(245, 232, 47);
        border: none;
        padding: 10px 12px;
        font-size: 16px;
        cursor: pointer;
        border-radius: 10px;
        float: right;
}
</style>
<body class="body-background">
    <div class="container">
        <div class="row">
            <div class="col-4"><h3><strong>Your Events</strong></h3></div>
            <div class="col-4"></div>
            <div class="col-4"><a href="#"><button class="btn-create"><i class="fa fa-plus"></i> Create</button></a><br></div>
        </div><br>
        <p><strong>Friday,july 20</strong></p>    
            <div class="card">
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
                   <img src="" alt="png">
                </div>
                <div class="col-4 ">
                    <a href="#"><button type="submit" class="btn-cancel"><strong>Cancel</strong></button></a>
                    <a href="#"><button type="submit" class="btn-edit"><strong>Edit</strong></button></a>
                </div>
                </div>
            </div>
            <br>
            
            <div class="card">
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
                    <img src="" alt="png">
                </div>
                <div class="col-4 ">
                    <a href="#"><button class="btn-cancel"><strong>Cancel</strong></button></a>
                    <a href="#"><button class="btn-edit"><strong>Edit</strong></button></a>
                </div>
                </div>
            </div>
        </div>
</body>
@endsection
