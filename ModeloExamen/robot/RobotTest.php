<?php
/**
 * 
 * Tareas:
 *  - Bajar composer
 *  - Instalar phpunit
 *  - Revisar los tests
 *  - Leer la explicación de la clase Robot en Robot.php
 *  - Que pasen los tests
 *  - Conquistar el mundo
 *  - Aprobar el curso!
 * 
 */
include './vendor/autoload.php';
include 'Robot.php';

use PHPUnit\Framework\TestCase;

final class RobotTest extends TestCase
{

  public function testRobotArrancaConBateriaVacia() {
    $robot = new Robot();
    $this->assertEquals(0, $robot->bateria());
  }

  public function testPuedoCargarElRobot() {
    $robot = new Robot();
    $robot->cargar();
    $this->assertEquals(100, $robot->bateria());
  }

  public function testRobotArrancaEnLaPosicionCeroCero() {
    $robot = new Robot();
    $this->assertEquals(0, $robot->posicionX());
    $this->assertEquals(0, $robot->posicionY());
  }

  public function testRobotNoSePuedeMoverSiNoEstaCargado() {
    $robot = new Robot();
    $this->assertEquals(0, $robot->bateria());
    $this->assertFalse($robot->mover(10,10));
    $this->assertEquals(0, $robot->posicionX());
    $this->assertEquals(0, $robot->posicionY());
  }

  public function testRobotSePuedeMover() {
    $robot = new Robot();
    $robot->cargar();
    $this->assertTrue($robot->mover(10, 10));
    $this->assertEquals(10, $robot->posicionX());
    $this->assertEquals(10, $robot->posicionY());
  }

  public function testMoverMeResta10DeBateria() {
    $robot = new Robot();
    $robot->cargar();

    $this->assertTrue($robot->mover(1, 1));
    $this->assertEquals(90, $robot->bateria());
    $this->assertTrue($robot->mover(2, 2));
    $this->assertEquals(80, $robot->bateria());
    $this->assertTrue($robot->mover(1, 1));
    $this->assertEquals(70, $robot->bateria());
    $this->assertTrue($robot->mover(2, 2));
    $this->assertEquals(60, $robot->bateria());

    $this->assertTrue($robot->mover(1, 1));
    $this->assertEquals(50, $robot->bateria());
    $this->assertTrue($robot->mover(2, 2));
    $this->assertEquals(40, $robot->bateria());

    $this->assertTrue($robot->mover(1, 1));
    $this->assertEquals(30, $robot->bateria());
    $this->assertTrue($robot->mover(2, 2));
    $this->assertEquals(20, $robot->bateria());

    $this->assertTrue($robot->mover(1, 1));
    $this->assertEquals(10, $robot->bateria());
    $this->assertTrue($robot->mover(2, 2));
    $this->assertEquals(0, $robot->bateria());

    $this->assertFalse($robot->mover(5,5));
    $this->assertEquals(2, $robot->posicionX());
    $this->assertEquals(2, $robot->posicionY());
  }

  public function testPuedoCargarBaterioDespuesDeMoverme() {
    $robot = new Robot();
    $robot->cargar();

    $this->assertTrue($robot->mover(1,1));
    $this->assertEquals(90, $robot->bateria());

    $robot->cargar();
    $this->assertEquals(100, $robot->bateria());
  }

}