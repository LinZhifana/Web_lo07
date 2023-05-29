
<?php 
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
     <?php
        include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      ?> 

      <h3 style="color: red">Sélection d’une spécialité par son id</h3>
      
    <form role="form" method='get' action='router.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='specReadOne'>
        <label for="id">id : </label> <select class="form-control" id='id' name='id' style="width: 100px">
            <?php
            foreach ($results as $id) {
             echo ("<option>$id</option>");
            }
            ?>
        </select>
      </div>
      <p/><br/>
      <button class="btn btn-primary" type="submit">Submit form</button>
    </form>
    <p/>
  </div>

 <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>
    
  <!-- ----- fin viewId -->