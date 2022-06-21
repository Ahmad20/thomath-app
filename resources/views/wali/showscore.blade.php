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
            Lihat Nilai
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
            </svg>
            <span class="admin_name">{{ Auth::guard('walimurid')->user()->name }}</span>
        </div>
    </header>
    @include('wali.partials.newside')

    <!--Container Main start-->
    <div class="height-100">
        <h3>Nama Anak : {{ Auth::guard('walimurid')->user()->siswa->name }}</h3>
        <table class="table" id="countit" style="width:100%;margin-left: auto; margin-right: auto;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Pelajaran</th>
                    <th>Tugas</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($test_siswa as $index=>$ts)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $ts->coursename }}</td>
                        <td>{{ $ts->testname }}</td>
                        <td class="count-me">{{ $ts->score }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
    <!--Container Main end-->
    <script src="/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <script>
        var tds = document.getElementById('countit').getElementsByClassName("count-me");
        var sum = 0;
        console.log(tds.length);
        for(var i = 0; i < tds.length; i ++) {
            if(tds[i].className == 'count-me') {
                sum += isNaN(tds[i].innerHTML) ? 0 : parseInt(tds[i].innerHTML);
            }
        }
        document.getElementById('countit').innerHTML += '<tr><th colspan=3 style=text-align:center>Average </th><td>'+ Math.round(sum/tds.length * 100) / 100+'</td></tr>';
    </script>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 1000);
    </script>
</body>

</html>
