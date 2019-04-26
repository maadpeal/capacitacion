<?php

interface BilleteraInterface
{
    public function agregar($billete, $cantidad);
    public function sacar($billete, $cantidad);
    public function mostrar();
}