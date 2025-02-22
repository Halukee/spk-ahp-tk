var baseurl = $('.baseurl').data('value');
var label = [];
var bobot = [];

var loadData = () => {
    $.ajax({
        url: `${baseurl}/GrafikKriteria/loadData`,
        type: 'get',
        dataType: 'json',
        success: function (data) {
            label = data.label;
            bobot = data.value;

            const ctx = document.getElementById('grafik_kriteria');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: label,
                    datasets: [{
                        label: 'Grafik Kriteria',
                        data: bobot,
                        borderWidth: 1,
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        },
        error: function (xhr, status, error) {
            console.error('Error loading data:', error);
        }
    });
};

$(document).ready(function () {
    loadData();
});
