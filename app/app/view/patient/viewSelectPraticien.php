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
                                $p->getId(),$p->getPrenom(),$p->getNom());
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
</body>


