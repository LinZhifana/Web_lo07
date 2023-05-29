<?php
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
        ?> 
        <h3 style="color: red">Liste de mes disponibilités</h3>
        <table class = "table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope = "col">date</th>
                    <th scope = "col">time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($rdvs)) {
                    // La liste des disponibilités             
                    foreach ($rdvs as $element) {
                        printf("<tr><td>%s</td><td>%s</td></tr>",
                                $element->getDate(), $element->getHour());
                    }
                }
                ?>
            </tbody>
        </table>
        <p/>
    </div>
</body>

