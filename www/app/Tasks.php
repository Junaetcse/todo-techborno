<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
        protected $fillable = ['lists_id','title','description','type','date','priority','status'];

        public function lists(){
                return $this->belongsTo(Lists::class);
        }

        public function updateTask($data){
                $task = $this->find($data['id']);
                $task->lists_id = $data['lists_id'];
                $task->title = $data['title'];
                $task->description = $data['description'];
                $task->type = $data['type'];
                $task->date = $data['date'];
                $task->priority = $data['priority'];
                $task->status = $data['status'];
                $task->save();
                return 1;
        }
     
}
