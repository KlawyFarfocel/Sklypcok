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
<?php
    $connect=new mysqli('localhost','root','','projektms');
?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="#" class="mx-auto navbar-brand d-xs-block d-lg-none">Navbar</a>
        <a class="navbar-brand d-none d-lg-block mx-auto" href="#">Navbar</a>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="txt text-center">
                    <h2>Zarejestruj się!</h2>
                    <p class="text-muted d-none d-lg-block">Posiadanie konta umożliwia lepsze doświadczenie w korzystaniu z serwisu</p>
                    <p class="text-muted d-block d-lg-none">Masz już konto? Zaloguj się! <a href="#">tutaj</a></p>
                </div>
            </div>
        </div>
        <div class="row clearfix xxd">
            <div class="col-lg-6">
                <form action="register.php" method="POST">
                    <div class="form-group">
                        <?php
                            if(isset($_GET['check'])){
                                if($_GET['check']=='failed'){
                                    echo "<p class='text-warning text-center d-block'>Takie konto już istnieje!</p>";
                                }
                                if($_GET['check']=='success'){
                                    echo "<p class='text-success text-center d-block'>Konto zostało utworzone!</p>";
                                }
                            }
                        ?>
                        <label>Login</label>
                        <i class="fas fa-info-circle" data-trigger="hover" data-toggle="popover" data-content="8-15 znaków, bez znaków specjalnych"></i>
                        <input type="text" required name="login" class="form-control">
                        <p class="d-none"></p>
                    </div>
                    <div class="form-group">
                        <label>E-Mail</label>
                        <input type="email" class="form-control" required name="mail" class="form-control">
                        <p class="d-none"></p>
                    </div>
                    <div class="form-group">
                        <label>Hasło</label>
                        <i class="fas fa-info-circle" data-trigger="hover" data-toggle="popover" data-content="Przynajmniej 8 znaków, wielka, mała litera i znak specjalny"></i>
                        <input type="password" required name="passwd" class="form-control">
                        <p class="d-none"></p>
                    </div>
                    <div class="form-group invalid"> 
                        <label>Powtórz hasło</label> 
                        <input type="password" required name="passAgain" class="form-control">
                        <p class="d-none"></p>
                        <input type="hidden" name="mode" value="registered">
                    </div>
                    <div class="form-group form-submit text-center">
                        <input type="submit" id="chk" value="Utwórz konto" class="btn btn-block btn-outline-success">
                    </div>   
                </form>
            </div>
            <div class="col-lg-5 offset-lg-1 test d-none d-lg-block">
                    <div class="txt text-center margin">
                        <p class="text-muted">Masz już konto?</p>
                        <p class="text-muted">Zaloguj się!</p>
                    </div>
                    <div class="text-center">
                        <a class="btn btn-outline-success" href="login.php">Logowanie</a>
                    </div>
            </div>
        </div>
    </div>
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
    <?php
        if(isset($_POST['mode'])){
            if($_POST['mode']=="registered"){
                $username=$_POST['login'];
                $passwd=$_POST['passwd'];
                $mail=$_POST['mail'];
                $check_query="SELECT * FROM users WHERE logon='$username' AND mail='$mail'";
                $check_result=$connect->query($check_query);
                if($check_result->fetch_object()){
                    echo<<<alias
                    <script>window.location.href="register.php?check=failed"</script>
                    alias;
                }
                else{
                    $add_query="INSERT INTO users(logon,passwd,mail) VALUES ('$username','$passwd','$mail')";
                    $add_result=$connect->query($add_query);
                    echo<<<alias
                    <script>window.location.href="register.php?check=success"</script>
                    alias;
                }
            }
        }
    ?>
</body>
</html>