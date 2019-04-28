<?php

/**
 * Como programadores de Global HITSS debemos ser capaces de programar
 * un robot.//chachara
 *  Nuestro robot va a tener una bateria y cada vez que
 * nos movemos vamos a gastar algo de bateria. mover = --bateria
 *  Lo bueno es que somos tan buenos programadores que nuestro robot es un robot
 * cuantico que cada vez que se mueve gasta una cantidad fija
 * de bateria porque el robot hace saltos cuanticos. mover = --bateria(gasto de bateria fija)
 * 
 *  Nuestra tecnologia cuantica gasta MUCHA bateria y cada vez que salta
 * gasta 10 puntos de bateria. movimiento = bateria - 10;
 * 
 *  Lamentablemente nuestra tecnologia para
 * baterias es bastante mala (porque no podemos ser buenos en todo)// chachara
 * 
 * y solo tenemos 100 de bateria. bateria = 100;
 * 
 *  La otra limitacion es que el robot
 * siempre arranca en la posicion (0, 0) inicio de movimiento (0,0)
 * 
 *  que en nuestro caso
 * son las oficinas el punto central del universo. Apartir de ahí
 * se puede mover donde quieran.
 * 
 * Metodos:
 *    - cargar://////////////////////////////////////////////////////////////
 *        Carga al 100% nuestra bateria, osea carga los 100puntos
 *        de bateria
 *    - bateria:////////////////////////////////////////////////////////////////
 *        Nos dice cuantos puntos de bateria tenemos
 *    - posicionX:///////////////////////////////////////////////////////////////
 *        Nos dice en que posicion X del universo estamos. Recuerden
 *        que el universo esta centrado en las oficinas de Global HITSS.
 *    - posicionY:////////////////////////////////////////////////////////////////
 *        Nos dice en que posicion Y del universo estamos.
 *    - mover(x, y):
 *        Hacemos un salto cuantico a las posiciones X e Y del universo
 * 
 */

class Robot {

  private $bateriaRobot;
  private $positionx;
  private $positiony;

  public function cargar() 
  {
    $this->bateriaRobot = 100;
  }

  public function bateria() 
  {
    return $this->bateriaRobot;
  }

  public function posicionX() 
  {
    return $this->positionx;
  }

  public function posicionY() 
  {
    return $this->positiony;
  }

  public function mover($x, $y) 
  {
    if($this->bateriaRobot >= 10)
    {
      if($this->positionx !== $x || $this->positiony !== $y)
    {
      if($this->positionx > $x)
      {
        $diferencia = $this->positionx - $x;
        $this->bateriaRobot = $this->bateriaRobot - ($diferencia * 10);
        $this->positionx = $x;
        $this->positiony = $y;
        return true;
      }
      if($this->positionx < $x)
      {
        $diferencia = $x - $this->positionx;
        $this->bateriaRobot = $this->bateriaRobot - ($diferencia * 10);
        $this->positionx = $x;
        $this->positiony = $y;
        return true;
      }
      if($this->positiony > $y)
      {
        $diferencia = $this->positiony - $y;
        $this->bateriaRobot = $this->bateriaRobot - ($diferencia * 10);
        $this->positiony = $y;
        $this->positionx = $x;
        return true;
      }
      if($this->positiony < $y)
      {
        $diferencia = $y - $this->positiony;
        $this->bateriaRobot = $this->bateriaRobot - ($diferencia * 10);
        $this->positiony = $y;
        $this->positionx = $x;
        return true;
      }
    }
    else {
      return false;
    }
    }
    else {
      return false;
    }
    
  }
}