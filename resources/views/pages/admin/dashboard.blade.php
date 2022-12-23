@extends('layouts.admin')

@section('title')
Dashboard
@endsection

@section('welcome-text')
Dashboard Sistem Informasi Website Wisata Bengkulu
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="statistics-details d-flex align-items-center justify-content-between">
                    <div>
                        <p class="statistics-title">Jumlah Wisata</p>
                        <h3 class="rate-percentage">Total : {{ $wisata }}</h3>
                    </div>
                    <div>
                        <p class="statistics-title">Jumlah Berita</p>
                        <h3 class="rate-percentage">Total : {{ $berita }}</h3>
                    </div>
                    <div>
                        <p class="statistics-title">Total View Wisata Hari Ini</p>
                        <h3 class="rate-percentage">Total : {{ $wisataView }}</h3>
                    </div>
                    <div class="d-none d-md-block">
                        <p class="statistics-title">Total View Berita Hari Ini</p>
                        <h3 class="rate-percentage">Total : {{ $beritaView }}</h3>
                    </div>
                    <div class="d-none d-md-block">
                        <p class="statistics-title">Total View Wisata Minggu Ini</p>
                        <h3 class="rate-percentage">Total : {{ $wisataViewWeek }}</h3>
                    </div>
                    <div class="d-none d-md-block">
                        <p class="statistics-title">Total View Berita Minggu Ini</p>
                        <h3 class="rate-percentage">Total : {{ $beritaViewWeek }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row flex-grow mt-4">
    <div class="col-12 grid-margin stretch-card">
        <div class="card card-rounded">
            <div class="card-body">
                <div class="d-sm-flex justify-content-between align-items-start">
                    <div>
                        <h4 class="card-title card-title-dash">Grafik Wisata</h4>
                        <p class="card-subtitle card-subtitle-dash">Grafik dibawah menunjukkan kunjungan website
                            berdasarkan tempat wisata</p>
                    </div>
                </div>
                <div class="d-sm-flex align-items-center mt-1 justify-content-between">
                    <div class="me-3">
                        <div id="total-kunjungan-legend"></div>
                    </div>
                </div>
                <div class="chartjs-bar-wrapper mt-3">
                    <canvas id="totalKunjungan"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
<script>
    if ($("#totalKunjungan").length) {
        var marketingOverviewChart = document.getElementById("totalKunjungan").getContext('2d');
        var wisata = {!! $wisataId !!};
        var marketingOverviewData = {
            labels: {!! $wisataNama !!},
            datasets: [{
                label: 'Total Kunjungan Hari Ini',
                data: [
                    @foreach($wisataId as $item)
                        "{!! App\Helpers\MyHelper::countViewWisata($item) !!}",
                    @endforeach
                ],
                backgroundColor: "#1F3BB3",
                borderColor: [
                    '#1F3BB3',
                ],
                borderWidth: 0,
                fill: true, // 3: no fill
            }, {
                label: 'Total Kunjungan Minggu Ini',
                data: [
                    @foreach($wisataId as $item)
                        "{!! App\Helpers\MyHelper::countViewWisataWeek($item) !!}",
                    @endforeach
                ],
                backgroundColor: "#52CDFF",
                borderColor: [
                    '#52CDFF',
                ],
                borderWidth: 0,
                fill: true,
            }]
        };

        var marketingOverviewOptions = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    gridLines: {
                        display: true,
                        drawBorder: false,
                        color: "#F0F0F0",
                        zeroLineColor: '#F0F0F0',
                    },
                    ticks: {
                        beginAtZero: true,
                        autoSkip: true,
                        maxTicksLimit: 5,
                        fontSize: 10,
                        stepSize: 1,
                        color: "#6B778C"
                    }
                }],
                xAxes: [{
                    stacked: true,
                    barPercentage: 0.35,
                    gridLines: {
                        display: false,
                        drawBorder: false,
                    },
                    ticks: {
                        beginAtZero: false,
                        autoSkip: true,
                        maxTicksLimit: 12,
                        fontSize: 10,
                        color: "#6B778C"
                    }
                }],
            },
            legend: false,
            legendCallback: function (chart) {
                var text = [];
                text.push('<div class="chartjs-legend"><ul>');
                for (var i = 0; i < chart.data.datasets.length; i++) {
                    console.log(chart.data.datasets[i]); // see what's inside the obj.
                    text.push('<li class="text-muted text-small">');
                    text.push('<span style="background-color:' + chart.data.datasets[i].borderColor + '">' +
                        '</span>');
                    text.push(chart.data.datasets[i].label);
                    text.push('</li>');
                }
                text.push('</ul></div>');
                return text.join("");
            },

            elements: {
                line: {
                    tension: 0.4,
                }
            },
            tooltips: {
                backgroundColor: 'rgba(31, 59, 179, 1)',
            }
        }
        var totalKunjungan = new Chart(marketingOverviewChart, {
            type: 'bar',
            data: marketingOverviewData,
            options: marketingOverviewOptions
        });
        document.getElementById('total-kunjungan-legend').innerHTML = totalKunjungan.generateLegend();
    }
</script>
@endpush
