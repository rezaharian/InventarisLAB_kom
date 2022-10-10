<!DOCTYPE html>
<html>

<head>
    <title>Laporan</title>
    <style>
        .table-line {
            width: 100%;
            border-collapse: collapse;

        }

        .table-line th {
            background: #055a9f;
            color: #ffffff;
            padding: 1em;
            text-align: left;
            text-transform: uppercase;


        }

        .table-line td {
            border-bottom: 1px solid #DDDDDD;
            color: #666666;
            padding: 1em;
        }

        .header {
            /* background: #055a9f; */

        }

        p {
            color: #424141;
            font-size: 70%;
        }
    </style>
</head>

<body>
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>


    @yield('content')



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>
</html>
