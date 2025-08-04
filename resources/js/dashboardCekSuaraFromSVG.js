document.querySelectorAll(".pulse").forEach((el) => {
    el.addEventListener("click", function () {
        document.querySelectorAll(".pulse").forEach((c) => {
            c.classList.remove("clicked", "clicked-glow", "pulse-on");
        });
        this.classList.add("clicked", "clicked-glow");
        this.classList.remove("pulse-on");
    });
});

// Funmsi Dummy
function generateDummyWilayahData(namaKabupatenArray, jumlahKecamatanPerKab) {
    const result = {};
    namaKabupatenArray.forEach((kabName, i) => {
        const kecamatanList = [];
        const jumlahKecamatan = Array.isArray(jumlahKecamatanPerKab)
            ? jumlahKecamatanPerKab[i] || 0
            : jumlahKecamatanPerKab;
        for (let j = 0; j < jumlahKecamatan; j++) {
            kecamatanList.push(`Kecamatan ${j + 1}`);
        }
        result[kabName] = kecamatanList;
    });
    return result;
}

// Fu8nsi Dummy
function generateDummySuaraData(kecamatanData) {
    const result = {};
    Object.entries(kecamatanData).forEach(([kabupaten, kecamatanList]) => {
        result[kabupaten] = {};
        kecamatanList.forEach((kec, indexKec) => {
            const desaArray = Array.from(
                { length: Math.floor(Math.random() * 5 + 3) },
                (_, i) => ({
                    nama: `Desa ${indexKec + 1}.${i + 1}`,
                    suara: Math.floor(Math.random() * 1000 + 100),
                    suara_partai: Math.floor(Math.random() * 500 + 50),
                    tps: Math.floor(Math.random() * 10 + 1),
                })
            );
            result[kabupaten][kec] = {
                suara: Math.floor(Math.random() * 10000 + 1000),
                suara_partai: Math.floor(Math.random() * 5000 + 500),
                tps: desaArray.reduce((acc, desa) => acc + desa.tps, 0),
                desa: desaArray,
            };
        });
    });
    return result;
}

const namaKabupaten = ["Kuningan", "Ciamis", "Banjar", "Pangandaran"];
const kecamatanData = generateDummyWilayahData(namaKabupaten, [3, 3, 2, 3]);
const dataSuara = generateDummySuaraData(kecamatanData);

let pilihKabupaten = null;

document.querySelectorAll("circle[data-kab]").forEach((circle) => {
    circle.addEventListener("click", function () {
        pilihKabupaten = this.getAttribute("data-kab");

        const listKecamatan = kecamatanData[pilihKabupaten] || [];
        const wrapper = document.getElementById("dropdown-wrapper");
        const dropdown = document.getElementById("kecamatanDropdown");
        const label = document.getElementById("kecamatanLabel");
        const keterangan = document.getElementById("keterangan-kecamatan");

        label.innerText = `Pilih Kecamatan (Kabupaten ${pilihKabupaten}):`;
        dropdown.innerHTML = `<option selected disabled>Pilih kecamatan...</option>`;
        keterangan.innerHTML = "";

        document.getElementById("desa-wrapper").classList.add("d-none");
        document.getElementById("desaDropdown").innerHTML = "";
        document.getElementById("keterangan-desa").innerHTML = "";

        listKecamatan.forEach((kec) => {
            const option = document.createElement("option");
            option.value = kec;
            option.textContent = kec;
            dropdown.appendChild(option);
        });

        wrapper.classList.remove("d-none");
    });
});

document
    .getElementById("kecamatanDropdown")
    .addEventListener("change", function () {
        const pilihKecamatan = this.value;
        const keterangan = document.getElementById("keterangan-kecamatan");
        const desaWrapper = document.getElementById("desa-wrapper");
        const desaDropdown = document.getElementById("desaDropdown");
        const keteranganDesa = document.getElementById("keterangan-desa");

        const data = dataSuara[pilihKabupaten]?.[pilihKecamatan];

        if (data) {
            keterangan.innerHTML = `
        <div class="border rounded shadow-sm p-3 bg-white">
            <h6 class="mb-3 fw-bold text-dark">Informasi Suara Tingkat Kecamatan:</h6>
            <div class="mb-2"><strong class="text-muted">Kabupaten:</strong>
                <span class="text-success fw-semibold">${pilihKabupaten}</span></div>
            <div class="mb-2"><strong class="text-muted">Kecamatan:</strong>
                <span class="text-success fw-semibold">${pilihKecamatan}</span></div>
            <div class="mb-2"><strong class="text-muted">Jumlah Suara Calon:</strong>
                <span class="fw-medium">${data.suara.toLocaleString()}</span></div>
            <div class="mb-2"><strong class="text-muted">Jumlah Suara Partai:</strong>
                <span class="fw-medium">${data.suara_partai.toLocaleString()}</span></div>
            <div class="mb-2"><strong class="text-muted">Jumlah TPS:</strong>
                <span class="fw-medium">${data.tps}</span></div>
        </div>`;

            desaDropdown.innerHTML = `<option selected disabled>Pilih desa...</option>`;
            data.desa.forEach((desa) => {
                const option = document.createElement("option");
                option.value = desa.nama;
                option.textContent = desa.nama;
                desaDropdown.appendChild(option);
            });

            desaWrapper.classList.remove("d-none");
            keteranganDesa.innerHTML = "";
        } else {
            keterangan.innerHTML = `
        <div class="alert alert-warning">
            <strong>Data tidak tersedia</strong> untuk kecamatan <span class="text-danger">${pilihKecamatan}</span>.
        </div>`;
            desaWrapper.classList.add("d-none");
            desaDropdown.innerHTML = "";
            keteranganDesa.innerHTML = "";
        }
    });

document.getElementById("desaDropdown").addEventListener("change", function () {
    const pilihDesa = this.value;
    const keteranganDesa = document.getElementById("keterangan-desa");

    const pilihKecamatan = document.getElementById("kecamatanDropdown").value;
    const data = dataSuara[pilihKabupaten]?.[pilihKecamatan];

    if (data && data.desa) {
        const desaData = data.desa.find((desa) => desa.nama === pilihDesa);
        if (desaData) {
            keteranganDesa.innerHTML = `
            <div class="border rounded shadow-sm p-3 bg-light mt-3">
                <h6 class="mb-3 fw-bold text-dark">Informasi Suara Tingkat Desa:</h6>
                <div class="mb-2"><strong class="text-muted">Desa:</strong>
                    <span class="text-primary fw-semibold">${
                        desaData.nama
                    }</span></div>
                <div class="mb-2"><strong class="text-muted">Jumlah Suara Calon:</strong>
                    <span class="fw-medium">${desaData.suara.toLocaleString()}</span></div>
                <div class="mb-2"><strong class="text-muted">Jumlah Suara Partai:</strong>
                    <span class="fw-medium">${desaData.suara_partai.toLocaleString()}</span></div>
                <div class="mb-2"><strong class="text-muted">Jumlah TPS:</strong>
                    <span class="fw-medium">${desaData.tps}</span></div>
            </div>`;
        }
    }
});
