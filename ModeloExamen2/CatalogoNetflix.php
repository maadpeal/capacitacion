<?php

/**
 * Las funcionalidades que nos piden son:
 *  - Agregar peliculas nuevas
 *  - Agregar series nuevas
 *  - Poder sacar peliculas
 *  - Poder sacar series
 *  - Listar por categoria
 *  - Una funcion que te dice si existe el id de pelicula/serie
 * 
 * Las categorias se van a ir creando a medida que se agregan
 * peliculas o series,
 * 
 *  entonces si se agrega una serie con la
 * categoria "ciencia misteriosa" esta categoría empieza a
 * existir en ese momento.
 */

class CatalogoNetflix {
  /**
   * Esta funcion solo nos dice si existe la pelicula o serie con
   * el id que nos pasan
   */

   private $peliculas;
   private $series;
   private $categorias = [];
   
  public function existeId($id) 
  {
    if((isset($this->peliculas[$id] ) || (isset($this->series[$id]))))
    {
      return true;
    }
    else {
      return false;
    }
  }

  public function agregarSerie($id, $nombre, $cantidadCapitulos, $categoria) 
  {
    if(!isset($this->series[$id]))
    {
      $this->series[$id] = array($nombre, $cantidadCapitulos, $categoria);
      return true;
    }
    else {
      return false;
    }
  }

  public function agrearPelicula($id, $nombre, $tiempo, $categoria) 
  {
    if(!isset($this->peliculas[$id]))
    {
      $this->peliculas[$id] = array($nombre, $tiempo, $categoria);
      return true;
    }
    else {
      return false;
    }
    
  }

  public function sacarSerie($id) 
  {
    if(isset($this->series[$id]))
    {
      unset($this->series[$id]);
      return true;
    }
    else {
      return false;
    }
  }

  public function sacarPelicula($id) 
  {
    if(isset($this->peliculas[$id]))
    {
      unset($this->peliculas[$id]);
      return true;
    }
    else {
      return false;
    }
  }

  public function listarContenidoDeLaCategoria($categoria) 
  {
    $this->categorias = [];
    foreach($this->peliculas as $key => $value)
    {
      if($value[2] === $categoria)
      {
        $this->categorias[] = $value[2];
      }
    }

    foreach($this->series as $key => $value)
    {
      if($value[2] === $categoria)
      {
        $this->categorias[] = $value[2];
      }
    }
    return $this->categorias;
  }

}