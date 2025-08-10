<?php

namespace App\Livewire;

use App\Models\Dapil;
use App\Models\Desa;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\RelasiDapil;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FilterLokasi extends Component
{
    public $kabupaten_id = null;
    public $kecamatan_id = null;
    public $desa_id = null;
    public $prefix = '';

    public function mount($prefix = '', $kabupaten_id = null, $kecamatan_id = null, $desa_id = null)
    {
        $this->prefix = $prefix;
        $this->kabupaten_id = $kabupaten_id;
        $this->kecamatan_id = $kecamatan_id;
        $this->desa_id = $desa_id;
    }

    public function updatedKabupatenId()
    {
        $this->kecamatan_id = null;
        $this->desa_id = null;
    }

    public function updatedKecamatanId()
    {
        $this->desa_id = null;
    }

    public function render()
    {
        $project = Auth::user()->project;
        $project_id = $project->id;
        $dapil = Dapil::where('project_id', $project_id)->first();
        $kabupaten_ids = RelasiDapil::where('dapil_id', $dapil->id)->pluck('kabupaten_id');
        $kabupaten = Kabupaten::whereIn('id', $kabupaten_ids)->get();
        $kecamatan = collect();
        $desa = collect();

        if ($this->kabupaten_id) {
            $kecamatan = Kecamatan::query()
                ->when($this->kabupaten_id, function($query) {
                    return $query->where('kabupaten_id', $this->kabupaten_id);
                })
                ->orderBy('name', 'ASC')
                ->get();
        }

        if ($this->kecamatan_id) {
            $desa = Desa::query()
                ->when($this->kecamatan_id, function($query) {
                    return $query->where('kecamatan_id', $this->kecamatan_id);
                })
                ->orderBy('name', 'ASC')
                ->get();
        }

        return view('livewire.filter-lokasi', compact([
            'kabupaten',
            'kecamatan',
            'desa',
        ]));
    }
}
