<?php

namespace App\Http\Controllers;

use Session;
use Redirect;
use DataTables;
use App\Models\Pet;
use Illuminate\Http\Request;
Use Illuminate\Database\QueryException;

class PetController extends Controller
{
    function __construct(){
        $isLogin = Session::get('is_login');
        if($isLogin == NULL){
            \Redirect::to('login')->send();
        }
    }

    public function showPet(){
        return view('pet.showPet');
    }

    public function dtJson(){
        $pet = Pet::join('owner', 'pet.owner_id', '=', 'owner.id')->select(
            'owner.name as owner_name', 'pet.name', 'dob', 'species', 'race'
        );
        return Datatables::of($pet)->make(true);
    }

    public function detailbyAjax($id){
        $pet = Pet::find($id);
        $pet->owner_name = $pet->owner->name;
        if(!empty($pet)){
            $res = ['status' => 200, 'data' => $pet];
        } else {
            $res = ['status' => 400];
        }
        echo json_encode($res); exit;
    }
}
