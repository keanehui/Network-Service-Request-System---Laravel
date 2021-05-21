<!DOCTYPE html>
<html>
    <head>
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <link href="{{ asset('/DataTables/datatables.css') }}" media="all" rel="stylesheet" type="text/css" />
        <script type="text/javascript" charset="utf-8" src="{{ asset('/DataTables/datatables.js') }}"></script>
        <script>
            $(document).ready( function () {
                $('#requests').DataTable({
                    "order": [[ 0, "desc" ]],
                    "columnDefs": [
                        { "orderable": false, "targets": 6 }
                    ],
                    "lengthMenu": [[15, 50, 100, -1], [15, 50, 100, "All"]],
                    "dom": '<"#ttop"lfi>tp',
                });
            } );
        </script>

        <style>
            * {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            }

            .link, .link:visited {
                text-decoration: none;
                color: #0080FE;
            }

            .link:hover {
                text-decoration: underline;
            }
        </style>

        <title>Request History</title>
    </head>

    <header>
        @include('template.usernavbar')
        <div style="text-align:center"><h1 class="smoothFont">Request History</h1></div>
    </header>

    <body>
        <table id="requests">
            <thead>
                <tr>
                    <th class="user firstth">Request ID</th>
                    <th class="user">Reuqestor</th>
                    <th class="user">Category</th>
                    <th class="user">Status</th>
                    <th class="user">Progress</th>
                    <th class="user">Requested At</th>
                    <th class="user lastth">Details</th>
                </tr>
            </thead>

            <tbody>
                @if ($catRequests->count() == 0)
                    <tr>
                        <td colspan="7">No request</td>
                    </tr>
                @endif


                @foreach($catRequests as $catRequest)
                    <tr>
                        <td>{{ $catRequest->id }}</td>
                        <td>{{ $catRequest->requestor }}</td>
                        <td>{{ $catRequest->category }}</td>
                        <td>{{ $catRequest->status }}</td>
                        <td>{{ $catRequest->progress }}</td>
                        <td>{{ $catRequest->created_at }}</td>
                        <td><a href="/user-request-list/requestID/{{ Crypt::encryptString($catRequest->id) }}" class="link">View</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>





    </body>
</html>