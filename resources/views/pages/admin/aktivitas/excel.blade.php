<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Data Aktivitas</title>
    </head>

    <body>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Profile</th>
                    <th>Tanggal</th>
                    <th>Jenis Kunjungan</th>
                    <th>Desa</th>
                    <th>Kecamatan</th>
                    <th>Kabupaten/Kota</th>
                    <th>Provinsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($aktivitas as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->project->profile->nama_lengkap ?? '' }}</td>
                        <td>{{ $item->date ?? '' }}</td>
                        <td>{{ $item->visit_type->name ?? '' }}</td>
                        <td>{{ $item->desa->name ?? '' }}</td>
                        <td>{{ $item->desa->kecamatan->name ?? '' }}</td>
                        <td>{{ $item->desa->kecamatan->kabupaten->type ?? '' }} {{ $item->desa->kecamatan->kabupaten->name ?? '' }}</td>
                        <td>{{ $item->desa->kecamatan->kabupaten->provinsi->name ?? '' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>

</html>
