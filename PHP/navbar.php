<!DOCTYPE html>
<html lang="fr">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <meta charset="UTF-8">
    <link href="../CSS/navbar.css" rel="stylesheet">
    <link rel="icon" href="../PICTURE/Archeo-IT_Logo-removebg-preview.png">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary ">
        <div class="container-fluid">
            <div class="center-img gap" id="home">
                    <img class="img" src="../PICTURE/Archeo-IT_Logo-removebg-preview.png">
                <div class="navbar-brand">
                    Archéo-IT
                </div>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link ml" href="ourDiscoveries.php">Nos Découvertes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                </ul>
                <!-- Boutons alignés à droite -->
                <ul class="navbar-nav ms-auto gap">
                    <?php if(!empty($_SESSION['user']['admin'])): ?>
                    <li class="nav-item ">
                        <a class="btn-outline-primary  mx-2 gap" href="create_page.php">Création</a>
                    </li>
                    <?php endif; ?>
                    <?php if(empty($_SESSION['user'])): ?>
                    <li class="nav-item">
                        <a class="btn-outline-primary mx-2 gap" href="registration.php">Inscription</a>
                    </li>
                     <li class="nav-item">
                        <a class="btn-primary" href="connexion.php">Connexion</a>
                    </li>
                    <?php endif; ?>
                    <?php if(!empty($_SESSION['user'])): ?>
                    <li class="nav-item " id="disconnect">
                        <a  class="btn-primary ">Déconnexion</a>
                    </li>

                    <?php endif; ?>

                </ul>
            </div>
        </div>
    </nav>

</header>
<script>
    document.getElementById("home").addEventListener('click',function (){
        window.location='home.php'

    })
    document.getElementById("disconnect")?.addEventListener('click',function (){
        window.location='logout.php'

    })
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script

</body>