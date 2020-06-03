<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\BackEnd\Videos\Store;
use App\Http\Requests\BackEnd\Videos\Update;
use App\Models\Video;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Myvideo;
use App\Models\Tag;
use App\Models\Comments;




class Videos extends  BackEndController
{
    use CommentTrait;
        public function __construct(Video $model)
        {
          parent::__construct($model);
        }
        
      protected function with(){
          return ['cat','user'];
      }
   
      protected function append(){
        $array = [
          'categories'=>Category::get(),
          'myvideos'=>Myvideo::get(),
          'tags'=>Tag::get(),
          'selectedMyvideos'=>[],
          'selectedTags'=>[],
          'comments'=>[]
      ];
      if(request()->route()->parameter('video')){
       $array['selectedMyvideos']=$this->model->find(request()->route()->parameter('video'))
       ->myvideos()->pluck('myvideos.id')->toArray();
       $array['selectedTags']=$this->model->find(request()->route()->parameter('video'))
       ->tags()->pluck('tags.id')->toArray();
       $array['comments']=$this->model->find(request()->route()->parameter('video'))
        ->comments()->orderBy('id','desc')->with('user')->get();
      }
      return $array;
    }
 
      
    public function store(Store $request){
      $fileName = $this->uploadImage($request); 
      $requestArray = ['user_id'=>auth()->user()->id,'image'=>$fileName] + $request->all() ;
      $row = $this->model->create($requestArray);
      $this->syncTagsMyvideos($row,$requestArray);
     return redirect()->route('videos.index');
    
    }
      
        public function update($id,Update $request ){
            $requestArray=$request->all();
            if($request->hasFile('image')){
              $fileName = $this->uploadImage($request); 
              $requestArray=['image'=>$fileName]+$requestArray;
            }
            $row=$this->model->FindOrFail($id);
            $row->update($requestArray);
            $this->syncTagsMyvideos($row,$requestArray);
           
          return redirect()->route('videos.edit',['id'=>$row->id]);
        }
        protected function syncTagsMyvideos($row,$requestArray){
          if(isset($requestArray['myvideos']) && !empty($requestArray['myvideos'])){
            $row->myvideos()->sync($requestArray['myvideos']);
          }
          if(isset($requestArray['tags']) && !empty($requestArray['tags'])){
            $row->tags()->sync($requestArray['tags']);
          }
        }
        protected function uploadImage($request){
              $file=$request->file('image');
              $fileName=time().str_random('10').'.'.$file->getClientOriginalExtension();
              $file->move(public_path('uploads'),$fileName);
              return $fileName;
        }
}
