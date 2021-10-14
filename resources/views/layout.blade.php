<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <title>@yield('title')</title>

    <style>

        body{
            padding: 0;
            margin: 0;
        }

        header,nav{
            height: 18vh;
            width: 100vw;
        }

        main{
            width: 100vw;
            min-height: 72vh;
            background-color: rgb(204, 217, 226);
        }

        footer{
            height: 10vh;
            width: 100vw;
        }

        .nav-search{
            height: 10vh;
            background-color: rgb(255, 193, 7);
        }

        .logo{
            width: 13vw;
            height: 13vh;
        }

        .search-form{
            padding-right: 1vw;
        }

        .search-btn{
            height: 2vh;
            width: 2vh;
        }

        .footer-icon{
            height: 2vh;
            width: 2vh;
            margin: 1vh 2vh 1vh 2vh;
            color: white;
            font-size: 20pt;
        }

        .search-input{
            width: 80vw;
        }

        .nav-menu{
            height: 8vh; 
        }

        .nav-menu-bgcolor, .footer-bgcolor{
            background-color: rgb(40, 81, 133);
        }

        .btn-link-update{
            text-decoration: none;
        }

        .text-white{
            color: white;
        }

        .btn-link-update:hover{
            text-decoration: none;
            color: black;
        }
    </style>

    @yield('style')

</head>
<body>
    <header>
        <nav>
            <div class="nav-search d-flex p-3 justify-content-between align-items-center">
                <img class="logo" src="storage/assets/logo.png" alt="logo" srcset="">
                <form action="" method="get" class="d-flex search-form">
                    <input class="form-control search-input" type="search" placeholder="Search Product..">
                    <button type="submit" class="btn btn-link"><i class="bi bi-search search-btn m-2"></i></button> 
                </form>
            </div>
            <div class="nav-menu nav-menu-bgcolor d-flex justify-content-between align-items-center">
                <div class="m-2 d-flex">
                    <a href=""><button type="button" class="btn btn-link text-white btn-link-update c-w">Home</button></a>
                    <a href=""><button type="button" class="btn btn-link text-white btn-link-update c-w">My Cart</button></a>
                    <a href=""><button type="button" class="btn btn-link text-white btn-link-update c-w">History Transaction</button></a>
                    <div class="dropdown">
                        <button class="btn btn-link btn-link-update text-white dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Manage Product
                        </button>
                        <ul class="dropdown-menu nav-menu-bgcolor" aria-labelledby="dropdownMenuButton1">
                            <li><a class="btn btn-link text-white btn-link-update" href="#">View Product</a></li>
                            <li><a class="btn btn-link text-white btn-link-update" href="#">Add Product</a></li>
                        </ul>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-link btn-link-update text-white dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Manage Category
                        </button>
                        <ul class="dropdown-menu nav-menu-bgcolor" aria-labelledby="dropdownMenuButton1">
                            <li><a class="btn btn-link text-white btn-link-update" href="#">View Category</a></li>
                            <li><a class="btn btn-link text-white btn-link-update" href="#">Add Category</a></li>
                        </ul>
                    </div>
                </div>
                <div class="m-2">
                    <a href=""><button type="button" class="btn btn-outline-light">Login</button></a>
                    <a href=""><button type="button" class="btn btn-outline-light">Register</button></a>
                    <a href=""><button type="button" class="btn btn-outline-light">Logout</button></a>
                </div>
            </div>
        </nav>
    </header>    
    <main>
        @yield('main')
    </main>
    <footer class="footer footer-bgcolor d-flex flex-column justify-content-between align-items-center p-3">
        <div>
            <a class="footer-icon btn-link-update" href="">
                <i class="bi bi-facebook"></i>
            </a>
            <a class="footer-icon btn-link-update" href="">
                <i class="bi bi-instagram"></i>
            </a>
            <a class="footer-icon btn-link-update" href="">
                <i class="bi bi-question-circle-fill"></i>
            </a>
        </div>
        <div>
            <span class="text-white">&copy; 2021 Copyright DY20-1</span>
        </div>
    </footer>
</body>
</html>