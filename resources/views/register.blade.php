
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
                                    <p>Already have an account?</p> <a href="{{route('show.login')}}"><span style="color: #fc2c3f; font-weight: 700">Login</span></a>
                                </div>

                            </div>
                        </div>
                        <hr style="background-color: #fff; border-top: 1px dashed #8c8b8b; margin-top: 15px !important;">
                        <p class="integrate__description">
                            Central Java is in your hand !
                        </p>
                        <form class="form__form" method="POST" action="{{ route('investor.register') }}">
                            @csrf
                            <div class="form__form-group">
                                <label class="form__label">Name</label>
                                <input type="text" class="form__input js-field__text" name="name" placeholder="John Doe" required autofocus>

                                <label class="form__label">Email</label>
                                <input class="form__input js-field__email" id="email" type="email"
                                       name="email" required autofocus
                                       placeholder="example@mail.com">
                                <span class="form-validation" id="error_email"></span>

                                <label class="form__label" style="padding-top: 10px">Password</label>
                                <input class=" form__input js-field__password"  type="password"
                                       name="password" required>

                                <label class="form__label" style="padding-top: 10px">Confirm Password</label>
                                <input class=" form__input js-field__password"  type="password"
                                       name="password_confirmation" required>

                                <span class="form-validation"></span>

                                <button class="site-btn site-btn--accent" id="register" type="submit">Register</button>

                            </div>

                        </form>
                        <hr style="background-color: #fff; border-top: 1px dashed #8c8b8b; margin-top: 15px !important;">
                        <div class="form__form-group">

                            <div class="row">

                                <div class="col-12" style="align-content: center;align-items: center;text-align: center;float: top">
                                    <p>or Register Using</p>
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
    </section>
</div>

@endsection

@section('js')
<script>
    $(document).ready(function(){

        $('#email').blur(function(){
            var error_email = '';
            var email = $('#email').val();
            var _token = $('input[name="_token"]').val();
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            //console.log(email)
            if(!filter.test(email))
            {
                $('#error_email').html('<label class="text-danger">Invalid Email</label>');
                $('#email').addClass('has-error');
                $('#register').attr('disabled', 'disabled');
            }
            else
            {
                $.ajax({
                    url:"{{ route('checkemail') }}",
                    method:"POST",
                    data:{email:email, _token:_token},
                    success:function(result)
                    {
                        if(result == 'unique')
                        {
                            $('#error_email').html('<label class="text-success">Email Available</label>');
                            $('#email').removeClass('has-error');
                            $('#register').attr('disabled', false);
                        }
                        else
                        {
                            $('#error_email').html('<label class="text-danger">This Email Already Exist</label>');
                            $('#email').addClass('has-error');
                            $('#register').attr('disabled', 'disabled');
                        }
                    }
                })
            }
        });

    });
</script>
@endsection
