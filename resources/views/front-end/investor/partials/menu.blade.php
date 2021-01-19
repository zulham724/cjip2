@php


    if (Auth::guard('investor')->check()){
$hashids = new \Hashids\Hashids();

    $hashed = $hashids->encode(Auth::guard('investor')->user()->id);
}
@endphp
<aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
    <div class="main-navbar">
        <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
            <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                <div class="d-table m-auto">
                    @php $title_logo = Voyager::setting('site.logo', ''); @endphp
                    <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 30px;" src="{{asset('storage/'.$title_logo)}}" alt="CJIP">
                    <span class="d-none d-md-inline ml-1">Central Java Investment Platform</span>
                </div>
            </a>
            <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                <i class="material-icons">&#xE5C4;</i>
            </a>
        </nav>
    </div>
    <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
        <div class="input-group input-group-seamless ml-3">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-search"></i>
                </div>
            </div>
            <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search"> </div>
    </form>
    <div class="nav-wrapper">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Route::is('dashboard.investor') ? 'active' : '' }}" href="{{route('dashboard.investor', $hashed)}}">
                    <i class="material-icons">edit</i>
                    <span>Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('investment.investor') || Route::is('edit.investment')  ? 'active' : '' }}" href="{{route('investment.investor')}}">
                    <i class="material-icons">trending_up</i>
                    <span>Investment</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('frontend.cjibf') ? 'active' : '' }} " href="{{route('frontend.cjibf')}}">
                    <i class="material-icons">assistant</i>
                    <span>CJIBF</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('homey2')}}">
                    <i class="material-icons">important_devices</i>
                    <span>Explore the Web</span>
                </a>
            </li>
        </ul>
    </div>
</aside>