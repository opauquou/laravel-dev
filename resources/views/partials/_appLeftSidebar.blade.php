<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel -->
        {{--<div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('assets/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>--}}

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="@if(isset($data) && !empty($data->currentMenu) && $data->currentMenu == 'dashboard')active @endif">
                <a href="{{route('home')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-widgets @if(isset($data) && !empty($data->currentMenu) && $data->currentMenu == 'widgets')active @endif">
                <a href="javascript:void(0);">
                    <i class="fa fa-th"></i> <span>Widgets</span>
                </a>
            </li>
            <li class="treeview @if(isset($data) && !empty($data->currentMenu) && $data->currentMenu == 'charts')active @endif">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Charts</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="nav-chartJs @if(isset($data) && !empty($data->currentSubMenu) && $data->currentSubMenu == 'js')active @endif">
                        <a href="{{route('jsCharts')}}"><i class="fa fa-circle-o"></i> ChartJS</a>
                    </li>
                    <li class="@if(isset($data) && !empty($data->currentSubMenu) && $data->currentSubMenu == 'morris')active @endif">
                        <a href="{{route('morrisCharts')}}"><i class="fa fa-circle-o"></i> Morris</a>
                    </li>
                    <li class="@if(isset($data) && !empty($data->currentSubMenu) && $data->currentSubMenu == 'flot')active @endif">
                        <a href="{{route('flotCharts')}}"><i class="fa fa-circle-o"></i> Flot</a>
                    </li>
                    <li class="@if(isset($data) && !empty($data->currentSubMenu) && $data->currentSubMenu == 'inline')active @endif">
                        <a href="{{route('inlineCharts')}}"><i class="fa fa-circle-o"></i> Inline charts</a>
                    </li>
                    <li class="@if(isset($data) && !empty($data->currentSubMenu) && $data->currentSubMenu == 'data')active @endif">
                        <a href="{{route('dataCharts')}}"><i class="fa fa-circle-o"></i> Data charts</a>
                    </li>
                </ul>
            </li>
            <li class="treeview @if(isset($data) && !empty($data->currentMenu) && $data->currentMenu == 'UI')active @endif">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>UI Elements</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(isset($data) && !empty($data->currentSubMenu) && $data->currentSubMenu == 'generalUi')active @endif">
                        <a href="{{route('generalUi')}}"><i class="fa fa-circle-o"></i> General</a>
                    </li>
                    <li class="@if(isset($data) && !empty($data->currentSubMenu) && $data->currentSubMenu == 'icons')active @endif">
                        <a href="{{route('iconsUi')}}"><i class="fa fa-circle-o"></i> Icons</a>
                    </li>
                    <li class="@if(isset($data) && !empty($data->currentSubMenu) && $data->currentSubMenu == 'buttons')active @endif">
                        <a href="{{route('buttonsUi')}}"><i class="fa fa-circle-o"></i> Buttons</a>
                    </li>
                    <li class="@if(isset($data) && !empty($data->currentSubMenu) && $data->currentSubMenu == 'sliders')active @endif">
                        <a href="{{route('slidersUi')}}"><i class="fa fa-circle-o"></i> Sliders</a>
                    </li>
                    <li class="@if(isset($data) && !empty($data->currentSubMenu) && $data->currentSubMenu == 'timeLines')active @endif">
                        <a href="{{route('timeLinesUi')}}"><i class="fa fa-circle-o"></i> Timeline</a>
                    </li>
                    <li class="@if(isset($data) && !empty($data->currentSubMenu) && $data->currentSubMenu == 'modals')active @endif">
                        <a href="{{route('modalsUi')}}"><i class="fa fa-circle-o"></i> Modals</a>
                    </li>
                </ul>
            </li>
            <li class="treeview @if(isset($data) && !empty($data->currentMenu) && $data->currentMenu == 'forms')active @endif">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Forms</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(isset($data) && !empty($data->currentSubMenu) && $data->currentSubMenu == 'generalForms')active @endif">
                        <a href="{{route('generalForm')}}"><i class="fa fa-circle-o"></i> General Elements</a>
                    </li>
                    <li class="@if(isset($data) && !empty($data->currentSubMenu) && $data->currentSubMenu == 'advanced')active @endif">
                        <a href="{{route('advancedForm')}}"><i class="fa fa-circle-o"></i> Advanced Elements</a>
                    </li>
                    <li class="@if(isset($data) && !empty($data->currentSubMenu) && $data->currentSubMenu == 'editors')active @endif">
                        <a href="{{route('editorsForm')}}"><i class="fa fa-circle-o"></i> Editors</a>
                    </li>
                </ul>
            </li>
            <li class="treeview @if(isset($data) && !empty($data->currentMenu) && $data->currentMenu == 'tables')active @endif">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Tables</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(isset($data) && !empty($data->currentSubMenu) && $data->currentSubMenu == 'simple')active @endif">
                        <a href="{{route('simpleTables')}}"><i class="fa fa-circle-o"></i> Simple tables</a>
                    </li>
                    <li class="@if(isset($data) && !empty($data->currentSubMenu) && $data->currentSubMenu == 'data')active @endif">
                        <a href="{{route('dataTables')}}"><i class="fa fa-circle-o"></i> Data tables</a>
                    </li>
                </ul>
            </li>
            <li class="treeview @if(isset($data) && !empty($data->currentMenu) && $data->currentMenu == 'calendar')active @endif ">
                <a href="{{route('calendar')}}">
                    <i class="fa fa-calendar"></i> <span>Calendar</span>
                    <small class="label pull-right bg-red">3</small>
                </a>
            </li>
            @if(isset($data) && !empty($data->currentMenu) && $data->currentMenu != 'mailBox')
            <li class="treeview ">
                <a href="{{route('mailBox')}}">
                    <i class="fa fa-envelope"></i> <span>Mailbox</span>
                    <small class="label pull-right bg-yellow">12</small>
                </a>
            </li>
            @else
            <li class="treeview @if(isset($data) && !empty($data->currentMenu) && $data->currentMenu == 'mailBox')active @endif">
                <a href="#">
                    <i class="fa fa-envelope"></i> <span>Mailbox</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(isset($data) && !empty($data->currentSubMenu) && $data->currentSubMenu == 'inbox')active @endif">
                        <a href="{{route('mailBox')}}">
                            <i class="fa fa-circle-o"></i>Inbox
                            <span class="label label-primary pull-right">13</span>
                        </a>
                    </li>
                    <li class="@if(isset($data) && !empty($data->currentSubMenu) && $data->currentSubMenu == 'composeMail')active @endif">
                        <a href="{{route('mailCompose')}}"><i class="fa fa-circle-o"></i> Compose</a>
                    </li>
                    <li class="@if(isset($data) && !empty($data->currentSubMenu) && $data->currentSubMenu == 'readMail')active @endif">
                        <a href="{{route('mailRead')}}"><i class="fa fa-circle-o"></i> Read</a>
                    </li>
                </ul>
            </li>
            @endif
            <li class="treeview @if(isset($data) && !empty($data->currentMenu) && $data->currentMenu == 'examples')active @endif ">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Examples</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(isset($data) && !empty($data->currentSubMenu) && $data->currentSubMenu == 'invoice')active @endif">
                        <a href="{{route('invoicePage')}}"><i class="fa fa-circle-o"></i> Invoice</a>
                    </li>
                    <li class="@if(isset($data) && !empty($data->currentSubMenu) && $data->currentSubMenu == 'profile')active @endif">
                        <a href="{{route('profilePage')}}"><i class="fa fa-circle-o"></i> Profile</a>
                    </li>
                    <li>
                        <a href="{{route('loginPage')}}"><i class="fa fa-circle-o"></i> Login</a>
                    </li>
                    <li>
                        <a href="{{route('registerPage')}}"><i class="fa fa-circle-o"></i> Register</a>
                    </li>
                    <li>
                        <a href="{{route('lockPage')}}"><i class="fa fa-circle-o"></i> Lockscreen</a>
                    </li>
                    <li class="@if(isset($data) && !empty($data->currentSubMenu) && $data->currentSubMenu == 'error 404')active @endif">
                        <a href="{{route('error.404')}}"><i class="fa fa-circle-o"></i> 404 Error</a>
                    </li>
                    <li class="@if(isset($data) && !empty($data->currentSubMenu) && $data->currentSubMenu == 'error 500')active @endif">
                        <a href="{{route('error.500')}}"><i class="fa fa-circle-o"></i> 500 Error</a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Multilevel</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                    <li>
                        <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                            <li>
                                <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
                                <ul class="treeview-menu">
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                </ul>
            </li>
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>