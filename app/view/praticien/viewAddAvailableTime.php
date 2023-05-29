<?php
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>
<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
        ?> 
        <h3 style="color: red">Ajout de nouvelles disponibilités</h3>
        <form role="form" method='get' action='router.php'>
            <div class="form-group">    
                <input type="hidden" name='action' value='addedAvailableTime'> 
                <label for="date">RDV_date</label> <br/>
                <input type="date" id="date" name="date"> <br/>    
                <label>RDV_nombre</label> <br/>
                <input type="number" id="number" name="number"> <br/>
            </div>
            <p/>
            <br/> 
            <button class="btn btn-primary" type="submit">Go</button>
        </form>
        <script>
            var dateInput = document.getElementById('date');
            // 禁止选择的日期数组
            var disabledDates = <?php echo json_encode($dates) ?>;
            dateInput.addEventListener('change', function () {
                let selectedDate = this.value;
                if (disabledDates.includes(selectedDate)) {
                    alert('Cette date ne peut pas être sélectionnée！');
                    this.value = '';
                }
            });
            
            var numInput = document.getElementById('number');
            numInput.addEventListener('change', function () {
                 let num = this.value;
                 if(num <= 0 || num > 9){
                    alert('Veuillez entrer un nombre > 0 et < 9 !');
                    this.value = '';
                 }
             });
        </script>
        <p/>
    </div>
</body>


