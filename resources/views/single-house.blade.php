@extends('layouts.app')

@section('content')
<!-- Inner Banner Section -->
<section class="inner-banner-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="inner-text-container">
                    <h1>
                        {{ $house->name }}
                    </h1>
                    <span>
                        {{ $house->address }}
                    </span>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="inner-text-container">
                    <h2>
                        ${{ number_format($house->price) }}
                    </h2>
                    <span>
                        {{ $house->lot_area }}
                    </span>
                </div>
            </div>
        </div>
    </div>
    @auth
    <a href="{{ route('house.show', $house->id) }}" class="house-edit-btn" title="Edit house property"><i class="fa fa-pencil-square"></i></a>
    @endauth
</section>
<!-- End of Inner Banner Section -->

<!-- Product Section -->
<section class="product-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="images-container">
                    <div class="featured-image">
                        @if (count($house->house_images) > 0)
                        <img src="{{ asset('media/' . $house->house_images->first()->name . '') }}" alt="{{ $house->name }}" class="img-fluid single-feature-image">
                        @else
                        <img src="{{ asset('media/default.png') }}" alt="{{ $house->name }}" class="img-fluid single-feature-image">
                        @endif
                    </div>
                    <div class="gallery-container">
                        @forelse ($house->house_images as $image)
                        <div class="item">
                            <img src="{{ asset('media/' . $image->name . '') }}" alt="{{ $image->name }}">
                        </div>
                        @empty
                        @endforelse
                    </div>
                </div>

                <div class="details-container" data-aos="fade-up" data-aos-duration="500">
                    <h3>
                        Details
                    </h3>
                    <ul class="house-card-details">
                        <li>
                            <img src="{{ asset('media/bed-icon.svg') }}"><span>{{ $house->bedroom }}</span>
                        </li>
                        <li>
                            <img src="{{ asset('media/shower-icon.svg') }}"><span>{{ $house->restroom }}</span>
                        </li>
                        <li>
                            <img src="{{ asset('media/square-icon.svg') }}"><span>{{ $house->window }}</span>
                        </li>
                        <li>
                            <img src="{{ asset('media/garage-icon.svg') }}"><span>{{ $house->garage }}</span>
                        </li>
                        <li>
                            <img src="{{ asset('media/date-icon.svg') }}"><span>{{ $house->date_built }}</span>
                        </li>
                    </ul>
                </div>

                <div class="description-container" data-aos="fade-up" data-aos-duration="500">
                    <h3>
                        Description
                    </h3>
                    <p>
                        {{ $house->description ?? 'No description yet..' }}
                    </p>
                </div>

                <div class="features-container" data-aos="fade-up" data-aos-duration="500">
                    <h3>
                        Features
                    </h3>
                    <ul class="features-list">
                        @forelse ($house->house_features as $feature)
                        <li><i class="fa fa-circle-check"></i><span> {{ $feature->name }}</span></li>
                        @empty
                        <li>No added features yet..</li>
                        @endforelse
                    </ul>
                </div>

            </div>
            <div class="col-lg-4">
                <div class="form-container" data-aos="fade-left" data-aos-duration="500">
                    <div class="profile-details">
                        <img src="{{ asset('media/avatar-image.png') }}" alt="Kayley Hall">
                        <span>
                            <div class="name">
                                Kayley Hall
                            </div>
                            <div class="link">
                                <a href="#">View profile</a>
                            </div>
                        </span>
                    </div>
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <textarea name="" id="" placeholder="Hello, I am interested in..." class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn-default btn-black">Learn more <img src="{{ asset('media/gold-arrow-right.svg') }}"></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of Product Section -->

<!-- Similar Listings Section -->
<section class="similar-listings-section">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="divider"></div>
                <h2>
                    Similar Listings
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="similar-carousel">
                    @forelse ($similar_houses as $similar)
                    <a href="{{ route('single.house', $similar->id) }}" class="house-card">
                        @if (count($similar->house_images) > 0)
                        <img src="{{ asset('media/' . $similar->house_images->first()->name . '') }}" alt="{{ $similar->name }}" class="img-fluid">
                        @else
                        <img src="{{ asset('media/default.png') }}" alt="{{ $similar->name }}" class="img-fluid">
                        @endif
                        <h3>
                            {{ $similar->name }}
                        </h3>
                        <ul class="house-card-details">
                            <li>
                                <img src="{{ asset('media/bed-icon.svg') }}"><span>{{ $similar->bedroom }}</span>
                            </li>
                            <li>
                                <img src="{{ asset('media/shower-icon.svg') }}"><span>{{ $similar->restroom }}</span>
                            </li>
                            <li>
                                <img src="{{ asset('media/square-icon.svg') }}"><span>{{ $similar->window }}</span>
                            </li>
                        </ul>
                    </a>
                    @empty
                    <h3>No House listings yet..</h3>
                    @endforelse
                </div>
            </div>
        </div>
    </div>    
</section>
<!-- End of Similar Listings Section -->
@endsection