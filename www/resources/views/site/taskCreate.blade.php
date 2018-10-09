@foreach($single_list as $v_s)
    <form action="{{url('/createTask', $v_s->id)}}" method="post">
    @csrf
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Create Task</h4>
                </div>            
                <div class="modal-body">
                <div class="form-group has-success">
                    <label class="col-sm-2 col-sm-2 control-label" style="{margin-top:20px;}">Summary</label>
                    <div class="col-sm-10">
                    <input type="text" name="title" class="form-control">
                    <span class="help-block"></span>
                    </div>
                    </div>
             
                    <label class="col-sm-2 col-sm-2 control-label">Type </label>
                    <div class="col-sm-10">
                    <select name="type" class="btn btn-default btn-sm">
						<option value="">Type select</option>
						<option value="read">Read</option>
						<option value="write">Write</option>
						<option value="pracital">Pracital</option>
					</select> 
                    <span class="help-block"></span>                             
                    </div>
                    <label class="col-sm-2 col-sm-2 control-label" style="{margin-top:20px;}">Description</label>
                    <div class="col-sm-10">
                        <textarea name="description" class="summernote"></textarea>
                        <span class="help-block"></span>
                    </div>

                    <label class="col-sm-2 col-sm-2 control-label">Priority </label>
                    <div class="col-sm-10">
                        <select name="priority" class="btn btn-default btn-sm">
						<option value="" >Priority select</option>
						<option value="high">High</option>
						<option value="low">Low</option>
						<option value="medium">Medium</option>
						</select>    
                        <span class="help-block"></span>                   
                    </div>
                    <label class="col-sm-2 col-sm-2 control-label">Date</label>
                    <div class="col-sm-10">
                        <input  id="date" name="date" class="form-control" placeholder="MM/DD/YYY" type="date"/>
                        <span class="help-block"></span>
                    </div>
                    <label class="col-sm-2 col-sm-2 control-label">Status </label>
                    <div class="col-sm-10">
                        <select name="status" class="btn btn-default btn-sm">
						<option value="">Status select</option>
						<option value="inprogress" >In progress</option>
						<option value="done">Done</option>
						<option value="todo">Todo</option>
                        <option value="cencle">Cencle</option>
						</select>        
                        <span class="help-block"></span>                     
                    </div>
                 </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" >Save Task</button>
                </div>
            </div>
            </div>
        </div>
    </form>
@endforeach


 








