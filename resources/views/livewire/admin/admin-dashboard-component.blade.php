  <!-- partial -->

  <div class="content-wrapper">
    <!-- <div class="row mb-4">
      <div class="col-md-4">                  
          <h2> date from </h2>
          <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
              <span class="input-group-addon input-group-prepend border-right">
                  <span class="icon-calendar input-group-text calendar-icon"></span>
              </span>
              <input type="date" class="form-control" wire:model="startDate">
          </div>
      </div>
      <div class="col-md-4">                      
          <h2>  to </h2>
          <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
              <span class="input-group-addon input-group-prepend border-right">
                  <span class="icon-calendar input-group-text calendar-icon"></span>
              </span>
              <input type="date" class="form-control" wire:model="endDate">
          </div> 
      </div>  
    </div>   -->
    <div class="row">
      <div class="col-sm-12">
        <div class="home-tab">
          <div class="d-sm-flex align-items-center justify-content-between border-bottom">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab" aria-selected="false">Audiences</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#demographics" role="tab" aria-selected="false">Demographics</a>
              </li>
              <li class="nav-item">
                <a class="nav-link border-0" id="more-tab" data-bs-toggle="tab" href="#more" role="tab" aria-selected="false">More</a>
              </li>
            </ul>
            <div>
              <div class="btn-wrapper">
                <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> Share</a>
                <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a>
              </div>
            </div>
          </div>
          <div class="tab-content tab-content-basic">
            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
              <div class="row">
                <div class="col-sm-12">
                  <div class="statistics-details d-flex align-items-center justify-content-between">
                    <div>
                      <p class="statistics-title">Total income</p>
                      <h3 class="rate-percentage">{{$total}}</h3>
                      <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>-0.5%</span></p>
                    </div>
                    <div>
                      <p class="statistics-title">Number of orders</p>
                      <h3 class="rate-percentage">{{$orders}}</h3>
                      <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>+0.1%</span></p>
                    </div>
                    <div>
                      <p class="statistics-title">Sold Products</p>
                      <h3 class="rate-percentage">{{$prod_sold}}</h3>
                      <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p>
                    </div>
                    <div class="d-none d-md-block">
                      <p class="statistics-title">Avg. Time on Site</p>
                      <h3 class="rate-percentage">2m:35s</h3>
                      <p class="text-success d-flex"><i class="mdi mdi-menu-down"></i><span>+0.8%</span></p>
                    </div>
                    <div class="d-none d-md-block">
                      <p class="statistics-title">New Sessions</p>
                      <h3 class="rate-percentage">68.8</h3>
                      <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p>
                    </div>
                    <div class="d-none d-md-block">
                      <p class="statistics-title">Avg. Time on Site</p>
                      <h3 class="rate-percentage">2m:35s</h3>
                      <p class="text-success d-flex"><i class="mdi mdi-menu-down"></i><span>+0.8%</span></p>
                    </div>
                  </div>
                </div>
              </div> 
              <div class="row">
                <div class="col-lg-8 d-flex flex-column">
                  <div class="row flex-grow">
                    <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                      <div class="card card-rounded">
                        <div class="card-body">
                          <div class="d-sm-flex justify-content-between align-items-start">
                            <div>
                            <h4 class="card-title card-title-dash">Performance Line Chart</h4>
                            <h5 class="card-subtitle card-subtitle-dash">Lorem Ipsum is simply dummy text of the printing</h5>
                            </div>
                            <div id="performance-line-legend"></div>
                          </div>
                          <div class="chartjs-wrapper mt-5" wire:ignore.self>
                            <canvas id="performanceLine" ></canvas>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 d-flex flex-column">
                  <div class="row flex-grow">
                    <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                      <div class="card bg-primary card-rounded">
                        <div class="card-body pb-0">
                          <h4 class="card-title card-title-dash text-white mb-4">Status Summary</h4>
                          <div class="row">
                            <div class="col-sm-4">
                              <p class="status-summary-ight-white mb-1">Closed Value</p>
                              <h2 class="text-info">357</h2>
                            </div>
                            <div class="col-sm-8">
                              <div class="status-summary-chart-wrapper pb-4">
                                <canvas id="status-summary"></canvas>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                      <div class="card card-rounded">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="d-flex justify-content-between align-items-center mb-2 mb-sm-0">
                                <div class="circle-progress-width">
                                  <div id="totalVisitors" class="progressbar-js-circle pr-2"></div>
                                </div>
                                <div>
                                  <p class="text-small mb-2">Total Visitors</p>
                                  <h4 class="mb-0 fw-bold">26.80%</h4>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="d-flex justify-content-between align-items-center">
                                <div class="circle-progress-width">
                                  <div id="visitperday" class="progressbar-js-circle pr-2"></div>
                                </div>
                                <div>
                                  <p class="text-small mb-2">Visits per day</p>
                                  <h4 class="mb-0 fw-bold">9065</h4>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-8 d-flex flex-column">
                  <div class="row flex-grow">
                    <div class="col-12 grid-margin stretch-card">
                      <div class="card card-rounded">
                        <div class="card-body">
                          <div class="d-sm-flex justify-content-between align-items-start">
                            <div>
                              <h4 class="card-title card-title-dash">Market Overview</h4>
                            <p class="card-subtitle card-subtitle-dash">Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                            </div>
                            <div>
                              <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle toggle-dark btn-lg mb-0 me-0" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> This month </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                  <h6 class="dropdown-header">Settings</h6>
                                  <a class="dropdown-item" href="#">Action</a>
                                  <a class="dropdown-item" href="#">Another action</a>
                                  <a class="dropdown-item" href="#">Something else here</a>
                                  <div class="dropdown-divider"></div>
                                  <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="d-sm-flex align-items-center mt-1 justify-content-between">
                            <div class="d-sm-flex align-items-center mt-4 justify-content-between"><h2 class="me-2 fw-bold">$36,2531.00</h2><h4 class="me-2">USD</h4><h4 class="text-success">(+1.37%)</h4></div>
                            <div class="me-3"><div id="marketing-overview-legend"></div></div>
                          </div>
                          <div class="chartjs-bar-wrapper mt-3" wire:ignore.self>
                            <canvas id="marketingOverview"></canvas>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 d-flex flex-column">
                  <div class="row flex-grow">
                    <div class="col-12 grid-margin stretch-card">
                      <div class="card card-rounded">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="d-flex justify-content-between align-items-center">
                                <h4 class="card-title card-title-dash">Todo list</h4>
                                <div class="add-items d-flex mb-0">
                                  <!-- <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?"> -->
                                  <button class="add btn btn-icons btn-rounded btn-primary todo-list-add-btn text-white me-0 pl-12p"><i class="mdi mdi-plus"></i></button>
                                </div>
                              </div>
                              <div class="list-wrapper">
                                <ul class="todo-list todo-list-rounded">
                                  <li class="d-block">
                                    <div class="form-check w-100">
                                      <label class="form-check-label">
                                        <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                      </label>
                                      <div class="d-flex mt-2">
                                        <div class="ps-4 text-small me-3">24 June 2020</div>
                                        <div class="badge badge-opacity-warning me-3">Due tomorrow</div>
                                        <i class="mdi mdi-flag ms-2 flag-color"></i>
                                      </div>
                                    </div>
                                  </li>
                                  <li class="d-block">
                                    <div class="form-check w-100">
                                      <label class="form-check-label">
                                        <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                      </label>
                                      <div class="d-flex mt-2">
                                        <div class="ps-4 text-small me-3">23 June 2020</div>
                                        <div class="badge badge-opacity-success me-3">Done</div>
                                      </div>
                                    </div>
                                  </li>
                                  <li>
                                    <div class="form-check w-100">
                                      <label class="form-check-label">
                                        <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                      </label>
                                      <div class="d-flex mt-2">
                                        <div class="ps-4 text-small me-3">24 June 2020</div>
                                        <div class="badge badge-opacity-success me-3">Done</div>
                                      </div>
                                    </div>
                                  </li>
                                  <li class="border-bottom-0">
                                    <div class="form-check w-100">
                                      <label class="form-check-label">
                                        <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                      </label>
                                      <div class="d-flex mt-2">
                                        <div class="ps-4 text-small me-3">24 June 2020</div>
                                        <div class="badge badge-opacity-danger me-3">Expired</div>
                                      </div>
                                    </div>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>                
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 <!-- livewire/chart-component.blade.php -->
<!-- Your existing HTML code -->
<!-- 
@push('scripts')
    <script>
        document.addEventListener('livewire:load', function () {
            const ctx = document.getElementById('performaneLine').getContext('2d');
            let chart = null;

            Livewire.on('chartDataUpdated', function (data) {
                const labels = Object.keys(data);
                const values = Object.values(data).map(Number); // Convert quantity strings to numbers

                if (chart) {
                    // Update the existing chart
                    chart.data.labels = labels;
                    chart.data.datasets[0].data = values;
                    chart.update();
                } else {
                    // Create the initial chart
                    chart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Performance',
                                data: values,
                                backgroundColor: 'rgba(0, 123, 255, 0.5)',
                                borderColor: 'rgba(0, 123, 255, 1)',
                                borderWidth: 1,
                                pointRadius: 0,
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                        }
                    });
                }
            });
        });
    </script>
@endpush -->
