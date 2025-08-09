<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Hasil Pemilu</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                font-size: 9px;
                margin: 0;
                padding: 0;
            }

            h2 {
                text-align: center;
                margin-bottom: 0px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 5px;
            }

            th,
            td {
                border: 1px solid #000;
                padding: 3px 5px;
                text-align: left;
            }

            th {
                background-color: #f2f2f2;
                font-weight: bold;
                text-align: center;
            }

            .header {
                text-align: center;
                margin-bottom: 10px;
            }

            .header h1 {
                margin: 0;
                font-size: 16px;
                font-weight: bold;
                text-transform: uppercase;
            }

            .sub-header {
                font-size: 11px;
                color: #333;
                margin-top: 3px;
                border-top: 1px solid #000;
                padding-top: 3px;
            }

            .sub-header span {
                display: inline-block;
                margin: 0 3px;
            }
        </style>
    </head>

    <body>
        <div class="header">
            <h1>Hasil Pemilu</h1>
            <div class="sub-header">
                <span>{{ $project->election_type->name ?? 'N/A' }}</span> -
                <span>Periode: {{ $project->periode->name ?? 'N/A' }}</span> -
                <span>{{ $project->profile->nama_lengkap ?? 'N/A' }}</span>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th style="width: 15px">No</th>
                    <th>Profile</th>
                    <th>Suara</th>
                    <th>Suara Partai</th>
                    <th>Total</th>
                    <th>TPS</th>
                    <th>Desa</th>
                    <th>Kecamatan</th>
                    <th>Kabupaten/Kota</th>
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
                        <td style="text-align:center">{{ $loop->iteration }}</td>
                        <td>{{ $item->tps->dapil->project->profile->nama_lengkap ?? '' }}</td>
                        <td style="text-align:right">{{ $item->vote }}</td>
                        <td style="text-align:right">{{ $item->vote_party }}</td>
                        <td style="text-align:right">{{ $item->vote + $item->vote_party }}</td>
                        <td>{{ $item->tps->name ?? '' }}</td>
                        <td>{{ $item->tps->desa->name ?? '' }}</td>
                        <td>{{ $item->tps->desa->kecamatan->name ?? '' }}</td>
                        <td>{{ $item->tps->desa->kecamatan->kabupaten->name ?? '' }}</td>
                        <td>{{ $item->tps->desa->kecamatan->kabupaten->provinsi->name ?? '' }}</td>
                        <td>{{ $item->tps->dapil->project->party->code ?? '' }}</td>
                        <td>{{ $item->tps->dapil->name ?? '' }}</td>
                        <td>{{ $item->tps->dapil->project->election_type->name ?? '' }}</td>
                        <td>{{ $item->tps->dapil->project->periode->name ?? '' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>

</html>
