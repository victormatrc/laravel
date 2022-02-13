<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserCases\CreatePayTransfer;
use App\Models\Entity\PayTransfer;
use App\Models\Entity\User;

class PayTransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        try{
            \Illuminate\Support\Facades\DB::beginTransaction();
            $attributes = (array) json_decode(request()->getContent());
            $response = CreatePayTransfer::createPayTransfer(
                    $attributes,
                    new PayTransfer($attributes), 
                    new User()); 
            \Illuminate\Support\Facades\DB::commit();
            return response()->json($response);
        } catch (\App\Exceptions\BusinessException $e){
            \Illuminate\Support\Facades\DB::rollBack();
            return response()->json(array("error"=>$e->getMessage()), $e->getCode());
        } catch (\App\Exceptions\BusinessTransferException $e){
            \Illuminate\Support\Facades\DB::rollBack();
            return response()->json(array("error"=>$e->getMessage()), $e->getCode());
        }catch (\Exception $e){
            \Illuminate\Support\Facades\DB::rollBack();
            return response()->json(array("error"=>$e->getMessage()), 500);
        }
        
        die("die");
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
