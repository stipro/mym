<?php
$login = '0';
if($login == '0'){
    echo 'esta vacio';
    header("Location: ./main.php");
}
else{
    echo 'No esta vacio';
}
?>