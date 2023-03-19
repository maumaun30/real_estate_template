@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-sm-9 d-flex flex-wrap gap-1 mb-1">
            <a href="{{ route('house.index') }}" class="btn btn-outline-secondary"><i class="fa fa-arrow-left"></i> Back</a>
            <a href="{{ route('house.edit', $house->id) }}" class="btn btn-outline-success">Edit</a>
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
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">House Details</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md">
                            <div class="mb-3">
                                <strong>Name:</strong>
                                <i>{{ $house->name }}</i>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="mb-3">
                                <strong>Price:</strong>
                                <i>{{ number_format($house->price) }}</i>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md">                            
                            <div class="mb-3">
                                <strong>Address:</strong>
                                <i>{{ $house->address }}</i>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="mb-3">
                                <strong>Lot Area:</strong>
                                <i>{{ $house->lot_area }}</i>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md">
                            <div class="mb-3">
                                <strong>Date Built:</strong>
                                <i>{{ $house->date_built }}</i>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md">
                            <div class="mb-3">
                                <strong>Bedrooms:</strong>
                                <i>{{ $house->bedroom }}</i>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="mb-3">
                                <strong>Restrooms:</strong>
                                <i>{{ $house->restroom }}</i>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md">
                            <div class="mb-3">
                                <strong>Windows:</strong>
                                <i>{{ $house->window }}</i>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="mb-3">
                                <strong>Garage:</strong>
                                <i>{{ $house->garage }}</i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md">
                            <div class="mb-3">
                                <strong>Description:</strong>
                                <i>{{ $house->description }}</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    Images
                </div>
                <div class="card-body">
                    <ul class="house-images-container mb-3">
                        @forelse ($house->house_images as $images)
                        <li class="images-item">
                            <span>
                                <img src="{{ asset('media/'. $images->name . '') }}" alt="{{ $images->name }}" class="img-thumbnail">
                            </span>                      
                            <a href="{{ route('house.images.destroy', $images->id) }}" class="images-delete-x" onclick="return confirm('Are you sure?')">
                                <i class="fa fa-xmark text-danger"></i>
                            </a>
                        </li>
                        @empty
                        <li class="images-item">
                            <span>
                                No images found..
                            </span>                      
                        </li>
                        @endforelse
                    </ul>

                    <form action="{{ route('house.images.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="input-group">
                                    <input type="file" class="form-control @error('images') is-invalid @enderror" name="images[]" multiple>
                                    <input type="hidden" name="house_id" value="{{ $house->id }}">
                                    <button class="btn btn-primary" type="submit">Upload</button>
                                </div>
                                @error('images')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Features
                </div>
                <div class="card-body">
                    <ul class="house-features-container mb-3">
                        @forelse ($house->house_features as $feature)
                        <li class="features-item">
                            <span>
                                {{ $feature->name }}
                            </span>                      
                            <a href="{{ route('house.features.destroy', $feature->id) }}" class="feature-delete-x" onclick="return confirm('Are you sure?')">
                                <i class="fa fa-xmark text-danger"></i>
                            </a>
                        </li>
                        @empty
                        <li class="features-item">
                            <span>
                                No added feature yet..
                            </span>               
                        </li>
                        @endforelse
                    </ul>

                    <form action="{{ route('house.features.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="input-group">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Add a feature..">
                                    <input type="hidden" name="house_id" value="{{ $house->id }}">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-plus"></i></button>
                                </div>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection