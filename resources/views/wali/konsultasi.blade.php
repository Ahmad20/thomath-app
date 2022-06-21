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
            Konsultasi
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
            </svg>
            <span class="admin_name">{{ $wali->name }}</span>
        </div>
    </header>
    @include('wali.partials.newside')

    <!--Container Main start-->
    <div class="height-100">
        <form method="post" action="konsultasi/{{ $wali->id_wali_murid }}">
            @csrf
            <div class="form-group row m-3">
                <div class="form-group col-md-6">
                    <label for="inputEmail4" style="width: 50%;">Email Siswa</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Email" name="email" value="{{ $wali->siswa->email }}" readonly>
                </div>
                @error('email')
                    <div class="invalid-feedback" style="margin-top: 570px; margin-left: -1005px;">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Topik</label>
                    <input type="text" class="form-control" id="inputPassword4" placeholder="Topik" name="topik">
                </div>
            </div>
            <div class="form-group row m-3">
                <div class="form-group col-md-6">
                    <label for="tahun">Tahun</label>
                    <select class="form-control" id="tahun" name="tahun">
                        <option value="2021/2022">2021/2022</option>
                        <option value="2020/2021">2020/2021</option>
                        <option value="2019/2020">2019/2020</option>
                    </select>
                </div>
                <div class="form-group col-md-6 date-picker">
                    <label for="tanggal">Tanggal</label>
                    <input class="form-control" type="datetime-local" id="tanggal" name="tanggal">
                </div>
            </div>
            <div class="form-group row m-3">
                <div class="form-group col-md-12">
                    <label for="deskripsi">Deskripsi:</label>
                    <textarea class="form-control" name="deskripsi" id="deskripsi"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary ms-4">Submit</button>
        </form>
    </div>
    <!--Container Main end-->
    <script src="/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script>
        // Test Editor
        ClassicEditor
            .create(document.querySelector('#deskripsi'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    

</body>

</html>
