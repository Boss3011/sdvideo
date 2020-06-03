<?php

namespace App\Http\Controllers;
use App\Models\Video;
use App\Models\Category;
use App\Models\Myvideo;
use App\Models\Tag;
use App\Models\Comments;
use App\Models\User;
use App\Models\Message;
use App\Http\Middleware\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\FrontEnd\Comments\Store;
use App\Http\Requests\FrontEnd\Messages\Stores;
use App\Http\Requests\FrontEnd\Users\Ustore;
use Illuminate\Support\Facades\Hash;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only([
            'commentUpdate','commentStore','profileUpdate'
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $videos = Video::orderBy('id','desc');
        if(request()->has('search') && request()->get('search')!=''){
        $videos=$videos->published()->where('name','like',"%".request()->get('search')."%");
    }

        $videos= $videos->paginate(30);
        return view('home',compact('videos'));
    }
    public function category($id){
        $cat=Category::findOrFail($id);
        $videos = Video::published()->where('cat_id',$id)->orderBy('id','desc')->paginate(30);
        return view('front-end.category.index',compact('videos','cat'));
    }
    public function video($id){
        $video=Video::published()->with('myvideos','tags','cat','user','comments.user')->findOrFail($id);
        return view('front-end.video.index',compact('video'));
    }
    public function myvideos($id){
        $myvideo=Myvideo::findOrFail($id);
        $videos = Video::published()->whereHas('myvideos', function($query) use ($id){
         $query->where('myvideo_id',$id);
        })->orderBy('id','desc')->paginate(30);
        return view('front-end.myvideo.index',compact('videos','myvideo'));
    }
    public function tags($id){
        $tag=Tag::findOrFail($id);
        $videos = Video::published()->whereHas('tags', function($query) use ($id){
         $query->where('tag_id',$id);
        })->orderBy('id','desc')->paginate(30);
        return view('front-end.tag.index',compact('videos','tag'));
    }
    public function commentUpdate($id,Store $request){
        $comment = Comments::findOrFail($id);
        if(($comment->user_id==auth()->user()->id) || auth()->user()->group=='admin'){
         $comment->update(['comment'=>$request->comment]);
        }
        return redirect()->route('frontend.video',['id'=>$comment->video_id,'#comments']);
    }
    public function commentStore($id,Store $request){
        $video = Video::published()->findOrFail($id);
        Comments::create([
            'user_id'=>auth()->user()->id,
            'video_id'=>$video->id,
            'comment'=>$request->comment

        ]);
        return redirect()->route('frontend.video',['id'=>$video->id,'#comments']);
    }
    public function messageStore(Stores $request){
        Message::create($request->all());
        return redirect()->route('frontend.landing');
    }
    public function welcome(){
        $videos=Video::published()->orderBy('id','desc')->paginate(9);
        $videos_count=Video::published()->count();
        $comments_count=Comments::count();
        $tags_count=Tag::count();
        return view('welcome',compact('videos','tags_count','comments_count','videos_count'));
    }
     public function profile($id ,$slug = null)
    {
        $user = User::findOrFail($id);
        return view('front-end.profile.index',compact('user'));
    }
    public function profileUpdate(Ustore $request){
        $user=User::findOrfail(auth()->user()->id);
        $array=[];
        if($request->email != $user->email){
            $email=User::where('email',$request->email)->first();
            if($email==null){
                $array['email']=$request->email;
            }
        }
        if($request->name != $user->name){
            $array['name']=$request->name;
        }
        if($request->password != ''){
            $array['password']=Hash::make($request->password);
        }
        if(!empty($array)){
            $user->update($array);
        }
        return redirect()->route('frontend.profile',['id'=>$user->id,'slug'=>slug($user->name)]);
    } 
}
