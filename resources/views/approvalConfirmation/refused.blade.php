<head>
    <style>
        th {
            background-color: #4CAF50;
        }

        .btn:hover {
            cursor: pointer;
        }
    </style>

    <title>Request Refused</title>
</head>


<div style="text-align:center">
    <h1>You have refused this request:</h1>
</div>

@include('template.requestTable')

<div style="text-align:center; padding:3%;">
    <button type="button" onclick="window.open('', '_self', ''); window.close();" class="btn">Close</button>
</div>