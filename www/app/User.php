<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
use App\Lists;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function lists(){
        return $this->hasMany(Lists::class);
    }

    public function allTasks(){
        return $this->hasManyThrough(Tasks::class, Lists::class);
    }

    public function totalTasks(){
        $totalTask = User::find(Auth::user()->id)->allTasks()->get();
        return $totalTask;
    }

    public function completedTasks(){
        $completTask = User::find(Auth::user()->id)->allTasks()->where('status','done')->get();
        return $completTask;
    }

    public function priorityTasks(){
        $priorityTask = User::find(Auth::user()->id)->allTasks()->where('priority','high')->get();
        return $priorityTask;
    }

    public function upcommingTask(){
        $upcommingTask = User::find(Auth::user()->id)->allTasks()->where('date','>',Carbon::now())->get();
        return $upcommingTask;
    }

}

