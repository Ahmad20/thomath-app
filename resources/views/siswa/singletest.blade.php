<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
    <link rel="stylesheet" href="/css/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle">
            <i class="bx bx-menu" id="header-toggle"></i>
            Tugas
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
            </svg>
            <span class="admin_name">{{ Auth::guard('siswa')->user()->name }}</span>
        </div>
    </header>
    @include('siswa.partials.newside')

    <!--Container Main start-->
    <div class="height-100">
        <h3>{{ $test->name }}</h3>
        <h5>Pertanyaan : </h5>
        <p>{!! $test->question !!}</p>
        <form method="POST" action="/singletest/{{ $test->id_testpaper }}">
            @csrf
            <div>
                <label for="answer">Jawaban:</label>
                <textarea class="form-control" name="answer" id="answer"></textarea>
                <script>
                    ClassicEditor
                        .create(document.querySelector('#answer'))
                        .then(editor => {
                            console.log(editor);
                        })
                        .catch(error => {
                            console.error(error);
                        });
                </script>
            </div>
            <button type="submit" class="btn btn-primary mt-3" style="background-color:tomato; border:none">Submit</button>
        </form>
    </div>
    <!--Container Main end-->
    <script src="/script.js"></script>
</body>

</html>
