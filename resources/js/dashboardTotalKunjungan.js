function generateKunjungan(tahun) {
    const dataDummy = {
        2023: Array.from(
            {
                length: 12,
            },
            () => Math.floor(Math.random() * 20 + 5)
        ),
        2024: Array.from(
            {
                length: 12,
            },
            () => Math.floor(Math.random() * 25 + 5)
        ),
        2025: Array.from(
            {
                length: 12,
            },
            () => Math.floor(Math.random() * 30 + 5)
        ),
    };
    return dataDummy[tahun] || [];
}

function getBulanCategories() {
    return [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Dec",
    ];
}

function getSeriesKunjungan(data) {
    return [
        {
            name: "Kunjungan",
            color: "#4CAF50",
            data: data,
        },
    ];
}

function renderChartKunjungan(tahun) {
    document.getElementById("tahun-terpilih").textContent = tahun;
    Highcharts.chart("totalKunjungan", {
        chart: {
            type: "column",
            backgroundColor: "transparent",
        },
        title: {
            text: "",
        },
        subtitle: {
            text: "Source: Internal Data",
        },
        xAxis: {
            categories: getBulanCategories(),
            crosshair: true,
            accessibility: {
                description: "Bulan",
            },
        },
        yAxis: {
            min: 0,
            title: {
                text: "Jumlah Kunjungan",
            },
        },
        tooltip: {
            valueSuffix: " Kali",
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0,
            },
        },
        series: getSeriesKunjungan(generateKunjungan(tahun)),
    });
}

function updateChartTahun() {
    const tahun = document.getElementById("pilihTahun").value;
    renderChartKunjungan(tahun);
}

window.updateChartTahun = function () {
    const tahun = document.getElementById("pilihTahun").value;
    renderChartKunjungan(tahun);
};

document.addEventListener("DOMContentLoaded", function () {
    renderChartKunjungan("2025");
});
