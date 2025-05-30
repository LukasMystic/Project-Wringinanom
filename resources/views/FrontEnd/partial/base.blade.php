<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> @yield('title') </title>

   <meta name="description" content="{{ 'Desa Wisata Wringinanom atau Dewi Anom merupakan permata tersembunyi di Jawa Timur. Nikmati keindahan alam, warisan budaya, dan keramahan lokal yang tak tertandingi. Ideal untuk liburan keluarga atau petualangan solo.' }}">
<meta name="keywords" content="{{ 'desa wisata, desa, wringinanom, desa wisata wringinanom, dewi, dewi anom, anom, keindahan alam, alam, river tubing, tubing, liburan, petualangan, wisata bromo, tracking, offroad tracking, wisata jawa timur, wisata alam, wisata keluarga, wisata petualangan, wisata budaya, budaya lokal, warisan budaya, wisata edukasi, wisata kuliner, penginapan, homestay, hotel desa, paket wisata, paket liburan, ekowisata, desa tradisional, agro wisata, wisata sejarah, cinderamata lokal, kuliner tradisional, kearifan lokal, konservasi alam, adventure tourism, wisata kesehatan, eco-tourism, desa hijau, desa lestari' }}">


 <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/apple-touch-icon.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon-16x16.png') }}">
<link rel="manifest" href="{{ asset('assets/img/site.webmanifest') }}">
<link rel="mask-icon" href="{{ asset('assets/img/safari-pinned-tab.svg') }}" color="#5bbad5">
<link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}">

<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-config" content="{{ asset('assets/img/browserconfig.xml') }}">
<meta name="theme-color" content="#ffffff">


    <!-- font -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">



    <script src="https://kit.fontawesome.com/43c9ab6ad0.js" crossorigin="anonymous"></script>

    <style>
        /* News & Artikel */
        @import url('https://fonts.googleapis.com/css2?family=Italianno&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@400;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Tangerine:wght@400;700&family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
    </style>

    <!-- bootsrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <!-- Eksternal CSS -->
    @yield('css')

    <!-- link css untuk seacrhbox | NEWS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        #google_translate_element {
          position: fixed;
          bottom: 20px;
          left: 20px;
          z-index: 99;
        }

        .translate-button {
          background-color: #007bff;
          color: white;
          padding: 10px 20px;
          border: none;
          border-radius: 5px;
          cursor: pointer;
          font-size: 16px;
        }

        .translate-button:hover {
          background-color: #0056b3;
        }

      </style>
</head>

<body>
    <nav>
        @include('FrontEnd.partial.navbar')
    </nav>
    @yield('content')
    @include('FrontEnd.partial.footer')
    @yield('script')

    <div id="google_translate_element">
        <button class="translate-button" onclick="translateToEnglish()">
        <i class="fas fa-language"></i>
        </button>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var pageTitle = document.title; // Get the title of the webpage

            var buttons = document.querySelectorAll('#bambang');

            buttons.forEach(function(button) {
                // Extract button text content and remove leading/trailing whitespace
                var buttonText = button.textContent.trim();

                // Compare page title with button text content
                if (buttonText === pageTitle) {
                    button.classList.add('active'); // Add active class to button whose text matches page title
                }

            });
        });
    </script>
</body>



<script type="text/javascript">
    function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'in'}, 'google_translate_element');
    }

    function translateToEnglish() {
    var dropdown = document.querySelector(".goog-te-combo");
    dropdown.value = "en";
    dropdown.dispatchEvent(new Event("change"));
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const translate = document.getElementById('google_translate_element');

    // Function to toggle the visibility of the "go up" button
    function translate2() {
        if (window.scrollY > window.innerHeight / 2) {
            translate.style.display = 'block';
        } else {
            translate.style.display = 'none';
        }
    }

    // Listen for scroll events and toggle the button visibility
    window.addEventListener('scroll', translate2);

    });
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
