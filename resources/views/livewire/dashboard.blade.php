<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-7 col-xl-8 mb-4 order-0">
            <div class="card h-100">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Welcome,
                                {{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}!🌟</h5>
                            <p class="mb-4">
                                Let's improve dorm operations and resident experiences for a top-notch living space!
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="../assets/img/illustrations/man-with-laptop-light.png" height="140"
                                alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5 col-md-4 order-1 col-xl-4 order-md-2 order-lg-1 order-lg-1">
            <div class="row h-100">
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <button type="button" class="btn rounded-pill btn-icon btn-primary">
                                        <span class="tf-icons bx  bx-line-chart"></span>
                                    </button>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Gross Revenue</span>
                            <h3 class="card-title mb-2">₱{{ number_format($this->getGrossRevenues(), 2) }}</h3>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <button type="button" class="btn rounded-pill btn-icon btn-primary">
                                        <span class="tf-icons bx bxs-user-check"></span>
                                    </button>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Student Registered</span>
                            <h3 class="card-title mb-2">{{ $this->getTotalStudents()->count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-7 col-xl-8 mb-4 order-2 order-md-3 order-lg-2">
            <div class="card h-100">
                <div class="card-body">
                    <div class="card-title">
                        <h5>Total Gross</h5>
                    </div>

                    <div id="monthly_total" class="h-100" style="max-height: 500px !important"></div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-8 col-lg-5 col-xl-4 order-3 order-md-1 order-lg-3">
            <div class="row">
                <div class="col-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <button type="button" class="btn rounded-pill btn-icon btn-primary">
                                        <span class="tf-icons bx bxs-user-rectangle"></span>
                                    </button>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Total Occupants</span>
                            <h3 class="card-title mb-2">{{ $this->getTotalOccupants()->count() }}</h3>
                        </div>
                    </div>
                </div>

                <div class="col-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <button type="button" class="btn rounded-pill btn-icon btn-primary">
                                        <span class="tf-icons bx bx-check-double"></span>
                                    </button>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Available Spots</span>
                            <h3 class="card-title mb-2">{{ $this->getAvailableSpots() }}</h3>
                        </div>
                    </div>
                </div>

                <div class="col-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <button type="button" class="btn rounded-pill btn-icon btn-primary">
                                        <span class="tf-icons bx bxs-building-house"></span>
                                    </button>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Total Rooms</span>
                            <h3 class="card-title mb-2">{{ $this->getTotalRooms()->count() }}</h3>
                        </div>
                    </div>
                </div>

                <div class="col-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <button type="button" class="btn rounded-pill btn-icon btn-primary">
                                        <span class="tf-icons bx bx-check-double"></span>
                                    </button>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Available Rooms</span>
                            <h3 class="card-title mb-2">{{ $this->getAvailableRooms()->count() }}</h3>
                        </div>
                    </div>
                </div>

                <div class="col-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <button type="button" class="btn rounded-pill btn-icon btn-primary">
                                        <span class="tf-icons bx bxs-wallet"></span>
                                    </button>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Total Number of Payments Received</span>
                            <h3 class="card-title mb-2">{{ $this->getTotalPayments()->count() }}</h3>
                        </div>
                    </div>
                </div>

                <div class="col-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <button type="button" class="btn rounded-pill btn-icon btn-primary">
                                        <span class="tf-icons bx bxs-user-circle"></span>
                                    </button>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Total Accounts</span>
                            <h3 class="card-title mb-2">{{ $this->getTotalAccounts()->count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-7 mb-4 order-4 col-xl-8">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h5>Occupants Gender Data Comparison</h5>
                    </div>

                    <div id="occupants_chart"></div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-5 col-xl-4 order-5">
            <div class="card overflow-hidden" style="max-height: 500px; height: 500px">
                <div class="card-header">
                    <h5 class="card-title m-0 me-2">Recent Transactions</h5>
                </div>
                <div class="card-body ps ps--active-y" id="vertical-2">
                    <ul class="p-0 m-0">

                        @foreach ($this->getBillsHistory() as $bill)
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    @if($bill->type === 'Maintenance')
                                        <img src="../assets/img/icons/unicons/cc-warning.png" alt="User"
                                        class="rounded" />
                                    @elseif($bill->type === 'Monthly Rent')
                                        <img src="../assets/img/icons/unicons/cc-success.png" alt="User"
                                            class="rounded" />
                                    @else
                                        <img src="../assets/img/icons/unicons/cc-primary.png" alt="User"
                                                class="rounded" />
                                    @endif
                                </div>
                                <div
                                    class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <small class="text-muted d-block mb-1">{{ $bill->payment_method }}</small>
                                        <h6 class="mb-0">{{ $bill->type }}</h6>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <h6 class="mb-0">₱{{ number_format($bill->amount, 2) }}</h6>
                                    </div>
                                </div>
                            </li>
                        @endforeach

                        
                    </ul>
        
                    <div class="ps__rail-y" style="top: 0px; height: 432px; right: 0px;">
                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 25px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--  --}}

@script
    <script>
        let monthly_data = [];

        $wire.on('monthly_totals', (event) => {
            data = event[0].monthly;
            
            for (const month in data) {
                if (Object.hasOwnProperty.call(data, month)) {
                    monthly_data.push(parseInt(data[month]));
                }
            }

            let monthly_collection = {
                chart: {
                    type: 'line',
                    height: '400px'
                },
                stroke: {
                    curve: 'smooth',
                },
                series: [{
                    name: 'sales',
                    data: monthly_data
                }],
                xaxis: {
                    categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
                },
                dataLabels: {
                    enabled: true,
                    formatter: function (val) {
                        return '₱' + val
                    },
                }
            };

            let chart = new ApexCharts(document.querySelector("#monthly_total"), monthly_collection);
            chart.render();
        });

        $wire.on('get_occupants', (event) => {
            male = event[0].male;
            female = event[0].female;
            
            let occupants_data = {
                chart: {
                    type: 'donut',
                    height: '400px'
                },
                series: [male, female],
                labels: ['Male', 'Female'],
                plotOptions: {
                    pie: {
                        expandOnClick: false,
                        donut: {
                            labels: {
                                show: true,
                            }
                        }
                    }
                }
            };

            let chart = new ApexCharts(document.querySelector("#occupants_chart"), occupants_data);
            chart.render();
        });
    </script>
@endscript
