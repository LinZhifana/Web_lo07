<!DOCTYPE html>
 <?php
 require_once '../controller/ControllerSite.php';
 ?>

<nav class="navbar navbar-expand-lg bg-success fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="router1.php?action=viewDoctolibAccueil">Zihang-Zhifan
            <!--类型-->
            <?php
                if(isset($results)){
                    printf("|%s|", $results->getStatusString());
                    printf("%s %s|", $results->getPrenom(), $results->getNom());
                }
            ?>
            <!--姓名-->
           </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <!--每类人的下拉栏-->
                <?php
                if(isset($results)){
                    ControllerSite::menuItem($results);
                }
                    
                ?>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Innovations</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="router1.php?action=vinReadAll">Liste des vins</a></li>
                        <li><a class="dropdown-item" href="router1.php?action=vinReadId">Sélection d'un vin par son id</a></li>
                        <li><a class="dropdown-item" href="router1.php?action=vinCreate">Insertion d'un vin</a></li> 
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Se connecter</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="router1.php?action=login">Login</a></li>
                        <li><a class="dropdown-item" href="router1.php?action=vinReadId">s'inscrire</a></li>
                        <li><a class="dropdown-item" href="router1.php?action=vinCreate">deconnection</a></li> 
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>