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
            Course Material
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
        <form method="POST" action="{{ url('pengajar/course-material/tambah') }}">
            @csrf
            <div class="form-group row">
                <div class="form-group col-md-6">
                    <label for="coursename">Course:</label>
                    <select class="form-control" name="coursename" id="coursename">
                        <option value="{{ session()->get('course') }}" selected>{{ session()->get('course') }}
                        </option>
                        @foreach ($courses as $c)
                            <option value='{{ $c->name }}'>{{ $c->name }}</option>
                        @endforeach
                    </select>
                    @error('courseName')
                        {{ $message }}
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="slide">Slide:</label>
                    <input class="form-control" type="text" id="slide" name="slide" placeholder="URL Slide">
                </div>
            </div>
            <div class="form-group row">
                <div class="form-group col-md-6">
                    <label for="video">Video:</label>
                    <input class="form-control" type="text" id="video" name="video" placeholder="URL Video">
                </div>
                <div class="form-group col-md-6">
                    <label for="kuis">Kuis:</label>
                    <input class="form-control" type="text" id="kuis" name="kuis" placeholder="URL Kuis">
                </div>
            </div>
            <div class="form-group row">
                <div class="form-group col-md-6">
                    <label for="tugas">Tugas:</label>
                    <input class="form-control" type="text" id="tugas" name="tugas" placeholder="URL Tugas">
                </div>
                <div class="form-group col-md-6">
                    <label for="referensi">Ref:</label>
                    <input class="form-control" type="text" id="referensi" name="referensi"
                        placeholder="URL Referensi">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
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
