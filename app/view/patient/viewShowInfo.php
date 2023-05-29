<?php
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
        ?> 
        <h3 style="color: red">Informations de mon compte</h3>
        <table class = "table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope = "col">id</th>
                    <th scope = "col">nom</th>
                    <th scope = "col">prenom</th>
                    <th scope = "col">adresse</th>
                    <th scope = "col">login</th>
                    <th scope = "col">password</th>
                    <th scope = "col">statut</th>
                    <th scope = "col">spécialite</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // La liste des rdvs  
                printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td>"
                        . "<td>%s</td><td>%s</td><td>%s</td></tr>",
                        $personne->getId(), $personne->getNom(),
                        $personne->getPrenom(), $personne->getAdresse(),
                        $personne->getLogin(), $personne->getPassword(),
                        $personne->getStatut(), $personne->getSpecialite_id());
                ?>
            </tbody>
        </table>
        <p/>
    </div>
</body>



