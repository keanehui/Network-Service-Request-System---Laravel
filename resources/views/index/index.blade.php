<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Network Service Request</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $(".catform").hide();
                $("#addbtn").hide();

                $("#clearbtn").click(function() {
                    $(".catform").hide();
                    $("#catipt").val("");
                });
 
                $("#choosebtn").click(function() {
                    $(".catform").hide(); // hide all forms
                    $("#addbtn").show();
                    $("#choosebtn").removeClass('active');


                    if (!$("#catipt").val()) { // return to big search if empty input
                        $("#searchdiv").hide();
                        $("#searchdiv").addClass("active");
                        $("#searchdiv").fadeIn("fast");
                        $("#searchp").addClass("active");
                        $("#catipt").addClass("active");
                        $("#addbtn").hide();
                        $("#choosebtn").addClass('active');
                        return;
                    } else {
                        $("#searchdiv").hide();
                        $("#searchdiv").removeClass("active");
                        $("#searchdiv").fadeIn("fast");
                        $("#searchp").removeClass("active");
                        $("#catipt").removeClass("active");
                        $("#choosebtn").removeClass('active');
                    }
                        
                    $.ajax({ // check if exists and show corresponding details form
                        url: "/ajax-get-categories",
                        type: "get",
                        dataType: "json",
                        success: function(response) {
                            var catiptVal = $("#catipt").val();
                            var exists = false;
                            for (var i = 0; i < response['categories'].length; ++i) {
                                if (catiptVal == response['categories'][i].name) {
                                    exists = true;
                                    break;
                                }
                            }
                            if (exists)
                                switch($("#catipt").val()) {
                                    case "LAN Connection":
                                        $("#catform1").fadeIn("fast");
                                        $(".catformele").fadeIn("fast");
                                        break;

                                    case "Relocation":
                                        $("#catform2").fadeIn("fast");
                                        $(".catformele").fadeIn("fast");
                                        break;

                                    case "Printer LAN Connection":
                                        $("#catform3").fadeIn("fast");
                                        $(".catformele").fadeIn("fast");
                                        break;

                                    case "Office Relocation":
                                        $("#catform4").fadeIn("fast");
                                        $(".catformele").fadeIn("fast");
                                        break;

                                    case "New Office":
                                        $("#catform5").fadeIn("fast");
                                        $(".catformele").fadeIn("fast");
                                        break;
                                    
                                    default:
                                        $("#catformdef").fadeIn("fast");
                                        $(".catformele").fadeIn("fast");
                                }
                            else {
                                $("#catformnf").fadeIn("fast");
                            }
                        }
                    }); 

                    $("#catiptcpy").val($("#catipt").val()); // sync input to form


                });


            });

            
        </script>

        <style>
            * {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            }

            

            #searchp.active {
                font-size: 1cm;
                font-weight: bold;
                margin-top: 13%;
                margin-bottom: 2%;
            }

            
            
            #catipt.active {
                -webkit-appearance: none;
                height:1cm;
                width:13cm;
                font-size: 20px;
                border: 2px solid #ddd;
                border-radius: 15px;
                outline: none;
                margin-left: 4em;
                padding-left: 0.7em;
                padding-right: 1em;
            }
            

            #choosebtn.active {
                color: #0066CC;
                background-color: white;
                border-radius: 20px;
                border: 2px solid #ddd;
                width: 2cm;
                height: 1cm;
                font-size: 1em;
                margin-left: 0.5em;
            }

            #searchp:not(.active) {
                font-weight: none;
                line-height: 0;
            }

            #catipt:not(.active) {
                -webkit-appearance: none;
                width: 7.5cm;
                height: 0.7cm;
                border: 1px solid #ddd;
                border-radius: 5px;
                outline: none;
                text-align: center;
            }

            #catipt::placeholder {
                text-align: center;
            }
            

            #clearbtn {
                position: absolute;
                color: gray;
                font-size: 0.4cm;
                padding: 0;
                z-index: 2;
                right: 0;
                background: none;
                border: none;
                border-left: 1px solid #ddd;
                border-radius: 0 40% 40% 0;
                height: 100%;
                width: 5%;
                box-sizing: border-box;
            }

            #clearbtn:active {
                color: #ddd;
            }

            #choosebtn.active:hover {
                border-color: #0066CC;
                cursor: pointer;
            }

            #choosebtn:active {
                color: #ddd;
            }

           .link, .link:visited {
                text-decoration: none;
                color: #0066CC;
            }

            .link:hover {
                text-decoration: underline;
            }

            .no_selection {
                -webkit-touch-callout: none; /* iOS Safari */
                -webkit-user-select: none; /* Safari */
                -khtml-user-select: none; /* Konqueror HTML */
                -moz-user-select: none; /* Firefox */
                -ms-user-select: none; /* Internet Explorer/Edge */
                user-select: none; /* Non-prefixed version, currently supported by Chrome and Opera */
            }
            
            .catformq {
                border-radius: 15px;
                padding: 10px;
                border: 2px solid #ddd;
                margin-top: 0.5em;
            }

            .btn:hover {
                cursor: pointer;
            }
        </style>

    </head>

    <body>

        @include('template.usernavbar')
        
        
    
        <div class="active" id="searchdiv">
            <form action="/addCategory" method="post">
                @csrf
                <div style="display:flex; flex-wrap:wrap; align-items:center; justify-content:center;">
                    <p id="searchp" class="active no_selection">Network Service Request</p>
                    <div style="flex-basis:100%; height:0;"></div>
                    <button type="submit" id="addbtn" class="btn" style="margin-left:3%;">+</button>
                    <div style="position:relative; bottom: 1px;">
                        <input class="active" id="catipt" type="text" list="cats" name="catipt" placeholder=" choose a category or type to add a new one &#x25BE" required autocomplete="off" />
                        <button type="button" id="clearbtn" class="no_selection btn">&times;</button>
                    </div>
                    <datalist id="cats">
                        @foreach($categories as $category)
                            <option>{{ $category->name }}</option>
                        @endforeach
                    </datalist>
                    <button type="button" id="choosebtn" class="active btn">Choose</button>
                    

                </div>
            </form>

        </div>
        
        
        <div>
            @include('template.catForm')
        </div>

    </body>
</html>