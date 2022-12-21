<?php

namespace App\Http\Controllers;

use Session;
use Redirect;
use DataTables;
use App\Models\PetVisit;
// use App\Models\Vet;
use App\Models\BillItem;
use App\Models\VisitBill;
use App\Models\VisitBillDetail;
use Illuminate\Http\Request;
Use Illuminate\Database\QueryException;


class PetVisitController extends Controller
{   
    function __construct(){
        $isLogin = Session::get('is_login');
        if($isLogin == NULL){
            \Redirect::to('login')->send();
        }
    }

    public function dtJson(){
        return Datatables::of( PetVisit::with(['pet.owner'])->get())->make(true);
    }

    public function visitList(){
        $data['bill_item'] = BillItem::all(); 
        return view('visit.visitList', $data);
    }

    public function visitDetail($id){
        $data['visit'] = PetVisit::with(['pet.owner'])->find($id);
        $data['pet'] = $data['visit']->pet;
        $data['owner'] = $data['visit']->pet->owner;

        $data['bill_item'] = BillItem::all(); 

        return view('visit.detail', $data);
    }

    public function saveNewVisit(Request $request){
        $data = $request->all();
        $data->status = 'Pending';

        try{
            $visit = PetVisit::create($data);
            $response = [
                'status' => 200,
                'message' => 'data ok saved.'
            ];
        } catch(QueryException $e){
            $response = [
                'status' => 400,
                'message' => $e->errorInfo
            ];
        }

        echo json_encode($response);
        exit;
    }

    public function updateVisit(Request $request, $id){
        $data = $request->all();
        $dt = [
            'weight' => $data['weight'],
            'temperature' => $data['temperature'],
            'diagnose' => $data['diagnosis'],
            'note' => $data['notes'],
            'status' => 'Selesai'
        ];
        
        $bill = $data['bill'];
        try{
            $visit = PetVisit::find($id);
            $visit->update($dt);

            $billId = VisitBill::create([
                'pet_visit_id' => $id,
                'payment_status' => 'Unpaid',
            ])->id;

            foreach($bill as $y){
                if(!isset($y['id'])){
                    VisitBillDetail::create([
                        'visit_bill_id' => $billId,
                        'bill_item_id' => $y['item_id'], 
                        'qty' => $y['qty']
                    ]); 
                }
            }

            return redirect()->intended('visit');
        } catch(QueryException $e){
            $response = [
                'status' => 400,
                'message' => $e->errorInfo
            ];
        }

        echo json_encode($response);
        exit;
    }

    public function updateBill($id){
        $res['bill'] = VisitBill::with(['billDetail'])
        ->where('pet_visit_id', '2')
        ->first();
        echo json_encode($res);
        exit;
    }

    #understanding eloquent relation
    public function cekiData(){
        $data = PetVisit::with(['pet.owner'])->get();
        foreach($data as $i => $y){
            dd($y->pet);
        }
    }

    
}
