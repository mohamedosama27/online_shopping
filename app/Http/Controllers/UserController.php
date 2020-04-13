<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showAll()
    {
      $messages = \App\message::where('recivier_id','=','0')->get()->keyBy('sender_id');

        return view('chats',[
            'messages'=>$messages,
            
        ]);
       
    }
    public function search(Request $request)
    {
        $output = '';
       $query = $request['query'];
        if($query != '')
      {
       $data = \App\message::where('recivier_id','=','0')->whereHas('sender', function($q)use ($query) {
        $q->where('name','like','%'.$query.'%');
        })->get()->keyBy('sender_id');

      }
      else{
        $data = \App\message::where('recivier_id','=','0')->get()->keyBy('sender_id');
      }
   
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $message)
       {
        $output.='<a class="chatlink" href="'.route("chat",["id" => $message->sender->id]).'"
        <div class="chat_list">
        <div class="chat_people">
          <div class="chat_ib" style="margin-top:15px;">
            <h3>'.$message->sender->name.' <span class="chat_date">'.$message->created_at.'</span></h3>
            <p>'.$message->message.'</p>
          </div>
            </div>
        </div>
        </a>';
       }

     }
     return response()->json(['users'=>$output]);

    }
}