<?php
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
        ?> 
        <h3 style="color: red">Liste de mes patients sans doublon</h3>
        <table class = "table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope = "col">prenom</th>
                    <th scope = "col">nom</th>
                    <th scope = "col">adresse</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($patients)) {
                    // La liste des patients  
                    foreach ($patients as $element) {
                        printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>",
                                $element['prenom'], $element['nom'], $element['adresse']);
                    }
                }
                ?>
            </tbody>
        </table>
        <p/>
    </div>
</body>

