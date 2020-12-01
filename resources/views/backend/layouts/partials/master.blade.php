<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Mahfuz Shuvo">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Page Title  -->
    <title>Your Express | Make your delivery more comforatble</title>

    {{-- css links --}}
    @include('backend.layouts.partials.assetsLink.cssLink')

</head>

<body class="nk-body npc-invest bg-lighter ">

	<div class="nk-app-root">
        <!-- wrap @s -->
        <div class="nk-wrap ">
            
        	{{-- header start --}}
        	@include('backend.layouts.partials.header')
        	{{-- header end --}}

            {{-- content section start --}}
		    @yield('content')
		    {{-- content section end --}}
            
            {{-- footer start --}}
        	@include('backend.layouts.partials.footer')
        	{{-- footer end --}}

        </div>
        <!-- wrap @e -->
    </div>
    

    {{-- js links --}}
    @include('backend.layouts.partials.assetsLink.jsLink')

    
</body>

</html>