<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Hasil Pemilu</title>
    </head>

    <body>
        <table>
            <thead>
                <tr>
                    <th>Profil</th>
                    <th>Suara</th>
                    <th>Suara Partai</th>
                    <th>TPS</th>
                    <th>Desa</th>
                    <th>Kecamatan</th>
                    <th>Kabupaten</th>
                    <th>Provinsi</th>
                    <th>Partai</th>
                    <th>Dapil</th>
                    <th>Tipe Pemilihan</th>
                    <th>Periode</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($election as $item)
                    <tr>
                        <td>{{ $item->tps->dapil->project->profile->name ?? '' }}</td>
                        <td>{{ $item->vote }}</td>
                        <td>{{ $item->vote_party }}</td>
                        <td>{{ $item->tps->name ?? '' }}</td>
                        <td>{{ $item->tps->desa->name ?? '' }}</td>
                        <td>{{ $item->tps->desa->kecamatan->name ?? '' }}</td>
                        <td>{{ $item->tps->desa->kecamatan->kabupaten->type ?? '' }} {{ $item->tps->desa->kecamatan->kabupaten->name ?? '' }}</td>
                        <td>{{ $item->tps->desa->kecamatan->kabupaten->provinsi->name ?? '' }}</td>
                        <td>{{ $item->tps->dapil->project->party->name ?? '' }}</td>
                        <td>{{ $item->tps->dapil->name ?? '' }}</td>
                        <td>{{ $item->tps->dapil->project->election_type->name ?? '' }}</td>
                        <td>{{ $item->tps->dapil->project->periode->name ?? '' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>

</html>
