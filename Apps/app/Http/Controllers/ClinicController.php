<?php

namespace App\Http\Controllers;

use Session;
use Redirect;
use DataTables;
use App\Models\Clinic;
use Illuminate\Http\Request;
Use Illuminate\Database\QueryException;

class ClinicController extends Controller
{
    public function __construct(){
        $isLogin = Session::get('is_login');
        if($isLogin == NULL){
            \Redirect::to('login')->send();
        }
    }

    public function index(){

    }

    public function json(){
        return Datatables::of(Clinic::all())->make(true);
    }

    public function showClinic(){
        return view('clinic.showClinic');
    }

    public function storeClinicAjax(Request $request){
        $data = $request->all();
        $data['operational_hours'] = $data['jam_operasional'];
        try{
            $clinic = Clinic::create($data);
            
            $response = [
                'status' => 200,
                'message' => 'data ok saved'
            ];
        } catch (QueryException $e){
            $response = [
                'status' => 400,
                'message' => $e
            ];
        }

        echo json_encode($response); 
        exit;
    }

    public function clicDeleteAjax($id){
        try{
            $clinic = Clinic::where('id', $id)->delete();
            $response = [
                'status' => 200,
                'message' => 'data deleted'

            ];
        }catch(QueryException $e){
            $response = [
               'status' => 400,
               'message' => 'data failet to deleted' 
            ];
        }
        echo json_encode($response);
        exit;
    }
}
