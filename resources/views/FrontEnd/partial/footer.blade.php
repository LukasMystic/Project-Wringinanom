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

    .golden-text {
        color: #FCA311;
    }

    .normal-text {
        color: #000;
    }


    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    a,
    p {
        font-family: 'Montserrat', 'sans-serif';
    }


    :root {
        --colorOne: #19456b;
        --colorTwo: #16c79a;
    }

    /* footer */
    #displayMobile {
        display: none;
    }



    .footer-top {
        padding: 15px;
        background-color: #f4f2f2;
        text-align: center;
    }

    .footer-top .title {
        padding: 15px;
        display: inline-block;
        border-radius: 15px;
        margin: 0 auto;

    }

    .footer-top .title h1 {
        font-family: 'Montserrat';
        font-weight: bold;
        color: #14213D;
        margin: 0px;
    }



    .footer-top .logo-list {
        display: flex;
        align-items: center;
        justify-content: space-evenly;
    }

    .logo-list .logo {
        width: 8vw;
        height: 8vw;
        padding: 5px;
        align-self: center;
    }

    .logo-list .logo img {
        height: 100%;
        width: 100%;
        object-fit: contain;
    }


    .footer {
        background-color: #14213D;
        color: #e7e7e7;
        display: flex;
        justify-content: space-around;
        padding: 35px;
        font-weight: bold;
        box-shadow: 0px -4px 4px -2px rgba(0, 0, 0, 0.3);
    }

    .footer .head {
        align-self: center;
    }

    .footer .head h1 {
        font-size: 20px;
        font-family: 'Montserrat Alternates';
    }


    .footer .location {
        display: flex;
        flex-direction: column;
        align-self: center;

    }

    .footer .title h4 {
        font-size: 15px;
    }

    .footer .description h5 {
        font-size: 13px;
    }



    .footer .link h5 {
        font-size: 15px;
        text-decoration: underline;
    }

    .footer .link a {
        text-decoration: none;
        color: #e7e7e7;
    }

    .footer .sitemap {
        display: flex;
        flex-direction: column;
        align-self: center;

    }

    .footer .sitemap .wrap {
        display: flex;
    }


    .wrap .description-1 {
        margin-right: 25px;
    }

    .wrap .description-1 h5:nth-child(1):hover {
        font-weight: bold;
    }

    .wrap .description-1 h5:nth-child(2):hover {
        font-weight: bold;
    }

    .wrap .description-1 h5:nth-child(3):hover {
        font-weight: bold;
    }

    .wrap .description-2 h5:nth-child(1):hover {
        font-weight: bold;
    }

    .wrap .description-2 h5:nth-child(2):hover {
        font-weight: bold;
    }

    .wrap .description-2 h5:nth-child(3):hover {
        font-weight: bold;
    }

    .wrap .description-1 h5 {
        font-size: 13px;
    }

    .wrap .description-1 a {
        text-decoration: none;
        color: #e7e7e7;
    }

    .wrap .description-2 h5 {
        font-size: 13px;
    }

    .wrap .description-2 a {
        text-decoration: none;
        color: #e7e7e7;
    }

    .footer .contact {
        display: flex;
        flex-direction: column;
        align-self: center;
        margin-bottom: 5px;
    }

    .contact .description-contact h5 {
        font-size: 13px;
    }

    .contact .description-contact {
        padding-bottom: 5px;
    }


    .contact .follow .icon {
        display: flex;
        justify-content: space-between;
    }

    .contact .follow .icon i {
        background-color: #23396b;
        padding: 10px;
        border-radius: 50%;
        text-decoration: none;
    }

    .contact .follow .icon i:hover {
        opacity: 0.8;
    }

    /* divider */

    .divider2 {
        height: 50px;
        width: 100%;
        background-color: #14213D;
        text-align: center;
        border-top: 2px solid #1a2e58;
    }

    .divider2 .title {
        color: #e7e7e7;
        font-family: 'Montserrat Alternates';
        align-items: center;
        padding-top: 15px;
        font-size: 12px !important;
    }

    .divider2 i {
        padding-right: 10px;
        padding-left: 10px;
    }

    /* footer mobile */
    /* footer */

    .footer-mobile {
        display: flex;
        flex-direction: row;
        background-color: #14213D;
        align-items: center;
        margin: 0;
    }

    .footer-mobile .wrapper-mobile {
        display: flex;
        flex-direction: column;
        height: 100%;
        width: 100%;
    }

    .footer-mobile .main-title {
        padding: 50px;
        display: flex;
        flex-direction: row;
        align-items: center;
        font-size: 20px;
        color: #e7e7e7;
        font-family: 'Montserrat Alternates';
        border-bottom: 2px solid #1a2e58;
    }

    .footer-mobile .main-title .logo {
        border-radius: 50%;
        margin-right: 15px;
    }

    .footer-mobile .main-title img {
        width: 100px;
        height: 100px;
    }


    .footer-mobile .main-contact {
        padding: 50px;
        font-size: 15px;
        font-family: 'Montserrat Alternates';
        color: #e7e7e7;

    }

    .main-contact .title {
        font-size: 20px;
        font-family: 'Montserrat Alternates';
        text-align: left;
    }

    .main-contact .data {
        display: flex;
    }

    .data .logo {
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
    }

    .data .logo i {
        padding: 5px;
        margin-right: 10px;
    }

    .data .description {
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
    }

    .data .description h {
        padding-bottom: 5px;
    }

    .footer-mobile .main-content {
        display: flex;
        flex-direction: row;
        justify-content: center;
        font-family: 'Montserrat Alternates';
        padding: 50px;
        flex: 1;
        border-left: 1px solid #19456b;
    }

    .main-content .sitemap,
    .main-content .connect,
    .main-content .support {
        color: #e7e7e7;
        margin-right: 35px;
    }

    .sitemap .menu,
    .connect .menu,
    .support .menu {
        display: flex;
        align-items: center;
        font-family: 'Montserrat Alternates';
        font-weight: bold;
    }

    .sitemap .menu i,
    .connect .menu i,
    .support .menu i {
        margin-right: 15px;
    }

    .sitemap ul.submenu-sitemap,
    .connect ul.submenu-connect,
    .support ul.submenu-support {
        list-style-type: none;
        margin: 0;
        padding: 0;
        font-size: 18px;
    }

    .sitemap ul.submenu-sitemap a,
    .connect ul.submenu-connect a,
    .support ul.submenu-support a {
        color: #e7e7e7;
    }

    .sitemap ul.submenu-sitemap li,
    .connect ul.submenu-connect li,
    .support ul.submenu-support li {
        margin-bottom: 15px;
    }

    @media screen and (max-width:760px) {

        #showPC {
            display: none;
        }

        #displayMobile {
            display: flex;
        }

        /* footer */
        .footer-mobile {
            align-items: center;
            display: flex;
            flex-direction: column;

        }

        .footer-mobile .main-title {
            padding: 15px;

        }

        .footer-mobile .main-title h2 {
            font-size: 13px !important;
        }

        .footer .wrapper-mobile {
            align-items: center;
        }

        .footer-mobile .main-contact {
            font-size: 10px;
            border-bottom: 2px solid #1a2e58;
            padding: 25px;
        }

        .footer-mobile .main-content {
            padding: 20px;
            border: none;
        }

        .main-contact .title {
            text-align: center;
            padding-bottom: 15px;
            font-size: 10px;
        }


        .sitemap .menu,
        .connect .menu,
        .support .menu {
            font-size: 10px;
        }

        .sitemap ul.submenu-sitemap,
        .connect ul.submenu-connect,
        .support ul.submenu-support {
            display: flex;
            flex-direction: column;
            font-size: 10px;
        }

        .divider2 .title {
            font-size: 10px;
        }
    }

    @media screen and (min-width: 761px) and (max-width:1000px) {

        #showPC {
            display: none;
        }

        #displayMobile {
            display: flex;
        }

        .footer-mobile {
            align-items: center;
            display: flex;
            flex-direction: row;

        }



        .footer-mobile .main-title {
            padding: 20px;
        }

        .footer-mobile .main-title h2 {
            font-size: 15px;
        }

        .footer-mobile .main-contact {
            padding: 20px;

        }

        .main-contact .title {
            font-size: 15px;
            text-align: center;
            padding: 15px;
        }

        .footer-mobile .main-content {
            padding: 25px;
        }

        .sitemap .menu,
        .partner .menu,
        .support .menu {
            font-size: 15px;

        }

        .sitemap ul.submenu-sitemap,
        .connect ul.submenu-connect,
        .support ul.submenu-support {
            font-size: 15px;
        }


        .divider2 .title {
            font-size: 12px;
        }
    }

    @media screen and (min-width:1000px) and (max-width:1440px) {

        #displayMobile {
            display: none;
        }

        .footer .head,
        .footer .location,
        .footer .sitemap {
            margin-right: 35px;
        }

        .footer .head h1 {
            font-size: 15px;
        }

        .footer .location {
            margin: 0px;
            margin-right: 15px;
        }

        .footer .location .description h5 {
            font-size: 12px;
        }

        .footer .location .link h5 {
            font-size: 12px;
        }

        .footer .contact .call h5 {
            font-size: 15px;
        }

        .footer .contact .description-contact h5 {
            font-size: 12px;
        }

        .contact .follow .icon i {
            padding: 5px;
        }

        .wrap .description-1 h5 {
            font-size: 12px;
        }

        .wrap .description-2 h5 {
            font-size: 12px;
        }
    }


    @media screen and (min-width:500px) and (max-width:760px) {

        .footer-mobile {
            display: flex;
            flex-direction: row;
        }

        .footer-mobile .wrapper-mobile {
            flex-direction: column;
        }

        .footer-mobile .main-content {
            border-left: 1px solid #23396b
        }
    }

    /* go up btn */
    .go-up-btn {
        display: none;
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 999;
        border-radius: 15px;
        background-color: #FCA311;
        padding: 15px;
        border-radius: 50%;
        border: none;
        cursor: pointer;
    }

    .go-up-btn:hover {
        opacity: 0.8;
    }

    .go-up-btn i {
        color: #D9D9D9;
    }

    @media screen and (max-width:425px) {
        .go-up-btn {
            padding: 10px;
        }
    }
</style>

<body>

    <div class="footer-top" id="showPC">
        <div class="title">
            <h1>Our Partner</h1>
        </div>
        <div class="logo-list">
            <div class="logo">
                <img src="{{ asset('assets/img/Binus full.png') }}" style="margin-top: -20px">
            </div>
            <div class="logo">
                <img src="{{ asset('assets/img/bncc-logo 1.png') }}">
            </div>
            <div class="logo">
                <img src="{{ asset('assets/img/Himpre.png') }}" style="height: 150%; width: 150%; margin-top:-35px;">
            </div>
            <div class="logo">
                <img src="{{ asset('assets/img/TFI logo dark.png') }}">
            </div>
            <div class="logo">
                <img src="{{ asset('assets/img/3. TFISC.png') }}">
            </div>
        </div>
    </div>

    <div class="footer" id="showPC">
        <div class="head">
            <h1>Dewi Anom </h1>
            <h1>Harmoni Alam</h1>
            <h1>dan Budaya</h1>
            <h1>Yang Memukau</h1>
        </div>
        <div class="location">
            <div class="title">
                <h4>MALANG</h4>
            </div>
            <div class="description">
                <h5>desawisatawringinanom@gmail.com</h5>
                <h5>+62 0812-3509-0613</h5>
            </div>
            <div class="link">
                <h5><a
                        href="https://www.google.com/maps/place/Desa+Wisata+Wringinanom/@-8.032075,112.7928904,17z/data=!3m1!4b1!4m6!3m5!1s0x2dd625c9cb6a871f:0xd00f2aee0c52cd22!8m2!3d-8.032075!4d112.797756!16s%2Fg%2F11sc26qxxn?entry=ttu">DI
                        PETA</a></h5>
            </div>
        </div>
        <div class="sitemap">
            <div class="title">
                <h4>SITEMAP</h4>
            </div>
            <div class="wrap">
                <div class="description-1">
                    <h5><a href="{{ route('home.main') }}">Homepage</a></h5>
                    <h5><a href="{{ route('package_river.main') }}">Package</a></h5>
                    <h5><a href="{{ route('ecommerce.main') }}">E-commerce</a></h5>
                </div>
                <div class="description-2">
                    <h5><a href="{{ route('archive.main') }}">Archive</a></h5>
                    <h5><a href="{{ route('contact.main') }}">Contact</a></h5>
                    <h5><a href="{{ route('news.main') }}">News</a></h5>
                </div>
            </div>
        </div>
        <div class="contact">
            <div class="call">
                <h5 style="font-weight: bold; padding-top:10px">INGIN TAHU LEBIH BANYAK?</h5>
            </div>
            <div class="description-contact">
                <h5>Silahkan hubungi kami untuk</h5>
                <h5>pertanyaan, saran, atau informasi lebih lanjut.</h5>
            </div>
            <div class="follow">
                <div class="icon">
                    {{-- <a href="{{ $contacts->tiktok }}" style="color: inherit; text-decoration:none;" target="_blank"><i
                            class="fab fa-tiktok"></i></a>
                    <a href="{{ $contacts->facebook }}" style="color: inherit; text-decoration:none;"
                        target="_blank"><i class="fab fa-facebook"></i></a>
                    <a href="{{ $contacts->instagram }}" style="color: inherit; text-decoration:none;"
                        target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.youtube.com/channel/UCnxycu0-RGp_hGIcx_rKTRw"
                        style="color: inherit; text-decoration:none;" target="_blank"><i class="fab fa-youtube"></i></a> --}}
                </div>
            </div>
        </div>
    </div>


    <div class="footer-mobile" id="displayMobile">

        <div class="wrapper-mobile">

            <div class="main-title">
                <div class="logo">
                    <img src="{{ asset('assets/img/Dewi Anom Logo.png') }}">
                </div>

                <h2>Desa Wisata Wringianom</h2>
            </div>

            <div class="main-contact">

                <div class="title">
                    <h2>Hubungi Kami</h2>
                </div>

                <div class="data">
                    <div class="logo">
                        <i class="fa-solid fa-phone"></i>
                        <i class="fa-solid fa-envelope"></i>
                        <i class="fa-brands fa-whatsapp"></i>

                    </div>

                    <div class="description">
                        <h>+62 0812-3509-0613</h>
                        <h>desawisatawringinanom@gmail.com</h>
                        <h>081235090613</h>
                    </div>
                </div>


            </div>
        </div>


        <div class="main-content">

            <div class="sitemap">

                <div class="menu">
                    <p> Sitemap </p>
                </div>

                <ul class="submenu-sitemap">
                    <li><a href="{{ route('home.main') }}">Homepage</a></li>
                    <li><a href="{{ route('package_river.main') }}">Package</a></li>
                    <li><a href="{{ route('ecommerce.main') }}">E-commerce</a></li>
                    <li><a href="{{ route('news.main') }}">News</a></li>
                    <li><a href="{{ route('contact.main') }}">Contact</a></li>
                    <li><a href="{{ route('archive.main') }}">Archive</a></li>
                </ul>
            </div>


            <div class="connect">

                <div class="menu">
                    <p>Partner</p>
                </div>

                <ul class="submenu-connect">
                    <li><a href="https://bncc.net/">BNCC</a></li>
                    <li><a href="https://www.teachforindonesia.org/">TFI</a></li>
                    <li><a href="https://student-activity.binus.ac.id/himpreneur/">HIMPRE</a></li>
                    <li><a href="https://student-activity.binus.ac.id/tfi/">TFISC</a></li>
                </ul>

            </div>
        </div>
    </div>

    <div class="divider2">
        <div class="title" style="text-align: center">
            <h>Desa Wisata Wringinanom<h><i class="fa-regular fa-copyright"></i>
                    <h>2024, All Right Reserved.</h>
        </div>
    </div>




    <button id="goUpBtn" class="go-up-btn" style="aspect-ratio:1/1;"><i
            class="fa-solid fa-chevron-up fa-2xl"></i></button>
</body>

</html>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const goUpBtn = document.getElementById('goUpBtn');

        // Function to toggle the visibility of the "go up" button
        function toggleGoUpButton() {
            if (window.scrollY > window.innerHeight / 2) {
                goUpBtn.style.display = 'block';
            } else {
                goUpBtn.style.display = 'none';
            }
        }

        // Listen for scroll events and toggle the button visibility
        window.addEventListener('scroll', toggleGoUpButton);

        // Smooth scroll to the top when the button is clicked
        goUpBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    });
</script>
