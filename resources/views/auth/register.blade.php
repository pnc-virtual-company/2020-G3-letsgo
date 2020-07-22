@extends('layouts.app')
@section('content')

<body class="body-background" style="background: #f1fcfd">
     <div class="col-4"></div>
     <div class="col-4">
            <div class="card mt-5">
            <div class="card-header mt-3">
			    		<h3 class="panel-title text-center">Create User</h3>
			 			</div>
			 			<div class="card-body">
			    		 <form method="POST" action="{{ route('register') }}">
                            @csrf
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
                            <input id="firstname" type="text"  placeholder="First Name" class="form-control input-sm @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>

                                    @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
                                    <input id="lastname" type="text" placeholder="Last Name" class="form-control input-sm @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                                        @error('lastname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
			    					</div>
			    				</div>
			    			</div>

			    			<div class="form-group">
                            <input id="email" type="email" placeholder="Email Address" class="form-control input-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
			    			</div>

			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
                                    <input id="password" type="password" placeholder="Password" class="form-control input-sm @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Comfirm password">
			    					</div>
			    				</div>
			    			</div>
                            <div class="form-group">
                            <select name="city" id="city" class="form-control" >
                                    <option disabled selected>Choose city</option>
                                 </select>
                            </div>

			    			<input type="submit" value="Register" class="btn btn-info btn-block">

			    		</form>
			    	</div>
	    		</div>
    		</div>
            </div>
     </div>
     <div class="col-4"></div>
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
// Optional: Clear all existing options first:
    select.innerHTML = "<option disabled selected>Choose city</option>";
// Loop options of city:
    for(var i = 0; i < array.length; i++) {
     var city = array[i];
     select.innerHTML += "<option value=\"" + city + "\">" + city + "</option>";
    }
   },
 });

</script>
@endsection

