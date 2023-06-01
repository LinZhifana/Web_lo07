<?php
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
        ?> 
        <h3 style="color: red">Liste de mes rendez-vous avec le nom des patients</h3>
        <table class = "table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope = "col">prenom</th>
                    <th scope = "col">nom</th>
                    <th scope = "col">rdv_date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // La liste des rdvs  
                if (!empty($rdvs)) {
                    foreach ($rdvs as $element) {
                        printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>",
                                $element['prenom'], $element['nom'], $element['rdv_date']);
                    }
                }
                ?>
            </tbody>
        </table>
        <p/>
    </div>
</body>

