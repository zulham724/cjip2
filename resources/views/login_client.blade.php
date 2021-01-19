@extends('front-end.master.newest-master')

@section('content')
    <div class="col-12 col-m-12" style="padding-top: 15%">
        <section class="section section--half section--bottom-space">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="section__title">Login to get all features</h3>
                    </div>
                </div>
                <div class="row integrate form form--subscribe">
                    <div class="col-12">
                        <div class="integrate__card card">
                            <div class="form__form-group">
                                <div class="row">

                                    <div class="col-12" style="align-content: center;align-items: center;text-align: center;float: top">
                                        <p>Don't have any account yet?</p>
                                        <a href="{{route('show.register')}}">
                                            <span style="color: #fc2c3f; font-weight: 700">
                                                Register
                                            </span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <hr style="background-color: #fff; border-top: 1px dashed #8c8b8b; margin-top: 15px !important;">
                            <p class="integrate__description">
                                Central Java is in your hand !
                            </p>
                            <form class="form__form" method="POST" action="{{ route('investor.login') }}">
                                @csrf
                                <div class="form__form-group">
                                    <label class="form__label">Email</label>
                                    <input class="form__input js-field__email{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" type="email"
                                           name="email" value="{{ old('email') }}" required autofocus
                                           placeholder="example@mail.com">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                    <span class="form-validation"></span>

                                    <label class="form__label" style="padding-top: 10px">Password</label>
                                    <input class=" form__input js-field__password{{ $errors->has('password') ? ' is-invalid' : '' }}"  type="password"
                                           name="password" value="{{ old('email') }}" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                    <span class="form-validation"></span>

                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"
                                                   name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                        </label>
                                    </div>

                                    <button class="site-btn site-btn--accent" type="submit">Login</button>

                                </div>

                            </form>
                            <hr style="background-color: #fff; border-top: 1px dashed #8c8b8b; margin-top: 15px !important;">
                            <div class="form__form-group">

                                <div class="row">
                                    <div class="col-12" style="align-content: center;align-items: center;text-align: center;float: top">
                                        <p>or Login Using</p>
                                    </div>
                                    <div class="col-12" style="align-content: center;align-items: center;text-align: center;float: top">
                                        <a href="{{ url('/login/google') }}">
                                            <i class="fa fa-github"></i>
                                            <img src="{{asset('images/google.png')}}" style="max-width: 30%" alt="google sign in">
                                        </a>
                                    </div>
                                </div>


                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection