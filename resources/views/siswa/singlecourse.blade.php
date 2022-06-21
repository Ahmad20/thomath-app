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
            <span class="admin_name">{{ Auth::guard('siswa')->user()->name }}</span>
        </div>
    </header>
    @include('siswa.partials.newside')

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
            <div class="card-text content mt-3 mb-4">
                <ul>
                    <li>Deskripsi : {!! $course->description !!}</li>
                    <li>Dibuat Oleh : {{ $course->pengajar->name }}</li>
                </ul>
            </div>
            <hr>
            <h4 class="card-title d-inline">Materi</h4>
            <div class="row mb-4">
                <div class="col-sm-3 mt-3">
                    <div class="card">
                        <div class="card-body">
                            @if (is_string($cm))
                                <p>{{ 'Belum Ada Materi' }}</p>
                            @else
                                <ul style="margin-left: 15px">
                                    <li>Slide : <a href="{{ $cm->video }}" target="_blank">{{ $cm->slide }}</a></li>
                                    <li>Video : <a href="{{ $cm->video }}" target="_blank">{{ $cm->video }}</a></li>
                                    <li>Kuis : <a href="{{ $cm->kuis }}" target="_blank">{{ $cm->kuis }}</a></li>
                                    <li>Tugas : <a href="{{ $cm->tugas }}" target="_blank">{{ $cm->tugas }}</a></li>
                                    <li>Referensi :{{ $cm->referensi }}</li>
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <h4 class="card-title d-inline">Tugas</h4>
            <div class="row">
                <!-- <p class="mt-3">Belum Masuk Kelas</p> -->
                @if (is_string($test))
                    <div class="col-sm-3 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <h3>Tugas : </h3>
                                <p>{{ 'Belum Ada Tugas' }}</p>
                            </div>
                        </div>
                    </div>
                @else
                    <?php
                    $now = new DateTime();
                    $now = $now->format('Y-m-d H:i:s');
                    foreach ($test as $t) {
                        if ($now > $t->due_date) {
                            echo "<div class='col-sm-3 mt-3'>";
                            echo "<div class='card'>";
                            echo "<div class='card-body'>";
                            echo "<h3 style='color:red;'>" . e($t->course->name) . '(Closed)</h3>';
                            echo "<ul style='margin-left: 15px'>";
                            echo "<li style='color:red;'>Due Date :" . e($t->due_date) . '</li>';
                            echo '</ul>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        } else {
                            echo "<div class='col-sm-3 mt-3'>";
                            echo "<a href='../singletest/" . e($t->id_testpaper) . "'>";
                            echo "<div class='card'>";
                            echo "<div class='card-body'>";
                            echo '<h3>' . e($t->course->name) . '</h3>';
                            echo "<ul style='margin-left: 15px'>";
                            echo '<li>Due Date :' . e($t->due_date) . '</li>';
                            echo '</ul>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</a>';
                        }
                    }
                    ?>
            </div>
            @endif

        </div>
        <hr>
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
