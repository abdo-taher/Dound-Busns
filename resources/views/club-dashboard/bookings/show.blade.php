@extends('layouts.app')
@section('header__title', __('Available Time Slots'))
@section('header__icon', 'fa-solid fa-clock')
@section('main')
<div class="content-wrapper">
    <!-- Content -->
    <div class="p-3 container-p-y">
        <div class="card mx-0">
                <div class="row mx-0">
                    <div class="col-md-6">
                        <div class="card-body">
                            <h4 class="card-title">Available Time Slots</h4>
                            <div class="time-slots-container">
                                @foreach ($slots as $slot)
                                    <div class="time-slot">
                                        <span class="time">{{ $slot['start_time'] }} - {{ $slot['end_time'] }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <form action="{{ route('club.bookings.store') }}" method="post" class="row" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body d-flex gap-2">
                                <div class="col-md-6">
                                    @include('components.input', [
                                        'value' => old('start_time'),
                                        'name' => 'start_time',
                                        'type' => 'time',
                                        'label' => 'Start Time',
                                        'placeholder' => 'Select start time',
                                    ])
                                </div>
                                <div class="col-md-6">
                                    @include('components.input', [
                                        'value' => old('end_time'),
                                        'name' => 'end_time',
                                        'type' => 'time',
                                        'label' => 'End Time',
                                        'placeholder' => 'Select end time',
                                    ])
                                </div>

                            </div>
                            <div class="col-md-6">
                                @include('components.input', [
                                    'value' => $typeCategory->price,
                                    'name' => 'price',
                                    'type' => 'disabled',
                                    'option' => 'disabled',
                                    'label' =>  'price of ('.($slotDuration/60 ).') hour',
                                    'placeholder' => 'price',
                                ])
                            </div>
                            <input type="hidden" name="category_id" value="{{ $data['category_id'] }}">
                            <input type="hidden" name="type_category_id" value="{{  $data['type_category_id'] }}">
                            <input type="hidden" name="booking_date" value="{{  $data['booking_date'] }}">
                            <div class="d-flex ms-4 align-items ">
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
@endsection

@section('styles')
    <style>
        .time-slots-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .time-slot {
            background: #f8f9fa;
            padding: 15px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            font-size: 1rem;
            font-weight: 500;
        }

        .time-slot .time {
            color: #495057;
        }
    </style>
@endsection
