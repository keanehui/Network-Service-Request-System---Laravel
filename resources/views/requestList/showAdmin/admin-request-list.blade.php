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

        <title>Request List</title>
    </head>

    <header>
        @include('template.usernavbar')
    </header>

    <body>
        @hasrole('admin')
            <div style="text-align:center"><h1 class="smoothFont">Request List</h1></div>
            <table id="requests">
                <thead>
                    <tr>
                        <th class="admin firstth">Request ID</th>
                        <th class="admin">Reuqestor</th>
                        <th class="admin">Category</th>
                        <th class="admin">Status</th>
                        <th class="admin">Progress</th>
                        <th class="admin">Requested At</th>
                        <th class="admin lastth">Details</th>
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
                            <td><a href="/admin-request-list/show/requestID/{{ Crypt::encryptString($catRequest->id) }}" class="link">View</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p style="text-align:center; width:100%; font-size:2cm; color:silver;">
                403<br>Your don't have permission to view this page. Please contact Network Team for help.
            </p>
        @endrole




    </body>
</html>