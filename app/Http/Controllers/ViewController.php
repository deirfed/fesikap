<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Faker\Factory as Faker;


class ViewController extends Controller
{
    // DASHBORD UTAMA
    public function dashboard()
    {
        $jenis = ['Sosialisasi Perda', 'Visit', 'Program'];
        $desa = ['Sindang Agung', 'Cilimus', 'Ciawigebang', 'Kuningan', 'Lebakwangi'];

        $kunjungan = collect(range(1, 10))->map(function ($i) use ($jenis, $desa) {
            return [
                'no' => $i,
                'tanggal' => now()->subDays(rand(1, 100))->format('d/m/y'),
                'jenis' => $jenis[array_rand($jenis)],
                'desa' => $desa[array_rand($desa)],
            ];
        });

        return view('pages.shared.dashboard', compact('kunjungan'));
    }

    // ADMINPAGE
    public function admin_page()
    {
        $jenis = ['Sosialisasi Perda', 'Visit', 'Program'];
        $desa = ['Sindang Agung', 'Cilimus', 'Ciawigebang', 'Kuningan', 'Lebakwangi'];

        $kunjungan = collect(range(1, 10))->map(function ($i) use ($jenis, $desa) {
            return [
                'no' => $i,
                'tanggal' => now()->subDays(rand(1, 100))->format('d/m/y'),
                'jenis' => $jenis[array_rand($jenis)],
                'desa' => $desa[array_rand($desa)],
            ];
        });

        return view('pages.admin.index', compact('kunjungan'));
    }

    // SETING USER

    // DATA PEMILU (SAMA KYK DI CMS)
    public function data_pemilu()
    {
        $faker = Faker::create('id_ID');

        $provinsi = 'Jawa Barat';
        $kabupatens = ['Kuningan', 'Ciamis', 'Pangandaran', 'Banjar'];
        $dapilList = ['Jabar XIII', 'Jabar II', 'Jabar VI'];

        $users = [];

        for ($i = 1; $i <= 10; $i++) {
            $kabupaten = $faker->randomElement($kabupatens);
            $kecamatan = $faker->citySuffix;
            $desa = $faker->streetName;

            $users[] = [
                'no' => $i,
                'nama' => $faker->name,
                'alamat' => $faker->address,
                'profil' => $faker->name,
                'periode' => $faker->randomElement(['2019-2024', '2024-2029']),
                'dapil' => $faker->randomElement($dapilList),
                'desa' => $desa,
                'kecamatan' => $kecamatan,
                'kabupaten' => $kabupaten,
                'provinsi' => $provinsi,
            ];
        }

        return view('pages.admin.datapemilu', compact('users'));
    }

    public function profile()
    {
        return view('pages.shared.profile');
    }

    public function form_activity()
    {
        return view('pages.admin.form-activity');
    }

    public function detail()
    {
        return view('pages.shared.detail-kunjungan');
    }
}
