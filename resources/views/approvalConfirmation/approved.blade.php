<head>
    <style>
        th {
            background-color: #4CAF50;
        }

        .btn:hover {
            cursor: pointer;
        }
    </style>

    <title>Request Approved</title>
</head>


<div style="text-align:center">
    <h1>You have approved this request:</h1>
</div>

@include('template.requestTable')

<div style="text-align:center; padding:3%;">
    <p>An email has been sent to the Network Team to process the request.</p>
    <button type="button" onclick="window.open('', '_self', ''); window.close();" class="btn">Close</button>
</div>