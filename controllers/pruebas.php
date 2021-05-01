<?php
require ("C_Expediente.php");

$obj = new validar;
$dato = $obj->val_nit("1234567P");
echo "dato: ".$dato;
?>