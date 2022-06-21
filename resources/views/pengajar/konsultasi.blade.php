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
            Konsultasi
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
        <h3>Nama Anak : {{ Auth::guard('pengajar')->user()->name }}</h3>
        <table class="table" id="countit" style="width:100%;margin-left: auto; margin-right: auto;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Email Anak</th>
                    <th>Topik</th>
                    <th>Tahun</th>
                    <th>Tanggal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $index => $k)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $k->email }}</td>
                        <td>{{ $k->topik }}</td>
                        <td>{{ $k->tahun }}</td>
                        <td>{{ $k->tanggal }}</td>
                        <td>
                            <form action="{{ url('konsultasi/assign', $k->id_konsultasi) }}" method="post">
                                @csrf
                                <button class="btn btn-primary" type="submit">Accept</button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <!--Container Main end-->
    <script src="/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

</body>

</html>
