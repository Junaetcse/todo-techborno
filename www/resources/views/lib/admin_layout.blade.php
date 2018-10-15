<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title> Todo Techborno</title>
    <link rel="icon" href="assets/img/ToDo.png" />

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ URL::asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/zabuto_calendar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/js/gritter/css/jquery.gritter.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/lineicons/style.css') }}">    
    
    <!-- Custom styles for this template -->
    <link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/style-responsive.css') }}" rel="stylesheet">

    <script src="{{ URL::asset('assets/js/chart-master/Chart.js')}}"></script>
    <script>
        var divs = ["Menu1", "Menu2", "Menu3","Menu4"];
        var visibleDivId = null;
        function toggleVisibility(divId) {
            if(visibleDivId === divId) {
        } else {
            visibleDivId = divId;
        }
            hideNonVisibleDivs();
        }
        function hideNonVisibleDivs() {
            var i, divId, div;
            for(i = 0; i < divs.length; i++) {
            divId = divs[i];
            div = document.getElementById(divId);
            if(visibleDivId === divId) {
            div.style.display = "block";
            
        } else {
          div.style.display = "none";
        }
      }
    }
</script>


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
  

<style>
* {box-sizing: border-box}

/* Set height of body and the document to 100% */
body, html {
    height: 100%;
    margin: 0;
    font-family: Arial;
}

/* Style tab links */
.tablink {
    background-color: #555;
    color: white;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    font-size: 17px;
    width: 25%;
}

.tablink:hover {
    background-color: #777;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
    color: white;
    display: none;
    padding: 100px 20px;
    height: 100%;
}

#Home {background-color: red;}
#News {background-color: green;}
#Contact {background-color: blue;}
#About {background-color: orange;}
</style>
  
  
  </head>

  <body>

  <section id="container" >
        <header class="header black-bg">
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <a href="index.html" class="logo"><b>{{ Auth::user()->name }}</b></a>
            <div class="top-menu">
            <ul class="nav pull-right top-menu">
            <li><a class="profile_image"href="{{URL::to('/profile')}}" >
                <img class="img-circle"  src="{{ asset('uploads/files/' . Auth::user()->image) }}" width="40px" height="40px" align=""></a>
            </li>
            <li>
                <a class="logout" href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}</a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
            </form>
            </ul>
            </div>
        </header>
        
        <aside>
            <div id="sidebar"  class="nav-collapse ">
                <ul class="sidebar-menu" id="nav-accordion">
                <li>
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
                <li >
                    <a href="{{URL::to('/showList/'.$v_list->id)}}"><i class="fa fa-book"></i>
                    <span>{{$v_list->title}}</span>
                    </a>
                </li>
                @endforeach
                </ul>
           </div>
        </aside>
        <section id="main-content">
        <section class="wrapper">
        @yield('admin_content')
        </section>
        </section>


    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ URL::asset('assets/js/jquery.js')}}"></script>
    <script src="{{ URL::asset('assets/js/jquery-1.8.3.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/bootstrap.min.js')}}"></script>
    <script class="include" type="text/javascript" src="{{ URL::asset('assets/js/jquery.dcjqaccordion.2.7.js')}}"></script>
    <script src="{{ URL::asset('assets/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/js/jquery.sparkline.js')}}"></script>
     
    <!--common script for all pages-->
    <script src="{{ URL::asset('assets/js/common-scripts.js')}}"></script>
   
    <script type="text/javascript" src="{{ URL::asset('assets/js/gritter/js/jquery.gritter.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/gritter-conf.js')}}"></script>

    <!--script for this page-->
    <script src="{{ URL::asset('assets/js/sparkline-chart.js')}}"></script>    
    <script src="{{ URL::asset('assets/js/zabuto_calendar.js')}}"></script>  
 
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>  

  @yield('login')
    <script type="text/javascript">
        $(document).ready(function () {
        return false;
        });
    </script>
    
    <script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
        $(document).ready(function() {
            $('.summernote').summernote();
        });

function openPage(pageName,elmnt,color) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }
    document.getElementById(pageName).style.display = "block";
    elmnt.style.backgroundColor = color;

}
document.getElementById("defaultOpen").click();
    </script> 
  </body>
</html>
