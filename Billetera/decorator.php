<?php 

require_once 'BilleteraEnPesos.php';

class Decorator implements BilleteraInterface
{
    private $billetera;
    private $billetes;
    private $billetesSacados;
    private $mostrar;

    public function __construct($billetera, $mostrar)
    {
        $this->billetera = $billetera;
        $this->mostrar = $mostrar;
    }

    public function mostrar()
    {
        return $this->billetera->mostrar();
    }

    public function agregar($billete, $cantidad)
    {
        if(isset($this->billetes[$billete]))
        {
            $this->billetes[$billete] += $cantidad;
            $this->billetera->agregar($billete, $cantidad);
        }
        else{
            $this->billetes[$billete] = $cantidad;
            $this->billetera->agregar($billete, $cantidad);
        }
            
    }

    public function sacar($billete, $cantidad)
    {   
            if($this->billetera->sacar($billete, $cantidad))
            {
                if(isset($this->billetesSacados[$billete]))
                {
                    $this->billetesSacados[$billete] += $cantidad;
                    return true;
                }
                else{
                    $this->billetesSacados[$billete] = $cantidad;
                    return true;
                }
             }
             else{
                 return false;
             }
    }

    public function mostrarEstadistica($monto)
    {
        if($monto === 'all')
        {
            echo $this->mostrar->mostrarEstadistica($this->billetes, $this->billetesSacados);
            /*
            if(isset($this->billetes))
            {
                $totalIngresados;
                foreach($this->billetes as $key => $value)
                {
                    echo 'Ingresados '.$key . '=' . $value . "\n";
                    $totalIngresados[] = $key * $value;
                }
                echo 'El monto ingresado fue ' . array_sum($totalIngresados) . "\n";
            }
            if(isset($this->billetesSacados))
            {
                $total;
                foreach($this->billetesSacados as $key => $value)
                {
                    echo 'Billetes sacados '.$key . '=' . $value . "\n";
                    $total[] = $key * $value;
                }
                echo 'El monto sacado fue ' . array_sum($total) . "\n";
            }*/
        }
        else {
            echo 'el valor no fue ingresado';
        }
      
    }
}