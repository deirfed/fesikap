let isuList = [];

document.getElementById("addIsuBtn").addEventListener("click", function () {
    const select = document.getElementById("isuSelect");
    const detail = document.getElementById("isuDetail");
    const isu = select.value;
    const masalah = detail.value.trim();

    if (!isu || !masalah) return;

    isuList.push({
        isu,
        masalah,
    });

    select.selectedIndex = 0;
    detail.value = "";

    renderIsuList();
});

function renderIsuList() {
    const container = document.getElementById("isuList");
    container.innerHTML = "";

    isuList.forEach((item, index) => {
        const card = document.createElement("div");
        card.className = "card border border-success p-2";

        card.innerHTML = `
        <div class="d-flex justify-content-between">
            <div>
                <strong>${item.isu}</strong><br>
                <small>${item.masalah}</small>
            </div>
            <button type="button" class="btn btn-sm btn-danger" onclick="hapusIsu(${index})">Hapus</button>
        </div>
    `;

        container.appendChild(card);
    });

    document.getElementById("daftarIsuInput").value = JSON.stringify(isuList);
}

function hapusIsu(index) {
    isuList.splice(index, 1);
    renderIsuList();
}

window.hapusIsu = hapusIsu;
