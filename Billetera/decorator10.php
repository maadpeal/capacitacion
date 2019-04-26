<?php 

require_once 'BilleteraEnPesos.php';

class Decorator10 implements BilleteraInterface
{
    private $decorator;
    private $billetes;
    private $billetesSacados;
    private $mostrar;

    public function __construct($decorator, $mostrar)
    {
        $this->decorator = $decorator;
        $this->mostrar = $mostrar;
    }

    public function mostrar()
    {
        return $this->decorator->mostrar();
    }

    public function agregar($billete, $cantidad)
    {
        if($billete === 10)
        {
            if(isset($this->billetes[$billete]))
            {
                $this->billetes[$billete] += $cantidad;
                $this->decorator->agregar($billete, $cantidad);
                return true;
            }
            else{
                $this->billetes[$billete] = $cantidad;
                $this->decorator->agregar($billete, $cantidad);
                return true;
            }
        }
        else {
            return $this->decorator->agregar($billete, $cantidad);
        }       
    }

    public function sacar($billete, $cantidad)
    {   
        if($billete === 10)
        {
            if($this->decorator->sacar($billete, $cantidad))
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
        }
        else {
            return $this->decorator->sacar($billete, $cantidad);
        }
    }

    public function mostrarEstadistica($monto)
    {
        if($monto === 10)
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
            $this->decorator->mostrarEstadistica($monto);
        }
        
    }
}