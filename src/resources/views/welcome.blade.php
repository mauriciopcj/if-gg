<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- materialize -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        
        <nav style="padding:0 10px" class="cyan darken-3">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo">IF GG</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="sass.html">Link 1</a></li>
                    <li><a href="badges.html">Link 2</a></li>
                    <li><a href="collapsible.html">Link 3</a></li>
                </ul>
            </div>
        </nav>

        <div class="flex-center position-ref full-height blue-grey darken-4">
            
            
          
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="row">
                <form class="col" action="{{ route('summoner.create') }}" method="GET">
                    <div class="input-field col">
                        <input name="name" id="name" type="tel" class="validate cyan-text text-lighten-5">
                        <label for="name">Summoner Name</label>
                        <button type="submit" class="btn flex-center">Search</button>
                    </div>
                </form>
            </div>
            
        </div>

        <footer class="page-footer cyan darken-3">
            <div class="container">
                <div class="row">
                    <div class="col l8 s12">
                        <h5 class="white-text">Important warning!</h5>
                        <p class="grey-text text-lighten-4">IF-GG isn’t endorsed by Riot Games and doesn’t reflect the views or opinions of Riot Games or anyone officially involved in producing or managing League of Legends. League of Legends and Riot Games are trademarks or registered trademarks of Riot Games, Inc. League of Legends © Riot Games, Inc.</p>
                    </div>
                    <div class="col l2 offset-l2 s12">
                        <h5 class="white-text">Links</h5>
                        <ul>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                © 2019 Mauricio P.C. Junior & Romero C.R. Junior
                </div>
            </div>
        </footer>

        <!-- scripts -->
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
</html>
