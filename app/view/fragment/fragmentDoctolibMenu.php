<nav class="navbar navbar-expand-lg bg-success fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="router.php?action=doctolibAccueil">Zihang-Zhifan
            <?php
                if(isset($personne)){                    
                    printf("|%s|", $personne->getStatutString());
                    printf("%s %s|", $personne->getPrenom(), $personne->getNom());
                }
            ?>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!--每类人的下拉栏-->
                <?php
                if(isset($personne)){
                    ControllerDoctolib::menuItem($personne);
                }
                ?>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Innovations</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="router.php?action=innvo1">Proposez une utilisation originale et innovante des données contenues dans la base</a></li>
                        <li><a class="dropdown-item" href="router.php?action=innvo2">Proposez une amélioration du code MVC proposé en cours</a></li>
                        
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Se connecter</a>
                    <ul class="dropdown-menu">
                        <?php
                            if(!isset($personne)){
                                echo "<li><a class=\"dropdown-item\" href=\"router.php?action=login\">Login</a></li>";
                            }
                        ?>
                        <li><a class="dropdown-item" href="router.php?action=specReadLabel">s'inscrire</a></li>
                        <li><a class="dropdown-item" href="router.php?action=logout">deconnection</a></li> 
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>