<?php

require_once 'BilleteraInterface.php';

class BilleteraEnPesos implements BilleteraInterface
{
    private $cantidad;

    public function mostrar()
    {
        if(isset($this->cantidad))
        {
            $total;
            foreach($this->cantidad as $key => $value)
            {
                $total[] = $key * $value; 
            }
            return array_sum($total);
        }else{
            return false;
        }
       
    }

    public function agregar($billete, $cantidad)
    {
        $this->cantidad[$billete] = $cantidad;
        return true;
    }

    public function sacar($billete, $cantidad)
    {
        foreach($this->cantidad as $key => $value)
        {
            if($billete !== $key){
            }
            elseif($billete === $key)
            {
                if($value >= 0)
                {
                    $this->cantidad[$key] -= $cantidad;
                    return true;
                }
                else {
                    return false;
                }
            }else{
                return false;
            }
        }
        return false;
    }
}