<?php
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/menu/menu.php';
        include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
        ?> 
        <h3 style="color: red">Formulaire de connecxion </h3>
        <form role="form" method='get' action='router.php'>
            <div class="form-group">
                <!--这里的logged是函数名-->
                <input type="hidden" name='action' value='logged'>           
                <label class='w-25' for="login">login : </label><input type="text" name='login' > <br/>                          
                <label class='w-25' for="password">password : </label><input type="password" name='password'> <br/> 
            </div>
            <p/>
            <br/> 
            <button class="btn btn-primary" type="submit">Go</button>
        </form>
        <p/>
    </div>
</body>
