<?php

require_once("navbar.php");
require_once('../DATA-BASE/database.php');
header("Access-Control-Allow-Origin: *");



?>


<?php

/* ??0 (initialisé à 0, pour éviter des erreurs PHP) */
$mot_de_passe_2 = $_POST['password'] ??0;
$confirmation = $_POST['mot_de_passe_confirmation'] ??0;

/* Si le mdp et confirmation sont égaux*/
if ($mot_de_passe_2 === $confirmation){
    /* ajout des informations dans la base de données s'il n'y a pas de comptes avec la même email*/
    if(!empty($_POST['email']) && !empty($_POST['password'])){
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = htmlspecialchars($_POST['email']);
            $mot_de_passe = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
            $sqlCheckEmail = 'SELECT id FROM user WHERE email = :email';
            $stmtCheckEmail = $pdo->prepare($sqlCheckEmail);
            $stmtCheckEmail->execute([':email' => $email]);
            $checkEmail = $stmtCheckEmail->fetch();
            if(empty($checkEmail)){
                $sql = "INSERT INTO user (email, password) VALUES (:email, :password)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(array(':email' => $email, ':password' => $mot_de_passe));
                $sqlGetUser = 'SELECT * FROM user WHERE email = :email';
                $stmtGetUser = $pdo->prepare($sqlGetUser);
                $stmtGetUser->execute([':email' => $email]);
                $getUser = $stmtGetUser->fetch();
                header("Location:./connexion.php");

                /* Message si l'email est déjà existant*/
            } else {
               echo '<div class="  center margin_top-2"> 
                          <div class="box_error center text_color-error animation">
                            <img alt="error" class="img" src="../PICTURE/error.png">
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
                            <img alt="error" class="img" src="../PICTURE/error.png">
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
<div class="center margin_top margin ">
    <div class="border center ">
        <div class="margin">
            <form method="post">
                <div class="margin-bottom ">
                    <h4> Email : </h4>  <br>
                    <input class="input_size-2 border-input" type="email" name="email" required ><br>
                </div>
                <div class="margin-bottom">
                    <h4> Mot de passe :</h4>
                    <div class="border-input">
                        <input  id="passwordInput" class="input_size passwordInput" type="password" name="password" required>
                        <img class="img-2 mr" src="../PICTURE/view.png" id="passwordView" alt="passwordView ">
                    </div>
                </div>
                <div class="">
                    <h4>Confirmation du mot de passe : </h4><br>
                    <div class="border-input">
                        <input class="input_size passwordInput2" type="password" name="mot_de_passe_confirmation" required>
                        <img class="img-3 mr" src="../PICTURE/view.png" id="passwordHide" alt="passwordHide">
                    </div>
                </div>
                <div class="margin-left">
                    <!-- Bouton génération mot de passe -->
                    <div class="center margin_top-3">
                        <button id="genPassBtn" type="button" class="center button_size-2 police" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Génération de mot de passe
                        </button>
                    </div>
                    <button class="button_size police" type="submit">I n s c r i p t i o n</button>
                </div>
            </form>
            <div class="line margin-bottom"></div>
            <div class="margin-left">
                <div class="center">
                    <h4>Tu as déjà un compte ? <a href="connexion.php">Connexion</a> </h4>
                </div>
            </div>

        </div>
    </div>
</div>
<!--Rentrer dans le générateur de mot de passe -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 center" id="exampleModalLabel">Génération de mot de passe</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="center">
                <div class="margin-bottom">
                    <div class="center gap margin-bottom">
                        <h5> Type de mot de passse : </h5>
                        <select class="passModeList input_size_password">
                            <div class="center">
                                <option class="passMode" id="Alpha">Alphabétique</option>
                                <option class="passMode" id="AlphaNum">Alphanumérique</option>
                                <option class="passMode" id="Complet">Complet</option>
                            </div>
                        </select>
                    </div>
                    <div class="gap display-flex">
                        <h5> Taille du mot de passe : </h5>
                        <input class="password-size input_size_password" type="number" id="numberStart" value="8" min="8" max="24" step="1" name="" required>
                    </div>
                    <button id="passwordSettingsBtn" class="button_size police" data-bs-dismiss="modal" type="">Envoyer</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Code JS-->
<script>
    document.getElementById("connexion")?.addEventListener('click',function (){
        window.location='navbar.php'
    })
    const numberstart = document.getElementById("numberStart");
    numberstart.addEventListener('keydown',function (event){
        event.preventDefault();
    })
</script>
<script src="../JS/fichier.js"></script>
<script src="../JS/passwordView.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script
</body>
</html>
