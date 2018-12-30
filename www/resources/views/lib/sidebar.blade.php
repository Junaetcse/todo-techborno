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
        </ul>

        <ul class="list-sidebar" >
            @foreach($lists as $v_list)
                <li data-id="{{ $v_list->id }}" class="remove">
                    <a data-id ="{{$v_list->id}}"  ><i class="fa fa-book"></i>
                        {{$v_list->title}}
                    </a>
                </li>
            @endforeach



                {{--<li data-id="{{ $slider->id }}" class="remove">--}}
                    {{--<a  data-id="{{ $slider->id }}"><i class="fa fa-film"></i> {{ $slider->title }}</a>--}}
                    {{--<span class="actions">--}}
                {{--<a href="{{URL::to('admin/sliders/'.$slider->id.'/edit')}}"><i class="fa fa-edit"></i></a>--}}

                {{--<form id="form_{{$slider->id}}" action="{{ route('sliders.destroy',$slider->id)}}" method="post">--}}
                    {{--@csrf--}}
                    {{--@method('DELETE')--}}
                    {{--<button style="background:transparent; border: transparent"><i class="fa fa-trash-o"></i></button>--}}
                    {{--</form>--}}

            {{--</span>--}}
                {{--</li>--}}












        </ul>
    </div>
</aside>
