<header class="header_area">
    <div class="sub_header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4 col-lg-6">
                    <div id="logo">
                        <a href="{{url('/')}}"><img src="{{ asset('img/logo-new.jpg')}}" alt="logo" title=""></a>
                    </div>
                </div>
                <div class="col-md-8 col-lg-6 d-none d-lg-block">
                    <div class="sub_header_social_icon float-right">
                        @if(!auth()->user())
                            <a href="{{url('/login')}}" class="register_icon"><i class="fas fa-sign-in-alt"></i>Sign-In</a>

                            @if($title != 'register')
                                <a href="{{url('/register')}}" class="register_icon ml-3"><i
                                        class="fas fa-user-plus"></i>Register</a>
                            @endif

                        @else
                            <a href="{{url('/home')}}" class="register_icon"><i class="fas fa-user"></i>Dashboard</a>
                            <a href="{{url('/logout')}}" class="register_icon ml-2"><i class="fas  fa-sign-in-alt"></i>Logout</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(!isset($title))
        $title = '';
    @endif
    <div class="main_menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="navbar-collapse collapse" id="navbarSupportedContent" style="">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a class="nav-link <?php if ($title == 'home') {
                                        echo 'active';
                                    } ?>" href="{{url('/')}}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/about-us')}}" class="nav-link <?php if ($title == 'about-us') {
                                        echo 'active';
                                    } ?>">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/offering')}}" class="nav-link <?php if ($title == 'offering') {
                                        echo 'active';
                                    } ?>">Your Offerings</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/marketplace')}}"
                                       class="nav-link <?php if ($title == 'marketplace') {
                                           echo 'active';
                                       } ?>">Your Marketplace</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/faq')}}" class="nav-link <?php if ($title == 'faq') {
                                        echo 'active';
                                    } ?>">FAQs</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/career')}}" class="nav-link <?php if ($title == 'career') {
                                        echo 'active';
                                    } ?>">Careers</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/contact')}}" class="nav-link <?php if ($title == 'contact') {
                                        echo 'active';
                                    } ?>">Contact Us</a>
                                </li>
                                <li class="nav-item d-lg-none">
                                    <a href="{{url('/login')}}" class="nav-link">Sign-In</a>
                                </li>
                                <li class="nav-item d-lg-none">
                                    <a href="{{url('/register')}}" class="nav-link">Register</a>
                                </li>
                            </ul>
                            <div class="header_social_icon d-none d-lg-block">
                                <ul>
                                    <li><a href="https://www.facebook.com/HostGator/"><i
                                                class="fab fa-facebook-f"></i></a></li>
                                    <li>
                                        <a href="https://twitter.com/hostgator"> <i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li><a href="https://www.linkedin.com/groups/13575065/"><i
                                                class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <div class="header_social_icon d-block d-lg-none">
                        <ul>
                            <li><a href="https://www.facebook.com/HostGator/"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="https://twitter.com/hostgator"> <i class="fab fa-twitter"></i></a>
                            </li>
                            <li><a href="https://www.linkedin.com/groups/13575065/"><i
                                        class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
