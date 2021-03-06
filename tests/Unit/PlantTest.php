<?php

namespace Tests\Unit;
use App\Plant;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PlantTest extends TestCase
{


    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();
      
    }

    private function makeTestPlant() {
     

        $plant = new Plant();
        $plant->commonName = 'test';
        $plant->division = 'test';
        $plant->class = 'test';
        $plant->order = 'test';
        $plant->family = 'test';
        $plant->genus = 'test';
        $plant->species = 'test';
        $plant->variety = 'test';
        return $plant;
    }


    public function testCreatePlant() {
   
        $plant = $this->makeTestPlant();
        $this->assertInstanceOf(Plant::class, $plant);
        $this->assertTrue($plant->save());
        $plant->delete();
    }

    public function testReadPlant() {

        $plant = $this->makeTestPlant();
        $plant->save();
        $this->assertNotNull(Plant::find(1));
        $plant->delete();
    }

    public function testUpdatePlant() {

        $plant = $this->makeTestPlant();
        $plant->save();
        $plant->commonName = 'jeremy';
        $plant->save();
        $this->assertEquals(Plant::find(1)['commonName'], 'jeremy');
        $plant->delete();

    }

    public function testDeletePlant() {

        $plant = $this->makeTestPlant();
        $plant->save();
        $this->assertTrue($plant->delete());

    }
}
