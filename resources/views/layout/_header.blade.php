<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;
    background-color: #438EB9;">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" style="color: #fff;" href="{{ URL('/') }}"><i class="fa fa-leaf"></i> LPG Plant Management</a>
    </div>

    <ul class="nav navbar-nav navbar-right">
        <!-- Authentication Links -->
        @if (Auth::guest())
            <li><a href="{{ route('login') }}"><b>Login</b></a></li>
            <li><a href="{{ route('register') }}"><b>Register</b></a></li>
        @else
            <li class="dropdown user-margin">
                <style type="text/css">
                    .user-margin {
                        margin-right: 50px;
                    }
                    .user-color {
                        color: white!important;
                        
                    }
                    .user-color:hover {
                        color: white!important;
                    }
                    .user-color:focus {
                        background-color: #e7e7e700!important;
                    }
                </style>
                <a href="#" class="dropdown-toggle user-color" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        @endif
    </ul>
    

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                    <button class="btn btn-success">
                        <i class="ace-icon fa fa-signal"></i>
                    </button>

                    <button class="btn btn-info">
                        <i class="ace-icon fa fa-pencil"></i>
                    </button>

                    <button class="btn btn-warning">
                        <i class="ace-icon fa fa-users"></i>
                    </button>

                    <button class="btn btn-danger">
                        <i class="ace-icon fa fa-cogs"></i>
                    </button>
                </div>
            </div><!-- /.sidebar-shortcuts -->

            <ul class="nav" id="side-menu">
                <li>
                    <a href="{{ URL('/') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-cogs"></i> Administration<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ URL('cities') }}">
                            <i class="menu-icon fa fa-caret-right"></i>Cities</a>
                        </li>
                        <li>
                            <a href="{{ URL('areas') }}">
                            <i class="menu-icon fa fa-caret-right"></i>Area</a>
                        </li>
                        <li>
                            <a href="{{ URL('zones') }}">
                            <i class="menu-icon fa fa-caret-right"></i>Zone</a>
                        </li>
                        <li>
                            <a href="{{ URL('sale-contract') }}">
                            <i class="menu-icon fa fa-caret-right"></i>Sale Contract</a>
                        </li>
                        <li>
                            <a href="{{ URL('purchase-contract') }}">
                            <i class="menu-icon fa fa-caret-right"></i>Purchase Contract</a>
                        </li>
                        <li>
                            <a href="{{ URL('transporters') }}">
                            <i class="menu-icon fa fa-caret-right"></i>Transporters</a>
                        </li>
                        <li>
                            <a href="{{ URL('distributors') }}">
                            <i class="menu-icon fa fa-caret-right"></i>Distributors</a>
                        </li>
                        <li>
                            <a href="{{ URL('suppliers') }}">
                            <i class="menu-icon fa fa-caret-right"></i>Suppliers</a>
                        </li>
                        <li>
                            <a href="{{ URL('plants') }}">
                            <i class="menu-icon fa fa-caret-right"></i>Plant</a>
                        </li>

                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <!-- <li>
                    <a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>
                </li> -->
                <li>
                    <a href="#"><i class="fa fa-shopping-cart"></i> Inventory Forms
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ URL('retail-sale/create') }}">
                            <i class="menu-icon fa fa-caret-right"></i>Retail-Sale</a>
                        </li>
                        <li>
                            <a href="{{ URL('inward-gate') }}">
                            <i class="menu-icon fa fa-caret-right"></i>IGP-Bowsers</a>
                        </li>
                        <li>
                            <a href="{{ URL('igp-cylfill') }}">
                            <i class="menu-icon fa fa-caret-right"></i>IGP-CylinderFilling</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="#"><i class="glyphicon glyphicon-euro""></i> Reports<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ URL('inward-gate/report') }}">
                            <i class="menu-icon fa fa-caret-right"></i>IGP-Bowser</a>
                        </li>
                        <li>
                            <a href="{{ URL('igp-cylfill/report') }}">
                            <i class="menu-icon fa fa-caret-right"></i>IGP-CylinderFilling-Form</a>
                        </li>
                        <li>
                            <a href="{{ URL('igp-cylfill/report_date') }}">
                            <i class="menu-icon fa fa-caret-right"></i>Date-wise-IGP-CylFilling</a>
                        </li>
                        <li>
                            <a href="{{ URL('igp-cylfill/report_customer') }}">
                            <i class="menu-icon fa fa-caret-right"></i>Customer-wise-IGP-CylFilling</a>
                        </li>
                        <li>
                            <a href="{{ URL('igp-cylfill/report_plant') }}">
                            <i class="menu-icon fa fa-caret-right"></i>Plant-wise-IGP-CylFilling</a>
                        </li>
                        <li>
                            <a href="{{ URL('retail-sale/report_date') }}">
                            <i class="menu-icon fa fa-caret-right"></i>Date-wise-Retail Sale</a>
                        </li>
                        <li>
                            <a href="{{ URL('retail-sale/report_customer') }}">
                            <i class="menu-icon fa fa-caret-right"></i>Customer-wise-IGP-CylFilling</a>
                        </li>
                        <li>
                            <a href="{{ URL('retail-sale/report_plant') }}">
                            <i class="menu-icon fa fa-caret-right"></i>Plant-wise-Retail Sale</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-database"></i> Database Backup<span class="fa arrow"></span></a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
            <!-- /.navbar-static-side -->
</nav>