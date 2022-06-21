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
            Detail Course
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
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        @if (session()->has('warning'))
            <div class="alert alert-warning">
                {{ session()->get('warning') }}
            </div>
        @endif
        <div class="card-body p-3">
            <h4 class="card-title d-inline">{{ $course->name }}</h4>
            <p>Dibuat Oleh : {{ $course->pengajar->name }}</p>
            <p>Deskripsi : {!! $course->description !!}</p>
            <a href="/pengajar/course/edit/{{ $course->id_course }}" style="text-decoration: none">
                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                Edit
            </a>
            <a href="/pengajar/course/delete/{{ $course->id_course }}" style="text-decoration: none">
                <span class="glyphicon glyphicon-trash ml-3" aria-hidden="true"></span>
                Hapus
            </a>
        </div>
        <hr>
        <div class="card-body p-3">
            <h4 class="card-title d-inline">List Siswa</h4>
            <div class="row">
                @foreach ($course->siswa as $s)
                    <div class="col-sm-3 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-text">{{ $s->name }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <hr>
        <div class="card-body p-3">
            <h4 class="card-title d-inline">Materi</h4>
            <div class="row mb-4">
                @if ($cm == null)
                    <p class="mt-3">{{ 'Belum Ada Materi' }}</p>
                @else
                    <div class="col-sm-3 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <ul>
                                    <li>Slide : <a href="{{ $cm->slide }}" target="_blank">{{ !is_null($cm->slide) ? 'Link Slide' : '' }}</a>
                                    </li>
                                    <li>Video : <a href="{{ $cm->video }}" target="_blank">{{ !is_null($cm->video) ? 'Link Video' : '' }}</a>
                                    </li>
                                    <li>Kuis : <a href="{{ $cm->kuis }}" target="_blank">{{ !is_null($cm->kuis) ? 'Link Kuis' : '' }}</a>
                                    </li>
                                    <li>Tugas : <a href="{{ $cm->tugas }}" target="_blank">{{ !is_null($cm->tugas) ? 'Link Tugas' : '' }}</a>
                                    </li>
                                    <li>Referensi : <a href="{{ $cm->referensi }}" target="_blank">{{ !is_null($cm->referensi) ? 'Link Referensi' : '' }}</a>
                                </ul>
                                <a href="/pengajar/course-material/edit/{{ $cm->id_course_material }}" style="text-decoration: none">
                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    Edit
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
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
