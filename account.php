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
        require_once('logme.php');
        if(is_null($_SESSION['user_id'])){
          echo<<<alias
          <script> window.location.href="index.php"</script>
          alias;
        }
        $id=$_SESSION['user_id'];
        $query="SELECT * FROM users WHERE user_id='$id'";
        $result=$connect->query($query);
        $take=$result->fetch_object();
        $login=$take->logon;
        $passwd=$take->passwd;
        $mail=$take->mail;
        $name=$take->name;
        $surname=$take->surname;
        $phone=$take->phone;
        if(isset($_POST['mode'])){
          if($_POST['mode']=='success'){
              if($_POST['login']!=$login){
                  $login=$_POST['login'];
              }
              if($_POST['passwd']!=$passwd){
                $passwd=$_POST['passwd'];
              }
              if($_POST['mail']!=$mail){
                $mail=$_POST['mail'];
              }
              if($_POST['name']!=$name){
                $name=$_POST['name'];
              }
              if($_POST['surname']!=$surname){
                $surname=$_POST['surname'];
              }
              if($_POST['phone']!=$phone){
                $phone=$_POST['phone'];
              }
              $query="UPDATE `users` SET `logon`='$login',`passwd`='$passwd',`mail`='$mail',`name`='$name',`surname`='$surname',`phone`='$phone' WHERE `user_id`=$id";
              $result=$connect->query($query);
              echo<<<alias
              <script>window.location.href="account.php?mode=updated"</script>
              alias;
          }
        }
?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="#" class="mx-auto navbar-brand d-xs-block d-lg-none">Navbar</a>
        <a class="navbar-brand d-none d-lg-block mx-auto" href="index.php">Navbar</a>
    </nav>
    <div class="mt-5">
    <div class="container mt-5 mt-lg-3">
        <div class="row">
            <div class="col-sm-12">
                <div class="txt text-center mt-1">
                    <h2>Dane konta</h2>
                    <?php
                        if(isset($_GET['mode'])){
                          if($_GET['mode']=='updated'){
                              echo "<p class='text-success text-center d-block'>Zmiany zapisane pomyślnie!</p>";
                          }
                        } 
                    ?>
                </div>
            </div>
        </div>
    <div class="container mt-5">
            <form action="account.php" method="POST">
                <div class="row">
                        <div class="form-group col-10 offset-1 offset-md-0 col-md-6">
                            <div class="text-center">
                                <label>Login</label>
                                <?php
                                  echo "<input type='text' name='login' class='form-control' value='$take->logon'>";
                                ?>
                                <p class="d-none"></p>
                            </div>
                        </div>
                        <div class="form-group col-10 offset-1 offset-md-0 col-md-6">
                                <div class="text-center">
                                    <label>Hasło</label>
                                </div>
                                <?php
                                  echo "<input type='password' name='passwd' class='form-control' value='$take->passwd'>";
                                ?>
                                <div class="text-center">
                                    <p class="d-none"></p>
                                </div>

                        </div>
                        <div class="form-group col-10 offset-1 offset-md-2 col-md-8">
                                <div class="text-center">
                                    <label>Email</label>
                                </div>
                                <?php
                                  echo "<input type='email' name='mail' class='form-control' value='$take->mail'>";
                                ?>
                                <div class="text-center">
                                    <p class="d-none"></p>
                                </div>
                        </div>
                        <div class="form-group col-10 offset-1 offset-md-0 col-md-6">
                                <div class="text-center">
                                    <label>Imię</label>
                                    <p class="d-none"></p>
                                </div>
                                <?php
                                  echo "<input type='text' class='form-control' name='name' value='$take->name'>";
                                ?>
                                <div class="text-center">
                                    <p class="d-none"></p>
                                </div>
                        </div>
                        <div class="form-group col-10 offset-1 offset-md-0 col-md-6">
                                <div class="text-center">
                                    <label>Nazwisko</label>
                                </div>
                                <?php
                                  echo "<input type='text' class='form-control'  name='surname' value='$take->surname'>";
                                ?>
                                <div class="text-center">
                                    <p class="d-none"></p>
                                </div>
                        </div>
                        <div class="form-group col-10 offset-1 offset-md-2 col-md-8">
                                <div class="text-center">
                                    <label>Nr. tel</label>
                                </div>
                                <?php
                                  echo "<input type='tel' class='form-control'  name='phone'  value='$take->phone'>";
                                ?>
                                <div class="text-center">
                                    <p class="d-none"></p>
                                </div>
                        </div>
                        <input type="hidden" name="mode" value="success">
                        <div class="form-group col-10 offset-1 offset-md-2 col-md-8 text-center">
                              <input type="submit" id="chkAcc" value="Zapisz zmiany" class="btn btn-outline-success">
                              </form>
                              <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#test">Usuń konto</button>
                              <div class="modal fade" id="test" role="dialog">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title">Na pewno?</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="text-danger">Ten proces jest nieodwracalny!</p>
                                    </div>
                                    <div class="modal-footer">
                                      <form action="seeyou.php" method="post">
                                        <div class="text-center">
                                          <form action="seeyou.php" method="POST">
                                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Anuluj</button>
                                            <input type="submit" value="Usuń konto" class="btn btn-outline-danger">
                                            <input type="hidden" name="deleted" value="yas">
                                          </form>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div>  
                    </div>  
                </div>
            
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6d0c8b4bd0.js" crossorigin="anonymous"></script>
    <?php 
      if(isset($_SESSION['admin'])){
        if($_SESSION['admin']!=1){
          echo "<script src='js/validate.js'></script>";
        }
      }
    ?>
</body>
</html>