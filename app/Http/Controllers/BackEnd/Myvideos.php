<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Myvideos\Store;
use App\Models\Myvideo;


class Myvideos extends \App\Http\Controllers\BackEnd\BackEndController
{

    public function __construct(Myvideo $model)
    {
      parent::__construct($model);
    }
    
  
  
    public function store(Store $request){
     $this->model->create($request->all());
     return redirect()->route('myvideos.index');
    
    }
  
    public function update($id,Store $request ){
        $row=$this->model->FindOrFail($id);
        $row->update($request->all());
      return redirect()->route('myvideos.edit',['id'=>$row->id]);
    }
}
