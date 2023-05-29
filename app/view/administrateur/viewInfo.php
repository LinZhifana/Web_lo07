
<?php 
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
     <?php
        include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      ?> 

    <h3 style="color: red">Liste des spécialités</h3>
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
          foreach ($results_spec as $element) {
           printf("<tr><td>%d</td><td>%s</td></tr>", $element->getId(), 
             $element->getLabel());
          }
          ?>
      </tbody>
    </table>
    

    
     <h3 style="color: red">Liste des administrateurs</h3>
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
          foreach ($results_admi as $element) {
           printf("<tr><td>%d</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%d</td> <td>%d</td></tr>", $element->getId(), 
             $element->getNom(), $element->getPrenom(),$element->getAdresse(),$element->getLogin(),
             $element->getPassword(),$element->getStatut(),$element->getSpecialite_id());
          }
          ?>
      </tbody>
    </table>
     
     <h3 style="color: red">Liste des praticiens</h3>
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
          foreach ($results_praticien as $element) {
           printf("<tr><td>%d</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%d</td> <td>%d</td></tr>", $element->getId(), 
             $element->getNom(), $element->getPrenom(),$element->getAdresse(),$element->getLogin(),
             $element->getPassword(),$element->getStatut(),$element->getSpecialite_id());
          }
          ?>
      </tbody>
    </table>
     
     <h3 style="color: red">Liste des patients</h3>
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
          foreach ($results_patient as $element) {
           printf("<tr><td>%d</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%d</td> <td>%d</td></tr>", $element->getId(), 
             $element->getNom(), $element->getPrenom(),$element->getAdresse(),$element->getLogin(),
             $element->getPassword(),$element->getStatut(),$element->getSpecialite_id());
          }
          ?>
      </tbody>
    </table>
     
     <h3 style="color: red">Liste de tous les rendez-vous</h3>
     <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">id</th>
          <th scope = "col">patient_id</th>
          <th scope = "col">praticient_id</th>
          <th scope = "col">rdv-date</th>
          
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des specialites est dans une variable $results             
          foreach ($results_rendezvous as $element) {
           printf("<tr><td>%d</td> <td>%d</td> <td>%d</td> <td>%s</td> </tr>", $element->getId(), 
             $element->getPatient_id(), $element->getPraticien_id(),$element->getRdv_date());
          }
          ?>
      </tbody>
    </table>
    
    
    <p/>
  </div>

 <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>
    
  <!-- ----- fin viewId -->

