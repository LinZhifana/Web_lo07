<!-- ----- début viewInserted -->
<?php
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
    ?>
    <!-- ===================================================== -->
   <h3 style="color: red">Liste des personnes</h3>
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">id</th>
          <th scope = "col">nom</th>
          <th scope = "col">prenom</th>
          <th scope = "col">adress</th>
          <th scope = "col">login</th>
          <th scope = "col">password</th>
          <th scope = "col">statut</th>
          <th scope = "col">specialite_id</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des specialites est dans une variable $results             
          foreach ($results as $element) {
           printf("<tr> <td>%d</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%d</td> <td>%d</td> </tr>", 
                $element->getId(), 
                $element->getNom(),
                $element->getPrenom(),
                $element->getAdresse(),
                $element->getLogin(),
                $element->getPassword(),
                $element->getStatut(),
                $element->getSpecialite_id()
                   );
          }
          ?>
      </tbody>
    </table>
    <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>
    <!-- ----- fin viewInserted -->    

    
    
