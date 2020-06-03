<?php

namespace App\Http\Controllers\Backend;
use App\Http\Requests\BackEnd\Messages\Store;
use App\Models\Message;
use App\Mail\ReplyContact;
use Illuminate\Support\Facades\Mail;

class Messages extends BackEndController
{
    public function __construct(Message $model){
        parent::__construct($model);
    }
    public function reply($id,Store $request){
          $message = $this->model->findOrFail($id);
          Mail::send(new ReplyContact($message,$request->message));
          return redirect()->route('messages.edit',['id'=>$message->id]);
    }
}
