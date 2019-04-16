<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
     <!-- Styles -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2.2.0/src/js.cookie.min.js"></script>

</head>
<body>
    <div>
       <div class="navbar navbar-dark fixed-top bg-dark shadow row" style="padding-bottom: 0px; padding-top: 0">
    <div class="company-name"><a href="#" >Company name</a></div>
    <div class="company-logo" style="display: none;"><a href="#" >Logo</a></div>
    <div class="col">
        <div class="row">
            <div class="col-md-1 col-sm-1 col-1 nav-container toggle-button" id="toggle-button">
                <a class=" text-white"  href="#"  ><span data-feather="menu"></span></a> 
            </div>
            <div class="col-md-1 col-sm-1 col-1 nav-container toggle-button" id="toggle-button-mobile" >
                <a class=" text-white"  href="#"  ><span data-feather="menu"></span></a> 
            </div>
            <div class="col-md-9 col-sm-9 col-9">
                <input class="form-control form-control-dark search-box" type="text" placeholder="Search" aria-label="Search">
            </div>
            <div class="col-md-2 col-sm-2 col-2 nav-container">
                <ul class="navbar-nav">
                    <li class="nav-item text-nowrap">
                        <a class="nav-link" href="#">Sign out</a>
                    </li>
                </ul>                
            </div>
        </div>
    </div>
</div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
    	 <script src="{{ asset('js/bootstrap.bundle.min.js') }}" defer></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
     <script>
         
         
        function createCookie(key, value) {
                    var cookie = escape(key) + "=" + escape(value) + ";";
                    document.cookie = cookie;
                    console.log(cookie);
                    
                }
         
        $(document).ready(function(){
             $('#toggle-button').click(function(){
                 if( $('.sidebar-menu-item').is(':visible') ){
                     $( '.company-name').css({display: 'none'});
                     $('.company-logo').css({display: 'inline'})
                     $('.sidebar-menu-item').hide();
                     $('.drop-arrow').hide();
                     $('.sidebar-menu').removeClass('sidebar-menu-expanded');
                     $('.sidebar-menu').addClass('sidebar-menu-collapsed');
                     $('.dropdown-content').removeClass('dropdown-sidebar-expanded');
                     $('.dropdown-content').addClass('dropdown-sidebar-collapsed');
                     createCookie("sidebar", "hidden");
                     

                 }
                 
                 else if($('.sidebar-menu-item').is(':hidden')){
                    $( '.company-name').css({display: 'inline'});
                    $('.company-logo').css({display: 'none'})
                    $('.sidebar-menu-item').show();
                    $('.drop-arrow').show();
                    $('.sidebar-menu').removeClass('sidebar-menu-collapsed');
                    $('.sidebar-menu').addClass('sidebar-menu-expanded');
                    $('.dropdown-content').addClass('dropdown-sidebar-expanded');
                    $('.dropdown-content').removeClass('dropdown-sidebar-collapsed');
                    createCookie("sidebar", "visible");
                 }
                 
                 else{
                     return;
                 }
            });
         
         
          
                            
                    $('#toggle-button-mobile').click(function(){
                        if($('.sidebar-menu').is(':visible')){
                            $('.sidebar-menu').addClass('sidebar-menu-hide');
                            $('.main-content').addClass('main-content-view');
                            $('.sidebar-menu').removeClass('.sidebar-menu-expanded');
                              }

                       else if($('.sidebar-menu-item').is(':hidden')){
                            $('.sidebar-menu').removeClass('sidebar-menu-hide');
                            $('.main-content').removeClass('main-content-view');
                            $('.sidebar-menu').addClass('.sidebar-menu-expanded');
                          }
                        
                        else{
                        return;
                    }
                            

             });
        
            });
        </script>
</body>
</html>
