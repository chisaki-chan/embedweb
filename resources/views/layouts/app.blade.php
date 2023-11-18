<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TBine') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-database.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- MDB -->
    <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="module">
        // Import the functions you need from the SDKs you need
        import {
            initializeApp
        } from "https://www.gstatic.com/firebasejs/10.4.0/firebase-app.js";
        import {
            getAnalytics
        } from "https://www.gstatic.com/firebasejs/10.4.0/firebase-analytics.js";
        // TODO: Add SDKs for Firebase products that you want to use
        // https://firebase.google.com/docs/web/setup#available-libraries

        // Your web app's Firebase configuration
        // For Firebase JS SDK v7.20.0 and later, measurementId is optional
        const firebaseConfig = {
            apiKey: "AIzaSyB6ytQJBxPrTxOfRFkuQHQnPr5vaJHUhVg",
            authDomain: "trashbin-1832d.firebaseapp.com",
            databaseURL: "https://trashbin-1832d-default-rtdb.asia-southeast1.firebasedatabase.app",
            projectId: "trashbin-1832d",
            storageBucket: "trashbin-1832d.appspot.com",
            messagingSenderId: "106536071405",
            appId: "1:106536071405:web:8864fa11e98a6d14aedce4",
            measurementId: "G-PNLYFSFSRR"
        };

        // Initialize Firebase
        const app = initializeApp(firebaseConfig);
        const analytics = getAnalytics(app);
        firebase.initializeApp(firebaseConfig);

        var database = firebase.database();

        var dataRef1 = database.ref('Sensor/Organik');
        var dataRef2 = database.ref('Sensor/Anorganik');

        dataRef1.on('value', function(getdata1) {
            var organik = getdata1.val();
            myChart.data.datasets[0].data[0] = organik;
            myChart.update();
        })

        dataRef2.on('value', function(getdata2) {
            var anorganik = getdata2.val();
            myChart.data.datasets[0].data[1] = anorganik;
            myChart.update();
        })

        // Create an empty dataset for Chart.js
        const initialChartData = {
            labels: ['Organik', 'Anorganik'],
            datasets: [{
                label: 'Value',
                data: [],
                backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(255, 205, 86, 0.2)'],
                borderColor: ['rgb(75, 192, 192)', 'rgb(255, 205, 86)'],
                borderWidth: 1
            }]
        };

        // Create a Chart.js instance
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: initialChartData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: burlywood;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/fotopegawai/Logo%20Embed.png" width="50" height="50" class="d-inline-block align-text-top">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                           <!-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif -->
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">{{ __('home') }}</a>
                        </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
        <footer class="bg-dark text-center text-white fixed-bottom">
            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                <img src="/fotopegawai/Logo%20Embed.png" width="50" height="50">
                © 2023 Copyright:
                <a class="text-white" href="#">TBine(Kelompok 8)</a>
            </div>
            <!-- Copyright -->
        </footer>
    </div>
</body>
<style>
    /*
*
* ==========================================
* FOR DEMO PURPOSE
* ==========================================
*
*/

.social-link {
    width: 30px;
    height: 30px;
    border: 1px solid #ddd;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #666;
    border-radius: 50%;
    transition: all 0.3s;
    font-size: 0.9rem;
}

.social-link:hover, .social-link:focus {
    background: #ddd;
    text-decoration: none;
    color: #555;
}
@import url("https://fonts.googleapis.com/css2?family=Baloo+2&display=swap");
    /* This pen */
     body {
         font-family: "Baloo 2", cursive;
         font-size: 16px;
         color: #fff;
         text-rendering: optimizeLegibility;
         font-weight: initial;
    }
     .dark {
         background: #110f16;
    }
     .light {
         background: #f3f5f7;
    }
     a, a:hover {
         text-decoration: none;
         transition: color 0.3s ease-in-out;
    }
     #pageHeaderTitle {
         margin: 2rem 0;
         text-transform: uppercase;
         text-align: center;
         font-size: 2.5rem;
    }
    /* Cards */
     .postcard {
         flex-wrap: wrap;
         display: flex;
         box-shadow: 0 4px 21px -12px rgba(0, 0, 0, 0.66);
         border-radius: 10px;
         margin: 0 0 2rem 0;
         overflow: hidden;
         position: relative;
         color: #fff;
    }
     .postcard.dark {
         background-color: #18151f;
    }
     .postcard.light {
         background-color: #e1e5ea;
    }
     .postcard .t-dark {
         color: #18151f;
    }
     .postcard a {
         color: inherit;
    }
     .postcard h1, .postcard .h1 {
         margin-bottom: 0.5rem;
         font-weight: 500;
         line-height: 1.2;
    }
     .postcard .small {
         font-size: 80%;
    }
     .postcard .postcard__title {
         font-size: 1.75rem;
    }
     .postcard .postcard__img {
         max-height: 180px;
         width: 100%;
         object-fit: cover;
         position: relative;
    }
     .postcard .postcard__img_link {
         display: contents;
    }
     .postcard .postcard__bar {
         width: 50px;
         height: 10px;
         margin: 10px 0;
         border-radius: 5px;
         background-color: #424242;
         transition: width 0.2s ease;
    }
     .postcard .postcard__text {
         padding: 1.5rem;
         position: relative;
         display: flex;
         flex-direction: column;
    }
     .postcard .postcard__preview-txt {
         overflow: hidden;
         text-overflow: ellipsis;
         text-align: justify;
         height: 100%;
    }
     .postcard .postcard__tagbox {
         display: flex;
         flex-flow: row wrap;
         font-size: 14px;
         margin: 20px 0 0 0;
         padding: 0;
         justify-content: center;
    }
     .postcard .postcard__tagbox .tag__item {
         display: inline-block;
         background: rgba(83, 83, 83, 0.4);
         border-radius: 3px;
         padding: 2.5px 10px;
         margin: 0 5px 5px 0;
         cursor: default;
         user-select: none;
         transition: background-color 0.3s;
    }
     .postcard .postcard__tagbox .tag__item:hover {
         background: rgba(83, 83, 83, 0.8);
    }
     .postcard:before {
         content: "";
         position: absolute;
         top: 0;
         right: 0;
         bottom: 0;
         left: 0;
         background-image: linear-gradient(-70deg, #424242, transparent 50%);
         opacity: 1;
         border-radius: 10px;
    }
     .postcard:hover .postcard__bar {
         width: 100px;
    }
     @media screen and (min-width: 769px) {
         .postcard {
             flex-wrap: inherit;
        }
         .postcard .postcard__title {
             font-size: 2rem;
        }
         .postcard .postcard__tagbox {
             justify-content: start;
        }
         .postcard .postcard__img {
             max-width: 300px;
             max-height: 100%;
             transition: transform 0.3s ease;
        }
         .postcard .postcard__text {
             padding: 3rem;
             width: 100%;
        }
         .postcard .media.postcard__text:before {
             content: "";
             position: absolute;
             display: block;
             background: #18151f;
             top: -20%;
             height: 130%;
             width: 55px;
        }
         .postcard:hover .postcard__img {
             transform: scale(1.1);
        }
         .postcard:nth-child(2n+1) {
             flex-direction: row;
        }
         .postcard:nth-child(2n+0) {
             flex-direction: row-reverse;
        }
         .postcard:nth-child(2n+1) .postcard__text::before {
             left: -12px !important;
             transform: rotate(4deg);
        }
         .postcard:nth-child(2n+0) .postcard__text::before {
             right: -12px !important;
             transform: rotate(-4deg);
        }
    }
     @media screen and (min-width: 1024px) {
         .postcard__text {
             padding: 2rem 3.5rem;
        }
         .postcard__text:before {
             content: "";
             position: absolute;
             display: block;
             top: -20%;
             height: 130%;
             width: 55px;
        }
         .postcard.dark .postcard__text:before {
             background: #18151f;
        }
         .postcard.light .postcard__text:before {
             background: #e1e5ea;
        }
    }
    /* COLORS */
     .postcard .postcard__tagbox .green.play:hover {
         background: #79dd09;
         color: black;
    }
     .green .postcard__title:hover {
         color: #79dd09;
    }
     .green .postcard__bar {
         background-color: #79dd09;
    }
     .green::before {
         background-image: linear-gradient(-30deg, rgba(121, 221, 9, 0.1), transparent 50%);
    }
     .green:nth-child(2n)::before {
         background-image: linear-gradient(30deg, rgba(121, 221, 9, 0.1), transparent 50%);
    }
     .postcard .postcard__tagbox .blue.play:hover {
         background: #0076bd;
    }
     .blue .postcard__title:hover {
         color: #0076bd;
    }
     .blue .postcard__bar {
         background-color: #0076bd;
    }
     .blue::before {
         background-image: linear-gradient(-30deg, rgba(0, 118, 189, 0.1), transparent 50%);
    }
     .blue:nth-child(2n)::before {
         background-image: linear-gradient(30deg, rgba(0, 118, 189, 0.1), transparent 50%);
    }
     .postcard .postcard__tagbox .red.play:hover {
         background: #bd150b;
    }
     .red .postcard__title:hover {
         color: #bd150b;
    }
     .red .postcard__bar {
         background-color: #bd150b;
    }
     .red::before {
         background-image: linear-gradient(-30deg, rgba(189, 21, 11, 0.1), transparent 50%);
    }
     .red:nth-child(2n)::before {
         background-image: linear-gradient(30deg, rgba(189, 21, 11, 0.1), transparent 50%);
    }
     .postcard .postcard__tagbox .yellow.play:hover {
         background: #bdbb49;
         color: black;
    }
     .yellow .postcard__title:hover {
         color: #bdbb49;
    }
     .yellow .postcard__bar {
         background-color: #bdbb49;
    }
     .yellow::before {
         background-image: linear-gradient(-30deg, rgba(189, 187, 73, 0.1), transparent 50%);
    }
     .yellow:nth-child(2n)::before {
         background-image: linear-gradient(30deg, rgba(189, 187, 73, 0.1), transparent 50%);
    }
     @media screen and (min-width: 769px) {
         .green::before {
             background-image: linear-gradient(-80deg, rgba(121, 221, 9, 0.1), transparent 50%);
        }
         .green:nth-child(2n)::before {
             background-image: linear-gradient(80deg, rgba(121, 221, 9, 0.1), transparent 50%);
        }
         .blue::before {
             background-image: linear-gradient(-80deg, rgba(0, 118, 189, 0.1), transparent 50%);
        }
         .blue:nth-child(2n)::before {
             background-image: linear-gradient(80deg, rgba(0, 118, 189, 0.1), transparent 50%);
        }
         .red::before {
             background-image: linear-gradient(-80deg, rgba(189, 21, 11, 0.1), transparent 50%);
        }
         .red:nth-child(2n)::before {
             background-image: linear-gradient(80deg, rgba(189, 21, 11, 0.1), transparent 50%);
        }
         .yellow::before {
             background-image: linear-gradient(-80deg, rgba(189, 187, 73, 0.1), transparent 50%);
        }
         .yellow:nth-child(2n)::before {
             background-image: linear-gradient(80deg, rgba(189, 187, 73, 0.1), transparent 50%);
        }
    }
     
    </style>
</html>
