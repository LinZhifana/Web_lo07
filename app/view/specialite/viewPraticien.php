<?php
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      $cols = $results[0];
      $datas = $results[1];
      ?>

      <h3 style="color: red">Liste des praticiens (générique)</h3>
    <table class = "table table-striped table-bordered">
        <thead>
            <tr>
          <?php
        
            for ($i = 0; $i < 5; $i++) {
                echo("<td><strong>$cols[$i]</strong></td>");
            }
          ?>
          </tr>
        </thead>
      <tbody>
          <?php
          // La liste des vins est dans une variable $results             
          foreach ($datas as $element) {
                    echo('<tr>');
                    for ($i = 0; $i < 5; $i++) {
                        echo("<td>$element[$i]</td>");
                    }
                    echo('</tr>');
                }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

  <!-- ----- fin viewAll -->
  

