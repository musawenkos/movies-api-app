<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300" rel="stylesheet">
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script src="//unpkg.com/alpinejs" defer></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>Heiman Pictures Weaving</title>
        <link rel="stylesheet" href="{{asset('css/main.css')}}"/>
    </head>
    <body class="mb-48 bg-dark">
        <header>
            <nav class="navbar fixed-top navbar-expand-sm opacity-0 ">
                <div class="container-fluid">
                  <a class="navbar-brand" href="/"><img src="images/logo.png" height="70" width="70" style="border-radius:22px;"/></a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="collapsibleNavbar" style="padding-left:25%;">
                    <ul class="navbar-nav ">
                      <li class="nav-item ">
                        <a class="nav-link" href="/">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link " href="/hpw/series">Series</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="/hpw/movies">Movies</a>
                      </li>
                    </ul>
                  </div>
                  <form class="d-flex me-2">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
                  <div class="d-flex">
                    <button class="btn btn-outline-info">Log In</button>
                  </div>
                </div>
              </nav>
        </header>

        <main>

            {{$slot}}
        </main>

    </body>
</html>
