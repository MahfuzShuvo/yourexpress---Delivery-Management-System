<!-- main header @s -->
<div class="nk-header nk-header-fluid is-theme">
    <div class="container-xl wide-xl">
        <div class="nk-header-wrap">
            <div class="nk-menu-trigger mr-sm-2 d-lg-none">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="headerNav"><em class="icon ni ni-menu"></em></a>
            </div>
            <div class="nk-header-brand">
                <a href="{{ route('dashboard') }}" class="logo-link" style="top: -5px;">
                    <img class="logo-light logo-img" src="{{ asset('public/assets/images/logo.png')}}" srcset="{{ asset('public/assets/images/logo2x.png 2x')}}" alt="logo">
                    <img class="logo-dark logo-img" src="{{ asset('public/assets/images/logo-dark.png')}}" srcset="public/assets/images/logo-dark2x.png 2x" alt="logo-dark">
                </a>
            </div><!-- .nk-header-brand -->
            <div class="nk-header-menu" data-content="headerNav">
                <div class="nk-header-mobile">
                    <div class="nk-header-brand">
                        <a href="{{ route('dashboard') }}" class="logo-link" >
                            <img class="logo-light logo-img" src="{{ asset('public/assets/images/logo.png')}}" srcset="{{ asset('public/assets/images/logo2x.png 2x')}}" alt="logo">
                            <img class="logo-dark logo-img" src="{{ asset('public/assets/images/logo-dark.png')}}" srcset="{{ asset('public/assets/images/logo-dark2x.png 2x')}}" alt="logo-dark">
                        </a>
                    </div>
                    <div class="nk-menu-trigger mr-n2">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="headerNav"><em class="icon ni ni-arrow-left"></em></a>
                    </div>
                </div>
                <ul class="nk-menu nk-menu-main ui-s2">
                    <li class="nk-menu-item">
                        <a href="{{ route('dashboard') }}" class="nk-menu-link">
                            <span class="nk-menu-text">Dashboard</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="#" class="nk-menu-link">
                            <span class="nk-menu-text">Parcels</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="#" class="nk-menu-link">
                            <span class="nk-menu-text">Merchants</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-text">Teams</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{ route('users.index') }}" class="nk-menu-link"><span class="nk-menu-text">All Teams</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link"><span class="nk-menu-text">Riders</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{ route('roles.index') }}" class="nk-menu-link">
                            <span class="nk-menu-text">Roles & Permissions</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-text">Transactions</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item has-sub">
                                <a href="#" class="nk-menu-link nk-menu-toggle">
                                    <span class="nk-menu-text">User Manage</span>
                                </a>
                                <ul class="nk-menu-sub">
                                    <li class="nk-menu-item">
                                        <a href="html/user-list-regular.html" class="nk-menu-link"><span class="nk-menu-text">User List - Regular</span></a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="html/user-list-compact.html" class="nk-menu-link"><span class="nk-menu-text">User List - Compact</span></a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="html/user-details-regular.html" class="nk-menu-link"><span class="nk-menu-text">User Details - Regular</span></a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="html/user-profile-regular.html" class="nk-menu-link"><span class="nk-menu-text">User Profile - Regular</span></a>
                                    </li>
                                </ul><!-- .nk-menu-sub -->
                            </li><!-- .nk-menu-item -->
                            <li class="nk-menu-item has-sub">
                                <a href="#" class="nk-menu-link nk-menu-toggle">
                                    <span class="nk-menu-text">AML / KYCs</span>
                                </a>
                                <ul class="nk-menu-sub">
                                    <li class="nk-menu-item">
                                        <a href="html/kyc-list-regular.html" class="nk-menu-link"><span class="nk-menu-text">KYC List - Regular</span></a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="html/kyc-details-regular.html" class="nk-menu-link"><span class="nk-menu-text">KYC Details - Regular</span></a>
                                    </li>
                                </ul><!-- .nk-menu-sub -->
                            </li><!-- .nk-menu-item -->
                            <li class="nk-menu-item">
                                <a href="html/pages/regular-v1.html" class="nk-menu-link"><span class="nk-menu-text">Regular Page - v1</span></a>
                            </li><!-- .nk-menu-item -->
                            <li class="nk-menu-item">
                                <a href="html/pages/regular-v2.html" class="nk-menu-link"><span class="nk-menu-text">Regular Page - v2</span></a>
                            </li><!-- .nk-menu-item -->
                            <li class="nk-menu-item">
                                <a href="html/pages/faqs.html" class="nk-menu-link"><span class="nk-menu-text">Faqs / Help</span></a>
                            </li><!-- .nk-menu-item -->
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-text">Settings</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item has-sub">
                                <a href="#" class="nk-menu-link nk-menu-toggle">
                                    <span class="nk-menu-text">Auth Pages</span>
                                </a>
                                <ul class="nk-menu-sub">
                                    <li class="nk-menu-item">
                                        <a href="html/pages/auths/auth-login.html" class="nk-menu-link" target="_blank"><span class="nk-menu-text">Login / Signin</span></a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="html/pages/auths/auth-register.html" class="nk-menu-link" target="_blank"><span class="nk-menu-text">Register / Signup</span></a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="html/pages/auths/auth-reset.html" class="nk-menu-link" target="_blank"><span class="nk-menu-text">Forgot Password</span></a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="html/pages/auths/auth-success.html" class="nk-menu-link" target="_blank"><span class="nk-menu-text">Success / Confirm</span></a>
                                    </li>
                                </ul><!-- .nk-menu-sub -->
                            </li><!-- .nk-menu-item -->
                            <li class="nk-menu-item has-sub">
                                <a href="#" class="nk-menu-link nk-menu-toggle">
                                    <span class="nk-menu-text">Error Pages</span>
                                </a>
                                <ul class="nk-menu-sub">
                                    <li class="nk-menu-item">
                                        <a href="html/pages/errors/404-classic.html" target="_blank" class="nk-menu-link"><span class="nk-menu-text">404 Classic</span></a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="html/pages/errors/504-classic.html" target="_blank" class="nk-menu-link"><span class="nk-menu-text">504 Classic</span></a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="html/pages/errors/404-s1.html" target="_blank" class="nk-menu-link"><span class="nk-menu-text">404 Modern</span></a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="html/pages/errors/504-s1.html" target="_blank" class="nk-menu-link"><span class="nk-menu-text">504 Modern</span></a>
                                    </li>
                                </ul><!-- .nk-menu-sub -->
                            </li><!-- .nk-menu-item -->
                            <li class="nk-menu-item">
                                <a href="html/_blank.html" class="nk-menu-link"><span class="nk-menu-text">Blank / Startup</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="html/pages/terms-policy.html" class="nk-menu-link"><span class="nk-menu-text">Terms / Policy</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    
                </ul><!-- .nk-menu -->
            </div><!-- .nk-header-menu -->
            <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                    <li class="dropdown notification-dropdown">
                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
                            <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right dropdown-menu-s1">
                            <div class="dropdown-head">
                                <span class="sub-title nk-dropdown-title">Notifications</span>
                                <a href="#">Mark All as Read</a>
                            </div>
                            <div class="dropdown-body">
                                <div class="nk-notification">
                                    <div class="nk-notification-item dropdown-inner">
                                        <div class="nk-notification-icon">
                                            <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                        </div>
                                        <div class="nk-notification-content">
                                            <div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>
                                            <div class="nk-notification-time">2 hrs ago</div>
                                        </div>
                                    </div>
                                    <div class="nk-notification-item dropdown-inner">
                                        <div class="nk-notification-icon">
                                            <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                        </div>
                                        <div class="nk-notification-content">
                                            <div class="nk-notification-text">Your <span>Deposit Order</span> is placed</div>
                                            <div class="nk-notification-time">2 hrs ago</div>
                                        </div>
                                    </div>
                                    <div class="nk-notification-item dropdown-inner">
                                        <div class="nk-notification-icon">
                                            <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                        </div>
                                        <div class="nk-notification-content">
                                            <div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>
                                            <div class="nk-notification-time">2 hrs ago</div>
                                        </div>
                                    </div>
                                    <div class="nk-notification-item dropdown-inner">
                                        <div class="nk-notification-icon">
                                            <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                        </div>
                                        <div class="nk-notification-content">
                                            <div class="nk-notification-text">Your <span>Deposit Order</span> is placed</div>
                                            <div class="nk-notification-time">2 hrs ago</div>
                                        </div>
                                    </div>
                                    <div class="nk-notification-item dropdown-inner">
                                        <div class="nk-notification-icon">
                                            <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                        </div>
                                        <div class="nk-notification-content">
                                            <div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>
                                            <div class="nk-notification-time">2 hrs ago</div>
                                        </div>
                                    </div>
                                    <div class="nk-notification-item dropdown-inner">
                                        <div class="nk-notification-icon">
                                            <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                        </div>
                                        <div class="nk-notification-content">
                                            <div class="nk-notification-text">Your <span>Deposit Order</span> is placed</div>
                                            <div class="nk-notification-time">2 hrs ago</div>
                                        </div>
                                    </div>
                                </div><!-- .nk-notification -->
                            </div><!-- .nk-dropdown-body -->
                            <div class="dropdown-foot center">
                                <a href="#">View All</a>
                            </div>
                        </div>
                    </li><!-- .dropdown -->
                    <li class="dropdown user-dropdown order-sm-first">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <div class="user-toggle">
                                <div class="user-avatar sm">
                                    <em class="icon ni ni-user-alt"></em>
                                </div>
                                <div class="user-info d-none d-xl-block">
                                    <div class="user-status">{{ Auth::user()->role }}</div>
                                    <div class="user-name dropdown-indicator">{{ Auth::user()->name }}</div>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1 is-light">
                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                <div class="user-card">
                                    <div class="user-avatar">
                                        <span>AB</span>
                                    </div>
                                    <div class="user-info">
                                        <span class="lead-text">{{ Auth::user()->name }}</span>
                                        <span class="sub-text"><small>{{ Auth::user()->email }}</small></span>
                                    </div>
                                    <div class="user-action">
                                        <a class="btn btn-icon mr-n2" href="html/invest/profile-setting.html"><em class="icon ni ni-setting"></em></a>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-inner user-account-info">
                                <h6 class="overline-title-alt">Account Balance</h6>
                                <div class="user-balance">1,494.23 <small class="currency currency-usd">USD</small></div>
                                <div class="user-balance-sub">Locked <span>15,495.39 <span class="currency currency-usd">USD</span></span></div>
                                <a href="#" class="link"><span>Withdraw Balance</span> <em class="icon ni ni-wallet-out"></em></a>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="html/invest/profile.html"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                    <li><a href="html/invest/profile-setting.html"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
                                    <li><a href="html/invest/profile-activity.html"><em class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li>
                                </ul>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <em class="icon ni ni-signout"></em>
                                            <span>Sign out</span>
                                        </a>
                                    </li>
                                </ul>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </li><!-- .dropdown -->
                </ul><!-- .nk-quick-nav -->
            </div><!-- .nk-header-tools -->
        </div><!-- .nk-header-wrap -->
    </div><!-- .container-fliud -->
</div>
<!-- main header @e -->