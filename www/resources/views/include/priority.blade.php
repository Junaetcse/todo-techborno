
    @if($v_task->priority=='high')
    <span class="check  btn-danger btn-xs"> <i class="fa fa-bookmark"></i> </span>
    @elseif($v_task->priority=='medium')
    <span class="check  btn-primary btn-xs"> <i class="fa fa-bookmark"></i> </span>
    @else
    <span class="check  btn-success btn-xs"> <i class="fa fa-bookmark"></i>
    </span>
    @endif
