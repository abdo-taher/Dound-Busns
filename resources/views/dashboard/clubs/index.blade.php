@extends('layouts.app')
@section('header__title', __('home.clubs'))
@section('header__icon', 'fa-solid fa-users')
@section('main')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="p-3 container-p-y">
            <div class="card">
                <div class="d-flex align-items-center p-4 justify-content-between w-100">
                    <h5 class="card-header p-0">{{ __('home.clubs') }}</h5>
                    <div class="d-flex align-items-center gap-3">
                        <button id="deleteSelected" class="btn btn-danger">
                            <i class="fa-regular fa-trash-can"></i>
                        </button>
                        <a href="{{ route('clubs.create') }}">
                            <button type="button" class="btn btn-primary d-flex align-items-center gap-2">
                                <i class="fa-solid fa-plus"></i>{{ __('home.Add') }}
                            </button>
                        </a>
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-between gap-3 mb-4 px-4">
                    <div class="d-flex groups__button align-items-center gap-3">
                        <input type="text" class="form-control" style="width:200px" id="search_input"
                            placeholder="{{ __('home.Search') }}" aria-describedby="defaultFormControlHelp" />
                        <select name="myTable_length" aria-controls="myTable" class="dt-input" id="dt-length-0">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>

                        <div class="exports mx-0 px-0">
                            <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ __('home.Export') }}
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:void(0);">
                                        <i class="fa-solid fa-file-csv"></i> {{ __('home.Csv') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Club Cards -->
                <div class="row p-4">
                    @foreach ($data as $admin)
                        <div class=" col-xl-3 col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class=" d-flex justify-content-between flex-nowrap">
                                        <div class="dropdown text-end">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('clubs.edit', $admin->id) }}">
                                                    <i class="bx bx-edit-alt me-1"></i> {{ __('home.Edit') }}
                                                </a>
                                                <a class="dropdown-item cursor-pointer" data-bs-toggle="modal"
                                                    data-bs-target="#modalToggle{{ $admin->id }}">
                                                    <i class="bx bx-trash me-1"></i> {{ __('home.Delete') }}
                                                </a>
                                                <a class="dropdown-item cursor-pointer" data-bs-toggle="modal"
                                                    data-bs-target="#modalTogglePay{{ $admin->id }}">
                                                    <i class="fa-solid fa-dollar-sign me-1"></i> {{ __('home.Payment') }}
                                                </a>
                                                <a class="dropdown-item" href="{{ route('clubs.show', $admin->id) }}">
                                                    <i class="bx bx-show me-1"></i> {{ __('home.Show') }}
                                                </a>
                                            </div>
                                        </div>
                                        <!-- Activation Toggle -->
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input toggle-activation" type="checkbox"
                                                    id="flexSwitchCheck{{ $admin->id }}" data-id="{{ $admin->id }}"
                                                    {{ $admin->is_active ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="flexSwitchCheck{{ $admin->id }}">{{ __('home.Activation') }}</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 text-center">
                                        <img src="{{ image_url($admin->img) }}" alt="Club Image" class="w-100"
                                            style="height: 200px; object-fit: cover;" />
                                    </div>
                                    <h5 class="card-title text-center">{{ $admin->name }}</h5>
                                    <p class="card-text"><strong>{{ __('home.Email') }}:</strong> {{ $admin->email }}</p>
                                    <p class="card-text"><strong>{{ __('home.Phone Number') }}:</strong>
                                        {{ $admin->mobile }}</p>
                                    <p class="card-text"><strong>{{ __('home.Joining Date') }}:</strong>
                                        {{ $admin->created_at->format('Y-m-d') }}</p>
                                    <p class="card-text"><strong>{{ __('home.Balance') }}:</strong> {{ $admin->balance }}
                                    </p>




                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts-dashboard')
    <link href="{{ asset('asset/datatables/datatables.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script>
        $(document).ready(function() {
            // DataTable initialization with export buttons
            let table = $('#myTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                "order": [], // Disable initial ordering
                "lengthMenu": [10, 25, 50, 100]
            });

            // Custom filter function for date
            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    var filterDate = $('#filter_date').val();
                    var dateColumn = data[3]; // Assuming the date column is the 4th column (index 3)

                    if (filterDate === '') {
                        return true; // No filter applied
                    }

                    // Convert dates to comparable formats
                    var filterDateObj = new Date(filterDate);
                    var dateColumnObj = new Date(dateColumn);

                    if (dateColumnObj.getTime() === filterDateObj.getTime()) {
                        return true;
                    }

                    return false;
                }
            );

            // Event listener for the date input
            $('#filter_date').on('change', function() {
                table.draw();
            });

            // When the header checkbox is clicked
            $('#check__box').click(function() {
                var isChecked = $(this).prop('checked');
                $('#myTable tbody tr').each(function() {
                    $(this).find('.form-check-input.row__check').prop('checked', isChecked);
                });
            });

            // Search functionality
            $('#search_input').on('keyup', function() {
                table.search(this.value).draw();
            });

            // Delete selected rows
            $('#deleteSelected').click(function() {
                var selectedIds = [];
                $(".row__check:checked").each(function() {
                    selectedIds.push($(this).val());
                });

                if (selectedIds.length > 0) {
                    $.ajax({
                        url: "{{ route('clubs.deleteSelected') }}",
                        type: "POST",
                        data: {
                            ids: selectedIds
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            console.log(response);
                            location.reload();
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                } else {
                    alert("Please select at least one item to delete.");
                }
            });

            // Handle page length change
            $('select[name="myTable_length"]').on('change', function() {
                var length = $(this).val();
                table.page.len(length).draw();
            });

            // Toggle activation
            $('.toggle-activation').change(function() {
                var adminId = $(this).data('id');
                $.ajax({
                    url: "{{ route('clubs.toggleActivation') }}",
                    type: "POST",
                    data: {
                        id: adminId
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.success) {
                            toastr.success(response.is_active ? 'Admin activated' :
                                'Admin deactivated');
                        } else {
                            toastr.error('Failed to update admin status');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        toastr.error('Failed to update admin status');
                    }
                });
            });
        });
    </script>


@endsection
