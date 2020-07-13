@extends('layouts.app')

@section('content')

<body class="body-background" style="background: #f1fcfd">
    <img src="" alt="">
    <div class="container">

        <div class="row">
        <div class="col-3"></div>
        <div class="col-6">

            <div class="card" style="border: 1px solid #1ab2c5">
                <div class="card-header" style="background:#9bdbe6;color:white"><h4 class="text-center" >Create account</h4></div>
                <div class="card-body" style="background:#d7f0f5">
                    <form method="POST" action="{{route('user.store')}}">
                        @csrf
    
                    {{-- field fistname --}}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label  for="firstname">{{ __('Firstname') }}</label>
    
                            <input  placeholder="firstname" id="firstname" type="firstname" class="form-control text-box @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname">
    
                            @error('firstname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    {{-- field lastname --}}

                        <div class="form-group col-md-6">
                            <label  for="lastname">{{ __('Lastname') }}</label>
    
                            <input  placeholder="lastname" id="lastname" type="lastname" class="form-control text-box @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname">
    
                            @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>
    

                      <div class="form-row">

                        {{-- field email --}}

                        <div class="form-group col-md-6">
                            <label for="email">{{ __('E-Mail Address') }}</label>
    
                            <input placeholder="email" id="email" type="email" class="form-control text-box @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- password  --}}
                        <div class="form-group col-md-6">
                            <label for="password" >{{ __('Password') }}</label>    
                            <input placeholder="password" id="password" type="password" class="form-control text-box @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>                   
                        </div>               
                              
                    <div class="form-group ">
                        <a style="color:red" class="nav-link" href="{{ route('login') }}">{{ __('Or back to sign in') }}</a>
                        <button type="submit" class="btn btn-success float-right">Next</button>
                    </div>
                </form>
                </div>
               
            </div>
        </div>
        <div class="col-3"></div>
    
    </div>
</div>
    
</body>
@endsection

