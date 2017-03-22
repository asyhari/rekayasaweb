<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Model\Inventaris;

class SiteController extends Controller
{
   /* public function getIndex() {
    	$inventaris = Inventaris::all();
    	$id_barang = Inventaris::pluck('id_barang','id');
    	return view('ajax.index',compact('inventaris','id_barang'));
    }
*/
  /*  public function getIndex($id)
    {
        if (Request::ajax())
        {
            $positions = Inventaris::pluck('position_id','name')->where('sport_id', '=', $id)->get();
            return Response::json( $positions );
        } 
    }*/
}

