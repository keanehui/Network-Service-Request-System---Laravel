<head>
    <title>Check Progress</title>

    <script   src="https://code.jquery.com/jquery-3.5.1.js"   integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="   crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $.ajax({
                url: "/ajax-get-progress/{{ Crypt::encryptString($catRequest->id) }}",
                type: "get",
                dataType: "json",
                success: function(response) {
                    $(".progresscirclediv").children().removeClass("active");
                    $(".progresstxtdiv").children().removeClass("active");
                    $(".progresscirclediv #progressline1").css({"background":"#ddd"});
                    $(".progresscirclediv #progressline2").css({"background":"#ddd"});
                    switch(response['progress']) {
                        case "complete":
                            $(".progresscirclediv #completecircle").addClass("active");
                            $(".progresscirclediv #progressline2").css({"background":"#0066CC"});
                            $(".progresstxtdiv #completetxt").addClass("active");
                        case "processing":
                            $(".progresscirclediv #processingcircle").addClass("active");
                            $(".progresscirclediv #progressline1").css({"background":"#0066CC"});
                            $(".progresstxtdiv #processingtxt").addClass("active");
                        case "queuing":
                            $(".progresscirclediv #queuingcircle").addClass("active");
                            $(".progresstxtdiv #queuingtxt").addClass("active");
                            break;
                        default:
                            alert('No progress');
                    }
                    
                    $("#progressdropdown").val(response['progress']);
                    
                }
            });
        });
    </script>

    <style>
        * {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        }

        .btn:hover {
            cursor: pointer;
        }

        th {
            background-color: #0066CC;
        }

        .progresscircle {
            list-style-type: none;
            border: 1px solid #ddd;
            color: #ddd;
            background-color: white;
            float: left;
            border-radius: 50%;
            width: 3.3em;
            height: 3.3em;
            text-align: center;
            line-height: 3.3em;
            position:absolute;
        }

        #queuingcircle {
            left:20%;
        }

        #processingcircle {
            left:48%;
        }

        #completecircle {
            right:20%;
        }

        .progresstxt {
            list-style-type: none;
            color: #ddd;
        }


        #progressline1 {
            position: absolute;
            background: #ddd;
            border: none;
            width: 30%;
            height: 1px;
            z-index: -1;
            top: 35%;
            left: 20%;
        }

        #progressline2 {
            position: absolute;
            background: #ddd;
            border: none;
            width: 30%;
            height: 1px;
            top: 35%;
            right: 20%;
            z-index: -1;
        }

        .progresstxt {
            position: absolute;
            top: 40%;
        }

        #queuingtxt {
            left: 19.8%;
        }

        #processingtxt {
            left: 47.3%;
        }

        #completetxt {
            right: 19.3%;
        }

        .progresscirclediv li.active {
            color: white;
            border-color: #0066CC;
            background-color: #0066CC;
        }

        .progresstxtdiv li.active {
            color: #0066CC;
        }

        .link, .link:visited {
            text-decoration: none;
            color: #0066CC;
        }

        .link:hover {
            text-decoration: underline;
        }

    </style>

    

</head>

<body>
    @include('template.usernavbar')

    <div style="text-align:center;">
        <h1>Progress</h1>
    </div>

    <div class="progresscirclediv" style="position:relative; width:100%; height:1.45cm;">
        <li class="progresscircle" id="queuingcircle">1</li>
        <hr id="progressline1">
        <li class="progresscircle" id="processingcircle">2</li>
        <hr id="progressline2">
        <li class="progresscircle" id="completecircle">3</li>
    </div>
    
    <div class="progresstxtdiv" style="position:relative; width:100%; height:1.5cm;">
        <li class="progresstxt" id="queuingtxt">Queuing</li>
        <li class="progresstxt" id="processingtxt">Processing</li>
        <li class="progresstxt" id="completetxt">Complete</li>
    </div>

    <div style="margin-top:2%; display: flex; text-align: center; align-items: center;">
        <div style="width: 8%; margin: 0 0 0 10px;">
            <label for="rmk">Remarks:</label>
        </div>
        <div style="width: 92%; margin: 0 0.5cm 0 0; border: solid 1px #ddd; border-radius: 15px;">
            <p id="rmk" style="white-space: pre-line; text-align: center;">{{ $catRequest->remark }}</p>
        </div>
    </div><br>

    <div style="text-align:center"><h1>Request Details</h1></div>
    @include('template.requestTable')
    <br>
    



    <div style="text-align:center; padding:3%;">
        <a href="/support" class="link" style="position:absolute; left:3%; color:#708090">Need help?</a>
        <a href="/user-request-list" class="link">&#xFF1C Back to Request History</a>
        <a href="/delete/requestID/{{ Crypt::encryptString($catRequest->id) }}" class="link" style="position:absolute; right:3%; color:red;" onclick="return confirm('Are you sure to delete and remove this request from Request History?')">Delete</a>
    </div>







    

    
    




    





</body>