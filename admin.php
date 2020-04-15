<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/admin.css">
    <title>Hello, world!</title>
  </head>
<body>
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
                        require_once('logme.php');
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
                                        $_SESSION['isAdmin']=true;
                                    echo<<<alias
                                        <a class="dropdown-item" href="admin.php">Panel administracyjny</a>
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
            <p style="height: 50vh;margin-top: 25vh;">admin</p>














































    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6d0c8b4bd0.js" crossorigin="anonymous"></script>
</body>
</html>