{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script> --}}

<style>

@import url('https://fonts.googleapis.com/css2?family=Tangerine:wght@400;700&family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
/* remove inconsistent outer edge page white space ;v */

body {
   margin: 0px;
   padding: 0px;
   border: 0px;
   overflow-x: hidden;
}

/*font color text */

.golden-text{
    color:#FCA311;
}

.normal-text{
    color: #000;
}


h1,h2,h3,h4,h5,h6,a,p{
    font-family: 'Montserrat','sans-serif';
}

h1,h2,h3,h4{
    font-weight: 900;
}

h5,h6,a,p{
    font-weight: 300;
}

:root{
--colorOne: #19456b;
--colorTwo: #16c79a;
}

#navBar{
    background-color:#14213D;
    font-family: 'Montserrat Alternates';
    position: fixed;
    top: 0;
    left: 0%;
    width: 100%;
    z-index: 100;

}

#navBar.navbar.navbar-expand-lg.fixed{
    position: fixed;
    width: 100%;
    z-index: 100;
}

.custom-toggler.navbar-toggler {
    border-color: #FCA311;
}

.custom-toggler .navbar-toggler-icon{
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(252, 163, 17, 0.8)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E");
}

#navbarNav{
    justify-content: center;
}

#brand{
    color: #FCA311;
    margin-left: 25px;
    margin-right: none;
    font-family:'Tangerine';
    font-size: 50px;
}

#main-navbar a{
    color: #e7e7e7;

}

#bambang{
    background-color: #14213D;
    border: none;
    border-radius: 15px;
    border: solid 1px #00000000;
    margin: 5px;
    padding: 8px;
    display: flex;
    align-items: center;
    color: #e7e7e7;
}

#bambang i{
    padding: 5px;
}

#bambang:hover{
    border-radius: 15px;
    border: solid 1px #e7e7e7;
}

#bambang.toggle.active{
    border-radius: 15px;
    color: #FCA311;
    border: solid 1px #FCA311;
}

#bambang.toggle.active:hover{
    border: solid 1px #FCA311;
}

#bambang.toggle.active a{
    color: #FCA311;
}

#icon{
    margin-right: 5px;
}

.collapse.navbar-collapse.show{
   justify-content: center;
   font-size: 12px;

}

.collapse.navbar-collapse.show li.nav-item{
    padding-left: 25px;
    transition:padding 0.3s ease-out;
}

@media screen and (min-width:1000px) and (max-width:1350px){
    #bambang.toggle.active a{
        font-size: 12px;
    }

    #bambang.toggle  a{
        font-size: 12px;
    }

    #brand{
        font-size: 35px;
    }
}

</style>
<body>
    <nav class="navbar navbar-expand-lg" id="navBar">
        <div class="container-fluid p-2">
            <a class="navbar-brand px-2" href="{{route('home.main')}}" id="brand" >Dewi Anom</a>
            <button class="navbar-toggler ml-auto custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" id="icon">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav " id="main-navbar">
                    <li class="nav-item">
                        <button class="toggle" id="bambang">
                            <i class="fa-solid fa-house"></i>
                            <a class="nav-link active" aria-current="page" href="{{route('home.main')}}" >Homepage</a>
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="toggle" id="bambang">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <a class="nav-link" href="{{route('ecommerce.main')}}" >E-Commerce</a>
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="toggle" id="bambang">
                            <i class="fa-solid fa-boxes-packing"></i>
                            <a class="nav-link" href="{{route('package_river.main')}}">Package</a></button>
                    </li>
                    <li class="nav-item">
                        <button class="toggle" id="bambang">
                            <i class="fa-solid fa-address-card"></i>
                            <a class="nav-link" href="{{route('contact.main')}}">About Us</a>
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="toggle" id="bambang">
                            <i class="fa-solid fa-newspaper"></i>
                            <a class="nav-link" href="{{route('news.main')}}">News</a>
                        </button>
                    </li>

                    <li class="nav-item">
                        <button class="toggle" id="bambang">
                            <i class="fa-solid fa-folder-open"></i>
                            <a class="nav-link" href="{{route('archive.main')}}">Archive</a>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>
