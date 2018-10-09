@extends('lib/admin_layout')
    @section('admin_content')
        <span class="help-block"></span>
        @if(session()->has('success'))
        <div class="alert alert-success">
        {{ session()->get('success') }}
        </div>
        @endif
    @foreach($edit_tasks as $e_task)
            <form method="post" action="{{url('/update', $e_task->id)}}" >
                {{csrf_field()}}
                <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Task Details</h4>
                </div>
                <label class="col-sm-2 col-sm-2 control-label" style="margin-top:20px;">Summary</label>
                <div class="col-sm-10" style="margin-top:20px;">
                    <input type="text" value="{{$e_task->title}}" name="title" class="form-control">
                    <span class="help-block"></span>
                </div>
          
             
                <label class="col-sm-2 col-sm-2 control-label">Type </label>
                <div class="col-sm-10">
                    <select name="type" class="btn btn-default btn-sm">
                        <option value="">Type select</option>
                        <option {{old('type', $e_task->type)=="read"? 'selected':''}} value="read">Read</option>
                        <option  {{old('type', $e_task->type)=="write"? 'selected':''}} value="write">Write</option>
                        <option  {{old('type', $e_task->type)=="pracital"? 'selected':''}} value="pracital">Pracital</option>
                    </select> 
                    <span class="help-block"></span>                             
                </div>
                <label class="col-sm-2 col-sm-2 control-label" style="{margin-top:20px;}">Description</label>
                <div class="col-sm-10">
                    <textarea name="description" class="summernote">
                        {{$e_task->description}}
                    </textarea>
                    <span class="help-block"></span>
                </div>
                <label class="col-sm-2 col-sm-2 control-label">Priority </label>
                <div class="col-sm-10">
                    <select name="priority" class="btn btn-default btn-sm">
						<option value="" >Priority select</option>
						<option  {{old('priority', $e_task->priority)=="high"? 'selected':''}} value="high">High</option>
						<option  {{old('priority', $e_task->priority)=="low"? 'selected':''}} value="low">Low</option>
						<option  {{old('priority', $e_task->priority)=="medium"? 'selected':''}} value="medium">Medium</option>
					</select>    
                    <span class="help-block"></span>                   
                </div>
                <label class="col-sm-2 col-sm-2 control-label">Date</label>
                <div class="col-sm-10">
                    <input value="{{$e_task->date}}"  id="date" name="date" class="form-control" placeholder="MM/DD/YYY" type="date"/>
                    <span class="help-block"></span>
                </div>
                <label class="col-sm-2 col-sm-2 control-label">Status </label>
                <div class="col-sm-10">
                    <select  name="status" class="btn btn-default btn-sm">
						<option value="">Status select</option>
						<option {{old('status', $e_task->status)=="inprogress"? 'selected':''}} value="inprogress" >In progress</option>
						<option {{old('status', $e_task->status)=="done"? 'selected':''}} value="done">Done</option>
						<option {{old('status', $e_task->status)=="todo"? 'selected':''}} value="todo">Todo</option>
                        <option {{old('status', $e_task->status)=="cencle"? 'selected':''}} value="cencle">Cencle</option>
					</select>        
                    <span class="help-block"></span>                     
                </div>
                <input type="hidden"  name="lists_id" value="{{$e_task->lists_id}}"> </input><br>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" >Update Task</button>
                </div>
            </form>
           @endforeach

@endsection()