<div class="sidebar-wrapper" sidebar-layout="stroke-svg">
    <div>
        <div class="logo-wrapper"><a href="{{ url('cfd/DashCFD') }}"><img class="img-fluid for-light"
                                                                          src="{{ asset('assets/images/logo/logo.png') }}"
                                                                          alt=""><img class="img-fluid for-dark"
                                                                                      src="{{ asset('assets/images/logo/logo_dark.png') }}"
                                                                                      alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
        </div>

        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <ul class="sidebar-links" id="simple-bar">
                <li class="back-btn"><a href="{{  url('cfd/DashCFD')}}"><img class="img-fluid"
                                                                             src="{{ asset('assets/images/logo/logo-icon.png') }}"
                                                                             alt=""></a>
                    <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                                                          aria-hidden="true"></i></div>
                </li>
                <li class="sidebar-list" style="margin-top:100px "><a class="sidebar-link sidebar-title link-nav"
                                                                      href="{{  url('cfd/home')}}">
                        <span><i class="fa fa-home" style="margin-right: 10px"></i></span>
                        <span>Dashboard</span></a></li>
                <li class="sidebar-list" style="margin-top:50px "><a class="sidebar-link sidebar-title link-nav"
                                                                     href="{{  url('cfd/grades')}}">
                        <span><i class="fa fa-graduation-cap" style="margin-right: 10px"></i></span>
                        <span>Share Grades</span></a></li>
                <li class="sidebar-list" style="margin-top:50px "><a class="sidebar-link sidebar-title link-nav"
                                                                     href="{{  url('cfd/assignTeachers')}}">
                        <span><i class="icofont icofont-teacher" style="margin-right: 10px"></i></span>
                        <span>Assign Teacher</span></a></li>
                <li class="sidebar-list" style="margin-top:50px "><a class="sidebar-link sidebar-title link-nav"
                                                                     href="{{  url('users/announcements')}}">
                        <span><i data-feather="globe" style="margin-right: 10px"></i></span>
                        <span>Announcements</span></a></li>
            </ul>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
