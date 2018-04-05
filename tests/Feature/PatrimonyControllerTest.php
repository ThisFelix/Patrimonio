<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use WithoutMiddleware;

class PatrimonyControllerTest extends TestCase{


    /** @test */
    public function  create_patrimonio(){

        $this->withoutMiddleware();

        $usuario = factory('App\Patrimony')->create();
        $chaves = array();
        $array = array();
        foreach ($usuario->toArray(['original']) as $value){
            array_push($array, $value);
        }
        foreach ($usuario->toArray(['fillable']) as $value){
            array_push($chaves, $value);
        }

        $response = $this->post('patrimonies/add', $array, $chaves);
        $this->assertEquals(200, $response->getStatusCode());
        $this->getJson('patrimonies/add');
        $response->assertStatus(302);
    }
}
