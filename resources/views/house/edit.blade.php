@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-sm-9 d-flex flex-wrap gap-1 mb-1">
            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary"><i class="fa fa-arrow-left"></i> Back</a>
            <a href="#" class="btn btn-outline-danger btn-delete" data-id="{{ $house->id }}">
                Delete
                <form id="form{{ $house->id }}" action="{{ route('house.destroy', $house->id) }}" class="d-none" method="post">
                    @csrf
                    @method('delete')
                </form>
            </a>
            <a href="{{ route('single.house', $house->id) }}" class="btn btn-outline-warning">View</a>
        </div>
        <div class="col-sm-3 text-end">
            <a href="{{ route('house.create') }}" class="btn btn-outline-secondary">Add New</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">House Listings</div>
                <div class="card-body">
                    <form action="{{ route('house.update', $house->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="col-form-label">Name</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $house->name) }}" required autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="col-form-label">Address</label>
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', $house->address) }}">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="col-form-label">Price</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price', $house->price) }}" required>
                                        @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="lot_area" class="col-form-label">Lot Area</label>
                                    <input id="lot_area" type="text" class="form-control @error('lot_area') is-invalid @enderror" name="lot_area" value="{{ old('lot_area', $house->lot_area) }}" required>
                                    @error('lot_area')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="date_built" class="col-form-label">Date Built</label>
                                    <input id="date_built" type="text" class="form-control @error('date_built') is-invalid @enderror" name="date_built" value="{{ old('date_built', $house->date_built) }}" required>
                                    @error('date_built')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col">
                                            <label for="bedroom" class="col-form-label">Bedrooms</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><img src="{{ asset('media/bed-icon.svg') }}"></span>
                                                <input id="bedroom" type="number" class="form-control @error('bedroom') is-invalid @enderror" name="bedroom" value="{{ old('bedroom', $house->bedroom) }}" required>
                                                @error('bedroom')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label for="restroom" class="col-form-label">Restrooms</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><img src="{{ asset('media/shower-icon.svg') }}"></span>
                                                <input id="restroom" type="number" class="form-control @error('restroom') is-invalid @enderror" name="restroom" value="{{ old('restroom', $house->restroom) }}" required>
                                                @error('restroom')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label for="window" class="col-form-label">Windows</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><img src="{{ asset('media/square-icon.svg') }}"></span>
                                                <input id="window" type="number" class="form-control @error('window') is-invalid @enderror" name="window" value="{{ old('window', $house->window) }}" required>
                                                @error('window')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label for="garage" class="col-form-label">Garage</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><img src="{{ asset('media/garage-icon.svg') }}"></span>
                                                <input id="garage" type="number" class="form-control @error('garage') is-invalid @enderror" name="garage" value="{{ old('garage', $house->garage) }}" required>
                                                @error('garage')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="window" class="col-form-label">Description</label>
                            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $house->description) }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection