<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{asset('public/assets/images/favicon.png')}}">
    <!-- Page Title  -->
    <title>Authentication | Your Express</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{asset('public/assets/css/dashlite.css')}}">
    <link id="skin-default" rel="stylesheet" href="{{asset('public/assets/css/theme.css')}}">

    @yield('auth_style')
</head>

<body class="nk-body bg-lighter npc-general pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                        <div class="brand-logo pb-4 text-center">
                            <a href="#" class="logo-link">
                                <img class="logo-light logo-img logo-img-lg" src="{{asset('public/assets/images/logo.png')}}" srcset="{{asset('public/assets/images/logo2x.png 2x')}}" alt="logo">
                                <img class="logo-dark logo-img logo-img-lg" src="{{asset('public/assets/images/logo-dark.png')}}" srcset="{{asset('public/assets/images/logo-dark2x.png 2x')}}" alt="logo-dark">
                            </a>
                        </div>

                        {{-- main auth content start --}}
                        @yield('auth_content')
                        {{-- main auth content end --}}
                        
                    </div>
                    <div class="nk-footer nk-auth-footer-full">
                        <div class="container wide-lg">
                            <div class="nk-footer-wrap">
                                <div class="nk-footer-copyright" style="font-size: 13px;"> &copy; 2020 <a href="#">Your Express</a>. Developed by <a href="https://www.facebook.com/mahfuz.shuvo.7/">Mahfuz Shuvo</a>
                                </div>
                                <div class="nk-footer-links" style="font-size: 13px;">
                                    <ul class="nav nav-sm">
                                        <li class="nav-item"><a class="nav-link" href="#">Terms</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#">Privacy</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#">Help</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="{{asset('public/assets/js/bundle.js')}}"></script>
    <script src="{{asset('public/assets/js/scripts.js')}}"></script>
    @yield('auth_script')
</html>