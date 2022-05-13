@extends('layouts.plantilla')


@section('content')

<div class="container">
    <div class="row my-5">

        @isset($msj)
            <div>{{$msj}}</div>
         @endisset
         
        
         @if (!isset(Auth::guard('cliente')->user()->id)) 
         
        <div class="col-md-6">
            @if(session()->has('danger'))
         <div class="alert alert-danger">
             {{ session()->get('danger') }}
         </div>
     @endif
            <div class="mb-2" style="font-size:28px" style="font-family: Roboto, Regular">Iniciar Sesión</div>
            <form method="POST" action="{{ route('login.clientes') }}">
                @csrf
                <div class="form-group row">
                    <label for="username" class="">{{ __('Username') }}</label>

                    <div class="col-md-12 mt-2">
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                        <input id="name" type="hidden" name="name" value="0" >

                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row my-2">
                    <label for="password" class="">{{ __('Contraseña') }}</label>

                    <div class="col-md-12 mt-2">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0 mt-5">
                    <div class="col-md-12 ">
                        <button type="submit" class="btn btn-primary px-5" style="font-family: Roboto, Regular">
                            {{ __('Iniciar sesion') }}
                        </button>
                    </div>
                </div>
            </form>
             @endif 

        </div>
        <div class="col-md-6">
            @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

            <div class="">
                <div class="mb-2" style="font-size:28px" style="font-family: Roboto, Regular">Registrate</div>

                <div class="">
                    <form method="POST" action="{{ route('registro_cliente_post') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="">{{ __('Nombre') }}</label>

                            <div class="col-md-12 mt-2">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                <input id="name" type="hidden" name="name" value="0" >

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="">{{ __('Correo electronico') }}</label>

                            <div class="col-md-12 mt-2">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="password" class="">{{ __('Contraseña') }}</label>

                            <div class="col-md-12 mt-2">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="">{{ __('Confirmar contraseña') }}</label>

                            <div class="col-md-12 mt-2">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0 mt-5">
                            <div class="col-md-12 ">
                                <button type="submit" class="btn btn-primary px-5" style="font-family: Roboto, Regular">
                                    Registrate
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection