import Chart from "chart.js/auto";

document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll('canvas[id^="chart-"]').forEach((canvas) => {
        const ctx = canvas.getContext("2d");
        const labels = JSON.parse(canvas.dataset.labels || "[]");
        const data = JSON.parse(canvas.dataset.data || "[]");

        if (labels.length === 0 || data.length === 0) return;

        new Chart(ctx, {
            type: "bar",
            data: {
                labels: labels,
                datasets: [
                    {
                        label: "success_rate (%)",
                        data: data,
                        backgroundColor: "rgba(54, 162, 235, 0.6)",
                        borderColor: "rgba(54, 162, 235, 1)",
                        borderWidth: 1,
                        borderRadius: 5,
                    },
                ],
            },
            options: {
                responsive: true,
                animation: {
                    duration: 1200,
                    easing: "easeOutBounce", // biar batangnya muncul lembut
                },
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: (ctx) => ` ${ctx.parsed.y}%`,
                        },
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        title: {
                            display: true,
                            text: "Persentase Keberhasilan",
                        },
                    },
                    x: {
                        ticks: {
                            maxRotation: 45,
                            minRotation: 0,
                        },
                    },
                },
            },
        });
    });
});

console.log("Chart.js aktif untuk", canvas.id);
console.log("Labels:", labels);
console.log("Data:", data);
