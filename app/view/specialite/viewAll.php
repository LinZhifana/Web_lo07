<?php
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>


<body>
  <div class="container">
      <?php
        include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      ?> 
    <h3 style="color: red">Liste des spécialités</h3>
    (générique)<br/>
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">id</th>
          <th scope = "col">label</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des specialites est dans une variable $results             
          foreach ($results as $element) {
           printf("<tr><td>%d</td><td>%s</td></tr>", $element->getId(), 
             $element->getLabel());
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>


