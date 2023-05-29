<?php
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
      <?php
       include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      ?>

    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">nom</th>
          <th scope = "col">prenom</th>
          <th scope = "col">Nombre de praticiens</th>        
          
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des vins est dans une variable $results             
            while ($row = $statement->fetch()) {
            echo ("<tr>");
            echo ("<td> $row[0]</td>");
            echo ("<td> $row[1]</td>");
            echo ("<td> $row[2]</td>");
            echo ("</tr>");
        }
          ?>
      </tbody>
    </table>
  </div>
 <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

  <!-- ----- fin viewAll -->



