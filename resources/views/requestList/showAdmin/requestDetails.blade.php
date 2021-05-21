<head>
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
                            $(".progresscirclediv #progressline2").css({"background":"#4CAF50"});
                            $(".progresstxtdiv #completetxt").addClass("active");
                        case "processing":
                            $(".progresscirclediv #processingcircle").addClass("active");
                            $(".progresscirclediv #progressline1").css({"background":"#4CAF50"});
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

            $("th").addClass("admin");

            $.ajax({
                url: "/ajax-get-remark/{{ Crypt::encryptString($catRequest->id) }}",
                type: "get",
                dataType: "json",
                success: function(response) {
                    if (response['remark'] != "No remark") {
                        $("#rmk").val(response['remark']);
                    }
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
            background-color: #4CAF50;
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
            line-height:3.3em;
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

        #updatebtn {
            width: 2cm;
            height: 1cm;
            border: 1px solid #ddd;
            border-radius: 15px;
            font-weight: bold;
            color: green;
            background: white;
            padding: 2px;
            font-size: 0.4cm;
        }

        #updatebtn:hover {
            border-color: #66CDAA;
            background: #66CDAA;
            color: white;
        }

        #updatebtn:active {
            background: #32CD32;
            color: white;
        }




        .progresscirclediv li.active {
            color: white;
            border-color: #4CAF50;
            background-color: #4CAF50;
        }

        .progresstxtdiv li.active {
            color: #4CAF50;
        }

        .link, .link:visited {
            text-decoration: none;
            color: #0066CC;
        }

        .link:hover {
            text-decoration: underline;
        }

    </style>

    <title>Update Progress</title>
</head>

<body>
    @include('template.usernavbar')

    @hasrole('admin')
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




        <form action="/admin-request-list-status-update/requestID/{{ Crypt::encryptString($catRequest->id) }}" method="post">
            @csrf
            <div style="display: flex; margin-top: 2%; width: 100%; align-items: center; justify-content: center;">
                <span style="padding-right: 3%;">
                    <label for="progressdropdown">Progress:</label>
                    <select name="progressdropdown" id="progressdropdown">
                        <option value="queuing">queuing</option>
                        <option value="processing">processing</option>
                        <option value="complete">complete</option>
                    </select>
                </span>
                <span style="padding-right: 2%;">
                    <label for="rmk" style="vertical-align:middle;">Remarks:</label>
                    <textarea name="rmk" id="rmk" cols="100" rows="5" placeholder="No remark" style="vertical-align:middle; border: solid 1px gray; border-radius: 20px; padding: 10px;"></textarea>
                </span>
                <button type="submit" class="btn" id="updatebtn">Update</button>
            </div>
        </form>

        <div style="text-align:center"><h1>Request Details</h1></div>
        @include('template.requestTable')
        <br>
        

        <div style="text-align:center; padding:3%">
            <a href="/delete/requestID/{{ Crypt::encryptString($catRequest->id) }}" class="link" style="position:absolute; right:3%; color:red;" onclick="return confirm('Are you sure to delete and remove this request from Request History?')">Delete</a>
            <a href="/admin-request-list" class="link">&#xFF1C Back to Request List</a>
        </div>


    @else
        <p style="text-align:center; width:100%; font-size:2cm; color:silver;">
            403<br>Your don't have permission to view this page. Please contact Network Team for help.
        </p>
    @endrole

</body>



