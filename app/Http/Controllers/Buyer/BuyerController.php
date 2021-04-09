<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Auth\Access\AuthorizationException;

class BuyerController extends ApiController
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('scope:read-general')->only('index');
        $this->middleware('can:view,buyer')->only('show');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*if(Gate::denies('admin-action')){
            throw  new AuthorizationException('This actions is unauthorized');
            
        }*/

        $this->allowedAdminAction();
        
        $buyers = Buyer::has('transactions')->get();

        return $this->showAll($buyers);
        //return response()->json(['data' => $buyers], 200);
    }

   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Buyer $buyer)
    {
        //$buyer = Buyer::has('transactions')->findOrFail($id);

        return $this->showOne($buyer);
        //return response()->json(['data' => $buyer], 200);
    }

    
}
