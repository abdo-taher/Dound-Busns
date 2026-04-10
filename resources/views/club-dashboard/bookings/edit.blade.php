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
                        <form action="{{ route('club.bookings.store') }}" method="POST" class="row" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                @include('components.input', [
                                    'value' => old('booking_date',$data->booking_date),
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
                                    'selected' => old('category_id',$data->category_id),
                                ])
                            </div>
                            <div class="col-md-6">
                                @include('components.select', [
                                    'name' => 'type_category_id',
                                    'label' => 'Type Category',
                                    'options' => $typeCategories,
                                    'selected' => old('type_category_id',$data->type_category_id),
                                ])
                            </div>
                            <div class="col-md-6">
                                @include('components.input', [
                                    'value' => old('start_time',$data->start_time),
                                    'name' => 'start_time',
                                    'type' => 'time',
                                    'label' => 'Start Time',
                                    'placeholder' => 'Select start time',
                                ])
                            </div>
                            <div class="col-md-6">
                                @include('components.input', [
                                    'value' => old('end_time',$data->end_time),
                                    'name' => 'end_time',
                                    'type' => 'time',
                                    'label' => 'End Time',
                                    'placeholder' => 'Select end time',
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
