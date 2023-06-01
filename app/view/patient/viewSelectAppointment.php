<?php
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
        include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
        ?> 
        <h3 style="color: red">Sélection d'un rdv</h3>
        <form role="form" method='get' action='router.php'>
            <div class="form-group">
                <input type="hidden" name='action' value='updateRDV'> 
                <label>DATE:</label> <br/>
                <select id="rdv" name="rdv">
                    <?php       
                    if(!empty($rdvs)){
                        foreach ($rdvs as $rdv) {
                        printf("<option value=\"%s\">%s</option>",
                                $rdv->getId(),$rdv->getRdv_date());
                        }
                    }

                    ?>
                </select>                
            </div>
            <p/>
            <br/> 
            <?php 
            if(empty($rdvs)) {
                echo "<button class=\"btn btn-primary\" type=\"submit\" disabled >Go</button>";
            }
            else {
                echo "<button class=\"btn btn-primary\" type=\"submit\">Go</button>";
            }
            ?>
        </form>
        <p/>
    </div>
</body>

