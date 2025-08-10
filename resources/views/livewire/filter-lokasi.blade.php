<div>
    <div class="mb-3">
        <label class="form-label required">Kabupaten/Kota</label>
        <select wire:model.live="kabupaten_id" name="{{ $prefix }}kabupaten_id" id="{{ $prefix }}kabupaten_id"
            class="form-select border border-dark p-2">
            <option value="">-- pilih kabupaten/kota --</option>
            @foreach ($kabupaten as $item)
                <option value="{{ $item->id }}">{{ $item->type }} {{ $item->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label required">Kecamatan</label>
        <select wire:model.live="kecamatan_id" name="{{ $prefix }}kecamatan_id"
            id="{{ $prefix }}kecamatan_id" class="form-select border border-dark p-2"
            {{ is_null($kabupaten_id) ? 'disabled' : '' }}>
            <option value="">-- pilih kecamatan --</option>
            @foreach ($kecamatan as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label required">Desa</label>
        <select wire:model.live="desa_id" name="{{ $prefix }}desa_id" id="{{ $prefix }}desa_id"
            class="form-select border border-dark p-2" {{ is_null($kecamatan_id) ? 'disabled' : '' }}>
            <option value="">-- pilih desa --</option>
            @foreach ($desa as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div>
</div>
