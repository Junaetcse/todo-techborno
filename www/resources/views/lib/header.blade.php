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
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
