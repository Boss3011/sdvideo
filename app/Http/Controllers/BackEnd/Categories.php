<?php

namespace App\Http\Controllers\BackEnd;
use App\Http\Requests\BackEnd\categories\Store;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Middleware\Admin;

  class Categories extends \App\Http\Controllers\BackEnd\BackEndController
{
  public function __construct(Category $model)
  {
    parent::__construct($model);
  }
  
  
  
    public function store(Store $request){
     $this->model->create($request->all());
     return redirect()->route('categories.index');
    
    }
  
    public function update($id,Store $request ){
        $row=$this->model->FindOrFail($id);
        $row->update($request->all());
      return redirect()->route('categories.edit',['id'=>$row->id]);
    }
}
