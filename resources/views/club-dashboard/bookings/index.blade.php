@extends('layouts.app')
@section('header__title', __('home.bookings'))
@section('header__icon', 'fa-solid fa-users')
@section('main')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="p-3 container-p-y">
            <div class="card">
                <div class="d-flex align-item-center p-4 justify-content-between w-100">
                    <h5 class="card-header p-0">{{ __('home.bookings') }}</h5>
                    <div class="d-flex align-item-center gap-3">
                        <button id="deleteSelected" class="btn btn-danger">
                            <i class="fa-regular fa-trash-can"></i>
                        </button>
                        <a href="{{ route('club.bookings.create') }}">
                            <button type="button" class="btn btn-primary d-flex align-items-center gap-2">
                                <i class="fa-solid fa-plus"></i>{{ __('home.Add') }}
                            </button>
                        </a>
                    </div>
                </div>
                <div class="d-flex align-item-center justify-content-between gap-3 mb-4 px-4">
                    <div class="d-flex groups__button align-item-center gap-3">
                        <input type="text" class="form-control" style="width:200px" id="search_input"
                            placeholder="{{ __('home.Search') }}" aria-describedby="defaultFormControlHelp" />
                        <select name="myTable_length" aria-controls="myTable" class="dt-input" id="dt-length-0"
                            fdprocessedid="0z9mam">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <div class="">
                            <input class="form-control" type="date" id="filter_date" />
                        </div>
                        {{-- <select class="form-control" id="category_filter" name="category_id">
                            <option value="">{{ __('modles.Search') }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select> --}}
                    </div>
                </div>
                <div class="table-responsive text-nowrap px-4">
                    <table class="table" id="myTable">
                        <thead>
                            <tr class="text-nowrap">
                                <th>
                                    <div class="d-flex align-items-center gap-2">
                                        <input class="form-check-input row__check" type="checkbox" value=""
                                            id="check__box" />
                                        {{ __('models.place') }}
                                    </div>
                                </th>
                                <th>{{ __('models.user') }}</th>
                                <th>{{ __('models.category') }}</th>
                                <th>{{ __('models.price') }}</th>
                                <th>{{ __('models.start_time') }}</th>
                                <th>{{ __('models.end_time') }}</th>
                                <th>{{ __('models.date') }}</th>
                                <th>{{ __('models.status') }}</th>
                                <th>{{ __('home.Edit') }}</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $booking)
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center gap-2">
                                            <input class="form-check-input row__check" type="checkbox"
                                                value="{{ $booking->id }}" />
                                            {{ $booking->type_category->name }}
                                        </div>
                                    </th>
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
                                    <td>{{ $booking->start_time }}</td>
                                    <td>{{ $booking->end_time }}</td>
                                    <td>{{ $booking->booking_date }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button
                                                class="btn btn-{{ $booking->status == 'active' ? 'primary' : 'warning' }} dropdown-toggle"
                                                type="button" id="bookingStatusDropdown" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                {{ __('home.' . $booking->status) }}
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="bookingStatusDropdown">
                                                <li>
                                                    <form action="{{ route('club.bookings.updateStatus', $booking->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="status" value="pending">
                                                        <button class="dropdown-item"
                                                            type="submit">{{ __('home.Pending') }}</button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <form action="{{ route('club.bookings.updateStatus', $booking->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="status" value="cancelled">
                                                        <button class="dropdown-item"
                                                            type="submit">{{ __('home.cancelled') }}</button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <form action="{{ route('club.bookings.updateStatus', $booking->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="status" value="active">
                                                        <button class="dropdown-item"
                                                            type="submit">{{ __('home.active') }}</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>

                                    <td class="">
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('club.bookings.show_book', $booking->id) }}"><i
                                                        class="bx bx-show me-1"></i> {{ __('home.Show') }}</a>
                                                <a class="dropdown-item cursor-pointer" data-bs-toggle="modal"
                                                    data-bs-target="#modalToggle{{ $booking->id }}"><i
                                                        class="bx bx-trash me-1"></i>
                                                    {{ __('home.Delete') }}</a>

                                            </div>
                                        </div>
                                        @include('components.modalDelete', [
                                            'action' => 'club.bookings.destroy',
                                            'name' => '',
                                            'title' => __('home.Are You Delete'),
                                            'modalToggle' => 'modalToggle' . $booking->id,
                                            'id' => $booking->id,
                                        ])
                                        @include('components.UserShow', [
                                            'name' => '',
                                            'modalToggle' => 'UserShow' . $booking->id,
                                            'id' => $booking?->user?->id,
                                        ])
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
                    var dateColumn = data[6]; // Assuming the date column is the 4th column (index 3)

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
                        url: "{{ route('club.bookings.deleteSelected') }}",
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

            // Handlee page length change
            $('select[name="myTable_length"]').on('change', function() {
                var length = $(this).val();
                table.page.len(length).draw();
            });

        });
    </script>


@endsection
