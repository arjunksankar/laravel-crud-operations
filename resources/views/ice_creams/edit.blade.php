@extends('layouts.app')
@section('content')


<form method="POST" action="{{ route('ice-cream.update',$ice_cream->id)}}" novalidate>
    @csrf
    {{ method_field('PUT') }}
    <div class="content-div" style="width:900px;margin:auto;">
        <h4 class="page-title">{{ __('Edit Ice Cream') }}</h4>
        <div class="card center w-70">
            <div class="card-body">
                <div class="row">

                    <div class="col-md-6 mb-4">
                        <label for="validationCustom01">{{ __('Name') }}
                            <span class="mandatory">*</span>
                        </label>
                        <input type="text" value="{{ $ice_cream->name }}" name="name"
                            class="form-control @error('name') is-invalid @enderror" placeholder="Name" required>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="validationCustom02">{{ __('Brand') }}
                            <span class="mandatory">*</span>
                        </label>
                        <select name="brand" placeholder="Brand"
                            class="form-control @error('brand') is-invalid @enderror">
                            <option value="Amul" @if($ice_cream->brand == 'Amul') selected @endif>Amul</option>
                            <option value="Lazza" @if($ice_cream->brand == 'Lazza') selected @endif>Lazza</option>
                            <option value="Quality" @if($ice_cream->brand == 'Quality') selected @endif>Quality</option>
                        </select>
                        @error('brand')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-6 mb-4">
                        <label for="validationCustom03">{{ __('Type') }}
                            <span class="mandatory">*</span>
                        </label>
                        <select name="type" placeholder="type" class="form-control @error('type') is-invalid @enderror">
                            <option value="cup" @if($ice_cream->type == 'cup') selected @endif>Cup</option>
                            <option value="cone" @if($ice_cream->type == 'cone') selected @endif>Cone</option>
                            <option value="large-cup" @if($ice_cream->type == 'large-cup') selected @endif>Large Cup
                            </option>
                            <option value="large-cone" @if($ice_cream->type == 'large-cone') selected @endif>Large Cone
                            </option>
                        </select>
                        @error('type')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-6 mb-4">
                        <label for="validationCustom04">{{ __('Price') }}
                            <span class="mandatory">*</span>
                        </label>
                        <input type="text" value="{{ $ice_cream->price }}" name="price"
                            class="form-control @error('price') is-invalid @enderror" placeholder="Price" required>
                        @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-12 text-right px-0">
                    <button class="btn btn-primary mt-2" type="submit"><i
                            class="mdi mdi-content-save-edit mr-1"></i>{{ __('Submit') }}</button>
                </div>
            </div>
        </div>
    </div>

</form>
@endsection
