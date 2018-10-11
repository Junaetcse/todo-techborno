<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
        protected $fillable = ['lists_id','title','description','type','date','priority','status'];

        public function lists(){
                return $this->belongsTo(Lists::class);
        }
     
}
