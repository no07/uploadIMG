<!DOCTYPE html>
<html>
<head>
    <title>Gửi ảnh ẩn danh</title>
    <meta name="_token" content="{{csrf_token()}}"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
</head>
<body style="background-color: #2B2E33"><div class="container">
    <div class="row justify-content-center">
            <div class="col-md-12">
                    <h2>Show All Image from public folder using Laravel</h2>

                    <ul>
                        @foreach ($images as $image)
                            <li style="width:80px;display:inline-block;margin:5px 0px">
                                <img src="{{ asset('images/' . $image->getFilename()) }}" width="50" height="50">
                            </li>
                        @endforeach
                    </ul>

            </div>
        </div>
    </div>
</body>
</html>
