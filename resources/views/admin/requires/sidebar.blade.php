<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li>
                <a href="{{url('/admin/home')}}">
                        <i class="fas fa-home" style="margin-right:10px;"></i> <span>Dashboard</span></i>
                    </a>
                </li>
                {{-- for permission --}}
                @can('permission-access')
                    <li class="treeview">
                        <a href="#">
                            <i class="fab fa-product-hunt" style="margin-right:10px;"></i> <span>Permission</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li style="margin-left:20px;"><a href="{{route('permission_component.index')}}">Permission Components</a></li>
                            <li style="margin-left:20px;"><a href="{{route('permission.index')}}">Permissions</a></li>
                        </ul>
                    </li>
                @endcan
                {{-- end of permission session --}}

                {{-- start of role session --}}
                @can('role-access')
                    <li class="treeview">
                        <a href="#">
                            <i class="fas fa-registered" style="margin-right:10px;"></i> <span>Role</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li style="margin-left:20px;"><a href="{{route('role.index')}}">View Roles</a></li>
                            <li style="margin-left:20px;"><a href="{{route('role.create')}}">Add Role</a></li>
                        </ul>
                    </li>
                @endcan
                {{-- end of roles --}}

                {{-- start of user management --}}
                @can('user-access')
                    <li class="treeview">
                        <a href="#">
                            <i class="fas fa-users" style="margin-right: 8px;"></i> <span>User Management</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li style="margin-left:20px;"><a href="{{route('user.index')}}">View Users</a></li>
                            <li style="margin-left:20px;"><a href="{{route('user.create')}}">Add Users</a></li>
                        </ul>
                    </li>
                @endcan
                {{-- end of user  management --}}

                {{-- start of category --}}
                @can('category-access')
                    <li class="treeview">
                        <a href="#">
                            <i class="fab fa-cuttlefish" style="margin-right:10px;"></i> <span>Category</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li style="margin-left:20px;"><a href="{{route('category.index')}}">View Category</a></li>
                            <li style="margin-left:20px;"><a href="{{route('category.create')}}">Add Category</a></li>
                        </ul>
                    </li>
                @endcan
                {{-- end of category --}}

                {{-- start of painting --}}
                @can('painting-access')
                    <li class="treeview">
                        <a href="#">
                            <i class="fab fa-pied-piper-square" style="margin-right:6px;"></i> <span>Painting Management</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li style="margin-left:20px;"><a href="{{route('painting.store')}}">View Painting</a></li>
                            <li style="margin-left:20px;"><a href="{{route('painting.create')}}">Add Painting</a></li>
                        </ul>
                    </li>
                @endcan
                {{-- end of painting --}}

                @can('order-view')
                    <li>
                        <a href="{{route('order.index')}}">
                            <i class="fas fa-file-alt" style="margin-right: 5px;"></i> <span>View Orders</span></i>
                        </a>
                    </li>
                @endcan

                {{-- @can('order-view')
                    <li>
                        <a href="#">
                            <i class="fas fa-file-invoice-dollar" style="margin-right: 5px;"></i> <span>Invoice of Orders</span></i>
                        </a>
                    </li>
                @endcan --}}

                {{-- start of exhibition --}}
                @can('exhibition-access')
                    <li class="treeview">
                        <a href="#">
                            <i class="fab fa-etsy" style="margin-right:10px;"></i> <span>Exhibitions</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li style="margin-left:20px;"><a href="{{route('exhibition.index')}}">View Exhibitions</a></li>
                            <li style="margin-left:20px;"><a href="{{route('exhibition.create')}}">Add Exhibition</a></li>
                        </ul>
                    </li>
                @endcan

                {{-- end of exhibition --}}

                {{-- view customers --}}
                @can('user-access')
                    <li>
                        <a href="{{route('user.list')}}">
                            <i class="fas fa-address-card" style="margin-right: 5px;"></i> <span>View Customers</span></i>
                        </a>
                    </li>
                @endcan
                {{-- end of customers --}}

                {{-- access to view the artist requests --}}
                @can('artist-access')
                    <li>
                        <a href="{{route('viewRequest')}}">
                            <i class="fas fa-user-alt" style="margin-right: 5px;"></i> <span>Artist Requests</span></i>
                        </a>
                    </li>
                @endcan
                {{-- end of artist request section --}}

                @can('offer-access')
                    <li class="treeview">
                        <a href="#">
                            <i class="fas fa-gift" style="margin-right:10px;"></i><span>Offer</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li style="margin-left:20px;"><a href="{{route('offer_component.index')}}">Offer Components</a></li>
                            <li style="margin-left:20px;"><a href="{{route('offers.index')}}">Offers</a></li>
                        </ul>
                    </li>
                @endcan

                {{-- view enquiries --}}
                @can('user-access')
                    <li>
                        <a href="{{route('enquiry.index')}}">
                            <i class="fas fa-envelope" style="margin-right:10px;"></i> <span>View Enquiries</span></i>
                        </a>
                    </li>
                @endcan
                {{-- end of enquiries --}}

                {{-- <li class="treeview">
                    <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span>Layout Options</span>
                        <span class="label label-primary pull-right">4</span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{asset ('admin/pages/layout/top-nav.html')}}"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
                        <li><a href="{{asset('admin/pages/layout/boxed.html')}}"><i class="fa fa-circle-o"></i> Boxed</a></li>
                        <li><a href="{{asset('admin/pages/layout/fixed.html')}}"><i class="fa fa-circle-o"></i> Fixed</a></li>
                        <li><a href="{{asset('admin/pages/layout/collapsed-sidebar.html')}}"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
                    </ul>
                </li> --}}
                {{-- <li class="treeview">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span>Charts</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{asset('admin/pages/charts/chartjs.html')}}"><i class="fa fa-circle-o"></i> ChartJS</a></li>
                        <li><a href="{{asset('admin/pages/charts/morris.html')}}"><i class="fa fa-circle-o"></i> Morris</a></li>
                        <li><a href="{{asset ('admin/pages/charts/flot.html')}}"><i class="fa fa-circle-o"></i> Flot</a></li>
                        <li><a href="{{asset('admin/pages/charts/inline.html')}}"><i class="fa fa-circle-o"></i> Inline charts</a></li>
                    </ul>
                </li> --}}
            </ul>
    </section>
    <!-- /.sidebar -->
</aside>
