@extends('layouts.app')
@section('header__title', __('home.sliders'))
@section('header__icon', 'bx bxs-slideshow')
@section('main')
    <div class="content-wrapper">
        <div class="p-3 container-p-y">
            <div class="card">
                <div class="d-flex align-item-center p-4 justify-content-between w-100">
                    <h5 class="card-header p-0">{{ __('home.sliders') }}</h5>
                    <div class="d-flex align-item-center gap-3">
                        <button id="deleteSelected" class="btn btn-danger">
                            <i class="fa-regular fa-trash-can"></i>
                        </button>
                        <a href="{{ route('sliders.create') }}">
                            <button type="button" class="btn btn-primary d-flex align-items-center gap-2">
                                <i class="fa-solid fa-plus"></i>{{ __('home.Add') }}
                            </button>
                        </a>
                    </div>
                </div>

                <div class="row px-4">
                    @foreach ($data as $slider)
                        <div class="col-3 mb-3" >
                            <div class="card p-2">
                                <div class="d-flex justify-content-between flex-nowrap">
                                    <div>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('sliders.edit', $slider->id) }}"><i
                                                        class="bx bx-edit-alt me-1"></i> {{ __('home.Edit') }}</a>
                                                <a class="dropdown-item cursor-pointer" data-bs-toggle="modal"
                                                    data-bs-target="#modalToggle{{$slider->id}}"><i class="bx bx-trash me-1"></i>
                                                    {{ __('home.Delete') }}</a>
                                            </div>
                                        </div>
                                        @include('components.modalDelete', [
                                            'action' => 'sliders.destroy',
                                            'name' => $slider->name,
                                            'title' => __('home.Are You Delete'),
                                            'modalToggle' => 'modalToggle'.$slider->id,
                                            'id' => $slider->id,
                                        ])
                                    </div>
                                    <input class="form-check-input row__check" type="checkbox" value="{{ $slider->id }}" />
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <div class="mb-3 text-center">
                                            <img src="{{ image_url($slider->image) }}" alt="Slider Image"
                                                style="height: 200px; object-fit: cover;" />
                                        </div>
                                    </div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Search functionality


            // Delete selected sliders
            $('#deleteSelected').click(function() {
                var selectedIds = [];
                $(".row__check:checked").each(function() {
                    selectedIds.push($(this).val());
                });

                if (selectedIds.length > 0) {
                    if (confirm("Are you sure you want to delete the selected sliders?")) {
                        $.ajax({
                            url: "{{ route('sliders.deleteSelected') }}",
                            type: "POST",
                            data: { ids: selectedIds },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                location.reload();
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                            }
                        });
                    }
                } else {
                    alert("Please select at least one slider to delete.");
                }
            });
        });
    </script>
@endsection


