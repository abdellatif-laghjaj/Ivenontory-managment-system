<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"            rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        span {
            color: #28C7FA;
        }

        .logo{
            font-size: 36px;
        }

        .product-img{
            transition: all 0.5s ease;
        }
        
        .product-img:hover{
            transform: scale(1.2);
        }
    </style>
    <title>IMS</title>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="#" class="logo navbar-brand fw-bold"><span>Tex</span>GEAR<span></span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" style="font-size: 18px;" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-size: 18px;" href="login.php">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-size: 18px;" href="contact.php" target="_blank">Contact Us</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="text" placeholder="Search">
                    <button class="btn btn-primary" type="button">
                        <img src="../res/img/search.png" alt="" style="width: 22px;">
                    </button>
                </form>
                
                <!-- CART -->
                <button class="btn btn-warning ms-2 me-2 py-2 px-3 text-white position-relative"
                data-bs-toggle="modal" data-bs-target="#cartModal">
                    <i class="fa fa-shopping-basket"></i>

                    <!-- NUMBER OF ORDERS -->
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        99+
                    </span>
                </button>
            </div>
        </div>
    </nav>


    <div class="container-fluid">
        <div class="px-lg-5">
            <!-- For demo purpose -->
            <div class="row py-5">
                <div class="col-lg-12 mx-auto">
                    <div class="text-white p-5 shadow-sm rounded banner">
                        <h1 class="display-4">Inventory managment system</h1>
                        <p class="lead">Enjoy a safe, convenient shopping experience</p>
                        
                        <button type="button" class="btn btn-danger text-white mt-5"  data-bs-toggle="modal" data-bs-target="#userLogin" style="width: 100px;">Login</button>
                        <button type="button" class="btn btn-primary text-white mt-5"
                        data-bs-toggle="modal" data-bs-target="#userRegister" style="width: 100px;">Register</button>
                    </div>
                </div>
            </div>

            <?php include('../client/user_login.php')?>
            <?php include('../client/user_register.php')?>
            <?php include('../client/shopping_cart.php')?>
            <!-- End -->

            <div class="row">
                <!-- Gallery item -->
                <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                    <div class="bg-dark text-white rounded shadow p-3 mb-5">
                        <img src="../res/img/website.png" class="img-fluid card-img-top product-img"/>
                        <div class="p-4">
                            <h5 class="text-white fw-bold">Red paint cup</h5>
                            <p class="small text-muted mb-1">
                                Here's some description...
                            </p>

                            <table class="table table-borderless">
                                <tr>
                                  <td class="text-white">Category:</td>
                                  <td class="fw-bold text-white">Phone</td>
                                </tr>
      
                                <tr>
                                  <td class="text-white">Price:</td>
                                  <td class="fw-bold text-white">$1299</span> </td>
                                </tr>
                            </table>

                            <button class="text-white rounded-pill py-2 mt-1 addToCart"  id="addToCart">
                                <i class="fa fa-cart-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- End -->

                <div class="py-5 text-right">
                    <a href="#" class="btn btn-dark px-5 py-3 text-uppercase">Show me more</a>
                </div>
            </div>
        </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
            integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
            crossorigin="anonymous"></script>

    <script src="../js/addToCart.js"></script>
</body>

</html>