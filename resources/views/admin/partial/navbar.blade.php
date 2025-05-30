
<nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color: #14213D;">
    <a class="navbar-brand ps-3 text-align-center" href="{{route('homepage.home')}}" style="font-size:18px;">Desa Wisata Wringinanom</a>

    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

    <!-- Navbar-->
    <ul class="navbar-nav ms-auto me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li>

                    <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>

                </li>
            </ul>
        </li>
    </ul>
</nav>

<div id="layoutSidenav" >
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion" style="background-color: #1f2634">
            <div class="sb-sidenav-menu">
                <div class="nav">

                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-bag-shopping"></i></i></div>
                        Homepage
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                        <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href=" {{ route('homepage.home') }}">News</a>
                                <a class="nav-link" href=" {{ route('homepage.home.product')}}"> Produk</a>
                            </nav>
                        </div>

                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-bag-shopping"></i></i></div>
                        E-Commerce
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                        <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href=" {{ route('product.home') }}">Produk</a>
                                <a class="nav-link" href=" {{ route('category.home')}}"> Category</a>
                            </nav>
                        </div>

                    <a class="nav-link" href="{{ route('news.home') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-newspaper"></i></div>
                        News
                    </a>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-book-open"></i></div>
                        Package
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ url('adminPage/river') }}">River Tubing</a>
                                <a class="nav-link" href="{{ url('adminPage/adventure') }}">Adventure</a>
                                <a class="nav-link" href="{{ url('adminPage/edukasi') }}">Edukasi</a>
                            </nav>
                        </div>
                     <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts">
                         <div class="sb-nav-link-icon"><i class="fa-solid fa-box-archive"></i></i></div>
                         Archive
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                         <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                 <a class="nav-link" href=" {{ route('archive.home') }}">Photo</a>
                                <a class="nav-link" href=" {{ route('archive.home.video')}}">Video</a>
                             </nav>
                        </div>

                    <a class="nav-link" href="{{ url('adminPage/contact/edit/1') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-address-book"></i></div>
                        Contact
                    </a>
                    <a class="nav-link" href="{{ route('testimony.home') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                        Testimoni
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                {{ Auth::user()->name }}
            </div>
        </nav>
    </div>
