<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Items;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ItemResource;

class ItemControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Items::get();
        return $this->handleResponse(ItemResource::collection($item), "Success get items");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = [
            'name' => 'required',
            'price' => 'required',
            'status' => 'required'
        ];

        $validatedData = Validator::make($request->all(), $validate);
        if ($validatedData->fails()) {
            return $this->handleError("Validation Failed", $validatedData->errors());
        }

        $item = Items::create($request->all());

        return $this->handleResponse(new ItemResource($item), "Success create Item $item->name");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Items::findOrFail($id);

        return $this->handleResponse(new ItemResource($item), "Success get category no $item->id");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $validate = [
            'name' => 'required',
            'price' => 'required',
            'status' => 'required'
        ];

        $validatedData = Validator::make($request->all(), $validate);
        if ($validatedData->fails()) {
            return $this->handleError("Validation Failed", $validatedData->errors());
        }

        $item = Items::findOrFail($id);
        $item->update($request->all());

        return $this->handleResponse(new ItemResource($item), "Success update item $item->name");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Items::findOrFail($id);
        $item->delete();

        return $this->handleResponse(new ItemResource($item), "Success delete item");
    }
}
