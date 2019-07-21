@extends('layouts.app')
@section('content')
<!-- start page title -->
<div class="container">
    
    <div class="row mt-5">
            <div class="col-md-8">
                <h4>Ice Creams List</h4>
            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-success float-right" onclick="window.location.href='{{ route('ice-cream.create') }}'">Create New</button>
            </div>
    </div>
    
    <table class="table table-bordered mt-2">
        <thead>
            <tr>
                <th>Name</th>
                <th>Brand</th>
                <th>Type</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if(!$ice_creams->isEmpty())
                @foreach ($ice_creams as $ice_cream)
                <tr>
                    <td>{{ $ice_cream->name }}</td>
                    <td>{{ $ice_cream->brand }}</td>
                    <td>{{ $ice_cream->type }}</td>
                    <td>{{ 'Rs. '.$ice_cream->price }}</td>
                    <td>
                        <a href="{{ route('ice-cream.edit',$ice_cream->id) }}" class="btn btn-primary a-btn-slide-text">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            <span><strong>Edit</strong></span>            
                        </a>
                        <a href="{{ route('ice-cream.show',$ice_cream->id) }}" class="btn btn-primary a-btn-slide-text">
                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                            <span><strong>View</strong></span>            
                        </a>
                        <a href="#" class="btn btn-primary a-btn-slide-text" onclick="if (confirm('Are you sure you want to delete {{ $ice_cream->name }}')) { $('#icecream-{{ $ice_cream->id }}').submit(); } event.returnValue = false; return false;">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            <span><strong>Delete</strong></span>            
                        </a>
                        <form id="icecream-{{ $ice_cream->id }}" style="display:none;" method="post" action="{{ route('ice-cream.destroy',$ice_cream->id) }}">
                            <input type="hidden" name="_method" value="delete">
                            @csrf
                        </form>
                    </td>
                </tr>
                @endforeach
            @else 
                <td colspan="5">
                    <p>Currently, No ice creams are present.</p>
                </td>
            @endif
        </tbody>
    </table>
    {{ $ice_creams->links() }}

</div>
@endsection
