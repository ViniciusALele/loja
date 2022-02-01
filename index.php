<?php
require 'conexao.php';
$query = mysqli_query($conn,"SELECT * FROM estoque");
?>

<form action="funcoes.php" method="post">
    Produto: <select name="produto">
                <option>Selecione uma opção...</option>
                <?php while($prod = mysqli_fetch_array($query)) {
                    if($prod['quantidade'] <= 0)
                        echo'<option value="'.$prod['id'].'" disabled="disabled"><s>'.$prod['produto'].'</s></option>';
                    else
                        echo '<option value="'.$prod['id'].'">'.$prod['produto'].'</option>';
                }?>
             </select></p>
    Quantidade: <input type="text" name="quantidade" maxlength="4" onkeypress='validate(event)' size ="4"></p>
<button type="submit">Comprar</button>
</form>

<script>
    function validate(evt) {
        var theEvent = evt || window.event;

        // Handle paste
        if (theEvent.type === 'paste') {
            key = event.clipboardData.getData('text/plain');
        } else {
        // Handle key press
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode(key);
        }
        var regex = /[0-9]|\./;
        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
    }
</script>