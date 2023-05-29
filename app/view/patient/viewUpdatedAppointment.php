<?php
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
        include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
        ?> 
        <h3 style="color: red">Sélection d'un praticien</h3>
        <form role="form" method='get' action='router.php'>
            <div class="form-group">
                <!--这里跳转对应医生的有空时间-->
                <input type="hidden" name='action' value='selectAppointment'>        
                <label>ID:</label> <br/>
                <select id="praticien" name="praticien">
                    <?php
                    foreach ($praticiens as $p) {
                        printf("<option value=\"%s\">%s %s</option>",
                                $p->getId(), $p->getPrenom(), $p->getNom());
                    }
                    ?>
                </select>                
            </div>
            <p/>
            <br/> 
            <button class="btn btn-primary" type="submit">Go</button>
        </form>
        <p/>
    </div>
    <div class="container">
        <table class = "table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope = "col">nom</th>
                    <th scope = "col">prenom</th>
                    <th scope = "col">rdv_date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // La liste des rdvs  
                if (!empty($rdvs)) {
                    foreach ($rdvs as $element) {
                        printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>",
                                $element['nom'], $element['prenom'], $element['rdv_date']);
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>


