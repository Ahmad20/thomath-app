<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
    <link rel="stylesheet" href="/css/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle">
            <i class="bx bx-menu" id="header-toggle"></i>
            Score
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
            </svg>
            <span class="admin_name">{{ Auth::guard('pengajar')->user()->name }}</span>
        </div>
    </header>
    @include('pengajar.partials.newside')

    <!--Container Main start-->
    <div class="height-100">
        <div class="card-body p-3">
            <h4 class="card-title d-inline">{{ $test->name . ' | ' . $siswa->name }}</h4>
            <div class="card-text content mt-3 mb-4">
                <h5>Pertanyaan</h5>
                <p>{!! $test->question !!}</p>
                <h5>Jawaban</h5>
                <p>{!! $test_siswa->answer !!}</p>
            </div>
            <hr>
            <div class="row mb-2">
                <form method="POST"
                    action="/singletest/{{ $test_siswa->test_paper_id_testpaper }}/{{ $test_siswa->siswa_id_siswa }}">
                    @csrf
                    <div class="form-group mt-3 col-md-3">
                        <label for="score">Nilai</label>
                        <input name="score" type="text" class="form-control @error('score') is-invalid @enderror"
                            id="score" placeholder="0" autofocus>
                        @error('score')
                            {{ $message }}
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
        <!--Container Main end-->
        <script src="/script.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script>
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 1000);
        </script>
</body>

</html>
