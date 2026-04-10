@extends('layouts.app')
@section('header__title', __('home.Dashboard'))
@section('header__icon', 'fa-solid fa-house')

@section('main')
    <div class="content-wrapper">

        <div class="  container-p-y">
            <div class="row">
                <div class="col-lg-12 mb-3">
                    <div class=" p-3 pb-4">
                        <div class="col-md-12">
                            <h3 class="card-header m-0 px-0 pb-4">{{ __('home.statistics') }}</h3>
                        </div>
                        <div class="row">
                            <div class=" col-lg-3 col-md-6 col-sm-12 p-3">
                                <div class="box__dashboard card p-3 " style="background-color: #E0F7FA;">
                                    <div class="icon-circle" style="background-color: #007BFF;">
                                        <span class="badge p-2" style="background-color: #007BFF;">
                                            <i class="bx bx-wallet text-white"></i>
                                        </span>
                                    </div>
                                    <div class="number">{{ $statistics['balance'] }}</div>
                                    <span>{{ __('home.total_balance') }}</span>
                                </div>
                            </div>
                            <div class=" col-lg-3 col-md-6 col-sm-12 p-3">
                                <div class="box__dashboard card p-3 " style="background-color: #F3E8FF;">
                                    <div class="icon-circle" style="background-color: #6610F2;">
                                        <span class="badge p-2" style="background-color: #6610F2;">
                                            <i class="bx bx-user text-white"></i>
                                        </span>
                                    </div>
                                    <div class="number">{{ $statistics['bookings'] }}</div>
                                    <span>{{ __('home.bookings') }}</span>
                                </div>
                            </div>
                            <div class=" col-lg-3 col-md-6 col-sm-12 p-3">
                                <div class="box__dashboard card p-3 " style="background-color: #DCFCE7;">
                                    <div class="icon-circle" style="background-color: #28A745;">
                                        <span class="badge p-2" style="background-color: #28A745;">
                                            <i class="bx bx-store text-white"></i>
                                        </span>
                                    </div>
                                    <div class="number">{{ $statistics['categories'] }}</div>
                                    <span>{{ __('home.categories') }}</span>
                                </div>
                            </div>
                            <div class=" col-lg-3 col-md-6 col-sm-12 p-3">
                                <div class="box__dashboard card p-3 " style="background-color: #FFF4DE;">
                                    <div class="icon-circle" style="background-color: #FFC107;">
                                        <span class="badge p-2" style="background-color: #FFC107;">
                                            <i class="bx bx-calendar text-white"></i>
                                        </span>
                                    </div>
                                    <div class="number">{{ $statistics['paid'] }}</div>
                                    <span>{{ __('home.paid') }}</span>
                                </div>
                            </div>
                            <div class=" col-lg-3 col-md-6 col-sm-12 p-3">
                                <div class="box__dashboard card p-3 " style="background-color: #FFE2E5;">
                                    <div class="icon-circle" style="background-color: #DC3545;">
                                        <span class="badge p-2" style="background-color: #DC3545;">
                                            <i class="bx bx-football text-white"></i>
                                        </span>
                                    </div>
                                    <div class="number">{{ $statistics['branches'] }}</div>
                                    <span>{{ __('home.branches') }}</span>
                                </div>
                            </div>
                            <div class=" col-lg-3 col-md-6 col-sm-12 p-3">
                                <div class="box__dashboard card p-3 " style="background-color: #E8F5E9;">
                                    <div class="icon-circle" style="background-color: #20C997;">
                                        <span class="badge p-2" style="background-color: #20C997;">
                                            <i class="bx bx-cube text-white"></i>
                                        </span>
                                    </div>
                                    <div class="number">{{ $statistics['users'] }}</div>
                                    <span>{{ __('home.users') }}</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- Total Revenue -->
                <div class="col-12 col-lg-6 mb-4">
                    <div class="card h-100">
                        <div class="row row-bordered g-0">
                            <div class="col-md-8">
                                <h5 class="card-header m-0 me-2 pb-3">{{ __('home.top_places') }}</h5>
                                <div id="top_places" class="px-2"></div>
                            </div>
                            <div class="col-md-4">
                                <div class="card-body">
                                    <div class="text-center">
                                    </div>
                                </div>
                                <div class="text-center fw-semibold pt-3 mb-2">{{ __('home.income') }}</div>

                                <div class="report-list m-2">
                                    <div class="report-list-item rounded-2 mb-4">
                                        <div class="d-flex align-items-center">
                                            <div class="report-list-icon shadow-xs me-4">
                                                <span class="badge bg-label-info p-2"><i
                                                        class="bx bx-wallet text-info"></i></span>
                                            </div>
                                            <div
                                                class="d-flex justify-content-between align-items-center w-100 flex-wrap gap-2">
                                                <div class="d-flex flex-column">
                                                    <span>{{ __('models.balance') }}</span>
                                                    <h5 class="mb-0">{{ $statistics['balance'] }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="report-list-item rounded-2 mb-4">
                                        <div class="d-flex align-items-center">
                                            <div class="report-list-icon shadow-xs me-4">
                                                <span class="badge bg-label-primary p-2"><i
                                                        class="bx bx-dollar text-primary"></i></span>
                                            </div>
                                            <div
                                                class="d-flex justify-content-between align-items-center w-100 flex-wrap gap-2">
                                                <div class="d-flex flex-column">
                                                    <span>{{ 'home.paid' }}</span>
                                                    <h5 class="mb-0">{{ $statistics['paid'] }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 status__comp mb-4">
                    <div class="card">
                        <h5 class="card-header">حالات الدفع</h5>
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>{{ __('models.bill_no') }}</th>
                                        <th>{{ __('models.price') }}</th>
                                        <th>{{ __('models.category') }}</th>
                                        <th>{{ __('models.payment_tool') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($paymentLogs as $log)
                                        <tr>
                                            <td><i class="fab fa-angular fa-lg text-danger me-2"></i>{{ $log->bill_no }}
                                            </td>
                                            <td>{{ $log->amount }}</td>
                                            <td><span
                                                    class="badge bg-label-info me-0">{{ __('home.' . $log->type) }}</span>
                                            </td>
                                            <td>{{ $log->payment_tool }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-5 col-lg-5  mb-4">
                    <div class="card h-100">
                        <div class="card-header">
                            <h5 class="mb-0">{{ __('home.Income') }}</h5>
                            <small class="text-muted">Last 7 Days</small>
                        </div>
                        <div class="card-body px-0">
                            <div class="tab-content p-0">
                                <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">
                                    <div class="d-flex p-4 pt-3">
                                        <div class="avatar flex-shrink-0 me-3">
                                            <img src="{{ asset('asset/img/icons/unicons/wallet.png') }}"
                                                alt="User" />
                                        </div>
                                        <div>
                                            <small class="text-muted d-block">{{ __('home.total_balance') }}</small>
                                            <div class="d-flex align-items-center">
                                                <h6 class="mb-0 me-1">${{ number_format($totalBalance, 2) }}</h6>
                                                <small
                                                    class="{{ $percentageChange >= 0 ? 'text-success' : 'text-danger' }} fw-semibold">
                                                    <i
                                                        class="bx {{ $percentageChange >= 0 ? 'bx-chevron-up' : 'bx-chevron-down' }}"></i>
                                                    {{ number_format(abs($percentageChange), 1) }}%
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="income_Chart"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!--/ Total Revenue -->
                <div class="col-md-7 col-lg-7 col-xl-7  mb-4">
                    <div class="card ">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title m-0">{{ __('home.last Booking') }}</h5>
                        </div>
                        <div class="card-datatable table-responsive">
                            <table class="datatables-order-details table border-top">
                                <thead>
                                    <tr>

                                        <th>
                                            <div class="d-flex align-items-center gap-2">
                                                {{ __('models.place') }}
                                            </div>
                                        </th>
                                        <th>{{ __('home.club') }}</th>
                                        <th>{{ __('home.user') }}</th>
                                        <th>{{ __('models.category') }}</th>
                                        <th>{{ __('models.price') }}</th>
                                        <th>{{ __('models.date') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $booking)
                                        <tr>
                                            <th scope="row">
                                                <div class="d-flex align-items-center gap-2">
                                                    {{ $booking->type_category->name }}
                                                </div>
                                            </th>
                                            <td>{{ $booking->club->name }}</td>
                                            <td>
                                                @if ($booking?->user?->name)
                                                    <a class='cursor-pointer text-primary' data-bs-toggle='modal'
                                                        data-bs-target="#UserShow{{ $booking->id }}">
                                                        {{ $booking?->user?->name }}</a>
                                                @else
                                                    {{ $booking->club->name }}
                                                @endif
                                            </td>
                                            <td>{{ $booking->category->name }}</td>
                                            <td>{{ $booking->price }}</td>
                                            <td>{{ $booking->booking_date }}</td>
                                            @include('components.UserShow', [
                                                'name' => '',
                                                'modalToggle' => 'UserShow' . $booking->id,
                                                'id' => $booking?->user?->id,
                                            ])
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- / Content -->

        <!-- Footer -->
        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                    ©
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    , made with ❤️ by
                    <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
                </div>
                <div>
                    <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                    <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                    <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                        target="_blank" class="footer-link me-4">Documentation</a>

                    <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues" target="_blank"
                        class="footer-link me-4">Support</a>
                </div>
            </div>
        </footer>
        <!-- / Footer -->

        <div class="content-backdrop fade"></div>
    </div>
@endsection

@section('scripts-dashboard')

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const incomeData = @json($incomeData);
            const incomeChartEl = document.querySelector('#income_Chart');
            const labels = Object.keys(incomeData);
            const data = Object.values(incomeData);

            const incomeChartConfig = {
                series: [{
                    data: data
                }],
                chart: {
                    height: 215,
                    parentHeightOffset: 0,
                    parentWidthOffset: 0,
                    toolbar: {
                        show: false
                    },
                    type: 'area'
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    width: 2,
                    curve: 'smooth'
                },
                legend: {
                    show: false
                },
                markers: {
                    size: 6,
                    colors: 'transparent',
                    strokeColors: 'transparent',
                    strokeWidth: 4,
                    discrete: [{
                        fillColor: '#fff',
                        seriesIndex: 0,
                        dataPointIndex: data.length - 1,
                        strokeColor: '#7367f0',
                        strokeWidth: 2,
                        size: 6,
                        radius: 8
                    }],
                    hover: {
                        size: 7
                    }
                },
                colors: ['#7367f0'],
                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'light',
                        shadeIntensity: 0.6,
                        opacityFrom: 0.5,
                        opacityTo: 0.25,
                        stops: [0, 95, 100]
                    }
                },
                grid: {
                    borderColor: '#e7e7e7',
                    strokeDashArray: 3,
                    padding: {
                        top: -20,
                        bottom: -8,
                        left: -10,
                        right: 8
                    }
                },
                xaxis: {
                    categories: labels,
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                    labels: {
                        show: true,
                        style: {
                            fontSize: '13px',
                            colors: '#9e9e9e'
                        }
                    }
                },
                yaxis: {
                    labels: {
                        show: false
                    },
                    min: Math.min(...data) - 10,
                    max: Math.max(...data) + 10,
                    tickAmount: 4
                }
            };

            if (typeof incomeChartEl !== 'undefined' && incomeChartEl !== null) {
                const incomeChart = new ApexCharts(incomeChartEl, incomeChartConfig);
                incomeChart.render();
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const topPlaces = @json($topPlaces);
            const labels = topPlaces.map(place => place.name);
            const data = topPlaces.map(place => place.total);

            const topPlacesChartConfig = {
                series: [{
                    data: data
                }],
                chart: {
                    parentHeightOffset: 0,
                    parentWidthOffset: 0,
                    toolbar: {
                        show: false
                    },
                    type: 'bar'
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    width: 2,
                    curve: 'smooth'
                },
                legend: {
                    show: false
                },
                markers: {
                    size: 6,
                    strokeWidth: 4,
                    discrete: [{
                        fillColor: '#fff',
                        seriesIndex: 0,
                        strokeColor: '#7367f0',
                        strokeWidth: 2,
                        radius: 8
                    }],
                    hover: {
                        size: 7
                    }
                },
                colors: ['#7367f0'],
                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'light',
                        shadeIntensity: 0.6,
                        opacityFrom: 0.5,
                        opacityTo: 0.25,
                        stops: [0, 95, 100]
                    }
                },
                grid: {
                    borderColor: '#e7e7e7',
                    strokeDashArray: 3,
                },
                xaxis: {
                    categories: labels,
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                    labels: {
                        show: true,
                        style: {
                            fontSize: '13px',
                            colors: '#9e9e9e'
                        }
                    }
                },
                yaxis: {
                    labels: {
                        show: false
                    },
                    tickAmount: 4
                }
            };

            const topPlacesChartEl = document.querySelector('#top_places');
            if (topPlacesChartEl) {
                const topPlacesChart = new ApexCharts(topPlacesChartEl, topPlacesChartConfig);
                topPlacesChart.render();
            }
        });
    </script>
@endsection
