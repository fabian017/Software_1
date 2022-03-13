
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda leoparda</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/tienda.css">
</head>

<body>
    <header class="container-fluid  position-sticky top-0">
        <div class="menu">
            <p class="nombret">
                Atletico Bucaramanga
            </p> 
            <nav>
                <ul class="nav nav-pills mb-3 py-3 container lista" id="pills-tab" role="tablist">
                    <a href="plantilla.html"><li>Plantilla</li></a>
                    <a href="Proximos_partidos.html"><li >Calendario</li> </a>
                    <a href="ventas.html"><li >Tienda</li></a>
                    <a href="#carrito">Carrito</a>
                    <a href="boleteria.html"><li >Boleteria</li></a>
                    <li class="nav-item carro" role="presentation">
                        <a class="nav-link carro" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"
                            type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Carrito</a>
                    </li>
                    
                    <a href="index.html"><li ><img src="img/escudo.png" alt=""></li></a>
                </ul>
            </nav>
        </div>

    </header>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade " id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">1</div>
        <div class="tab-pane fade show active container" id="pills-profile" role="tabpanel"
            aria-labelledby="pills-profile-tab">
            <h2 class="h4 m-4">Tienda Oficial Atletico Bucaramanga</h2>

            <div class=" row row-cols-sm-1 row row-cols-smd-2 row row-cols-lg-3 row row-cols-xl-4">

                <div class="col d-flex justify-content-center mb-4 producto">
                    <div class="card shadow mb-1 rounded" style="width: 20rem;">
                        <h5 class="card-title pt-2 text-center  texto">Camisa Hombre 2022</h5>
                        <img src="./productos/camiseta-ATLETICO-BUCARAMANGA-2017-Deporte-Total-home-Casacas-LuchoLasS.png"
                            class="card-img-top imagen" alt="...">
                        <div class="card-body">
                            <p class="card-text  description">Some quick example text to build on the card
                                title and make up the bulk
                                of the card's content.</p>
                            <h5 class=" texto">Precio: <span class="precio">$40</span></h5>
                            <div class="d-grid gap 2">
                                <button class="btn btn-primary button boton">Añadir a carrito</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-center mb-4">
                    <div class="card shadow mb-1 rounded" style="width: 20rem;">
                        <h5 class="card-title pt-2 text-center  texto">Camisa Hombre 2021</h5>
                        <img src="./productos/camisa2.jpg" class="card-img-top imagen" alt="...">
                        <div class="card-body">
                            <p class="card-text  description">Some quick example text to build on the card
                                title and make up the bulk
                                of the card's content.</p>
                            <h5 class=" texto ">Precio: <span class="precio">$50</span></h5>
                            <div class="d-grid gap 2">
                                <button class="btn btn-primary button boton">Añadir a carrito</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-center mb-4">
                    <div class="card shadow mb-1 rounded" style="width: 20rem;">
                        <h5 class="card-title pt-2 text-center  texto">Uniforme Completo</h5>
                        <img src="./productos/Posillo.jpg" class="card-img-top imagen" alt="...">
                        <div class="card-body">
                            <p class="card-text  description">Some quick example text to build on the card
                                title and make up the bulk
                                of the card's content.</p>
                            <h5 class=" texto">Precio: <span class="precio">$10</span></h5>
                            <div class="d-grid gap 2">
                                <button class="btn btn-primary button boton">Añadir a carrito</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-center mb-4">
                    <div class="card shadow mb-1 rounded" style="width: 20rem;">
                        <h5 class="card-title pt-2 text-center  texto ">Posillo</h5>
                        <img src="./productos/Uniforme completo.jpg" class="card-img-top imagen" alt="...">
                        <div class="card-body">
                            <p class="card-text  description">Some quick example text to build on the card
                                title and make up the bulk
                                of the card's content.</p>
                            <h5 class="texto">Precio: <span class="precio">$30</span></h5>
                            <div class="d-grid gap 2">
                                <button class="btn btn-primary button boton">Añadir a carrito</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="tab-pane fade carrito" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            <br>
            <table class="table table-dark table-striped">
                <thead>
                    <tr class="text-primary">
                        <th scope="col">#</th>
                        <th scope="col">Productos</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Cantidad</th>
                    </tr>
                </thead>
                <tbody class="tbody">
                </tbody>
            </table>
            <br><br>
            <div class="row mx-4">
                <div class="col">
                    <h3 class="itemCartTotal text-white">Total: 0</h3>
                </div>
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-success">COMPRAR</button>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="tab-pane fade carrito" id="carrito" role="tabpanel" aria-labelledby="pills-contact-tab">
        <br>
        <table class="table">
            <thead>
                <tr class="text-primary">
                    <th scope="col">#</th>
                    <th scope="col">Productos</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Cantidad</th>
                </tr>
            </thead>
            <tbody class="tbody">
            </tbody>
        </table>
        <br><br>
        <div class="row mx-4">
            <div class="col">
                <h3 class="itemCartTotal text-Black">Total: 0</h3>
            </div>
            <div class="col d-flex justify-content-end">
                <button class="btn btn-success">COMPRAR</button>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="./js/scripts.js"></script>
</body>

</html>
