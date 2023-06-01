
 
<?php 
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
   <?php
        include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      ?> 
      
      <h3 style="color: red">Création d'une nouvelle spécialité</h3>
    <form role="form" method='get' action='router.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='specCreated'>        
        <label class='w-25' for="label">label : </label><br/>
        <input type="text" name='label' size='75' value='Dermatologue'>                         
      </div>
      <p/>
       <br/> 
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

<!-- ----- fin viewInsert -->



