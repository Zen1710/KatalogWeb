<nav class="site-nav">
        <div class="container">
            <div class="menu-bg-wrap">
                <div class="site-navigation">
                    <a href="" class="logo m-0 float-start">E-KATALOG</a>

                    <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end">
                        <li class="{{request()->is('/') ? 'active' : '' }}"><a href="{{url('/')}}">Home</a></li>
                        <li class="{{request()->is('property') ? 'active' : '' }}"><a href="{{url('property')}}">Property</a></li>
                        <li class="{{request()->is('about') ? 'active' : '' }}" ><a href="{{url('about')}}">About</a></li>
                        <li class="{{request()->is('contact_us') ? 'active' : '' }}" ><a href="{{url('contact_us')}}">Contact Us</a></li>
                        <li><a class="btn btn-sm btn-light text-dark px-3" href="{{url('login')}}">Login</a></li>
                    </ul>

                    <a href="#"
                        class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none"
                        data-toggle="collapse" data-target="#main-navbar">
                        <span></span>
                    </a>
                </div>
            </div>
        </div>
    </nav>