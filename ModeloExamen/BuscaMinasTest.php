<?php 

require_once './vendor/autoload.php';
require_once 'CasiBuscaMinas.php';

use PHPUnit\Framework\TestCase;

final class BuscaMinasTest extends TestCase
{
    public function setUp($x = 5, $y = 5 ):void
    {
        $this->buscaMinas = new BuscaMinas($x,$y);
    }

    public function testClassExists()
    {
        $this->assertTrue(class_exists('BuscaMinas'));
    }

    public function testAgregarMina()
    {
        $this->assertTrue($this->buscaMinas->agregarMina(2,2));
        $this->assertFalse($this->buscaMinas->agregarMina(15,15));
        $this->assertFalse($this->buscaMinas->agregarMina(7,7));
        $this->assertTrue($this->buscaMinas->agregarMina(3,3));
    }

    public function testAgregarYPerder()
    {
        $this->assertTrue($this->buscaMinas->agregarMina(1,1));
        $this->assertTrue($this->buscaMinas->agregarMina(3,3));
        $this->assertTrue($this->buscaMinas->agregarMina(2,2));
        $this->assertFalse($this->buscaMinas->agregarMina(5,4));
        $this->assertFalse($this->buscaMinas->agregarMina(5,5));
        $this->assertFalse($this->buscaMinas->jugar(1,1));
        $this->assertFalse($this->buscaMinas->jugar(3,3));
        $this->assertFalse($this->buscaMinas->jugar(2,2));
        $this->assertFalse($this->buscaMinas->gano());
    }

    public function testAgregarYGanar()
    {
        $this->buscaMinas->agregarMina(1,1);
        $this->assertTrue($this->buscaMinas->sacarMina(1,1));
        $this->assertTrue($this->buscaMinas->gano());
    }

    public function testTermino()
    {
        $this->buscaMinas->agregarMina(1,1);
        $this->assertFalse($this->buscaMinas->terminoDeJugar());
        $this->assertTrue($this->buscaMinas->sacarMina(1,1));
        $this->assertTrue($this->buscaMinas->gano());
        $this->assertTrue($this->buscaMinas->terminoDeJugar());
    }

    public function testSacarMinasQueNoExisten()
    {
        $this->buscaMinas->agregarMina(1,1);
        $this->assertTrue($this->buscaMinas->sacarMina(1,1));
        $this->assertFalse($this->buscaMinas->sacarMina(1,1));
    }

    public function testAgregarMinaAlMismoCasillero()
    {
        $this->assertTrue($this->buscaMinas->agregarMina(1,1));
        $this->assertFalse($this->buscaMinas->agregarMina(1,1));
        $this->assertFalse($this->buscaMinas->agregarMina(1,1));
        $this->assertFalse($this->buscaMinas->agregarMina(1,1));
    }

    public function testAgregarFueraDelTablero()
    {
        $this->assertFalse($this->buscaMinas->agregarMina(5,5));
        $this->assertFalse($this->buscaMinas->agregarMina(8,8));
    }

    public function testCrearTableroGigante()
    {
        $this->setUp(10000, 1000);
        $this->assertTrue(class_exists('BuscaMinas'));
    }

    public function testJugarEnTableroGigante()
    {//para commit
        $this->setUp(10000, 10000);
        $this->assertTrue($this->buscaMinas->agregarMina(9999,9999));
    }
}