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
    <h1>The request has been approved and ready for process:</h1>
</div>

@include('template.requestTable')


<div style="display:flex;justify-content:space-around; padding:3%;">
    <a href="{{ action('RequestListController@showAdmin', ['requestID' => Crypt::encryptString($catRequest->id)]) }}" class="link">
        Update Progress
    </a>
    <a href="{{ url('/admin-request-list') }}" class="link">View all requests</a>
</div>
