<head>
    <style>
        * {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        }

        .link, .link:visited {
            text-decoration: none;
            color: #0066CC;
        }

        .link:hover {
            text-decoration: underline;
        }

        #supipt {
            resize: vertical;
            border-radius: 30px;
            padding: 20px;
            font-size: 0.4cm;
            outline: none;
            border: 2px solid skyblue;
        }

        #supipt:focus {
            border-color: #0066CC;
        }

        #sendbtn {
            width: 2cm;
            height: 1cm;
            background: white;
            border: 2px solid #ddd;
            border-radius: 20px;
            font-size: 0.4cm;
            color: #0066CC;
        }

        #sendbtn:hover {
            border-color: #0066CC;
            cursor: pointer;
        }

        #sendbtn:active {
            color: #ddd;
        }
        
    </style>

    <title>Support</title>
</head>

<body>
    @include('template.usernavbar')    
    
    <div style="text-align:center;">
        <h1>Support</h1>
        <p>Please describe the problems you encountered below. The Network Team will reply to you as soon as possible.</p>
    </div>
    <form action="support/submit" method="post">
        @csrf
        <div style="text-align:center;">
            <textarea name="supipt" id="supipt" cols="130" rows="15" required placeholder="Describe the problems you encountered here..."></textarea><br>
            <button type="submit" style="margin-top:0.7cm;" id="sendbtn">Send</button>
        <div>
    </form>



</body>