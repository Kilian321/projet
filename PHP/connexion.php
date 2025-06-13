<?php require_once "navbar.php"; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <!--Style-->
    <link rel="stylesheet" href="../CSS/style-user-accounts/style.scss">
    <!--Five icon-->
    <link rel="icon" href="../PICTURE/Archeo-IT_Logo-removebg-preview.png">
</head>
<body class="bg_body default_body">
<?php require_once '../DATA-BASE/database.php'; global $pdo; ?>

<!--Vérifie dans la base de données-->
<?php
if(!empty($_POST['email']) && !empty($_POST['password'])){
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email_in_base= "SELECT * FROM user WHERE email = :email";
        $stmt = $pdo->prepare($email_in_base);
        $stmt->execute(array(':email' => $_POST['email']));
        $user = $stmt->fetch();
        if(!empty($user)) {
            if(password_verify($_POST['password'], $user['password'])) {
                session_start();
                $_SESSION['user'] = $user;
                header('Location: ./home.php');
            } else {
                echo '<div class="  center margin_top-2"> 
                          <div class="box_error center text_color-error animation">
                            <img  class="img" src="../PICTURE/error.png">
                            Votre mot de passe est incorrect
                          </div> 
                      </div> ';
            }
        } else {
            echo '<div class="  center margin_top-2"> 
                          <div class="box_error center text_color-error animation">
                            <img  class="img" src="../PICTURE/error.png">
                            Email inexistant ou incorrect
                          </div> 
                      </div> ';
        }
    }
}

?>
<!--Le formulaire -->
<div class="center margin_top margin">
    <div class="border-2 center ">
        <div class="margin">
            <form method="post">
                <div class="margin-bottom">
                    <h4>Email :</h4><br>
                    <input  class="input_size border-input"  type="email" name="email" required ><br>
                </div>
                <div>
                    <h4>Mot de passe :</h4> <br>
                    <input class="input_size border-input" type="password" name="password" required><br>
                </div>
                <button class="button_size police" type="submit">C o n n e x i o n</button>
            </form>
            <div class="line-2 margin-bottom"></div>
            <div class="center">
                <h4>Tu n'as pas de  compte ? <a href="registration.php">Inscription</a></h4>
            </div>
        </div>
    </div>
</div>
<!--Code JS-->
<script>
    document.getElementById("inscription").addEventListener('click',function (){
        window.location='../../HTML_PHP/comptes_utilisateurs/inscription.php'
        console.log("a")
    })
</script>
</body>
</html>