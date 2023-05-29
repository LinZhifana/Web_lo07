<?php 
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
   <?php
        include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      ?> 
      
      <h3 style="color: red">Formulaire d'inscription</h3>
    <form role="form" method='get' action='router.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='personneCreated'>        
        <label class='w-25' for="nom">nom : </label><input type="text" name='nom' size='75' value=''><br/>
        <label class='w-25' for="prenom">prenom : </label><input type="text" name='prenom' size='75' value=''><br/>                         
        <label class='w-25' for="adress">adress : </label><input type="text" name='adress' size='75' value=''><br/>
        <label class='w-25' for="login">login : </label><input type="text" name='login' value=''><br/> 
        <label class='w-25' for="password">password : </label><input type="password" name='password' value=''><br/>  
        

        <label class='w-25' for="statut">Votre statut : </label><br/>
        <select name = "statut" id="statut" class="form-select" aria-label="Default select example">
        <option selected>select votre statut</option>
        <option value="0">Administrateur</option>
        <option value="1">Praticien</option>
        <option value="2">Patients</option>        
        </select>
       
        <label class='w-25' for="specialite_id">Votre specialité si vous etes praticien : </label><br/>
        <select name = "specialite_id" id ="specialite_id" class="form-select" aria-label="Default select example">
        <option selected>select votre spécialité</option>
        
        <?php
        $element = $results;
        for($i=0;$i<count($element);$i++){
             echo ("<option value='$i'>$element[$i]</option>");
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
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

<!-- ----- fin viewInsert -->
