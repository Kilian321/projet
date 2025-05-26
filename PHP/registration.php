<?php
session_start();
require_once("navbar.php");
require_once('../DATA-BASE/database.php');



?>


<?php

/* ??0 (initialisé à 0, pour éviter des erreurs PHP) */
$mot_de_passe_2 = $_POST['mot_de_passe'] ??0;
$confirmation = $_POST['mot_de_passe_confirmation'] ??0;

/* Si le mdp et confirmation sont égaux*/
if ($mot_de_passe_2 === $confirmation){
    /* ajout des informations dans la base de données s'il n'y a pas de comptes avec la même email*/
    if(!empty($_POST['email']) && !empty($_POST['mot_de_passe'])){
        if (isset($_POST['email']) && isset($_POST['mot_de_passe'])) {
            $email = htmlspecialchars($_POST['email']);
            $mot_de_passe = password_hash(htmlspecialchars($_POST['mot_de_passe']), PASSWORD_DEFAULT);
            $sqlCheckEmail = 'SELECT id FROM user WHERE email = :email';
            $stmtCheckEmail = $pdo->prepare($sqlCheckEmail);
            $stmtCheckEmail->execute([':email' => $email]);
            $checkEmail = $stmtCheckEmail->fetch();
            if(empty($checkEmail)){
                $sql = "INSERT INTO user (email, mot_de_passe) VALUES (:email, :mot_de_passe)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(array(':email' => $email, ':mot_de_passe' => $mot_de_passe));
                $sqlGetUser = 'SELECT * FROM user WHERE email = :email';
                $stmtGetUser = $pdo->prepare($sqlGetUser);
                $stmtGetUser->execute([':email' => $email]);
                $getUser = $stmtGetUser->fetch();
                $_SESSION['user'] = $getUser;
                header("Location:./connexion.php");

                /* Message si l'email est déjà existant*/
            } else {
               echo '<div class="  center margin_top-2"> 
                          <div class="box_error center text_color-error animation">
                            <img  class="img" src="../PICTURE/error.png">
                             Email déjà existant
                          </div> 
                      </div> ';
            }
        }
    }
/* Message si le mdp et confirmation ne sont pas les mêmes*/
}else{
    if ($mot_de_passe_2 !== $confirmation){
        echo '<div class="  center margin_top-2"> 
                          <div class="box_error center text_color-error animation">
                            <img  class="img" src="../PICTURE/error.png">
                            Votre mot de passe est incorrect
                          </div> 
                      </div> ';
    }

}

?>
<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="UTF-8">
    <title>Inscription</title>

    <!--Style-->
    <link rel="stylesheet" href="../CSS/style-user-accounts/style.scss">

</head>
<body class="bg_body default_body">

<!--Formulaire d'inscription-->
<div class="center margin_top margin">
    <div class="border center ">
        <div class="margin">
            <form method="post">
                <div class="margin-bottom">
                    <h4> Email : </h4>  <br>
                    <input class="input_size" type="email" name="email" required ><br>
                </div>
                <div class="margin-bottom">
                    <h4> Mot de passe :</h4> <br>
                    <input class="input_size" type="password" name="mot_de_passe" required><br>
                </div>
                <div class="">
                    <h4>Confirmation du mot de passe : </h4><br>
                    <input class="input_size" type="password" name="mot_de_passe_confirmation" required><br>
                </div>

                <button class="button_size police" type="submit">I n s c r i p t i o n</button>
            </form>
            <div class="line margin-bottom"></div>
            <div class="center">
                <h4>Tu as déjà un compte ? <a href="connexion.php">Connexion</a> </h4>
            </div>
        </div>
    </div>
</div>


<!--Code JS-->
<script>
    document.getElementById("connexion").addEventListener('click',function (){
        window.location='navbar.php'
    })
</script>





</body>
</html>
