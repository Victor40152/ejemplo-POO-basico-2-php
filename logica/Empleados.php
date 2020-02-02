<?php 

class Empleados {

    private $cantidadHoras;
    private $valorhora;

    public function __construct(){
        $parametros = func_get_args();
        $numero_parametros = func_num_args();
        $funcion_constructor='__construct'.$numero_parametros;
        
        if(method_exists($this,$funcion_constructor)){
            call_user_func_array(array($this,$funcion_constructor),$parametros);

        }

    }
    public function __construct0(){
        $this ->cantidadHoras =0;
        $this ->valorhora=0;

    }
    public function __construct1($valor){
        $this ->cantidadHoras =0;
        $this ->valorhora=0;

    }
    public function __construct2($ch, $vh){
        $this ->cantidadHoras =$ch;
        $this ->valorhora=$vh;

    }



public function setCantidadHoras($valor){

    $this->cantidadHoras=$valor;
}

protected function getCantidadHoras(){

    return $this->cantidadHoras;
}

public function setValorhora($valor){

    $this->valorhora=$valor;
}
protected function getValorhora(){

    return $this->valorhora;
}

}




?>