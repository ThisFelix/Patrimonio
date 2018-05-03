<?php 

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Patrimony;



class PatrimonyRepository{
	
	public function saveImage(Patrimony $patrimony, Request $request){
		$imgName = null;


		if( $request->hasFile('image') && $request->file('image')->isValid()){

			$imgName = 'patrimony'.$patrimony->id.$patrimony->name.'.png';

			$request->image->storeAs('patrimony', $imgName);

		}

		$patrimony->image = $imgName;

		return $patrimony;
	}
}