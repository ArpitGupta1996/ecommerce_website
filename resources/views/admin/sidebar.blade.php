<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href=""
                        aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                            class="hide-menu">Dashboard</span></a>
                </li>

                {{-- about us details start from here --}}
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ url('admin/aboutus') }}" aria-expanded="false"><i
                            class="mdi mdi-chart-bubble"></i><span class="hide-menu">About Us</span></a>
                </li>
                {{-- till here for about us --}}

                {{-- role section starts from here --}}
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span
                            class="hide-menu">Roles </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ route('role.create') }}" class="sidebar-link"><i
                                    class="mdi mdi-note-outline"></i><span class="hide-menu"> Add Role </span></a></li>
                        <li class="sidebar-item"><a href="{{ route('role.index') }}" class="sidebar-link"><i
                                    class="mdi mdi-note-plus"></i><span class="hide-menu"> Role List </span></a></li>
                    </ul>
                </li>

                {{-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.html" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">User</span></a></li> --}}
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span
                            class="hide-menu">User </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ route('user.create') }}" class="sidebar-link"><i
                                    class="mdi mdi-note-outline"></i><span class="hide-menu"> Add user </span></a></li>
                        <li class="sidebar-item"><a href="{{ route('user.index') }}" class="sidebar-link"><i
                                    class="mdi mdi-note-plus"></i><span class="hide-menu"> User List </span></a></li>
                    </ul>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span
                            class="hide-menu">Category </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ route('category.create') }}" class="sidebar-link"><i
                                    class="mdi mdi-note-outline"></i><span class="hide-menu"> Add Category </span></a>
                        </li>
                        <li class="sidebar-item"><a href="{{ route('category.index') }}" class="sidebar-link"><i
                                    class="mdi mdi-note-plus"></i><span class="hide-menu"> Category List </span></a>
                        </li>
                    </ul>
                </li>


                {{-- product list for admin starts here --}}
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span
                            class="hide-menu">Products </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ route('products.create') }}" class="sidebar-link"><i
                                    class="mdi mdi-note-outline"></i><span class="hide-menu"> Add Product </span></a>
                        </li>
                        <li class="sidebar-item"><a href="{{ route('products.index') }}" class="sidebar-link"><i
                                    class="mdi mdi-note-plus"></i><span class="hide-menu"> Product List </span></a>
                        </li>
                    </ul>
                </li>
                {{-- till here product list of admin --}}

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ url('admin/post') }}" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span
                            class="hide-menu">Post</span></a>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark"
                        href="{{ url('admin/admincomment') }}" aria-expanded="false"><i
                            class="mdi mdi-chart-bubble"></i><span class="hide-menu">Comment</span></a>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span
                            class="hide-menu">Contact Details </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ route('contactadmin.index') }}" class="sidebar-link"><i
                                    class="mdi mdi-note-outline"></i><span class="hide-menu"> Add Website Contact Info
                                </span></a></li>
                        <li class="sidebar-item"><a href="{{ url('admin/contactdetails') }}" class="sidebar-link"><i
                                    class="mdi mdi-note-plus"></i><span class="hide-menu"> Contact User List
                                </span></a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span
                            class="hide-menu">Images </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ route('image.index') }}" class="sidebar-link"><i
                                    class="mdi mdi-note-outline"></i><span class="hide-menu"> Front Page
                                    Image</span></a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
