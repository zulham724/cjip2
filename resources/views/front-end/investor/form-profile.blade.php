@extends('front-end.master.newest-master')

@section('content')
    <section class="section section--last section--top-space" style="padding-top: 200px">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="section__title">First, Fill your <strong style="color: #ff5c72">Company Profile</strong> </h3>
                </div>
            </div>
            <div class="row form">
                <div class="col-10 col-m-12 col-offset-1">
                    <div class="form__card card form__card--background" style="background-image: url('http://cjip.jatengprov.go.id/storage/additional/img_bg_form.png')">
                        <div class="form__wrap">

                            <form class="form__form js-form" action="{{route('store.profile')}}" method="post">
                                @csrf
                                <div class="form__form-group form__form-group--small">
                                    <label class="form__label">Name <span>*</span></label>
                                    <input class="form__input js-field__name" type="text" name="name" placeholder="{{$user->name}}" value="{{$user->name}}" required>
                                    <span class="form-validation"></span>
                                </div>
                                <div class="form__form-group form__form-group--small form__form-group--right">
                                    <label class="form__label">Position<span>*</span></label>
                                    <input class="form__input js-field__name" type="text" name="jabatan" placeholder="CEO" required>
                                    <span class="form-validation"></span>
                                </div>
                                <div class="form__form-group form__form-group--small">
                                    <label class="form__label">Company Name <span>*</span></label>
                                    <input class="form__input js-field__name" type="text" name="company_name" placeholder="without PT./ or CV." required>
                                    <span class="form-validation"></span>
                                </div>
                                <div class="form__form-group form__form-group--small form__form-group--right">
                                    <label class="form__label">Legal Entity Status <span>*</span></label>
                                    <input class="form__input js-field__name" type="text" name="badan_hukum" placeholder="PT. or CV." required>
                                    <span class="form-validation"></span>
                                </div>
                                <div class="form__form-group form__form-group--small">
                                    <label class="form__label">Phone <span>*</span></label>
                                    <input class="form__input js-field__url" name="phone" type="text" placeholder="083 298 xxx xxx" required>
                                    <span class="form-validation"></span>
                                </div>
                                <div class="form__form-group form__form-group--small form__form-group--right">
                                    <label class="form__label">Country <span>*</span></label>
                                    <input class="form__input js-field__name" type="text" name="country" placeholder="Indonesia" required>
                                    <span class="form-validation"></span>
                                </div>
                                <div class="form__form-group">
                                    <label class="form__label">Bussiness Field<span>*</span></label>
                                    <select class="form__input form__input--select" name="bidang_usaha" title="Business Field">
                                        @foreach($sektors as $sektor)
                                            <option value="{{$sektor->name}}">{{$sektor->name}}</option>
                                        @endforeach
                                        <i class="mdi mdi-chevron-down"></i>
                                    </select>
                                </div>
                                <div class="form__form-group">
                                    <label class="form__label">Company Address <span>*</span></label>
                                    <textarea class="form__input form__input--textarea js-field__message" type="address" name="address" required
                                              placeholder="Company's address here..."></textarea>
                                    <span class="form-validation"></span>
                                </div>

                                <button class="site-btn site-btn--accent form__submit" type="submit">
                                    Submit
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{asset('js/front-end/vendor/slick.min.js')}}"></script>
    <!--Instagram-->
    <script src="{{asset('js/front-end/vendor/lightwidget.js')}}"></script>

    <script src="{{asset('js/front-end/menu.js')}}"></script>
    <script src="{{asset('js/front-end/mobile-menu.js')}}"></script>
    <script src="{{asset('js/front-end/validation.js')}}"></script>
@endsection