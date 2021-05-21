<head>
    <style>
        * {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        }
        
        #requests {
            border-collapse: collapse;
            width: 100%;
        }

        #requests tr {
            padding: 8px;
            text-align: center;
        }

        #requests tr:not(.lastrow) {
            border-bottom: 1px solid #ddd;
        }

        #requests td {
            background-color: rgb(250, 250, 250);
        }

        th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            color: white;
        }

        .upperl {
            border-radius: 15px 0 0 0;
        }

        .bottoml {
            border-radius: 0 0 0 15px;
        }

        .upperr {
            border-radius: 0 15px 0 0;
        }

        .bottomr {
            border-radius: 0 0 15px 0;
        }
    </style>
</head>

<body>

    <table style="width:100%" id="requests">
        <tr><th class="upperl">Status:</th><td class="upperr">{{ $catRequest->status }}</td></tr>
        <tr><th>Request ID:</th><td>{{ $catRequest->id }}</td></tr>
        <tr><th>Requestor:</th><td>{{ $catRequest->requestor }}</td></tr>
        <tr><th>Requestor's Email:</th><td>{{ $catRequest->email }}</td></tr>
        <tr><th>Category:</th><td>{{ $catRequest->category }}</td></tr>
        <tr><th>Requested At:</th><td>{{ $catRequest->created_at }}</td></tr>
        
        @switch($catRequest->category)
            @case("LAN Connection")
                <tr><th>Question 1:</th><td>{{ $catRequest->c1a1 }}</tr>
                <tr><th>Question 2:</th><td>{{ $catRequest->c1a2 }}</tr>
                <tr class="lastrow"><th class="bottoml">Question 3:</th><td class="bottomr">{{ $catRequest->c1a3 }}</tr>
                @break

            @case("Relocation")
                <tr><th>Question 1:</th><td>{{ $catRequest->c2a1 }}</tr>
                <tr><th>Question 2:</th><td>{{ $catRequest->c2a2 }}</tr>
                <tr class="lastrow"><th class="bottoml">Question 3:</th><td class="bottomr">{{ $catRequest->c2a3 }}</tr>
                @break

            @case("Printer LAN Connection")
                <tr><th>Question 1:</th><td>{{ $catRequest->c3a1 }}</tr>
                <tr><th>Question 2:</th><td>{{ $catRequest->c3a2 }}</tr>
                <tr class="lastrow"><th class="bottoml">Question 3:</th><td class="bottomr">{{ $catRequest->c3a3 }}</tr>
                @break

            @case("Office Relocation")
                <tr><th>Question 1:</th><td>{{ $catRequest->c4a1 }}</tr>
                <tr><th>Question 2:</th><td>{{ $catRequest->c4a2 }}</tr>
                <tr class="lastrow"><th class="bottoml">Question 3:</th><td class="bottomr">{{ $catRequest->c4a3 }}</tr>
                @break
        
            @case("New Office")
                <tr><th>Question 1:</th><td>{{ $catRequest->c5a1 }}</tr>
                <tr><th>Question 2:</th><td>{{ $catRequest->c5a2 }}</tr>
                <tr class="lastrow"><th class="bottoml">Question 3:</th><td class="bottomr">{{ $catRequest->c5a3 }}</tr>
                @break

            @default
                <tr><th>Question 1:</th><td>{{ $catRequest->c0a1 }}</tr>
                <tr class="lastrow"><th class="bottoml">Question 2:</th><td class="bottomr">{{ $catRequest->c0a2 }}</tr>

        @endswitch
    </table>

</body>