<<<<<<< HEAD
@extends('layout/login')
@section('titulo','RH MAIS')
@section('conteudo')

<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form method="POST" action="{{ route('login') }}">
                    {{csrf_field()}}
                    <h1>LOGIN RH MAIS</h1>
                    <div>
                        <input placeholder="e-mail" id="email" type="email"
                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                            value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div>
                        <input placeholder="Senha" id="password" type="password"
                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                            required>
                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div>
                        <button type="submit" class="btn btn-default submit">
                            {{ __('Logar') }}
                        </button>
                        @if (Route::has('password.request'))
                        <!-- - <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Esqueceu sua senha?') }}
                                    </a> -->
                        @endif
                    </div>
                    <div class="clearfix"></div>
                    <div class="separator">
                        <!-- criar conta dentro do sistema
                <p class="change_link">Novo no sistema?
                  <a href="/user-add"> Criar Conta </a> -->
                        </p>
                        <div class="clearfix"></div>
                        <br />
                        <div>
                            <img src="{{asset('images/logo.png')}}" alt="" style="width:100px;">
                            <p>©2019 RH MAIS Todos os direitos reservados</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>

        @endsection
=======
@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    @include('layouts.headers.guest')

    <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card bg-secondary shadow border-0">
                    <!-- <div class="card-header bg-transparent pb-5">
                        <div class="text-muted text-center mt-2 mb-3"><small>{{ __('Sign in with') }}</small></div>
                        <div class="btn-wrapper text-center">
                            <a href="#" class="btn btn-neutral btn-icon">
                                <span class="btn-inner--icon"><img src="{{ asset('argon') }}/img/icons/common/github.svg"></span>
                                <span class="btn-inner--text">{{ __('Github') }}</span>
                            </a>
                            <a href="#" class="btn btn-neutral btn-icon">
                                <span class="btn-inner--icon"><img src="{{ asset('argon') }}/img/icons/common/google.svg"></span>
                                <span class="btn-inner--text">{{ __('Google') }}</span>
                            </a>
                        </div>
                    </div> -->
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <!-- <small>
                                <a href="{{ route('register') }}">{{ __('Create new account') }}</a> {{ __('OR Sign in with these credentials:') }}
                            </small> -->
                            <br>
                            <small>
                                {{ __('Username') }} <strong>admin@argon.com</strong>
                                {{ __('Password') }} <strong>secret</strong>
                            </small>
                        </div>
                        <form role="form" method="POST" action="{{ route('login') }}">
                            {{csrf_field()}}

                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" value="admin@argon.com" required autofocus>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Senha') }}" type="password" value="secret" required>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="custom-control custom-control-alternative custom-checkbox">
                                <input class="custom-control-input" name="remember" id="customCheckLogin" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="customCheckLogin">
                                    <span class="text-muted">{{ __('Remember me') }}</span>
                                </label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">{{ __('Login') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 text-center">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-light">
                                <small>{{ __('Esqueceu a senha?') }}</small>
                            </a>
                        @endif
                    </div>
                    <div class="col-6 text-right">
                       <!--  <a href="{{ route('register') }}" class="text-light">
                            <small>{{ __('Create new account') }}</small>
                        </a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
>>>>>>> 2215e0e2d723ef7c81cf215bf832dbb425588a3c
