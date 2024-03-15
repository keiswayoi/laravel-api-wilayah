<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="antialiased">
    <div class="container">
        <h1 class="mt-5">TABEL PERBANDINGAN</h1>
        <p><strong>TOTAL SUBDISTRICT: {{ $subdistrictCount }}</strong></p>
        <p><strong>TOTAL KELURAHAN: {{ $kelurahanCount }}</strong></p>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kelurahan</th>
                    <th scope="col">Subdistrict</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 0;
                @endphp
                @foreach ($kelurahans as $index => $kelurahan)
                    @php
                    $kelurahan_name = strtolower($kelurahan->name);
                    $kelurahan_name = str_replace('  ', ' ', $kelurahan_name);
                    $kelurahan_name = trim($kelurahan_name);

                    $subdistrict = $subdistrict_maps->get($kelurahan_name);

                    if ($subdistrict) continue;

                    $i++;
                    @endphp
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $kelurahan->name }}</td>
                        <td>{{ !$subdistrict ? '-' : $subdistrict }}</td>
                        <td>
                            @if ($subdistrict)
                                -
                            @else
                                Tidak Sama
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
