<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Item;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
Use Illuminate\Database\QueryException;


class HomeController extends Controller
{

    public function __construct(){
        $isLogin = Session::get('is_login');
        if($isLogin == NULL){
            \Redirect::to('login')->send();
        }
    }

    public function myHome(){
        $buku = Buku::all();
        return view('myHome', ['posts' => $buku, 'no' => 1]);
    }

    public function addBook(){
        $error_msg = Session::get('withSuccess');
        return view('addBook');
    }

    public function saveBook(Request $request){
        try{
            $buku = Buku::create($request->all());
            return redirect('my-home');
        } catch(QueryException $e){
            return redirect('add-book')->withSuccess($e->errorInfo);
        }
    }

    public function updateBook($id){
        $book = Buku::where('id', $id)->first();
        return view('updateBook', ['book' => $book]);
    }

    public function modifyBook(Request $request, $id){
        $buku = Buku::find($id);
        $buku->update($request->all());

        return redirect('my-home');
    }
}
