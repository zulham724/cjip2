@extends('front-end.master.front-end')


<header class="header-home header-home--color">
    <div class="background"
         style="background-position-y: bottom;
             background-repeat-y: no-repeat;
             background-repeat: repeat-x;
             background-size: contain;
             background-image: url({{Voyager::image(setting('site.bg_why'))}})">
        @php $site_logo = Voyager::setting('site.logo', ''); @endphp
        <div class="container background background--right background--features background--header"
             style="background-image: url({{asset('storage/'.$site_logo)}})">
            <div class="row">
                <div class="col-12">
                    <h2 class="header-home__title header-home__title--features">{{Voyager::setting('site.title_why')}}<br/>{{Voyager::setting('site.ket_why')}}</h2>
                </div>
            </div>
        </div>
    </div>
</header>
<!--Header-->

<!--Features-->
<section class="section">
    <div class="topbar-wrapper">
        <nav class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-2 topbar__item">
                        <a class="link link--gray topbar__link active" href="#freetrial">Pertumbuhan Ekonomi</a>
                    </div>
                    <div class="col-2 topbar__item">
                        <a class="link link--gray topbar__link" href="#nosetup">Performa Investasi</a>
                    </div>
                    <div class="col-2 topbar__item">
                        <a class="link link--gray topbar__link" href="#safety">Award</a>
                    </div>
                    <div class="col-2 topbar__item">
                        <a class="link link--gray topbar__link" href="#optimized">Infrastruktur Pendukung</a>
                    </div>
                    <div class="col-2 topbar__item">
                        <a class="link link--gray topbar__link" href="#access">UMK Kab/Kota</a>
                    </div>
                    <div class="col-2 topbar__item">
                        <a class="link link--gray topbar__link" href="#support">Biaya Investasi</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div class="container jsfeatures">
        <div id="freetrial" class="row about-app about-app--reverse">
            <div class="col-6 about-app__description">
                <div class="about-app__description-content">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="120" height="120"
                         viewBox="0 0 120 120">
                        <rect class="svg-bg" width="120" height="120"/>
                        <path class="svg-light-gray"
                              d="M12,20a2,2,0,0,1,2,2V34a2,2,0,0,1-4,0V22A2,2,0,0,1,12,20ZM6,26H18a2,2,0,0,1,0,4H6A2,2,0,0,1,6,26ZM8,72a2,2,0,0,1,2,2V86a2,2,0,0,1-4,0V74A2,2,0,0,1,8,72ZM2,78H14a2,2,0,0,1,0,4H2A2,2,0,0,1,2,78Zm98,14a2,2,0,0,1,2,2v12a2,2,0,0,1-4,0V94A2,2,0,0,1,100,92Zm-6,6h12a2,2,0,0,1,0,4H94A2,2,0,0,1,94,98ZM60,20A40,40,0,1,1,20,60,40,40,0,0,1,60,20Z"/>
                        <g>
                            <rect class="svg-dark-gray" x="36" y="20" width="44" height="80" rx="4" ry="4"/>
                            <path class="svg-white"
                                  d="M40,30H76a2,2,0,0,1,2,2V86a2,2,0,0,1-2,2H40a2,2,0,0,1-2-2V32A2,2,0,0,1,40,30ZM58.5,91.25a2.5,2.5,0,1,1-2.5,2.5A2.5,2.5,0,0,1,58.5,91.25Z"/>
                        </g>
                        <g id="label">
                            <circle id="circle-2" data-name="circle" class="svg-element" cx="58" cy="59" r="16"/>
                            <image id="Free" x="46" y="55" width="23" height="8"
                                   xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAABcAAAAICAMAAAAldJTcAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAM1BMVEUAAAD///////////////////////////////////////////////////////////8AAAC3K8SQAAAAD3RSTlMAVSJm3arMiLsR7ndEmTPX6l4jAAAAAWJLR0QAiAUdSAAAAAlwSFlzAAALEgAACxIB0t1+/AAAAFtJREFUCNdtjVEOgDAIQ7vBkMkm97+tYGaixn6Q5oX0oXim4hti/Gbx1piruG9R3bWDcmaHcocawMMaMO3+D9YvE0ne+eJHNrHnfm7oBOywAINQljd4erWmV8YJJGkDageXzLEAAAAASUVORK5CYII="/>
                        </g>
                    </svg>
                    <h4 class="about-app__description-title">Pertumbuhan Ekonomi</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque placerat eros ac finibus congue.</p>
                    <a href="10_get-app.html" class="site-btn site-btn--accent about-app__btn">Start Using for Free</a>
                </div>
            </div>
            <div class="col-6 about-app__img about-app__img--left">
                <div class="about-app__img-wrap">
                    <img alt="" src="assets/img/img_feature_screen_1.png">
                </div>
            </div>
        </div>
        <div id="nosetup" class="row about-app">
            <div class="col-6 about-app__description">
                <div class="about-app__description-content about-app__description-content--left">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="120" height="120"
                         viewBox="0 0 120 120">
                        <rect class="svg-bg" width="120" height="120"/>
                        <path class="svg-light-gray"
                              d="M36,6H48a2,2,0,0,1,0,4H36A2,2,0,0,1,36,6Zm6-6a2,2,0,0,1,2,2V14a2,2,0,0,1-4,0V2A2,2,0,0,1,42,0ZM16,110H28a2,2,0,0,1,0,4H16A2,2,0,0,1,16,110Zm6-6a2,2,0,0,1,2,2v12a2,2,0,0,1-4,0V106A2,2,0,0,1,22,104Zm70-6h12a2,2,0,0,1,0,4H92A2,2,0,0,1,92,98Zm6-6a2,2,0,0,1,2,2v12a2,2,0,0,1-4,0V94A2,2,0,0,1,98,92ZM60,20A40,40,0,1,1,20,60,40,40,0,0,1,60,20Z"/>
                        <g id="speed">
                            <path id="scale" class="svg-dark-gray"
                                  d="M60,31h0A33,33,0,0,1,93,64v2.818A3.182,3.182,0,0,1,89.818,70H30.182A3.182,3.182,0,0,1,27,66.818V64A33,33,0,0,1,60,31Z"/>
                            <path id="max" class="svg-element"
                                  d="M83.671,41.019A32.883,32.883,0,0,1,93,64v2.818A3.182,3.182,0,0,1,89.818,70H60V64.69Z"/>
                            <circle class="svg-gray" cx="60" cy="64" r="25"/>
                            <image id="arrow" x="53" y="57" width="30" height="14"
                                   xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAOCAMAAAAPOFwLAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAgVBMVEUAAAD///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////8AAABdYQRBAAAAKXRSTlMAFIbS+NCCU/Dx/hX1waOHbE4yFtzAaxOS9ti8oYNnTC4QaFTy0/r0zpnURg4AAAABYktHRACIBR1IAAAACXBIWXMAAAsSAAALEgHS3X78AAAAgUlEQVQY05WRUQ6CMBBEBylgK4JQFEQqqKjs/S9IEGIa3TTh/b5kM7MDAN7GFyIIPbBEW/ogI9YqWlCM30n6Eu+T9JDl2tIh/SOKY5KesrwEAnJQQbh07NSqYo+f60tjrm13+4nmN+bedqWVXFvFpF77FuDRz7Zn7TTJ8/UeDDfJCDOoIidStO0EAAAAAElFTkSuQmCC"/>
                        </g>
                    </svg>
                    <h4 class="about-app__description-title">Performa Investasi</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque placerat eros ac finibus congue.
                        Integer consectetur, lorem nec accumsan commodo, sem mauris pharetra arcu, id viverra eros ipsum ac lorem.
                        Suspendisse potenti. Vestibulum aliquam blandit scelerisque. Aliquam hendrerit vestibulum lorem non
                        placerat. Etiam at diam id erat tincidunt ullamcorper.</p>
                </div>
            </div>
            <div class="col-6 about-app__img">
                <div class="about-app__img-wrap">
                    <img alt="" src="assets/img/img_feature_screen_2.png">
                </div>
            </div>
        </div>
        <div id="safety" class="row about-app about-app--reverse">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="section__title">Award</h3>
                        <p class="section__description">We believe that customer relationship should be a part of every business.
                            All our plans have been designed to fit most business needs.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="site-table">
                            <table class="tablesaw tablesaw-swipe" data-tablesaw-mode="swipe">
                                <thead class="site-table__head">
                                <tr>
                                    <th class="title" scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist"></th>
                                    <th class="site-table__head-th site-table__head-th--other-color-1">
                                        <p>TH</p>
                                    </th>
                                    <th class="site-table__head-th site-table__head-th--accent">
                                        <p>TH</p>
                                    </th>
                                    <th class="site-table__head-th site-table__head-th--other-color-2">
                                        <p>TH</p>
                                    </th>
                                    <th class="site-table__head-th site-table__head-th--other-color-3">
                                        <p>TH</p>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="site-table__body">
                                <tr class="site-table__row">
                                    <th class="site-table__th">Users included</th>
                                    <td class="site-table__td"><p>5</p></td>
                                    <td class="site-table__td"><p>20</p></td>
                                    <td class="site-table__td"><p>50</p></td>
                                    <td class="site-table__td site-table__td--bold"><p>Unlimited</p></td>
                                </tr>
                                <tr class="site-table__row">
                                    <th class="site-table__th">Conversations</th>
                                    <td class="site-table__td site-table__td--bold"><p>Unlimited</p></td>
                                    <td class="site-table__td site-table__td--bold"><p>Unlimited</p></td>
                                    <td class="site-table__td site-table__td--bold"><p>Unlimited</p></td>
                                    <td class="site-table__td site-table__td--bold"><p>Unlimited</p></td>
                                </tr>
                                <tr class="site-table__row">
                                    <th class="site-table__th">Desktop and Mobile Apps</th>
                                    <td class="site-table__td">
                                        <p><span class="site-table__icon"><i class="mdi mdi-check"></i></span></p>
                                    </td>
                                    <td class="site-table__td">
                                        <p><span class="site-table__icon"><i class="mdi mdi-check"></i></span></p>
                                    </td>
                                    <td class="site-table__td">
                                        <p><span class="site-table__icon"><i class="mdi mdi-check"></i></span></p>
                                    </td>
                                    <td class="site-table__td">
                                        <p><span class="site-table__icon"><i class="mdi mdi-check"></i></span></p>
                                    </td>
                                </tr>
                                <tr class="site-table__row">
                                    <th class="site-table__th">Notifications (Mobile + Email)</th>
                                    <td class="site-table__td"></td>
                                    <td class="site-table__td">
                                        <p><span class="site-table__icon"><i class="mdi mdi-check"></i></span></p>
                                    </td>
                                    <td class="site-table__td">
                                        <p><span class="site-table__icon"><i class="mdi mdi-check"></i></span></p>
                                    </td>
                                    <td class="site-table__td">
                                        <p><span class="site-table__icon"><i class="mdi mdi-check"></i></span></p>
                                    </td>
                                </tr>
                                <tr class="site-table__row">
                                    <th class="site-table__th site-table__th--new">Invisible mode</th>
                                    <td class="site-table__td">
                                    </td>
                                    <td class="site-table__td">
                                        <p><span class="site-table__icon"><i class="mdi mdi-check"></i></span></p>
                                    </td>
                                    <td class="site-table__td">
                                        <p><span class="site-table__icon"><i class="mdi mdi-check"></i></span></p>
                                    </td>
                                    <td class="site-table__td">
                                        <p><span class="site-table__icon"><i class="mdi mdi-check"></i></span></p>
                                    </td>
                                </tr>
                                <tr class="site-table__row">
                                    <th class="site-table__th site-table__th--new">Search engine</th>
                                    <td class="site-table__td">
                                    </td>
                                    <td class="site-table__td">
                                    </td>
                                    <td class="site-table__td">
                                        <p><span class="site-table__icon"><i class="mdi mdi-check"></i></span></p>
                                    </td>
                                    <td class="site-table__td">
                                        <p><span class="site-table__icon"><i class="mdi mdi-check"></i></span></p>
                                    </td>
                                </tr>
                                <tr class="site-table__row">
                                    <th class="site-table__th site-table__th--new">User Database</th>
                                    <td class="site-table__td">
                                    </td>
                                    <td class="site-table__td">
                                    </td>
                                    <td class="site-table__td">
                                        <p><span class="site-table__icon"><i class="mdi mdi-check"></i></span></p>
                                    </td>
                                    <td class="site-table__td">
                                        <p><span class="site-table__icon"><i class="mdi mdi-check"></i></span></p>
                                    </td>
                                </tr>
                                <tr class="site-table__row">
                                    <th class="site-table__th">User Import/Export</th>
                                    <td class="site-table__td">
                                    </td>
                                    <td class="site-table__td">
                                    </td>
                                    <td class="site-table__td">
                                        <p><span class="site-table__icon"><i class="mdi mdi-check"></i></span></p>
                                    </td>
                                    <td class="site-table__td">
                                        <p><span class="site-table__icon"><i class="mdi mdi-check"></i></span></p>
                                    </td>
                                </tr>
                                <tr class="site-table__row">
                                    <th class="site-table__th">Campaigns (Email + Chat)</th>
                                    <td class="site-table__td"><p>50 recipients</p></td>
                                    <td class="site-table__td"><p>1 000 recipients</p></td>
                                    <td class="site-table__td"><p>100 000 recipients</p></td>
                                    <td class="site-table__td"><p>200 000 recipients</p></td>
                                </tr>
                                <tr class="site-table__row">
                                    <th class="site-table__th">Customization</th>
                                    <td class="site-table__td"><p>Basic</td>
                                    <td class="site-table__td">
                                        <p><span class="site-table__icon"><i class="mdi mdi-check"></i></span></p>
                                    </td>
                                    <td class="site-table__td">
                                        <p><span class="site-table__icon"><i class="mdi mdi-check"></i></span></p>
                                    </td>
                                    <td class="site-table__td">
                                        <p><span class="site-table__icon"><i class="mdi mdi-check"></i></span></p>
                                    </td>
                                </tr>
                                <tr class="site-table__btn-row">
                                    <th class="site-table__th"></th>
                                    <td class="site-table__td">
                                        <p><a href="" class="site-btn site-btn--light site-btn--max-width">Select plan</a></p>
                                    </td>
                                    <td class="site-table__td">
                                        <p><a href="" class="site-btn site-btn--accent site-btn--max-width">Select plan</a></p>
                                    </td>
                                    <td class="site-table__td">
                                        <p><a href="" class="site-btn site-btn--light site-btn--max-width">Select plan</a></p>
                                    </td>
                                    <td class="site-table__td">
                                        <p><a href="" class="site-btn site-btn--light site-btn--max-width">Select plan</a></p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="optimized" class="row about-app">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="section__title">Infrastruktur Pendukung</h3>
                    </div>
                </div>
                <div class="row carousel">
                    <div class="col-12">
                        <div class="slider carousel__slider--think">
                            <div class="carousel__slide-wrap">
                                <div class="carousel__slide">
                                    <div class="carousel__slide-avatar">
                                        <img alt="" class="carousel__slide-avatar-img" src="assets/img/img_believe_avatar.png">
                                        <p class="carousel__slide-avatar-name">Li Chang</p>
                                        <p class="carousel__slide-avatar-work">Director Product Development, Company Ltd.</p>
                                    </div>
                                    <div class="carousel__slide-quote">
                                        <h4 class="carousel__slide-quote-title">Elegant and efficient</h4>
                                        <p class="carousel__slide-quote-description">“ An elegant, yet efficient, magic tool! I love the
                                            overall design and the simple way that you can update or change a process. Awesome product. The
                                            guys have put huge effort into this app and focused on simplicity and ease of use. “</p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel__slide-wrap">
                                <div class="carousel__slide">
                                    <div class="carousel__slide-avatar">
                                        <img alt="" class="carousel__slide-avatar-img" src="assets/img/img_believe_avatar.png">
                                        <p class="carousel__slide-avatar-name">Li Chang</p>
                                        <p class="carousel__slide-avatar-work">Director Product Development, Company Ltd.</p>
                                    </div>
                                    <div class="carousel__slide-quote">
                                        <h4 class="carousel__slide-quote-title">Elegant and efficient</h4>
                                        <p class="carousel__slide-quote-description">“ An elegant, yet efficient, magic tool! I love the
                                            overall design and the simple way that you can update or change a process. Awesome product. The
                                            guys have put huge effort into this app and focused on simplicity and ease of use. “</p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel__slide-wrap">
                                <div class="carousel__slide">
                                    <div class="carousel__slide-avatar">
                                        <img alt="" class="carousel__slide-avatar-img" src="assets/img/img_believe_avatar.png">
                                        <p class="carousel__slide-avatar-name">Li Chang</p>
                                        <p class="carousel__slide-avatar-work">Director Product Development, Company Ltd.</p>
                                    </div>
                                    <div class="carousel__slide-quote">
                                        <h4 class="carousel__slide-quote-title">Elegant and efficient</h4>
                                        <p class="carousel__slide-quote-description">“ An elegant, yet efficient, magic tool! I love the
                                            overall design and the simple way that you can update or change a process. Awesome product. The
                                            guys have put huge effort into this app and focused on simplicity and ease of use. “</p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel__slide-wrap">
                                <div class="carousel__slide">
                                    <div class="carousel__slide-avatar">
                                        <img alt="" class="carousel__slide-avatar-img" src="assets/img/img_believe_avatar.png">
                                        <p class="carousel__slide-avatar-name">Li Chang</p>
                                        <p class="carousel__slide-avatar-work">Director Product Development, Company Ltd.</p>
                                    </div>
                                    <div class="carousel__slide-quote">
                                        <h4 class="carousel__slide-quote-title">Elegant and efficient</h4>
                                        <p class="carousel__slide-quote-description">“ An elegant, yet efficient, magic tool! I love the
                                            overall design and the simple way that you can update or change a process. Awesome product. The
                                            guys have put huge effort into this app and focused on simplicity and ease of use. “</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="access" class="row about-app about-app--reverse">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="section__title">UMK Kab/Kota</h3>
                        <p class="section__description">We believe that customer relationship should be a part of every business.
                            All our plans have been designed to fit most business needs.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="site-table">
                            <table class="tablesaw tablesaw-swipe" data-tablesaw-mode="swipe">
                                <thead class="site-table__head">
                                <tr>
                                    <th class="title" scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist"></th>
                                    <th class="site-table__head-th site-table__head-th--other-color-1">
                                        <p>TH</p>
                                    </th>
                                    <th class="site-table__head-th site-table__head-th--accent">
                                        <p>TH</p>
                                    </th>
                                    <th class="site-table__head-th site-table__head-th--other-color-2">
                                        <p>TH</p>
                                    </th>
                                    <th class="site-table__head-th site-table__head-th--other-color-3">
                                        <p>TH</p>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="site-table__body">
                                <tr class="site-table__row">
                                    <th class="site-table__th">Users included</th>
                                    <td class="site-table__td"><p>5</p></td>
                                    <td class="site-table__td"><p>20</p></td>
                                    <td class="site-table__td"><p>50</p></td>
                                    <td class="site-table__td site-table__td--bold"><p>Unlimited</p></td>
                                </tr>
                                <tr class="site-table__row">
                                    <th class="site-table__th">Conversations</th>
                                    <td class="site-table__td site-table__td--bold"><p>Unlimited</p></td>
                                    <td class="site-table__td site-table__td--bold"><p>Unlimited</p></td>
                                    <td class="site-table__td site-table__td--bold"><p>Unlimited</p></td>
                                    <td class="site-table__td site-table__td--bold"><p>Unlimited</p></td>
                                </tr>
                                <tr class="site-table__row">
                                    <th class="site-table__th">Desktop and Mobile Apps</th>
                                    <td class="site-table__td">
                                        <p><span class="site-table__icon"><i class="mdi mdi-check"></i></span></p>
                                    </td>
                                    <td class="site-table__td">
                                        <p><span class="site-table__icon"><i class="mdi mdi-check"></i></span></p>
                                    </td>
                                    <td class="site-table__td">
                                        <p><span class="site-table__icon"><i class="mdi mdi-check"></i></span></p>
                                    </td>
                                    <td class="site-table__td">
                                        <p><span class="site-table__icon"><i class="mdi mdi-check"></i></span></p>
                                    </td>
                                </tr>
                                <tr class="site-table__row">
                                    <th class="site-table__th">Notifications (Mobile + Email)</th>
                                    <td class="site-table__td"></td>
                                    <td class="site-table__td">
                                        <p><span class="site-table__icon"><i class="mdi mdi-check"></i></span></p>
                                    </td>
                                    <td class="site-table__td">
                                        <p><span class="site-table__icon"><i class="mdi mdi-check"></i></span></p>
                                    </td>
                                    <td class="site-table__td">
                                        <p><span class="site-table__icon"><i class="mdi mdi-check"></i></span></p>
                                    </td>
                                </tr>
                                <tr class="site-table__row">
                                    <th class="site-table__th site-table__th--new">Invisible mode</th>
                                    <td class="site-table__td">
                                    </td>
                                    <td class="site-table__td">
                                        <p><span class="site-table__icon"><i class="mdi mdi-check"></i></span></p>
                                    </td>
                                    <td class="site-table__td">
                                        <p><span class="site-table__icon"><i class="mdi mdi-check"></i></span></p>
                                    </td>
                                    <td class="site-table__td">
                                        <p><span class="site-table__icon"><i class="mdi mdi-check"></i></span></p>
                                    </td>
                                </tr>
                                <tr class="site-table__row">
                                    <th class="site-table__th site-table__th--new">Search engine</th>
                                    <td class="site-table__td">
                                    </td>
                                    <td class="site-table__td">
                                    </td>
                                    <td class="site-table__td">
                                        <p><span class="site-table__icon"><i class="mdi mdi-check"></i></span></p>
                                    </td>
                                    <td class="site-table__td">
                                        <p><span class="site-table__icon"><i class="mdi mdi-check"></i></span></p>
                                    </td>
                                </tr>
                                <tr class="site-table__row">
                                    <th class="site-table__th site-table__th--new">User Database</th>
                                    <td class="site-table__td">
                                    </td>
                                    <td class="site-table__td">
                                    </td>
                                    <td class="site-table__td">
                                        <p><span class="site-table__icon"><i class="mdi mdi-check"></i></span></p>
                                    </td>
                                    <td class="site-table__td">
                                        <p><span class="site-table__icon"><i class="mdi mdi-check"></i></span></p>
                                    </td>
                                </tr>
                                <tr class="site-table__row">
                                    <th class="site-table__th">User Import/Export</th>
                                    <td class="site-table__td">
                                    </td>
                                    <td class="site-table__td">
                                    </td>
                                    <td class="site-table__td">
                                        <p><span class="site-table__icon"><i class="mdi mdi-check"></i></span></p>
                                    </td>
                                    <td class="site-table__td">
                                        <p><span class="site-table__icon"><i class="mdi mdi-check"></i></span></p>
                                    </td>
                                </tr>
                                <tr class="site-table__row">
                                    <th class="site-table__th">Campaigns (Email + Chat)</th>
                                    <td class="site-table__td"><p>50 recipients</p></td>
                                    <td class="site-table__td"><p>1 000 recipients</p></td>
                                    <td class="site-table__td"><p>100 000 recipients</p></td>
                                    <td class="site-table__td"><p>200 000 recipients</p></td>
                                </tr>
                                <tr class="site-table__row">
                                    <th class="site-table__th">Customization</th>
                                    <td class="site-table__td"><p>Basic</td>
                                    <td class="site-table__td">
                                        <p><span class="site-table__icon"><i class="mdi mdi-check"></i></span></p>
                                    </td>
                                    <td class="site-table__td">
                                        <p><span class="site-table__icon"><i class="mdi mdi-check"></i></span></p>
                                    </td>
                                    <td class="site-table__td">
                                        <p><span class="site-table__icon"><i class="mdi mdi-check"></i></span></p>
                                    </td>
                                </tr>
                                <tr class="site-table__btn-row">
                                    <th class="site-table__th"></th>
                                    <td class="site-table__td">
                                        <p><a href="" class="site-btn site-btn--light site-btn--max-width">Select plan</a></p>
                                    </td>
                                    <td class="site-table__td">
                                        <p><a href="" class="site-btn site-btn--accent site-btn--max-width">Select plan</a></p>
                                    </td>
                                    <td class="site-table__td">
                                        <p><a href="" class="site-btn site-btn--light site-btn--max-width">Select plan</a></p>
                                    </td>
                                    <td class="site-table__td">
                                        <p><a href="" class="site-btn site-btn--light site-btn--max-width">Select plan</a></p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="support" class="row about-app">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="section__title">Biaya Investasi</h3>
                        <p class="section__description">
                            Sigma’s monthly pricing is based on how many functions you need to start your work. If you
                            ready to use Sigma for a long time you can choose yearly plan and save some money.
                        </p>
                    </div>
                </div>
                <div class="row pricing pricing--toggle">
                    <div class="col-12">
                        <div class="toggle-checkbox">
                            <input class="toggle-checkbox__input" type="checkbox" id="pricing-toggle"/>
                            <span class="toggle-checkbox__left">Monthly</span>
                            <label class="toggle-checkbox__input-label" for="pricing-toggle">Toggle</label>
                            <span class="toggle-checkbox__right">Yearly</span>
                        </div>
                    </div>
                    <div class="col-4 col-t-12">
                        <div class="pricing__card card">
                            <h4 class="pricing__card-title">Basic</h4>
                            <p>This is the basic plan for getting started and growing your business.</p>
                            <p class="pricing__card-price pricing__card-price--year">$ 108</p>
                            <p class="pricing__card-price pricing__card-price--month">$ 10</p>
                            <p class="pricing__card-price--per-month">$9 billed monthly</p>
                            <div class="pricing__card-price-save-wrap">
                                <p class="pricing__card-price-save">Save 10%</p>
                                <hr class="pricing__hr">
                            </div>
                            <div class="pricing__opportunities">
                                <p>10 pages</p>
                                <p>2 Gb storage</p>
                                <p>Donations</p>
                                <div class="pricing__opportunities--not-available">
                                    <p>Integrated e-commerce</p>
                                    <p>Custom domain free</p>
                                    <p>24/7 Customer support</p>
                                </div>
                            </div>
                            <a href="" class="site-btn site-btn--light">Select plan</a>
                        </div>
                    </div>
                    <div class="col-4 col-t-12">
                        <div class="pricing__card card">
                            <h4 class="pricing__card-title pricing__card-title--accent">Pro</h4>
                            <p>For brand and agency teams that work with a large and growing number of influencers.</p>
                            <p class="pricing__card-price pricing__card-price--year">$ 228</p>
                            <p class="pricing__card-price pricing__card-price--month">$ 24</p>
                            <p class="pricing__card-price--per-month">$19 billed monthly</p>
                            <div class="pricing__card-price-save-wrap">
                                <p class="pricing__card-price-save">Save 15%</p>
                                <hr class="pricing__hr">
                            </div>
                            <div class="pricing__opportunities">
                                <p>20 pages</p>
                                <p>16 Gb storage</p>
                                <p>Donations</p>
                                <p>Integrated e-commerce</p>
                                <p>Custom domain free</p>
                                <div class="pricing__opportunities--not-available">
                                    <p>24/7 Customer support</p>
                                </div>
                            </div>
                            <a href="" class="site-btn site-btn--accent">Select plan</a>
                        </div>
                    </div>
                    <div class="col-4 col-t-12">
                        <div class="pricing__card card">
                            <h4 class="pricing__card-title">Enterprise</h4>
                            <p>For agencies and brands with custom options and expert management.</p>
                            <p class="pricing__card-price pricing__card-price--year">$ 468</p>
                            <p class="pricing__card-price pricing__card-price--month">$ 42</p>
                            <p class="pricing__card-price--per-month">$39 billed monthly</p>
                            <div class="pricing__card-price-save-wrap">
                                <p class="pricing__card-price-save">Save 20%</p>
                                <hr class="pricing__hr">
                            </div>
                            <div class="pricing__opportunities">
                                <p>50 pages</p>
                                <p>500 Gb storage</p>
                                <p>Donations</p>
                                <p>Integrated e-commerce</p>
                                <p>Custom domain free</p>
                                <p>24/7 Customer support</p>
                            </div>
                            <a href="" class="site-btn site-btn--light">Select plan</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p class="section__description">
                            Sigma has plans, from free to paid, that scale with your needs. Subscribe to a plan that
                            fits the size of your business. All plans start with a free 15-day trial.
                        </p>
                    </div>
                </div>
                <hr>
            </div>
        </div>
</section>
<!--Features-->

<div id="endMenu"></div>

<!--Native-->
<section class="section section--light section--bottom-space">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="section__title">A native app for every platform</h3>
                <p class="section__description">Sigma is a cloud-based mobile and desktop messaging app with
                    a focus on security and speed. You can use it in any platform.</p>
            </div>
        </div>
        <div class="native">
            <div class="row native__btns">
                <div class="col-6">
                    <a href="10_get-app.html" class="site-btn site-btn--accent site-btn--right native__btn-first">
                        Start Using for Free</a>
                </div>
                <div class="col-6">
                    <a href="05_features.html" class="site-btn site-btn--invert site-btn--left">
                        Explore Features</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <img alt="" class="native__img" src="assets/img/img_native.png">
                </div>
            </div>
        </div>
    </div>
</section>
<!--Native-->

<!--Trusted by-->
<div class="section section--last">
    <div class="container">
        <div class="row logo logo--bottom-space">
            <div class="col-12">
                <div class="logo__row">
                    <p>Used by over 1,000,000 people worldwide</p>
                    <div class="logo__logos">
                        <img alt="" class="logo__img-mini" src="assets/img/img_logo_blue_1.png">
                        <img alt="" class="logo__img-mini" src="assets/img/img_logo_blue_2.png">
                        <img alt="" class="logo__img-mini" src="assets/img/img_logo_blue_3.png">
                        <img alt="" class="logo__img-mini" src="assets/img/img_logo_blue_4.png">
                        <img alt="" class="logo__img-mini" src="assets/img/img_logo_blue_5.png">
                        <img alt="" class="logo__img-mini" src="assets/img/img_logo_blue_6.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <img alt="" class="section__img" src="assets/img/img_backgroud_footer.png">
</div>
<!--Trusted by-->

<!--Footer menu-->
<div class="container footer-menu">
    <div class="row">
        <div class="col-12">
            <a href="index.html">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                    <path data-name="Sigma symbol" class="svg-element"
                          d="M237.418,8583.56a12.688,12.688,0,0,0,.419-3.37c-0.036-5.24-2.691-9.68-7.024-13.2h-3.878a20.819,20.819,0,0,1,4.478,13.01c0,4.56-2.456,10.2-6.413,11.4a16.779,16.779,0,0,1-2.236.51c-10.005,1.55-14.109-17.54-9.489-23.31,2.569-3.21,6.206-4.08,11.525-4.08h17.935A24.22,24.22,0,0,1,237.418,8583.56Zm-12.145-24.45c-8.571.02-12.338,0.98-16.061,4.84-6.267,6.49-6.462,20.69,4.754,27.72a24.092,24.092,0,1,1,27.3-32.57h-16v0.01Z"
                          transform="translate(-195 -8544)"/>
                </svg>
            </a>
            <nav class="footer-menu__nav">
                <ul>
                    <li><a class="link link--gray" href="07_about.html">About</a></li>
                    <li><a class="link link--gray" href="08_faq.html">FAQ</a></li>
                    <li><a class="link link--gray" href="09_privacy.html">Privacy</a></li>
                    <li><a href="blog/12_blog.html" class="link link--gray">Blog</a></li>
                </ul>
            </nav>
            <p class="footer-menu__social">
                <a class="link link--gray" href="">
                    <i class="mdi mdi-twitter" aria-hidden="true"></i>
                </a>
                <a class="link link--gray" href="">
                    <i class="mdi mdi-facebook" aria-hidden="true"></i>
                </a>
                <a class="link link--gray" href="">
                    <i class="mdi mdi-linkedin" aria-hidden="true"></i>
                </a>
                <a class="link link--gray" href="">
                    <i class="mdi mdi-instagram" aria-hidden="true"></i>
                </a>
            </p>
        </div>
    </div>
</div>
