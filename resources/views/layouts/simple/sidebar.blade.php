<div class="sidebar-wrapper" sidebar-layout="stroke-svg">
    <div>
        <div class="logo-wrapper"><a href="{{ url('admin/adminDash') }}"><img class="img-fluid for-light"
                                                                              src="{{ asset('assets/images/logo/logo.png') }}"
                                                                              alt=""><img class="img-fluid for-dark"
                                                                                          src="{{ asset('assets/images/logo/logo_dark.png') }}"
                                                                                          alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="{{  url('admin/adminDash') }}"><img class="img-fluid"
                                                                                    src="{{ asset('assets/images/logo/logo-icon.png') }}"
                                                                                    alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <ul class="sidebar-links" id="simple-bar">
                <li class="back-btn"><a href="{{  url('admin/home')}}"><img class="img-fluid"
                                                                                 src="{{ asset('assets/images/logo/logo-icon.png') }}"
                                                                                 alt=""></a>
                    <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                                                          aria-hidden="true"></i></div>
                </li>
                <li class="sidebar-list" style="margin-top:100px "><a class="sidebar-link sidebar-title link-nav"
                                                                      href="{{  url('admin/adminDash')}}">
                        <span><i class="fa fa-home" style="margin-right: 10px"></i></span>
                        <span>Dashboard</span></a></li>
                <li class="sidebar-list" style="margin-top:50px "><a class="sidebar-link sidebar-title link-nav"
                                                                     href="{{  url('admin/users')}}">
                        <span><i class="fa fa-users" style="margin-right: 10px"></i></span>
                        <span>Users List</span></a></li>
                <li class="sidebar-list" style="margin-top:50px "><a class="sidebar-link sidebar-title link-nav"
                                                                     href="{{  url('admin/announcements')}}">
                        <span><i data-feather="globe" style="margin-right: 10px"></i></span>
                        <span>Announcements</span></a></li>
                <li class="sidebar-list" style="margin-top:50px "><a class="sidebar-link sidebar-title link-nav"
                                                                     href="">
                        <span><i class="fa fa-arrow-circle-right" style="margin-right: 10px"></i></span>
                        <span>Logout</span></a></li>

            </ul>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
