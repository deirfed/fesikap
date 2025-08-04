const kecamatanData = {};
const desaData = {};

function autoGenerateFull(
    jumlahKabupaten = 4,
    jumlahKecamatan = 3,
    jumlahDesa = 2
) {
    for (let k = 1; k <= jumlahKabupaten; k++) {
        const kabupatenName = `kabupaten-${k}`;
        const kecamatanList = [];

        for (let i = 1; i <= jumlahKecamatan; i++) {
            const namaKec = `Kecamatan ${i}`;
            kecamatanList.push(namaKec);

            const desaList = [];
            for (let j = 1; j <= jumlahDesa; j++) {
                desaList.push({
                    nama: `Desa ${j}`,
                    suara: 100 + k * 10 + i * 5 + j * 3,
                });
            }

            desaData[namaKec] = desaList;
        }

        kecamatanData[kabupatenName] = kecamatanList;
    }
}

autoGenerateFull();

const kabupatenSelect = document.getElementById("pilihKab");
const kecamatanSelect = document.getElementById("pilihKec");
const tableContainer = document.getElementById("tableContainer");

kabupatenSelect.addEventListener("change", function () {
    const selectedKabupaten = kabupatenSelect.value;

    kecamatanSelect.innerHTML =
        "<option selected disabled>-- Pilih Kecamatan --</option>";

    if (kecamatanData[selectedKabupaten]) {
        kecamatanData[selectedKabupaten].forEach((kec) => {
            const option = document.createElement("option");
            option.value = kec;
            option.textContent = kec;
            kecamatanSelect.appendChild(option);
        });
        kecamatanSelect.disabled = false;
    } else {
        kecamatanSelect.disabled = true;
    }

    tableContainer.innerHTML = "";
});

kecamatanSelect.addEventListener("change", function () {
    const selectedKecamatan = kecamatanSelect.value;
    const desaList = desaData[selectedKecamatan] || [];

    const html = `
        <div class="table-responsive mt-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Desa</th>
                        <th class="text-center">Suara Terbanyak</th>
                    </tr>
                </thead>
                <tbody>
                    ${desaList
                        .map(
                            (desa, index) => `
                                <tr>
                                    <td class="text-center">${index + 1}</td>
                                    <td class="text-center">${desa.nama}</td>
                                    <td class="text-center">${desa.suara}</td>
                                </tr>
                            `
                        )
                        .join("")}
                </tbody>
            </table>
        </div>
    `;
    tableContainer.innerHTML = html;
});
