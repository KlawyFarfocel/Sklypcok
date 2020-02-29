<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/register.css">
    <title>Hello, world!</title>
  </head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="#" class="mx-auto navbar-brand d-xs-block d-lg-none">Navbar</a>
        <a class="navbar-brand d-none d-lg-block mx-auto" href="index.php">Navbar</a>
    </nav>
    <div class="container mt-5 mt-lg-3">
        <div class="row">
            <div class="col-sm-12">
                <div class="txt text-center mt-5">
                    <h2>Zarejestruj się!</h2>
                    <p class="text-muted d-none d-lg-block">Zalogowanie zapewnia dostęp do funkcji niedostępnych dla użytkowników niezalogowanych</p>
                    <p class="text-muted d-block d-lg-none">Nie masz konta? Zarejestruj się <a href="register.php">tutaj!</a></p>
                </div>
            </div>
        </div>
        <div class="row clearfix mt-5">
            <div class="col-lg-6">
                <form action="register.php" novalidate method="POST">
                    <div class="form-group">
                        <label>Login</label>
                        <input type="text" required name="login" class="form-control">
                        <p class="d-none"></p>
                    </div>
                    <div class="form-group">
                        <label>Hasło</label>
                        <input type="password" required name="passwd" class="form-control">
                        <p class="d-none"></p>
                    </div>
                    <div class="form-group form-submit text-center">
                        <input type="submit" id="loginChk" value="Zaloguj się" class="btn btn-block btn-outline-success">
                        <input type="hidden" name="mode" value="registered">
                    </div>   
                </form>
            </div>
            <div class="col-lg-5 offset-lg-1 test d-none d-lg-block">
                    <div class="txt text-center margin3">
                        <p class="text-muted">Masz już konto?</p>
                        <p class="text-muted">Zaloguj się!</p>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-outline-success">Logowanie</button>
                    </div>
            </div>
        </div>
    </div>
    <?php
        $connect=new mysqli('localhost','root','','projektms');
        if(isset($_POST['mode'])){
            if($_POST['mode']=='registered'){
                $login=$_POST['login']
                $passwd=$_POST['passwd'];
            }
        }
    ?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6d0c8b4bd0.js" crossorigin="anonymous"></script>
    <script src="./js/validate.js"></script>
    <script>
        $(function () {
            $('[data-toggle="popover"]').popover();
        });
    </script>
</body>
</html>