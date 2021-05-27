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
<body style="background-color: #2B2E33">
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h5 class="text-center text-white">
                <img src="{{asset('guard.png')}}" height="120px" alt=""> <br>
                Mọi thông tin hình ảnh sẽ được bảo đảm ẩn danh, và an toàn tuyệt đối.
            </h5>
            <form method="post" action="{{url('image/upload/store')}}" enctype="multipart/form-data"
                  class="dropzone" id="dropzone">
                @csrf
            </form>
        </div>
    </div>

    <script type="text/javascript">
        Dropzone.options.dropzone =
            {
                dictDefaultMessage: "Chạm vào để chọn ảnh",
                maxFilesize: 12,
                renameFile: function (file) {
                    var dt = new Date();
                    var time = dt.getTime();
                    return time + file.name;
                },
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                timeout: 50000,
                removedfile: function (file) {
                    var name = file.upload.filename;
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                        type: 'POST',
                        url: '{{ url("image/delete") }}',
                        data: {filename: name},
                        success: function (data) {
                            console.log("Xóa File");
                        },
                        error: function (e) {
                            console.log(e);
                        }
                    });
                    var fileRef;
                    return (fileRef = file.previewElement) != null ?
                        fileRef.parentNode.removeChild(file.previewElement) : void 0;
                },

                success: function (file, response) {
                    console.log(response);
                },
                error: function (file, response) {
                    return false;
                }
            };
    </script>
</body>
</html>
