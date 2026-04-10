<!-- resources/views/club-dashboard/branches/create.blade.php -->

@extends('layouts.app')
@section('header__title', __('home.branches'))
@section('header__icon', 'fa-solid fa-users')
@section('main')
    <div class="content-wrapper">
        <div class="p-3 container-p-y">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4 ">
                        <div class="d-flex p-3 px-4 align-items-center justify-content-between w-100">
                            <h5 class="card-header p-0">{{ __('home.Add') }} {{ __('home.branches') }}</h5>
                            <a href="{{ route('club.branches.index') }}" style="width: fit-content">
                                <button type="button" class="btn btn-dark d-flex align-items-center gap-2"> <i class="fa-solid fa-backward"></i>
                                    {{ __('home.Back') }}
                                </button>
                            </a>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('club.branches.store') }}" method="POST" class="row" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-6">
                                    @include('components.input', [
                                        'value' => old('name'),
                                        'name' => 'name',
                                        'type' => 'text',
                                        'label' => 'name',
                                        'placeholder' => 'Offer name',
                                    ])
                                </div>
                                <div class="col-md-6">
                                    @include('components.input', [
                                        'value' => old('Code'),
                                        'name' => 'code',
                                        'type' => 'text',
                                        'label' => 'Code',
                                        'placeholder' => 'Code',
                                        // 'options' => ['percentage' => 'Percentage', 'fixed' => 'Fixed Amount'],
                                    ])
                                </div>

                                <div class="col-md-6">
                                    @include('components.input', [
                                        'value' => old('price'),
                                        'name' => 'price',
                                        'type' => 'number',
                                        'label' => 'price',
                                        'placeholder' => 'price',
                                    ])
                                </div>



                                <div class="col-md-6">
                                    @include('components.select', [
                                        'options' => ['1x1','2x2','3x3','4x4','5x5','6x6','7x7','8x8','9x9','10x10'], // Array of strings
                                        'name' => 'size',
                                        'type' => 'select',
                                        'label' => 'Size',
                                        'placeholder' => 'Select size',
                                        'selected' => old('size'), // For keeping the selected value after form submission
                                    ])
                                </div>
                                <div class="col-md-6">
                                    @include('components.select', [
                                        'options' => ['طبيعي','صناعي'], // Array of strings
                                        'name' => 'grass_type',
                                        'type' => 'select',
                                        'label' => 'Grass Type',
                                        'placeholder' => 'Select Grass Type',
                                        'selected' => old('grass_type'), // For keeping the selected value after form submission
                                    ])
                                </div>

                                <div class="col-md-6">
                                    @include('components.input', [
                                        'value' => old('category_id'),
                                        'name' => 'category_id',
                                        'type' => 'select',
                                        'label' => 'category',
                                        'placeholder' => 'xategory',
                                        'options' => $categories->pluck('name', 'id')->toArray(),
                                    ])
                                </div>
                                @include('components.input', [
                                    'value' => old('img'),
                                    'name' => 'img',
                                    'type' => 'file',
                                    'label' => 'Image',
                                    'placeholder' => '',
                                ])
                                <div class="d-flex align-items justify-content-end">
                                    @include('components.button', [
                                        'type' => 'submit',
                                        'name' => 'Add',
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
@endsection
