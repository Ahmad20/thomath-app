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
            Dashboard
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
            <h4 class="card-title d-inline">Data Diri</h4>
            <div class="card-text content mt-3 mb-4">
                <ul>
                    <li>Nama : {{ $siswa->name }}</li>
                    <li>Email : {{ $siswa->email }}</li>
                    <li>Nomor Telepon : {{ $siswa->phone_number }}</li>
                    <li>Status : Siswa</li>
                </ul>
                <a href="profile">Edit Profile</a>
                <a href="editpassword">Edit Password</a>
            </div>
            <hr>
            <h4 class="card-title d-inline">Pelajaranmu</h4>
            <div class="row mb-4">
                <!-- <p class="mt-3">Belum Masuk Kelas</p> -->
                @foreach ($courses as $c)
                    <div class="col-sm-3 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $c->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Oleh : {{ $c->pengajar->name }}</h6>
                                <p class="card-text">{!! $c->description !!}</p>
                                <a href="singlecourse/{{ $c->id_course }}" class="card-link">Masuk Kelas</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <hr>
            <h4 class="card-title d-inline">Tugasmu</h4>
            <div class="row">
                <!-- <p class="mt-3">Belum Masuk Kelas</p> -->
                @foreach ($test as $tp)
                    @foreach ($tp as $t)
                        <div class="col-sm-3 mt-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $t->course->name }}</h5>
                                    <p class="card-text">Deadline {{ $t->due_date }}</p>
                                    <a href="singletest/{{ $t->id_testpaper }}" class="card-link">Kerjakan Tugas</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
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
