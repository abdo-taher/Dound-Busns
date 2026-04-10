@extends('layouts.app')
@section('header__title', __('home.clubs'))
@section('header__icon', 'fa-solid fa-users')
@section('main')
    <div class="content-wrapper">
        <!-- Content -->


        <div class="p-3 container-p-y">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4 ">
                        <div class="d-flex p-3 px-4 align-items-center justify-content-between w-100">
                            <h5 class="card-header p-0">{{ __('home.Add') }} {{ __('home.clubs') }}</h5>
                            <a href="{{ route('clubs.index') }}" style="width: fit-content">
                                <button type="button" class="btn btn-dark d-flex align-items-center gap-2"> <i
                                        class="fa-solid fa-backward"></i>
                                    {{ __('home.Back') }}
                                </button>
                            </a>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('clubs.update', $data->id) }}" method="POST" class="row"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="col-md-6">
                                    @include('components.input', [
                                        'value' => old('name', $data->name),
                                        'name' => 'name',
                                        'type' => 'text',
                                        'label' => 'Name',
                                        'placeholder' => 'belal zeina',
                                    ])
                                </div>
                                <div class="col-md-6">
                                    @include('components.input', [
                                        'value' => old('email', $data->email),
                                        'name' => 'email',
                                        'type' => 'email',
                                        'label' => 'Email',
                                        'placeholder' => 'a@a.com',
                                    ])
                                </div>
                                <div class="col-md-6">
                                    @include('components.input', [
                                        'value' => old('mobile', $data->mobile),
                                        'name' => 'mobile',
                                        'type' => 'tel',
                                        'label' => 'Mobile',
                                        'placeholder' => '01096685149',
                                    ])
                                </div>
                                <div class="col-md-6">
                                    @include('components.input', [
                                        'value' => old('password'),
                                        'name' => 'password',
                                        'type' => 'password',
                                        'label' => 'Password',
                                        'placeholder' => 'a@a.com',
                                    ])
                                </div>
                                <div class="col-md-6">
                                    @include('components.input', [
                                        'value' => old('start_time', $data->start_time),
                                        'name' => 'start_time',
                                        'type' => 'time',
                                        'label' => 'start_time',
                                        'placeholder' => '',
                                    ])
                                </div>
                                <div class="col-md-6">
                                    @include('components.input', [
                                        'value' => old('end_time', $data->end_time),
                                        'name' => 'end_time',
                                        'type' => 'time',
                                        'label' => 'end_time',
                                        'placeholder' => '',
                                    ])
                                </div>

                                <div class="col-md-6">
                                    @include('components.select', [
                                        'options' => $countries, // Array of strings
                                        'name' => 'country_id',
                                        'type' => 'select',
                                        'label' => 'Grass Type',
                                        'placeholder' => 'Select Country ',
                                        'selected' => old('country_id', $data->country_id), // For keeping the selected value after form submission
                                    ])
                                </div>
                                <div class="col-md-12">
                                    @include('components.input', [
                                        'value' => old('package_id', $data->subscriptions()->first()?->package_id),
                                        'name' => 'package_id',
                                        'type' => 'select',
                                        'label' => 'package',
                                        'placeholder' => 'Select package',
                                        'options' =>
                                            ['' => 'Select package'] + ['' => 'precentage'] +
                                            $packages->pluck('name', 'id')->toArray(),
                                        'option' => 'required',
                                    ])
                                </div>

                                <div class="form-group mb-3">
                                    <label for="example-multiple-select">Select Categories</label>
                                    <select id="example-multiple-select" name="category_id[]" multiple="multiple"
                                        class="form-control">
                                        @foreach ($categories as $category)
                                            <option
                                                {{ isset($data) &&$data->categories()->where('category_id', $category->id)->first()? 'selected': '' }}
                                                value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                @foreach ($categories as $category)
                                    <div class="form-group mb-3 duration-input" id="duration-wrapper-{{ $category->id }}"
                                        style="display: none;">
                                        <label for="duration_{{ $category->id }}">Duration for
                                            {{ $category->name }}</label>
                                        <input type="text" id="duration_{{ $category->id }}"
                                            name="category_durations[{{ $category->id }}]" class="form-control"
                                            value="{{ isset($data)? $data->categories()->where('category_id', $category->id)->first()?->pivot?->duration / 60: '' }}">
                                    </div>
                                @endforeach
                                @include('components.input', [
                                    'value' => old('img'),
                                    'name' => 'img',
                                    'type' => 'file',
                                    'label' => 'Image',
                                    'placeholder' => '',
                                ])

                                <div class="col-md-12 col-12 mb-1">
                                    <div class="d-flex col-md-12 flex-column mb-7 fv-row fv-plugins-icon-container">
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required" style="font-weight:bold">
                                                {{ __('models.location') . ' (' . __('models.search_in_map') . ')' }}
                                            </span>

                                        </label>
                                        <input type="text" name="icon" class="form-control form-control-solid"
                                            id="searchInput" value="{{ old('location', $data->location) }}">

                                    </div>
                                </div>

                                <div class="col-md-12 col-12 mb-3">
                                    <div class="d-flex col-12 flex-column mb-7 fv-row fv-plugins-icon-container"
                                        style="height:100vh">
                                        <input type="hidden" name="location" class="form-control" id="location"
                                            value="{{ old('location', $data->location) }}">
                                        <input type="hidden" name="lat" class="form-control" id="lat"
                                            value="{{ old('lat', $data->lat) }}">
                                        <input type="hidden" name="lng" class="form-control" id="lng"
                                            value="{{ old('lng', $data->lng) }}">
                                        <div id="map" style="height: 100%;width: 100%;">
                                        </div>
                                    </div>
                                    <br> <br>
                                    <div class="d-flex align-items justify-content-end">
                                        @include('components.button', [
                                            'type' => 'submit',
                                            'name' => 'edit',
                                        ])
                                    </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts-dashboard')
    @include('dashboard.clubs.mab')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script>
        $('#search_input').on('keyup', function() {
            table.search(this.value).draw();
        });
        $(document).ready(function() {
            // When the header checkbox is clicked
            $('#check__box').click(function() {
                // Check if it's checked or not
                var isChecked = $(this).prop('checked');

                // Iterate through each row in the table
                $('#myTable tbody tr').each(function() {
                    // Set the checkbox in each row to the same state as the header checkbox
                    $(this).find('.form-check-input.row__check').prop('checked', isChecked);
                });
            });
        });
    </script>

    <script>
        let table = new DataTable('#myTable');
    </script>


    <!-- Select2 JS CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example-multiple-select').select2({
                placeholder: "Select options",
                allowClear: true
            }).on('select2:select select2:unselect', function(e) {
                toggleDurationInputs();
            });

            // Initialize the display based on the current selection
            toggleDurationInputs();

            function toggleDurationInputs() {
                var selectedCategories = $('#example-multiple-select').val() || [];
                $('.duration-input').each(function() {
                    var categoryId = $(this).attr('id').replace('duration-wrapper-', '');
                    if (selectedCategories.includes(categoryId)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            }
        });
    </script>
@endsection
