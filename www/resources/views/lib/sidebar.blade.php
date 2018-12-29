<aside>
    <div id="sidebar"  class="nav-collapse ">
        <ul class="sidebar-menu" id="nav-accordion">
            <li  class="{{ request()->is('site') ? 'active' : '' }}">
                <a href="{{URL::to('/site')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" > <i class="fa fa-desktop"></i>
                    <span>Add List</span></a>
                <ul class="sub">
                    <form action="{{URL::to('/listCreate')}}" method="post">
                        @csrf
                        <div class="btn-group btn-group-justified">
                            <div class="btn-group">
                                <input type="text" class="form-control" name="title"  placeholder="List name">
                            </div>
                            <div class="btn-group">
                                <button type="submit" class="btn btn-round btn-info">Add</button>
                            </div>
                        </div>
                    </form>
                </ul>
            </li>
            @foreach($lists as $v_list)
                <li  class="{{ request()->is('showList/'.$v_list->id) ? 'active' : '' }}">
                    <a href="{{URL::to('/showList/'.$v_list->id)}}"><i class="fa fa-book"></i>
                        <span>{{$v_list->title}}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</aside>
