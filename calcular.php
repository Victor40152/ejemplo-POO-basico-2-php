<?php 

if (isset($_POST["btncalcular"])){

    

    require_once 'logica/Salario.php';
    require_once 'logica/Salud.php';
    require_once 'logica/Pension.php';
    require_once 'logica/Caja.php';

    $cantidadHoras = $_POST['txthorastrabajadas'];
    $valorhora = $_POST['txtcostohoratrabajado'];

    $objSalario = new Salario( $cantidadHoras, $valorhora);
    $objSalud = new Salud($cantidadHoras, $valorhora);
    $objPension = new Pension($cantidadHoras, $valorhora);
    $objCaja = new Caja($cantidadHoras, $valorhora);

    echo "<b>El salario Bruto es :<br>" . $objSalario->calcularSalarioBruto() . "<br>";

    if ($objSalario->calcularSalarioBruto()<=1000000){
 
        echo "<b>El descuento de salud es :<br>".$objSalud->calcularSalud(0.02)."<br>";
        echo "<br>El descuento de Pension es :<br>".$objPension->calcularPension(0.04)."<br>";

       $incremento= $objSalario->calcularSalarioBruto()*0.03;
       echo "<b> Incremento : <br> ".$incremento."<br>";
 $salariofinal=($objSalario->calcularSalarioBruto()+$incremento)-$objSalud->calcularSalud(0.02)-$objPension->calcularPension(0.04);
       echo "<b> Salario a pagar:<br>".$salariofinal;
    }else if ($objSalario->calcularSalarioBruto()<=2000000){
       
        echo "<b>El descuento de salud es :<br>".$objSalud->calcularSalud(0.04)."<br>";
      
        echo "<b>El descuento de Pension es :<br>".$objPension->calcularPension(0.06)."<br>";
        echo "<b>Descuento de Caja de compensación es :<br>".$objCaja->calcularCaja(0.02)."<br>";

     $salariofinal=$objSalario->calcularSalarioBruto()-$objSalud->calcularSalud(0.04)-$objPension->calcularPension(0.06)-$objCaja->calcularCaja(0.02);
       echo "<b> Salario a pagar:<br>".$salariofinal;

    }else if ($objSalario->calcularSalarioBruto()>2000000){
   
        echo "<b>El descuento de salud es :<br>".$objSalud->calcularSalud(0.05)."<br>";
     
        echo "<b>El descuento de Pension es :<br>".$objPension->calcularPension(0.07)."<br>";

        echo "<b>Descuento de Caja de compensación es :<br>".$objCaja->calcularCaja(0.03)."<br>";

     $salariofinal=$objSalario->calcularSalarioBruto()-$objSalud->calcularSalud(0.05)-$objPension->calcularPension(0.07)-$objCaja->calcularCaja(0.03);
       echo "<b> Salario a pagar:<br>".$salariofinal;

    }

}else{
    echo "Estas hackiando";
}
?>