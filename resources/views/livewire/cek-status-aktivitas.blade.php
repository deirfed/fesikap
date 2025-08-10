<div>
    <div class="row mb-3">
        <div class="col-12 col-md-4">
            <label class="form-label required">Kabupaten/Kota</label>
            <select wire:model.live="kabupaten_id" name="{{ $prefix }}kabupaten_id"
                id="{{ $prefix }}kabupaten_id" class="form-select border border-dark p-2" required>
                <option value="">- pilih kabupaten/kota -</option>
                @foreach ($kabupaten as $item)
                    <option value="{{ $item->id }}">{{ $item->type }} {{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12 col-md-4">
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
        <div class="col-12 col-md-4">
            <label class="form-label required">Desa</label>
            <select wire:model.live="desa_id" name="{{ $prefix }}desa_id" id="{{ $prefix }}desa_id"
                class="form-select border border-dark p-2" {{ is_null($kecamatan_id) ? 'disabled' : '' }} required>
                <option value="">- pilih desa -</option>
                @foreach ($desa as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    @if ($visit != null)
        <div class="mt-4">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>Desa {{ $desa_visit->name ?? 'N/A' }}</strong>
                        <br>
                        <a href="#">
                            <small class="text-success">Dikunjungi: {{ $visit->date ?? 'N/A' }}</small>
                        </a>
                    </div>
                    <span class="badge rounded-pill bg-success">
                        Sudah Dikunjungi
                    </span>
                </li>
            </ul>
        </div>
    @elseif ($desa_visit != null)
        <div class="mt-4">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>Desa {{ $desa_visit->name ?? 'N/A' }}</strong>
                        <br>
                        <a href="#">
                            {{-- <small class="text-success">Dikunjungi: N/A</small> --}}
                        </a>
                    </div>
                    <span class="badge rounded-pill bg-secondary">
                        Belum Dikunjungi
                    </span>
                </li>
            </ul>
        </div>
    @endif
</div>
