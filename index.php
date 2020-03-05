<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <title>Hello, world!</title>
  </head>
<body>
<?php 
    $connect=new mysqli('localhost','root','','projektms');
    session_start();
?>
            <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
                <button class="navbar-toggler  navbar-toggler-right" type="button" data-toggle="collapse" data-target=".navbar-collapse"> ☰ </button>
                <a href="index.php" class=" mx-auto navbar-brand d-xs-block d-lg-none">Navbar</a>
                <span class="mr-5 mr-lg-0"></span>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav ml-1">
                        <li class="nav-item">
                            <form class="form-inline d-none d-lg-block">
                                <input class="form-control mr-sm-1" type="search" placeholder="Szukaj">
                                <button class="btn text btn-outline-success my-2 my-sm-0" type="submit">Szukaj</button>
                            </form>
                        </li>
                    </ul>
                </div>
                <a class="navbar-brand d-none d-lg-block mx-auto" href="index.php">
                    <span class="mr-md-5">
                        <span class="mr-md-5">Navbar</span>
                        <span class="mr-md-5"></span>
                        <span class="mr-md-5"></span>
                    </span>
                </a>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item d-flex justify-content-center mt-3 mt-lg-0 ">
                            <div class="dropdown">
                                <a href="#" class="btn btn-block  text btn-outline-success dropdown-toggle mx-sm-1 mx-lg-0" role="button" id="dropdownMenuLink" data-toggle="dropdown">Konto</a>
                                <?php
                                    if(isset($_GET['logout'])){
                                        unset($_SESSION['user_id']);
                                    }
                                    if(isset($_SESSION['user_id'])){
                                        $id=$_SESSION['user_id'];
                                        $query="SELECT admin FROM users WHERE user_id=$id";
                                        $result=$connect->query($query);
                                        $admin=$result->fetch_object();
                                        echo<<<alias
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="account.php">Dane konta</a>
                                            <div class="dropdown-divider"></div>
                                        alias;
                                            if($admin->admin==1){
                                            echo<<<alias
                                                <a class="dropdown-item" href="account.php">Panel administracyjny</a>
                                                <div class="dropdown-divider"></div>
                                                alias;
                                            }
                                            echo<<<alias
                                            <a class="dropdown-item" href="index.php?logout">Wyloguj</a>
                                        </div>
                                        alias;
                                    }
                                    else{
                                        echo<<<alias
                                        <div class="dropdown-menu btn-block dropdown-menu-right">
                                            <a class="dropdown-item" href="login.php">Logowanie</a>
                                            <div class="dropdown-divider"></div>
                                            <div class="px-4 text-muted">
                                                <p> Nie masz konta? Zarejestruj się! </p>
                                            </div>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="register.php">Rejestracja</a>
                                        </div>
                                        alias;
                                    }
                                    $connect->close();
                                ?>
                            </div>
                            <div class="dropdown mx-4 d-xs-flex d-lg-none">
                                <a href="#" class="btn btn-block btn-outline-success dropdown-toggle mx-sm-1 mx-lg-0 " role="button" id="searchBar" data-toggle="dropdown">Szukaj</a>
                                <div class="dropdown-menu dropdown-login dropdown-menu-right">
                                    <form action="index.php" class="d-flex justify-content-center form-inline" method="get">
                                        <input class="form-control w-50" type="search" placeholder="Szukaj">
                                        <button class="btn btn-outline-success my-2 ml-2 my-sm-0" type="submit">Szukaj</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
    <div class="contain"></div>
    <footer class="py-4 bg-dark text-white-50 sticky-footer">
    <div class="container text-center">
      <small>Copyright &copy; Maciej Śmierciak 2020</small>
    </div>
  </footer>
    




    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>