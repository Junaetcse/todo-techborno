@if($v_task->status=='cencle')
    <span class="label label-danger label-mini">
    @elseif($v_task->status=='done')
    <span class="label label-success label-mini">
    @elseif($v_task->status=='inprogress')
    <span class="label label-warning label-mini">
    @else
    <span class="label label-info label-mini">
@endif {{$v_task->status}}</span>