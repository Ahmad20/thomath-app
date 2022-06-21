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
            Edit Course
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
        <form method="POST"
            action="{{ url('pengajar/course/update', $course->id_course) }}">
            @csrf
            <div class="form-group mt-3">
                <label for="name" style="font-size: medium">Name</label>
                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                    id="name" placeholder="Course 1" value="{{ $course->name }}" autofocus>
                @error('name')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="description" style="font-size: medium">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ $course->description }}</textarea>
                @error('description')
                    {{ $message }}
                @enderror
                <script>
                    ClassicEditor
                        .create(document.querySelector('#description'))
                        .then(editor => {
                            console.log(editor);
                        })
                        .catch(error => {
                            console.error(error);
                        });
                </script>
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
