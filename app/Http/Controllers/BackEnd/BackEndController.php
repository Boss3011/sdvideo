<?php
namespace App\Http\Controllers\BackEnd;
use App\Http\Middleware\Admin;
use  App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class BackEndController extends Controller{
    protected $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    public function index()
    {
        $rows = $this->model;
        $rows = $this->filter($rows);
        $with = $this->with();
        if(!empty($with)){
            $rows=$rows->with($with);
        }
        $rows = $rows->paginate(10);
        $moduleName=$this->pluralModelName() ;
        $sModuleName=$this->getModelName();
        $routeName=$this->getClassNameFromModel();
        $pageTitle="Control".$moduleName ;
        $pageDes="Here you can add/edit/delete ".$moduleName;  
        return view('back-end.'.$this->getClassNameFromModel().'.index',compact(
            'rows',
            'moduleName',
            'pageTitle',
            'sModuleName',
            'routeName',
            'pageDes'

    ));
    }
    public function create(){
        $moduleName=$this->getModelName() ;
        $pageTitle="create" .$moduleName ;
        $pageDes="Here you can create " .$moduleName;  
        $folderName=$this->getClassNameFromModel();
        $routeName= $folderName;
        $append= $this->append();
        return view('back-end.'.$folderName.'.create',compact(
            'moduleName',
            'pageTitle',
            'routeName',
            'folderName',
            'pageDes'

        ))->with($append);
    }
    public function destroy($id){
        $this->model->FindOrFail($id)->delete();
        return redirect()->route($this->getClassNameFromModel().'.index');
        
      }
      public function edit($id){
        $row=  $this->model->FindOrFail($id);
        $moduleName=$this->getModelName();
        $pageTitle="edit".$moduleName ;
        $pageDes="edit ".$moduleName;  
        $folderName=$this->getClassNameFromModel();
        $routeName= $folderName;
        $append= $this->append();
        return view('back-end.'.$folderName.'.edit',compact('row',
        'moduleName',
        'pageTitle',
        'folderName',
        'routeName',
        'pageDes'
     ))->with($append);
      }
    protected function filter($rows){
        return $rows;
    }
    protected function with(){
        return [];
    }
   
    protected function getClassNameFromModel(){
        return strtolower($this->pluralModelName());
    }

    protected function pluralModelName(){
        return str_plural($this->getModelName());
    }

    protected function getModelName(){
        return class_basename($this->model);
    }
    protected function append(){
        return [];
    }
  
}