<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
     <!-- Styles -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--<title>{{ config('app.name', 'Supply Chain Management') }}</title>-->
    <title>Supply Chain Management</title>
    <!-- Scripts -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script> 
   
    

</head>
<body>
<div id="page-activity">
    <div>
            <div class="navbar navbar-dark fixed-top bg-dark shadow row navbar-top" >
        @guest
            <ul>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
             </ul>
        @else
        <div class="company-name company"><a href="#" >{{ __('Company Name') }}</a></div>
        <div class="company-logo company"><a href="#" >{{ __('Logo') }}</a></div>
            <div class="col">
                <div class="row">
                    <div class="col-md-1 col-sm-1 col-1 nav-container toggle-btn" id="toggle-button">
                        <a class="text-white" href="#" ><span data-feather="menu"></span></a> 
                    </div>
                    <div class="col-md-1 col-sm-1 col-1 nav-container toggle-btn" id="toggle-button-mobile" >
                        <a class=" text-white" href="#"><span data-feather="menu"></span></a> 
                    </div>
                    <div class="col-md-9 col-sm-9 col-9">
                        <input class="form-control form-control-dark search-box" type="text" placeholder="Search" aria-label="Search">
                    </div>

                    <div class="col-md-2 col-sm-2 col-2 nav-container">
                        <ul class="navbar-nav">
                            <li class="nav-item text-nowrap sign-out-btn">
                                <a class="nav-link" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Signout') }}
                                </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                              </form>
                            </li>
                        </ul>  

                    </div>
                </div>
            </div>
    </div>  
    <div class="hide-loader" id="loader">
        <div class="spinner-border text-dark"  role="status">
                <span class="sr-only"></span>
        </div>
        <p>Loading</p>
    </div>

    <div class="container-fluid"> 
      <div class= "row no-gutters" ><!--no-gutters">-->
          <div class="sidebar-container sidebar-menu sidebar-menu-expanded sidebar-mobile">
              <div class="bg-light sidebar sidebar-menu sidebar-menu-expanded sidebar-mobile">
                <div class="sidebar-sticky-1">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                        <a class="nav-link active" href="#"  >
                        <span class="sidebar-icon" data-feather="home"></span>
                        <span class="sidebar-menu-item" >{{ __('Dashboard') }} <span class="sr-only">(current)</span></span> 
                        </a>
                        </li>
                        <li class="nav-item">
                         <a class="nav-link " href="#" >
                         <span class="sidebar-icon" data-feather="file"></span>
                         <span class="sidebar-menu-item">{{ __('Orders') }}</span> 
                        </a>
                        </li>
                        <li class="nav-item">
                         <a class="nav-link dropdown collapsed" id="menu-item-1" href="#" data-toggle="collapse" data-target="#submenu-list-1" > 
                    <span  class="sidebar-icon" data-feather="shopping-cart"></span>        
                    <span class="sidebar-menu-item">Products</span>
                    <span class="drop-btn" data-feather="chevron-down"></span>
    
                    
                    </a>

                        <ul class="collapse dropdown-content dropdown-sidebar-expanded menu" aria-labelledby="menu-item-1" id="submenu-list-1" >
                            <li><a href="#" class="submenu-list-item"><span data-feather="shopping-cart"></span>Product 1</a></li>
                            <li><a href="#" class="submenu-list-item"><span data-feather="shopping-cart"></span>Product 2</a></li>
                            <li><a href="#" class="submenu-list-item"><span data-feather="shopping-cart"></span>Product 3333</a></li>
                        </ul>

                    </li>

                        <li class="nav-item">
                        <a class="nav-link dropdown collapsed" href="#" data-toggle="collapse" id="menu-item-2" data-target="#submenu-list-2" >
                        <span class="sidebar-icon" data-feather="users"></span>
                        <span class="sidebar-menu-item">{{ __('Customers') }}</span>
                       <span class="drop-btn" data-feather="chevron-down"></span>
                        </a>
                            <ul class="collapse dropdown-content dropdown-sidebar-expanded" aria-labelledby="menu-item-2" id="submenu-list-2">
                                <li><a href="#" class="submenu-list-item"><span data-feather="users"></span>Customer 1</a></li>
                                <li><a href="#" class="submenu-list-item"><span data-feather="users"></span>Customer 2</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                            <span class="sidebar-icon" data-feather="bar-chart-2"></span>
                            <span class="sidebar-menu-item" >{{ __('Reports') }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                            <span class="sidebar-icon" data-feather="layers"></span>
                            <span class="sidebar-menu-item">{{ __('Integrations') }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link dropdown collapsed" href="#" data-toggle="collapse" id="menu-item-3" data-target="#submenu-list-3" >
                        <span class="sidebar-icon" data-feather="settings"></span>
                        <span class="sidebar-menu-item">{{ __('Settings') }}</span>
                       <span class="drop-btn" data-feather="chevron-down" ></span>
                        </a>
                            <ul class="collapse dropdown-content dropdown-sidebar-expanded" aria-labelledby="menu-item-3" id="submenu-list-3">
                                <li><a href="/company/organization-details/{{ Auth::user()->organization_id }}" class="submenu-list-item"><span data-feather="users"></span>{{ __('Organization') }}</a></li>
                                <li><a href="#" class="submenu-list-item dropdown collapsed" data-toggle="collapse" id="submenu-item" data-target="sub-submenu"><span data-feather="users"></span>{{ __('System') }}<span class="drop-btn" data-feather="chevron-down" ></span></a><ul class="collapse dropdown-content dropdown-sidebar-expanded" aria-labelledby="submenu-item" id="sub-submenu" >
                                    <li>
                                        <a href="/system/adjustmentReasons" class=""><span data-feather="users"></span>{{ __('Adjustment Reasons') }}</a>
                                    </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                  <span class="sidebar-menu-item">{{ __('Saved Reports') }}</span>
                  <a class="d-flex align-items-center text-muted" href="#">
                  <span class="sidebar-icon" data-feather="plus-circle"></span>
                  </a>
                </h6>
                <ul class="nav flex-column mb-2">
                  <li class="nav-item">
                    <a class="nav-link" href="#">
                      <span class="sidebar-icon" data-feather="file-text"></span>
                        <span class="sidebar-menu-item" >{{ __('Current month') }}</span> 
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">
                      <span class="sidebar-icon" data-feather="file-text"></span>
                        <span class="sidebar-menu-item" >{{ __('Last quarter') }}</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">
                      <span class="sidebar-icon" data-feather="file-text"></span>
                        <span class="sidebar-menu-item" >{{ __('Social engagement') }}</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">
                      <span class="sidebar-icon" data-feather="file-text"></span>
                        <span class="sidebar-menu-item" >{{ __('Year-end sale') }}</span>
                    </a>
                  </li>
                </ul>
          </div>
        </div>
         @endguest  
            </div>

        <main role="main" class="col">
                <div class="row main-content">
                    <div class="col">   
            <div class="py-4">
                @yield('content')
            </div>
            </div>
            </div>
            </main>
        </div>
      </div>
    </div> 
</div> 
        
       
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>     
        <script src="{{ asset('js/functions.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
       <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>   
        <script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://unpkg.com/vue@2.6.8/dist/vue.js"></script>
        
		
  
     <script>
     function createCookie(key, value) {
         var cookie = escape(key) + "=" + escape(value) + ";";
         document.cookie = cookie;
         console.log(cookie);
     }
			 $(document).ready(function(){
             $('#toggle-button').click(function(){
                 if( $('.sidebar-menu-item').is(':visible') ){
                     $('.company-name').css({'display': 'none'});
                     $('.company-logo').css({'display': 'inline-block'});
                     $('.sidebar-menu-item').hide();
                     $('.drop-btn').hide();
                     //$('.dropdown-content').hide(500);
                     $('.sidebar-menu').removeClass('sidebar-menu-expanded');
                     $('.sidebar-menu').addClass('sidebar-menu-collapsed');
                     $('.dropdown-content').removeClass('dropdown-sidebar-expanded');
                     $('.dropdown-content').addClass('dropdown-sidebar-collapsed');
                     createCookie("sidebar", "hidden");
                     

                 }
                 
                 else if($('.sidebar-menu-item').is(':hidden')){
                    $( '.company-name').css({display: 'inline-block'});
                    $('.company-logo').css({display: 'none'});
                    $('.sidebar-menu-item').show();
                    $('.drop-btn').show();
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
                if($('.sidebar-menu-item').is(':visible')){
                    $('.sidebar-menu').hide("slide", {direction: "left"}, 100);
                    $('.sidebar-menu').css({'height': '100%'});
                    $('.main-content').addClass('main-content-view');
                 }

                else if($('.sidebar-menu-item').is(':hidden')){
                     $('.sidebar-menu').show("slide", {direction: "left"}, 100);
                     $('.sidebar-menu').css({'height': '100%'});
                     $('.main-content').removeClass('main-content-view');
                 }
                
                        
                else{
                    return;
                }
                            

                });
           
            });
			
			$(".dropdown").click(function(){
          
			  if($(this).hasClass('collapsed')){
                  $(this).find(".drop-btn").css({ transform: 'rotate(180deg)'});
			  }
			  
			  else{   
			      $(this).find(".drop-btn").css({ transform: 'rotate(0deg)'});
                    
                 
			  }
			  
			})
         
        
        </script>
        @stack('js-script')
		
   		
</body>
</html>
