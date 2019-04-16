@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="container-fluid"> 
  <div class= "row no-gutters" ><!--no-gutters"> -->
      <div class="sidebar-container sidebar-menu sidebar-menu-expanded sidebar-mobile">
          <div class="bg-light sidebar sidebar-menu sidebar-menu-expanded sidebar-mobile">
            <div class="sidebar-sticky-1">
                <ul class="nav flex-column">
                    <li class="nav-item">
                    <a class="nav-link active" href="#"  >
                    <span id="sidebar-icon" data-feather="home"></span>
                    <span class="sidebar-menu-item" >Dashboard <span class="sr-only">(current)</span></span> 
                    </a>
                    </li>
                    <li class="nav-item">
                     <a class="nav-link " href="#"  >
                     <span id="sidebar-icon" data-feather="file"></span>
                     <span class="sidebar-menu-item">Orders</span> 
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link dropdown" id="menu-item-2" href="#" data-toggle="collapse" data-target="#submenu-list-1">
                    <span  id="sidebar-icon" data-feather="shopping-cart"></span>        
                    <span class="sidebar-menu-item">Products</span>
                    <span class="drop-arrow" data-feather="chevron-down"></span>
                    </a>

                        <ul class="collapse dropdown-content dropdown-sidebar-expanded " aria-labelledby="menu-item-2" id="submenu-list-1"  >
                            <li><a href="#" class="submenu-list-item"><span data-feather="shopping-cart"></span>Product 1</a></li>
                            <li><a href="#" class="submenu-list-item"><span data-feather="shopping-cart"></span>Product 2</a></li>
                            <li><a href="#" class="submenu-list-item"><span data-feather="shopping-cart"></span>Product 3333</a></li>
                        </ul>

                    </li>

                    <li class="nav-item">
                    <a class="nav-link dropdown" href="#" data-toggle="collapse" id="menu-item-2" data-target="#submenu-list-2">
                    <span id="sidebar-icon" data-feather="users"></span>
                    <span class="sidebar-menu-item" >Customers</span>
                    <span class="drop-arrow" data-feather="chevron-down"></span>
                    </a>
                        <ul class="collapse dropdown-content" aria-labelledby="menu-item-2" id="submenu-list-2">
                            <li><a href="#" class="submenu-list-item"><span data-feather="users"></span>Customer 1</a></li>
                            <li><a href="#" class="submenu-list-item"><span data-feather="users"></span>Customer 2</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <span id="sidebar-icon" data-feather="bar-chart-2"></span>
                        <span class="sidebar-menu-item" >Reports</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <span id="sidebar-icon" data-feather="layers"></span>
                        <span class="sidebar-menu-item">Integrations</span>
                        </a>
                    </li>
                </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span class="sidebar-menu-item">Saved reports</span>
              <a class="d-flex align-items-center text-muted" href="#">
              <span id="sidebar-icon" data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span id="sidebar-icon" data-feather="file-text"></span>
                    <span class="sidebar-menu-item" >Current month</span> 
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span id="sidebar-icon" data-feather="file-text"></span>
                    <span class="sidebar-menu-item" >Last quarter</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span id="sidebar-icon" data-feather="file-text"></span>
                    <span class="sidebar-menu-item" >Social engagement</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span id="sidebar-icon" data-feather="file-text"></span>
                    <span class="sidebar-menu-item" >Year-end sale</span>
                </a>
              </li>
            </ul>
      </div>
    </div>
        </div>
      
        <main role="main" class="col">
            <div class="row main-content">
                <div class="col">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Dashboard</h1>
                        <div class="btn-toolbar mb-2 mb-md-0">
                          <div  class="btn-group mr-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                          </div>
                          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <span data-feather="calendar"></span>
                            This week
                          </button>
                        </div>

                </div>
                      <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

                      <h2>Section title</h2>
                      <div class="table-responsive">
                        <table class="table table-striped table-sm">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Header</th>
                              <th>Header</th>
                              <th>Header</th>
                              <th>Header</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1,001</td>
                              <td>Lorem</td>
                              <td>ipsum</td>
                              <td>dolor</td>
                              <td>sit</td>
                            </tr>
                            <tr>
                              <td>1,002</td>
                              <td>amet</td>
                              <td>consectetur</td>
                              <td>adipiscing</td>
                              <td>elit</td>
                            </tr>
                            <tr>
                              <td>1,003</td>
                              <td>Integer</td>
                              <td>nec</td>
                              <td>odio</td>
                              <td>Praesent</td>
                            </tr>
                            <tr>
                              <td>1,003</td>
                              <td>libero</td>
                              <td>Sed</td>
                              <td>cursus</td>
                              <td>ante</td>
                            </tr>
                            <tr>
                              <td>1,004</td>
                              <td>dapibus</td>
                              <td>diam</td>
                              <td>Sed</td>
                              <td>nisi</td>
                            </tr>
                            <tr>
                              <td>1,005</td>
                              <td>Nulla</td>
                              <td>quis</td>
                              <td>sem</td>
                              <td>at</td>
                            </tr>
                            <tr>
                              <td>1,006</td>
                              <td>nibh</td>
                              <td>elementum</td>
                              <td>imperdiet</td>
                              <td>Duis</td>
                            </tr>
                            <tr>
                              <td>1,007</td>
                              <td>sagittis</td>
                              <td>ipsum</td>
                              <td>Praesent</td>
                              <td>mauris</td>
                            </tr>
                            <tr>
                              <td>1,008</td>
                              <td>Fusce</td>
                              <td>nec</td>
                              <td>tellus</td>
                              <td>sed</td>
                            </tr>
                            <tr>
                              <td>1,009</td>
                              <td>augue</td>
                              <td>semper</td>
                              <td>porta</td>
                              <td>Mauris</td>
                            </tr>
                            <tr>
                              <td>1,010</td>
                              <td>massa</td>
                              <td>Vestibulum</td>
                              <td>lacinia</td>
                              <td>arcu</td>
                            </tr>
                            <tr>
                              <td>1,011</td>
                              <td>eget</td>
                              <td>nulla</td>
                              <td>Class</td>
                              <td>aptent</td>
                            </tr>
                            <tr>
                              <td>1,012</td>
                              <td>taciti</td>
                              <td>sociosqu</td>
                              <td>ad</td>
                              <td>litora</td>
                            </tr>
                            <tr>
                              <td>1,013</td>
                              <td>torquent</td>
                              <td>per</td>
                              <td>conubia</td>
                              <td>nostra</td>
                            </tr>
                            <tr>
                              <td>1,014</td>
                              <td>per</td>
                              <td>inceptos</td>
                              <td>himenaeos</td>
                              <td>Curabitur</td>
                            </tr>
                            <tr>
                              <td>1,015</td>
                              <td>sodales</td>
                              <td>ligula</td>
                              <td>in</td>
                              <td>libero</td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
     </main>
            
       </div>
  </div>
  
   
@endsection
