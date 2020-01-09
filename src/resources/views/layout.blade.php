<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>@yield('title')</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-2">
    <a class="navbar-brand" href="http://localhost:8080">IF GG</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item"><a  class="nav-link" href="{{ route('summoner.index') }}">Summoners</a></li>
        <li class="nav-item"><a  class="nav-link" href="{{ route('match.index') }}">Matchs</a></li>
        <li class="nav-item"><a  class="nav-link" href="{{ route('champion.index') }}">Champions</a></li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <h1 class="text-center my-5">@yield('title')</h1>
    <div class="mt-4 mb-4">
      @yield('content')
    </div>
  </div>

  <footer class="bg-dark text-white">
    <div class="container p-3">
      <div class="row">
        <div class="col">
          <h5 class="">Important warning!</h5>
          <p class="">IF-GG isn’t endorsed by Riot Games and doesn’t reflect the views or opinions of Riot Games or anyone officially involved in producing or managing League of Legends. League of Legends and Riot Games are trademarks or registered trademarks of Riot Games, Inc. League of Legends © Riot Games, Inc.</p>
        </div>
      </div>
    </div>
    <div class="border-top border-light p-3 text-center">
      <div class="container">
        © 2019 Mauricio P.C. Junior & Romero C.R. Junior
      </div>
    </div>
  </footer>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <!-- Activate tootips -->
  <script>
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
  </script>

</body>

</html>
