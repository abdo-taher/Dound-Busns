@extends('layouts.app')
@section('header__title', __('models.booking'))
@section('header__icon', 'fa-solid fa-calendar-check')
@section('main')
<div class="content-wrapper">
    <!-- Content -->
    <div class="p-3 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('club.bookings.available') }}" method="get" class="row" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                @include('components.input', [
                                    'value' => old('booking_date'),
                                    'name' => 'booking_date',
                                    'type' => 'date',
                                    'label' => 'Booking Date',
                                    'placeholder' => 'Select booking date',
                                ])
                            </div>
                            <div class="col-md-6">
                                @include('components.select', [
                                    'name' => 'category_id',
                                    'label' => 'Category',
                                    'options' => $categories,
                                    'selected' => old('category_id'),
                                ])
                            </div>
                            <div class="col-md-6">
                                @include('components.select', [
                                    'name' => 'type_category_id',
                                    'label' => 'Type Category',
                                    'options' => $typeCategories,
                                    'selected' => old('type_category_id'),
                                ])
                            </div>

                            <div class="d-flex align-items justify-content-end">
                                @include('components.button', [
                                    'type' => 'submit',
                                    'name' => 'submit',
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
