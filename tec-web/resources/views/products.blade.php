<head>
    <!-- css -->
    <link rel="stylesheet" href="/css/products.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <!-- scprit bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    {{View::make('header')}}
    @yield('content')


    <main>
        <table>
            <div class="row">
                <div class="col-3">

                </div>
                <div class="col-9">
                    <!-- products -->
                    <div class="container-lg py-3">
                        <div class="row">
                            <div class="col">
                                <div class="card" style="width: 15rem;">
                                    <img src="/img/iphone.jpeg" class="card-img-top" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">Apple iPhone 13 Pro Max (512 GB) - Azzurro Sierra</h5>
                                        <p class="card-text">Prezzo: 1.639,00$</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card" style="width: 15rem;">
                                    <img src="/img/iphone.jpeg" class="card-img-top" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">Apple iPhone 13 Pro Max (512 GB) - Azzurro Sierra</h5>
                                        <p class="card-text">Prezzo: 1.639,00$</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card" style="width: 15rem;">
                                    <img src="/img/iphone.jpeg" class="card-img-top" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">Apple iPhone 13 Pro Max (512 GB) - Azzurro Sierra</h5>
                                        <p class="card-text">Prezzo: 1.639,00$</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-lg py-3">
                        <div class="row">
                            <div class="col">
                                <div class="card" style="width: 15rem;">
                                    <img src="/img/iphone.jpeg" class="card-img-top" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">Apple iPhone 13 Pro Max (512 GB) - Azzurro Sierra</h5>
                                        <p class="card-text">Prezzo: 1.639,00$</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card" style="width: 15rem;">
                                    <img src="/img/iphone.jpeg" class="card-img-top" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">Apple iPhone 13 Pro Max (512 GB) - Azzurro Sierra</h5>
                                        <p class="card-text">Prezzo: 1.639,00$</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card" style="width: 15rem;">
                                    <img src="/img/iphone.jpeg" class="card-img-top" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">Apple iPhone 13 Pro Max (512 GB) - Azzurro Sierra</h5>
                                        <p class="card-text">Prezzo: 1.639,00$</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </table>

    </main>

    <!-- footer -->
    {{View::make('footer')}}
    @yield('content')
</body>