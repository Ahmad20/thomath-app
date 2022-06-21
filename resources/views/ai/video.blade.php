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
            Search Video
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
        <form id="keywordForm" method="post" action="{{ url('siswa/ai') }}">
            @csrf
            <div class="row">
                <div class="col-sm-3">
                    <label for="keyword" class="form-label">Cari: </label>
                    <input type="text" class="form-control" id="keyword" name="keyword"
                        placeholder="Enter Search Keyword">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3" style="background-color:tomato; border:none">Cari</button>
        </form>

        <div class="row gx-2" style="padding: 25px">
            @if (!is_string($data))
                @foreach ($data as $item)
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="card mb-3">
                            @if (isset($item['snippet']['thumbnails']['high']['url']))
                                <img class="card-img-top" src="{{ $item['snippet']['thumbnails']['high']['url'] }}"
                                    alt="Card image cap">
                            @endif
                            <div class="card-body">
                                @if (isset($item['snippet']['title']))
                                    <p class="card-title" style="min-height: 4em;text-overflow: ellipsis; font-size: 1.5vmax;">
                                        {{ htmlspecialchars_decode($item['snippet']['title']) }}</p>
                                @endif
                                @if (isset($item['id']['videoId']))
                                    <a href="https://www.youtube.com/watch?v={{ $item['id']['videoId'] }}"
                                        class="btn btn-primary" target="_blank" style="background-color:tomato; border:none">Go To Video</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="ml-5">{{ $data }}</p>
            @endif
        </div>
    </div>
    <!--Container Main end-->
    <script src="/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

    <script type="text/javascript">
        $('#keywordForm').on('submit', function(e) {
            e.preventDefault();

            let keyword = $('#keyword').val();

            $.ajax({
                url: form.prop('action'),
                type: "post",
                data: {
                    "_token": "{{ csrf_token() }}",
                    keyword: keyword,
                },
                success: function(response) {
                    console.log(data);

                }
                error: function(response) {
                    $('#nameErrorMsg').text("Tidak Ada Hasil");
                },
            });
        });
    </script>
</body>

</html>
