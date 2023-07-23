<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baso Mas</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">
            <img class="logo" src="assets/img/logo-basoMas.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link active text-dark" aria-current="page" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="restaurant.html">Restaurant</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Fan Reviews</a>
                </li>
            </ul>

            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-light my-1 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    
    <main class="pt-4">
        <div class="container">
            <div class="row">
                <!-- konten reviewnya -->
              <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb badge-light">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Library</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                </nav>

                <!-- nama restoran -->
                <div class="container">
                    <h1 class="font-weight-bold">Bakso Samiasih</h1>
                </div>

                <!-- lokasi restoran -->
                <div class="container">
                    <span>
                        <a href="">location</a>
                    </span>
                </div>

                <!-- rating sama usernmae yang ngereview -->
                <div class="container">
                    <span>
                        alamat user
                    </span>
                </div>
              </div>

              <!-- ini info restaurantnya -->
              <aside class="col-auto">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb badge-light">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Library</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                </nav>
            </aside>
            </div>
        </div>
    </main>
   
</html>