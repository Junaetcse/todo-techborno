@extends('lib/admin_layout')
    @section('admin_content')
        <div class="row" style="margin-top:5px;">
            @foreach($single_list as $v_s)
            <form method="post" action="{{url('/edit', $v_s->id)}}" >
            {{csrf_field()}}
            <div class="col-sm-10">
                <input type="hidden" value="{{csrf_token()}}" name="_token" />
                <input  class="form-control" id="edit_show" name="title"  value='{{$v_s->title}}' placeholder="Title">
            </div>
            <div class="col-sm-1">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
            <div class="col-sm-1">
            <form action="{{action('ListsController@destroy', $v_s->id)}}" method="post">
                {{csrf_field()}}
                <input name="_method" type="hidden" value="DELETE">
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
            </div>
            @endforeach
            <div class="col-md-12">          
            <table class="table table-striped table-advance table-hover">
                <thead>
                <tr>
                <th>Tasks <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal">Add Task</button>
                </th><th></th>
                </tr>
                <tr>
                <th>Summary</th>
                <th class="hidden-phone">Priority</th>
                <th> Type</th>
                <th>Date</th>
                <th><i class=" fa fa-edit"></i> Status</th>
                <th><i class=" fa fa-edit"></i> Action</th>
                </tr>
                </thead>
               
                @foreach($tasks as $v_task)
                <tbody>
                <tr>
                <td><a href="{{URL::to('/editTask/'.$v_task->id)}}">{{str_limit($v_task->title,20)}}</a></td>
                <td>  
                @include('include.priority')</td>
                <td>{{$v_task->type }}</td>
                <td>{{$v_task->date }}</td>
                <td>
                @include('include.status')
                </td>
                <td>
                <a href="{{URL::to('/editTask/'.$v_task->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                <a href="{{URL::to('/delete-task/'.$v_task->id)}}"> <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>           
                </td>
                </tr>
                </tbody>
                @endforeach
            </table>
            </div>
            @include('site.taskCreate')            
        </div> 
    @endsection()