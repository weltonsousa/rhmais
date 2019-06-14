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
             @csrf
              <h1>LOGIN RH MAIS</h1>
               <div>
                                <input placeholder="e-mail" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
             <div>
                                <input placeholder="Senha"  id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
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
                                   -<a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Esqueceu sua senha?') }}
                                    </a>
                                @endif
                            </div>
                       <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Novo no sistema?
                 <a href="{{ route('user-add')}}" class="to_register"> Criar Conta </a>
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

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form class="form-horizontal form-label-left" novalidate action="{{ route('user-post') }}" method="post">
            @csrf
              <h1>Criar Conta</h1>
              <div>
                <input type="text" class="form-control"  placeholder="Usuario" required="" />
                @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="required" />
                                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
                @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
              </div>
              <div>
                <a  id="send" type="submit" class="btn btn-default submit" href="index.html">Criar</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Já Possue Conta ?
                  <a href="#signin" class="to_register"> Entrar </a>
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
      </div>
    </div>
@endsection
