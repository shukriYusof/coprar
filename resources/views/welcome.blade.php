<html lang="en"><head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Export Booking Excel to Coprar Converter</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card" style="margin-top:8px">
            <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="card-body">
                    <h5 class="card-title">Export Booking Excel to Coprar Converter</h5>
                    <div class="form-group">
                        <label for="recv_code">Receiver Code:</label>
                        <input class="form-control" type="text" name="recv_code" value="RECEIVER">
                        <p><small>Please change before file select.</small></p>
                    </div>
                    <div class="form-group">
                        <label for="callsign_code">Callsign Code:</label>
                        <input class="form-control" type="text" name="callsign_code" value="XXXXX">
                        <p><small>Please change before file select.</small></p>
                    </div>
                    <div class="form-group">
                        <label for="file">Export booking excel file:</label>
                        <input class="form-control" type="file" name="file" id="file">
                        <p><small><a href="sample.xlsx">Sample Excel</a></small></p>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                    </br>
                    @if (isset($value))
                        <div class="form-group"><textarea class="form-control" rows="20" cols="40" >{{ $value }}</textarea></div>
                    @endif
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.esm.min.js"></script>

