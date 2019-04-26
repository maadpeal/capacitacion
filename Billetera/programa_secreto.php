<?php

function programa_secreto(BilleteraInterface $b) {
  $b->agregar(50, 1);
  $b->agregar(50, 1);
  $b->agregar(50, 11);
  $b->agregar(50, 2);
  $b->agregar(500, 11);
  $b->agregar(50, 1);
  $b->sacar(50, 10);
  $b->agregar(10, 1);
  $b->agregar(10, 1);
  $b->agregar(10, 11);
  $b->agregar(10, 2);
  $b->agregar(100, 11);
  $b->agregar(10, 1);
  $b->sacar(10, 10);
  $b->sacar(50, 10);
  $b->agregar(20, 1);
  $b->agregar(20, 1);
  $b->agregar(20, 11);
  $b->agregar(20, 2);
  $b->agregar(200, 11);
  $b->agregar(20, 1);
  $b->sacar(20, 10);
  return $b;
}