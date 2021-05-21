<head>
    <style>
        * {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        tr {
            padding: 8px;
            text-align: center;
        }

        tr:not(.lastrow) {
            border-bottom: 1px solid #ddd;
        }

        td {
            background-color: rgb(250, 250, 250);
        }

        th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            color: white;
            background-color: #4CAF50;
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

        #problemcontainer {
            border: 2px solid #4CAF50;
            border-radius: 15px;
            width: 100%;
            text-align: center;
        }

    </style>
</head>

<body>
    <div style="text-align:center;">
        <h1>A user encountered some problems:</h1>
    </div>

    <div style="width:100%; text-align:center;"><h4>Problems</h4></div>
    <div id="problemcontainer">
        <p style="white-space: pre-line; text-align: center;">{{ $problems }}</p>
    </div>

    <div style="width:100%; height:0.5cm;"></div>

    <div style="width:100%; text-align: center;"><h4>User Info</h4></div>
    <table>
        <tr><th class="upperl">ID:</th><td class="upperr">{{ $user->id }}</td></tr>
        <tr><th>Name:</th><td>{{ $user->name }}</td></tr>
        <tr class="lastrow"><th class="bottoml">Email:</th><td class="bottomr">{{ $user->email }}</td></tr>
    </table>

    
</body>