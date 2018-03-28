<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\patrimony;

class patrimonyTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testPatrimonyCreate(){



    	$patrimony = new Patrimony();
    	$patrimony->name = 'cadeira';
    	$patrimony->category = 'cadeira';
    	$patrimony->model = 'm32';
    	$patrimony->description = 'cadeira azul, sem rodas';
    	$patrimony->image = 'image.jpg';
    	$patrimony->location = 'F3';


        $this->assertTrue($patrimony->name === 'cadeira');
        $this->assertTrue($patrimony->category === 'cadeira');
        $this->assertTrue($patrimony->model === 'm32');
        $this->assertTrue($patrimony->description === 'cadeira azul, sem rodas');
        $this->assertTrue($patrimony->image === 'image.jpg');
        $this->assertTrue($patrimony->location === 'F3');
    }





    public function testPatrimonyAdd(){



    	$patrimony = new Patrimony();
    	$patrimony->name = 'cadeira';
    	$patrimony->category = 'cadeira';
    	$patrimony->model = 'm32';
    	$patrimony->description = 'cadeira azul, sem rodas';
    	$patrimony->image = 'image.jpg';
    	$patrimony->location = 'F3';


    	$patrimony->save();

    	$db_patrimony = Patrimony::first();


        $this->assertTrue($patrimony->name === $db_patrimony->name);
        $this->assertTrue($patrimony->category === $db_patrimony->category);
        $this->assertTrue($patrimony->model === $db_patrimony->model);
        $this->assertTrue($patrimony->description === $db_patrimony->description);
        $this->assertTrue($patrimony->image === $db_patrimony->image);
        $this->assertTrue($patrimony->location === $db_patrimony->location);
    }










    public function testPatrimonyEdit(){



    	$patrimony = new Patrimony();
    	$patrimony->name = 'cadeira';
    	$patrimony->category = 'cadeira';
    	$patrimony->model = 'm32';
    	$patrimony->description = 'cadeira azul, sem rodas';
    	$patrimony->image = 'image.jpg';
    	$patrimony->location = 'F3';


    	$patrimony->save();

    	$db_patrimony = Patrimony::first();


        $this->assertTrue($patrimony->name === $db_patrimony->name);
        $this->assertTrue($patrimony->category === $db_patrimony->category);
        $this->assertTrue($patrimony->model === $db_patrimony->model);
        $this->assertTrue($patrimony->description === $db_patrimony->description);
        $this->assertTrue($patrimony->image === $db_patrimony->image);
        $this->assertTrue($patrimony->location === $db_patrimony->location);





        $patrimony->name = 'cadeira2';
    	$patrimony->category = 'cadeira2';
    	$patrimony->model = 'm3222';
    	$patrimony->description = 'cadeira azul, sem rodas2';
    	$patrimony->image = 'image.jpg2';
    	$patrimony->location = 'F32';



    	$db_patrimony = Patrimony::first();

        $this->assertTrue($patrimony->name != $db_patrimony->name);
        $this->assertTrue($patrimony->category !=  $db_patrimony->category);
        $this->assertTrue($patrimony->model !=  $db_patrimony->model);
        $this->assertTrue($patrimony->description !=  $db_patrimony->description);
        $this->assertTrue($patrimony->image !=  $db_patrimony->image);
        $this->assertTrue($patrimony->location !=  $db_patrimony->location);




    	$patrimony->save();

    	$db_patrimony = Patrimony::first();

        $this->assertTrue($patrimony->name === $db_patrimony->name);
        $this->assertTrue($patrimony->category === $db_patrimony->category);
        $this->assertTrue($patrimony->model === $db_patrimony->model);
        $this->assertTrue($patrimony->description === $db_patrimony->description);
        $this->assertTrue($patrimony->image === $db_patrimony->image);
        $this->assertTrue($patrimony->location === $db_patrimony->location);
    }




    
}
