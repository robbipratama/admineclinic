<header class="header-desktop4">
    <div class="container">
        <div class="header4-wrap">
            <div class="header__logo">
                <a href="{{ url('/home')}}">
                    <img src="{{ url('assets/template/images/header.png')}}" style="width: 200px; height: auto" alt="CoolAdmin" />
                </a>
            </div>
            <div class="header__tool">
                <div class="account-wrap">
                    <div class="account-item account-item--style2 clearfix js-item-menu">
                        <div class="image">
                            <img src="{{ url('assets/template/images/user.png')}}" alt="John Doe" />
                        </div>
                        <div class="content">
                            <a class="js-acc-btn" href="#">{{ Session::get('display_name') }}</a>
                        </div>
                        <div class="account-dropdown js-dropdown">
                            <div class="info clearfix">
                                <div class="image">
                                    <a href="#">
                                        <img src="{{ url('assets/template/images/user.png')}}" alt="John Doe" />
                                    </a>
                                </div>
                                <div class="content">
                                    <h5 class="name">
                                        <a href="#">{{Session::get('display_name')}}</a>
                                    </h5>
                                    <span class="email">{{Session::get('username')}}</span>
                                </div>
                            </div>
                            <div class="account-dropdown__body">
                                <div class="account-dropdown__item">
                                    <a href="{{ url('/profil/' .Session::get('id')) }}">
                                        <i class="zmdi zmdi-account"></i>Profil
                                    </a>
                                </div>
                            </div>
                            <div class="account-dropdown__footer">
                                <a href="{{ url('/logout') }}">
                                    <i class="zmdi zmdi-power"></i>Logout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
