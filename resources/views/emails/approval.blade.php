<head>
    <style>
        * {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        }

        th {
            background-color: #4CAF50;
        }

        .link, .link:visited {
            padding: 5px;
            text-decoration: none;
            color: #0066CC;
        }

        .link:hover {
            border-radius: 5px;
            border: 1px solid #ddd;
        }
    </style>
</head>


<div style="text-align:center;">
    <h1>A request has been made:</h1>
</div>

@include('template.requestTable')

<div style="width:100%; display:flex; justify-content:space-around; padding:3%;">
    <a href="{{ action('ApprovalMailController@approve', ['requestID' => Crypt::encryptString($catRequest->id)]) }}" class="link">
        Approve
    </a>
    <a href="{{ action('ApprovalMailController@refuse', ['requestID' => Crypt::encryptString($catRequest->id)]) }}" class="link">
        Refuse
    </a>
</div>