function generateKabupaten() {
    const dataKab = [];
    for (let i = 1; i <= 4; i++) {
        const name = `Kab. ${i}`;
        const y = Math.floor(Math.random() * 20) + 1;
        const drilldown = `Kab${i}`;
        dataKab.push({
            name: name,
            color: "#4CAF50",
            y: y,
            drilldown: drilldown,
        });
    }
    return dataKab;
}
function generateKecamatan() {
    const dataKec = [];
    for (let i = 1; i <= 20; i++) {
        const name = `Kec. ${i}`;
        const value = Math.floor(Math.random() * 20) + 1;
        dataKec.push([name, value]);
    }
    return dataKec;
}
function generateDataSeries() {
    const series = [];
    for (let i = 1; i <= 4; i++) {
        series.push({
            name: `Kab${i}`,
            id: `Kab${i}`,
            color: "#4CAF50",
            data: generateKecamatan(),
        });
    }
    return series;
}

Highcharts.chart("chartAspirasi", {
    chart: {
        type: "column",
        backgroundColor: "transparent",
    },
    title: { text: "", style: { color: "black" } },
    subtitle: {
        text: "Sumber: Data Internal",
        style: { color: "black" },
    },
    accessibility: { announceNewData: { enabled: true } },
    xAxis: { type: "category", labels: { style: { color: "black" } } },
    yAxis: {
        title: {
            text: "Jumlah Aspirasi",
            style: { color: "black" },
        },
        labels: { style: { color: "black" } },
    },
    legend: {
        enabled: false,
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: "{point.y} Aspirasi",
                style: { color: "black" },
            },
        },
    },
    tooltip: {
        backgroundColor: "#222",
        style: {
            color: "white",
        },
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat:
            '<span style="color:{point.color}">{point.name}</span>: ' +
            "<b>{point.y} Aspirasi</b>",
    },
    series: [
        {
            name: "Kabupaten",
            colorByPoint: true,
            data: generateKabupaten(),
        },
    ],
    drilldown: {
        breadcrumbs: {
            position: {
                align: "right",
            },
            style: { color: "black", textDecoration: "none" },
            theme: {
                style: { color: "black", textDecoration: "none" },
                hoverStyle: { color: "black", textDecoration: "none" },
                activeStyle: { color: "white", textDecoration: "none" },
            },
        },
        activeDataLabelStyle: {
            textDecoration: "none",
            color: "black",
            fontWeight: "normal",
        },
        activeAxisLabelStyle: {
            textDecoration: "none",
            color: "black",
            fontWeight: "normal",
        },
        series: generateDataSeries(),
    },
});
