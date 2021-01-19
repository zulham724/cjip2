@php

    $sektors = \App\CjibfSektor::all();
    //dd($sektors);

    if (Auth::guard('investor')->check()){
$hashids = new \Hashids\Hashids();

    $hashed = $hashids->encode(Auth::guard('investor')->user()->id);
}
@endphp
    @foreach($items as $item)

        @if($item->children->count() == null)
            <li class="mobile-menu__li">
                <a href="{{url($item->url)}}" class="link link--gray">
                    {{$item->translate('en')->title}}
                </a>
            </li>

        @else
            @if($item->translate('en')->title == 'Investment Opportunities')
                <li class="mobile-menu__li mobile-menu__li-collapse mobile-menu__li-collapse--close">
                    <a data-toggle="dropdown" class="link link--dark-gray">
                        Project's Readiness
                        <span><i class="mdi mdi-chevron-down"></i></span>
                    </a>
                </li>

                @if($item->children->count())

                    <li class="mobile-menu__ul--collapsed">
                        <ul class="mobile-menu__ul">
                            @foreach($item->children as $subItem)
                                @if($subItem->translate('en')->title == 'Project Readiness')
                                    @foreach($subItem->children as $susubItem)
                                        <li class="mobile-menu__li">
                                            <a class="link link--gray" target="{{ $susubItem->target }}" href="{{ url($susubItem->url) }}">{{ $susubItem->translate('en')->title }}</a>
                                        </li>
                                    @endforeach
                                @endif
                            @endforeach
                        </ul>
                    </li>

            @endif

            @endif
            <li class="mobile-menu__li mobile-menu__li-collapse mobile-menu__li-collapse--close">
                <a data-toggle="dropdown" class="link link--dark-gray">
                    Sectors
                    <span><i class="mdi mdi-chevron-down"></i></span>
                </a>
            </li>
            <li class="mobile-menu__ul--collapsed">
                <ul class="mobile-menu__ul">
                    @foreach($sektors as $subItem)
                        <li class="mobile-menu__li">
                            <a class="link link--gray" target="" href="{{route('sector.fo', $subItem->name)}}">{{ $subItem->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li class="mobile-menu__li">
                <a href="/location-on-maps" class="link link--gray">
                    Locations
                </a>
            </li>
        @endif

    @endforeach

    @guest('investor')
    <li><a class="site-btn site-btn--accent" href="{{ route('show.login')  }}">Login</a></li>
    @else
        <li>
            <div class="menu__logo">
                <div class="believe">
                    @if (Auth::guard('investor')->check())
                    <a href="{{route('dashboard.investor', $hashed)}}">
                        <img alt="{{Auth::guard('investor')->user()->name}}" class="believe__avatar" src="
                        @if(empty(Auth::guard('investor')->user()->image))

                        {{Voyager::image(setting('site.avatar'))}}

                        @else
                        {{Auth::guard('investor')->user()->image}}
                                "/>
                        @endif
                    </a>
                    @endif
                </div>
            </div>

            <div>
                @if (Auth::guard('investor')->check())
                <a class="link link--gray link--gray-active" href="{{route('dashboard.investor', $hashed)}}" >
                    <span style="color: #0e3a78; font-weight: 500;  font-family: Bahnschrift">PROFILE</span></a>
                |
                <a class="link link--gray link--gray-active" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                    @endif
            </div>
        </li>

    @endguest
<li>
    <div class="menu__dropdown d-t-none">
        <div id="language_EN">
            <a class="link link--gray menu__dropdown-btn">En
                <span><i class="mdi mdi-chevron-down"></i></span>
            </a>
        </div>
        <div id="language_ID" hidden>
            <a class="link link--gray menu__dropdown-btn">Id
                <span><i class="mdi mdi-chevron-down"></i></span>
            </a>
        </div>

        <div class="menu__dropdown-content" id="select">
            <a class="link link--gray link--gray-active" id="selectEN" >En</a>
            <a class="link link--gray" id="selectID" >Id</a>
        </div>
    </div>
</li>



