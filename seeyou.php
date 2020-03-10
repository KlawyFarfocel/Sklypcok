<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style/register.css">
</head>
<body>
    <?php
    session_start();
    error_reporting(0);
    $connect=new mysqli('localhost','root','','projektms');

            if(isset($_SESSION['delete'])){
                $id=$_SESSION['user_id'];
            $query="SELECT name FROM users WHERE user_id='$id'";
            $result=$connect->query($query);
            $who="";
            if($result->num_rows!=0){
                $name=$result->fetch_object();
                $who=$name->name;
            }
            echo<<<alias
                <div class="mt-5">
                    <div class="container mt-5 mt-lg-3">
                        <div class="row">
                            <div class="col-sm-12 margin3">
                                <div class="txt text-center mt-1">
                                    <h2>Przykro nam, że usuwasz konto :(</h2>
                                    <p>Mamy nadzieję, że spotkamy się jeszcze w przyszłości :)</p>
            alias;
                                    if($who!=""){
                                        echo "<p>Do zobaczenia $name->name!</p>";
                                    }
            echo<<<alias
                                </div>
                                <div class="txt text-center margin3 text-danger">Twoje konto jest usuwane. Za 5 sekund nastąpi przekierowanie do strony głównej</div>
                                <div class="txt big countdown text-center mt-1 text-muted"></div>
                            </div>
                        </div>
                    </div>
                </div>
            alias;
            $delete_query="DELETE FROM users WHERE user_id=$id";
            unset($_SESSION['user_id']);
            $delete_result=$connect->query($delete_query);
            }
            else{
                echo<<<alias
                <script>
                window.location.href="index.php";
                </script>
                alias;
            }
        $connect->close();
    ?>
    <script>
        var dot=document.createElement("SPAN");
        dot.classList="dot mr-2";
        setInterval(() => {
            document.getElementsByClassName('countdown')[0].appendChild(dot.cloneNode(true));
        }, 1000);
        setTimeout(() => {
            window.location.href="index.php";
        }, 5000);
    </script>
</body>
</html>