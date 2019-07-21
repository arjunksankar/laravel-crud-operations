@extends('layouts.app')
@push('custom-styles')
@endpush
@section('content')
<div class="container">
<h2>View Ice Cream Details</h2>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-6 mb-3">
                <div class="data-view">
                    <label><b>{{ __('Name') }}</b></label>
                    <p>{{ $ice_cream->name }}</p>
                </div>
            </div>
            <div class="col-6 mb-3">
                <div class="data-view">
                    <label><b>{{ __('Brand') }}</b></label>
                    <p>{{ $ice_cream->brand }}</p>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="data-view">
                    <label><b>{{ __('Type') }}</b></label>
                    <p>{{ $ice_cream->type }}</p>            
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="data-view">
                    <label><b>{{ __('Price') }}</b></label>
                    <p>{{ 'Rs. '.$ice_cream->price }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@push('custom-scripts')
@endpush
