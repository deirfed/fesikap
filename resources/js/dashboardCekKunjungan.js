// Fungsi Data Dummy
function generateDummyData(kabupatenList, kecPerKab = 3, desaPerKec = 2) {
    const data = {};

    kabupatenList.forEach((kab) => {
        const kabKey = kab.toLowerCase();
        data[kabKey] = {};

        for (let i = 1; i <= kecPerKab; i++) {
            const kecamatanName = `Kecamatan ${i}`;
            const desaList = [];

            for (let j = 1; j <= desaPerKec; j++) {
                const desaName = `Desa ${String.fromCharCode(64 + i)}${j}`;
                const dikunjungi = Math.random() < 0.5;
                const desa = {
                    nama: desaName,
                    dikunjungi: dikunjungi,
                };

                if (dikunjungi) {
                    const day = String(j).padStart(2, "0");
                    desa.tanggal = `2025-07-${day}`;
                }

                desaList.push(desa);
            }

            data[kabKey][kecamatanName] = desaList;
        }
    });

    return data;
}
const dummyData = generateDummyData([
    "Kuningan",
    "Ciamis",
    "Banjar",
    "Pangandaran",
]);

const pilihKabupaten = document.getElementById("pilihKabupaten");
const pilihKecamatan = document.getElementById("pilihKecamatan");
const pilihDesa = document.getElementById("pilihDesa");
const resultDesa = document.getElementById("resultDesa");

pilihKabupaten.addEventListener("change", function () {
    const selectedKab = this.value;
    pilihKecamatan.innerHTML =
        "<option selected disabled>-- Pilih Kecamatan --</option>";
    pilihDesa.innerHTML = "<option selected disabled>-- Pilih Desa --</option>";
    resultDesa.innerHTML = "";
    pilihDesa.disabled = true;

    if (dummyData[selectedKab]) {
        Object.keys(dummyData[selectedKab]).forEach((kec) => {
            const option = document.createElement("option");
            option.value = kec;
            option.textContent = kec;
            pilihKecamatan.appendChild(option);
        });
        pilihKecamatan.disabled = false;
    } else {
        pilihKecamatan.disabled = true;
    }
});

let dataDesaTerpilih = [];

pilihKecamatan.addEventListener("change", function () {
    const kab = pilihKabupaten.value;
    const kec = this.value;
    pilihDesa.innerHTML = "<option selected disabled>-- Pilih Desa --</option>";
    resultDesa.innerHTML = "";

    if (dummyData[kab] && dummyData[kab][kec]) {
        dataDesaTerpilih = dummyData[kab][kec];

        dataDesaTerpilih.forEach(({ nama }) => {
            const option = document.createElement("option");
            option.value = nama;
            option.textContent = nama;
            pilihDesa.appendChild(option);
        });

        pilihDesa.disabled = false;
    } else {
        pilihDesa.disabled = true;
        dataDesaTerpilih = [];
    }
});

pilihDesa.addEventListener("change", function () {
    const desaTerpilih = this.value;
    resultDesa.innerHTML = "";

    const desaData = dataDesaTerpilih.find((d) => d.nama === desaTerpilih);

    if (desaData) {
        const list = document.createElement("ul");
        list.className = "list-group";

        const item = document.createElement("li");
        item.className =
            "list-group-item d-flex justify-content-between align-items-center";

        const leftContent = document.createElement("div");
        leftContent.innerHTML = `<strong>${desaData.nama}</strong>`;
        if (desaData.dikunjungi && desaData.tanggal) {
            leftContent.innerHTML += `<br><a href="/detail">
            <small class="text-success">Dikunjungi: ${desaData.tanggal}</small>
        </a>`;
        }

        const badge = document.createElement("span");
        badge.className = `badge rounded-pill ${
            desaData.dikunjungi ? "bg-success" : "bg-secondary"
        }`;
        badge.textContent = desaData.dikunjungi
            ? "Sudah Dikunjungi"
            : "Belum Dikunjungi";

        item.appendChild(leftContent);
        item.appendChild(badge);
        list.appendChild(item);
        resultDesa.appendChild(list);
    }
});
