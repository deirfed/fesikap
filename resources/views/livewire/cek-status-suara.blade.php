<div>
    <div class="row mb-3">
        <div class="col-12 col-md-6">
            <label class="form-label required">Kabupaten/Kota</label>
            <select wire:model.live="kabupaten_id" name="{{ $prefix }}kabupaten_id"
                id="{{ $prefix }}kabupaten_id" class="form-select border border-dark p-2" required>
                <option value="">- pilih kabupaten/kota -</option>
                @foreach ($kabupaten as $item)
                    <option value="{{ $item->id }}">{{ $item->type }} {{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12 col-md-6">
            <label class="form-label required">Kecamatan</label>
            <select wire:model.live="kecamatan_id" name="{{ $prefix }}kecamatan_id"
                id="{{ $prefix }}kecamatan_id" class="form-select border border-dark p-2"
                {{ is_null($kabupaten_id) ? 'disabled' : '' }} required>
                <option value="">- pilih kecamatan -</option>
                @foreach ($kecamatan as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    @if ($pemilu->count() > 0)
        <div class="mt-4">
            <div class="table-responsive p-2">
                <table class="table table-bordered text-center table-striped table-vcenter table-sm fs-sm text-nowrap align-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Desa</th>
                            <th>Suara</th>
                            <th>Suara Partai</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pemilu as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td style="text-align: left">{{ $item->tps->desa->name ?? 'N/A' }}</td>
                                <td>{{ $item->vote ?? 'N/A' }}</td>
                                <td>{{ $item->vote_party ?? 'N/A' }}</td>
                                <td>{{ $item->vote + $item->vote_party }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @elseif ($pemilu->count() == 0 && $kecamatan_id != null)
            <div class="mt-4">
            <div class="table-responsive p-2">
                <table class="table table-bordered text-center table-striped table-vcenter table-sm fs-sm text-nowrap align-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Desa</th>
                            <th>Suara</th>
                            <th>Suara Partai</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td colspan="5">Tidak ada data suara ditemukan.</td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
