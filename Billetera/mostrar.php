<?php 


class MostrarTotales
{
    public function mostrarEstadistica($billetes, $billetesSacados)
    {
            if(isset($billetes))
            {
                $totalIngresados;
                foreach($billetes as $key => $value)
                {
                    echo 'Ingresados '.$key . ' = ' . $value . "\n";
                    $totalIngresados[] = $key * $value;
                }
            }
            if(isset($billetesSacados))
            {
                $total;
                foreach($billetesSacados as $key => $value)
                {
                    echo 'Billetes sacados '.$key . ' = ' . $value . "\n";
                    $total[] = $key * $value;
                }
                return "\n".'El monto sacado fue ' . array_sum($total) . "\n" .
                     'El monto ingresado fue ' . array_sum($totalIngresados) . "\n";
            }
    }
}