<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{
        protected $fillable = ['user_id','title'];

        public function user(){
                return $this->belongsTo(User::class);
        }

        public function tasks(){
                return $this->hasMany(Tasks::class);
        }

        public function updateList($data){
                $list = $this->find($data['id']);
                $list->user_id = auth()->user()->id;
                $list->title = $data['title'];
                $list->save();
                return 1;
        }
}
