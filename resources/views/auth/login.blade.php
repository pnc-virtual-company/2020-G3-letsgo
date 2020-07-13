@extends('layouts.app')

@section('content')

<body class="body-background">
    <div class="container">
        <div class="row d-flex justify-content-center mx-auto">
            <div class="col-md-5 col-xs-12 div-styles">
            <form method="POST" action="{{ route('login') }}">
                        @csrf

                <div class="d-flex justify-content-center mx-auto" >
                    <h2>Login</h2>
                </div>
                <div class="form-group">
                            <label for="email">{{ __('E-Mail Address') }}</label>

                                <input id="email" type="email" class="form-control text-box @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>
                        <div class="form-group">
                            <label for="password" >{{ __('Password') }}</label>


                                <input id="password" type="password" class="form-control text-box @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                <div class="form-group ">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Create account') }}</a>
                    <button type="submit" class="btn btn-primary float-right">Login</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</body>
@endsection
<style>
.div-styles{
    margin-top : 4rem;
    padding : 2rem;
    background: white;
    border-radius: 20px;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 0.5rem 1rem 0px;
}

</style>