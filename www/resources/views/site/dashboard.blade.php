@extends('lib/admin_layout')

@section('admin_content')

    <div class="row">
        <div class="col-lg-12 main-chart">
                   <a href="#"><div class="col-md-3 mb" onclick="toggleVisibility('Menu1');">
                        <div class="white-panel hover">
                            <div class="white-header">
                                <h5>Total Task</h5>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-6 goleft">
                                    <p><i class="fa"></i> {{$totalTask->count()}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                  </a>
                    <a href="#"> <div class="col-md-3 mb" onclick="toggleVisibility('Menu2');">
                        <div class="white-panel hover">
                            <div class="white-header">
                                <h5>Completed Task</h5>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-6 goleft">
                                    <p><i class="fa"></i> {{$completedTask->count()}}</p>
                                </div>
                            </div>
                        </div>
                    </div> </a>
                 
                  <a href="#"><div class="col-md-3 mb" onclick="toggleVisibility('Menu3');">
                        <div class="white-panel hover">
                            <div class="white-header" href="#">
                                <h5>High Priority Task</h5>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-6 goleft">
                                    <p><i class="fa"></i> {{$priorityTasks->count()}}</p>
                                </div>
                            </div>
                        </div>
                    </div></a>

                     <a href="#"><div class="col-md-3 mb" onclick="toggleVisibility('Menu4');">
                        <div class="white-panel hover">
                            <div class="white-header">
                                <h5>Upcomming Task</h5>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-6 goleft">
                                    <p><i class="fa"></i>{{$upcommingTask->count()}}</p>
                                </div>
                            </div>
                        </div>
                    </div></a>


         <div id="Menu1">
            <div class="custom-check goleft mt">
                <table id="todo" class="table table-hover custom-check">
                <tbody>
                <h5  style="color:green"><b>Total Task</b></h5>
                @foreach($totalTask as $v_task)
                <tr>
                <td>
                @include('include.priority')
                <a style="margin-left: 20px;" href="{{URL::to('/editTask/'.$v_task->id)}}">  {{$v_task->title}}</a>
                <span style="margin-left: 10px;" class="label label-warning label-mini">
                {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $v_task->updated_at)->diffForHumans() }}
                </span>
                <span style="margin-left: 5px; margin-right: 20px" class="label label-default label-mini">
                {{$v_task->lists->title}}</span>
                @include('include.status')

                </td>
                </tr>
                @endforeach
                </tbody>
                </table>
            </div>
        </div>

        <div id="Menu2" style="display: none;">
            <div class="custom-check goleft mt">
                <table id="todo" class="table table-hover custom-check">
                <tbody>
                <h5  style="color:green"><b>Completed Task</b></h5>
                @foreach($completedTask as $v_task)
                <tr>
                <td>
              <!--   @include('include.priority')
                <a style="margin-left: 20px" href="{{URL::to('/editTask/'.$v_task->id)}}">{{$v_task->title}}</a></span>
                @if($v_task->status=='done')
                <span  style="margin-left: 20px" class="label label-success label-mini">Done</span>
                 @endif -->
                @include('include.priority')
                <a style="margin-left: 20px;" href="{{URL::to('/editTask/'.$v_task->id)}}">  {{$v_task->title}}</a>
                <span style="margin-left: 10px;" class="label label-warning label-mini">
                {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $v_task->updated_at)->diffForHumans() }}
                </span>
                <span style="margin-left: 5px; margin-right: 20px" class="label label-default label-mini">
                {{$v_task->lists->title}}</span>
                @include('include.status')
                </td>
                </tr>
                @endforeach
                </tbody>
                </table>
            </div>    
        </div>
      
        <div id="Menu3" style="display: none;">
            <div class="custom-check goleft mt">
              <table id="todo" class="table table-hover custom-check">
              <tbody>
              <h5  style="color:green"><b>High Priority Task</b></h5>
              @foreach($priorityTasks as $v_task)
              <tr>
              <td>
              <span class="check  btn-danger btn-xs"> <i class="fa fa-bookmark"></i> </span>
              <a style="margin-left: 20px; margin-right:15px" href="{{URL::to('/editTask/'.$v_task->id)}}">{{$v_task->title}}</a></span>

              <span style="margin-left: 10px;" class="label label-warning label-mini">
                {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $v_task->updated_at)->diffForHumans() }}
                </span>
                <span style="margin-left: 5px; margin-right: 20px" class="label label-default label-mini">
                {{$v_task->lists->title}}</span>
              @include('include.status')

              </td>
              </tr>
              @endforeach
              </tbody>
              </table>
            </div>    
        </div>

        <div id="Menu4" style="display: none;">
            <div class="custom-check goleft mt">
              <table id="todo" class="table table-hover custom-check">
              <tbody>
              <h5  style="color:green"><b>Upcomming Task</b></h5>
              @foreach($upcommingTask as $v_task)
              <tr>
              <td>
              @include('include.priority')
             <a style="margin-left: 20px;" href="{{URL::to('/editTask/'.$v_task->id)}}">  {{$v_task->title}}</a>
                <span style="margin-left: 10px;" class="label label-warning label-mini">
                {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $v_task->updated_at)->diffForHumans() }}
                </span>
                <span style="margin-left: 5px; margin-right: 20px" class="label label-default label-mini">
                {{$v_task->lists->title}}</span>
                @include('include.status')
              </td>
              </tr>
              @endforeach
              </tbody>
              </table>
            </div>    
        </div>
    </div>
</div>
@endsection()