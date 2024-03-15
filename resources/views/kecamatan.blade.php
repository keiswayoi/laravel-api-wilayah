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
        <p><strong>TOTAL DISTRICT: {{ $districtCount }}</strong></p>
        <p><strong>TOTAL KECAMATAN: {{ $kecamatanCount }}</strong></p>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kecamatan</th>
                    <th scope="col">District</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @php
                    // $sortedKecamatans = $kecamatans->sortBy('name');
                    $i = 0;
                @endphp
                @foreach ($kecamatans as $index => $kecamatan)
                    @php
                    $kecamatan_name = strtolower($kecamatan->name);
                    $kecamatan_name = str_replace('  ', ' ', $kecamatan_name);
                    $kecamatan_name = trim($kecamatan_name);

                    $district = $district_maps->get($kecamatan_name);

                    if ($district) continue;

                    $i++;
                    @endphp
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $kecamatan->name }}</td>
                        <td>{{ !$district ? '-' : $district }}</td>
                        <td>
                            @if ($district)
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
