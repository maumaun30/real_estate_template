@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="hero-section" style="background-image: url({{ asset('media/hero-bg.png') }})">
    <div class="container">
        <div class="hero-content" data-aos="fade-right" data-aos-duration="2000">
            <h1>
                Beautiful homes made for you
            </h1>
            <p>
                In oculis quidem se esse admonere interesse enim maxime placeat, facere possimus, omnis. Et quidem faciunt, ut labore et accurate disserendum et harum quidem exercitus quid.
            </p>
        </div>
        <div class="hero-listings" data-aos="fade-up" data-aos-duration="1000">
            <a href="#houseListingsSection" class="listings-btn">See all listings <img src="{{ asset('media/gold-arrow-right.svg') }}"></a>
        </div>
    </div>
</section>
<!-- End of Hero Section -->

<!-- Banner Section -->
<section class="banner-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <img src="{{ asset('media/banner.png') }}" alt="You're in good hands" class="img-fluid">
            </div>
            <div class="col-lg-6">
                <div class="banner-content" data-aos="fade-left" data-aos-duration="1000">
                    <div class="divider"></div>
                    <h2>
                        You're in good hands
                    </h2>
                    <p>
                        Torquatos nostros? quos dolores eos, qui dolorem ipsum per se texit, ne ferae quidem se repellere, idque instituit docere sic: omne animal, simul atque integre iudicante itaque aiunt hanc quasi involuta aperiri, altera occulta quaedam et voluptatem accusantium doloremque.
                    </p>
                    <a class="btn-default btn-black" href="#">Learn more <img src="{{ asset('media/gold-arrow-right.svg') }}"></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of Banner Section -->

<!-- House Listings Section -->
<section class="house-listings-section" id="houseListingsSection">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="house-heading" data-aos="fade-down" data-aos-duration="1000">
                    <div class="divider"></div>
                    <h2>
                        Find your next place to live
                    </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <ul class="house-filter-list">
                    <li>
                        <a>
                            Looking for <i class="fa fa-chevron-down"></i>
                        </a>
                    </li>
                    <li>
                        <a>
                            Location <i class="fa fa-chevron-down"></i>
                        </a>
                    </li>
                    <li>
                        <a>
                            Property Type <i class="fa fa-chevron-down"></i>
                        </a>
                    </li>
                    <li>
                        <a>
                            Price <i class="fa fa-chevron-down"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="house-card-container">
                    <!-- loop -->
                    
                    @forelse($houses as $house)
                    <a href="{{ route('single.house', $house->id) }}" class="house-card">
                        @if (count($house->house_images) > 0)
                        <img src="{{ asset('media/' . $house->house_images->first()->name . '') }}" alt="{{ $house->name }}" class="img-fluid">
                        @else
                        <img src="{{ asset('media/default.png') }}" alt="{{ $house->name }}" class="img-fluid">
                        @endif
                        <h3>
                            {{ $house->name }}
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
                        </ul>
                    </a>
                    @empty
                    <h3>No House listings yet..</h3>
                    @endforelse

                    <!-- endloop -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of House Listings Section -->

<!-- Banner Section 2 -->
<section class="banner-section-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 text-end">
                <img src="{{ asset('media/banner.png') }}" alt="You're in good hands" class="img-fluid">
            </div>
            <div class="col-lg-6">
                <div class="banner-content" data-aos="fade-right" data-aos-duration="1000">
                    <div class="divider"></div>
                    <h2>
                        You're in good hands
                    </h2>
                    <p>
                        Torquatos nostros? quos dolores eos, qui dolorem ipsum per se texit, ne ferae quidem se repellere, idque instituit docere sic: omne animal, simul atque integre iudicante itaque aiunt hanc quasi involuta aperiri, altera occulta quaedam et voluptatem accusantium doloremque.
                    </p>
                    <a class="btn-default btn-black" href="#">Learn more <img src="{{ asset('media/gold-arrow-right.svg') }}"></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of Banner Section 2 -->

<!-- CTA Section -->
<section class="cta-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="cta-content" data-aos="fade-up" data-aos-duration="1000">
                    <div class="divider"></div>
                    <h2>
                        You're in good hands
                    </h2>
                    <p>
                        Torquatos nostros? quos dolores eos, qui dolorem ipsum per se texit, ne ferae quidem se repellere, idque instituit docere sic: omne animal, simul atque integre iudicante itaque aiunt hanc quasi involuta aperiri, altera occulta quaedam et voluptatem accusantium doloremque.
                    </p>
                    <a class="btn-default" href="#">Learn more <img src="{{ asset('media/btn-arrow-right.svg') }}"></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of CTA Section -->

<!-- Testimonial Section -->
<section class="testimonial-section">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="testimonial-carousel">
                    <div class="item">
                        <div class="divider"></div>
                        <p>
                            “Certe, inquam, pertinax non existimant oportere exquisitis rationibus conquisitis de quo enim ipsam. Torquem detraxit hosti et quidem faciunt, ut aut.”
                        </p>
                        <div class="testimonial-profile">
                            <img src="{{ asset('media/client.png') }}" alt="Client">
                            <span>
                                <div class="client-name">
                                    Lara Madrigal
                                </div>
                                <div class="client-title">
                                    Client
                                </div>
                            </span>
                        </div>
                    </div>
                    <div class="item">
                        <div class="divider"></div>
                        <p>
                            “Certe, inquam, pertinax non existimant oportere exquisitis rationibus conquisitis de quo enim ipsam. Torquem detraxit hosti et quidem faciunt, ut aut.”
                        </p>
                        <div class="testimonial-profile">
                            <img src="{{ asset('media/client.png') }}" alt="Client">
                            <span>
                                <div class="client-name">
                                    Lara Madrigal
                                </div>
                                <div class="client-title">
                                    Client
                                </div>
                            </span>
                        </div>
                    </div>
                    <div class="item">
                        <div class="divider"></div>
                        <p>
                            “Certe, inquam, pertinax non existimant oportere exquisitis rationibus conquisitis de quo enim ipsam. Torquem detraxit hosti et quidem faciunt, ut aut.”
                        </p>
                        <div class="testimonial-profile">
                            <img src="{{ asset('media/client.png') }}" alt="Client">
                            <span>
                                <div class="client-name">
                                    Lara Madrigal
                                </div>
                                <div class="client-title">
                                    Client
                                </div>
                            </span>
                        </div>
                    </div>
                    <div class="item">
                        <div class="divider"></div>
                        <p>
                            “Certe, inquam, pertinax non existimant oportere exquisitis rationibus conquisitis de quo enim ipsam. Torquem detraxit hosti et quidem faciunt, ut aut.”
                        </p>
                        <div class="testimonial-profile">
                            <img src="{{ asset('media/client.png') }}" alt="Client">
                            <span>
                                <div class="client-name">
                                    Lara Madrigal
                                </div>
                                <div class="client-title">
                                    Client
                                </div>
                            </span>
                        </div>
                    </div>
                    <div class="item">
                        <div class="divider"></div>
                        <p>
                            “Certe, inquam, pertinax non existimant oportere exquisitis rationibus conquisitis de quo enim ipsam. Torquem detraxit hosti et quidem faciunt, ut aut.”
                        </p>
                        <div class="testimonial-profile">
                            <img src="{{ asset('media/client.png') }}" alt="Client">
                            <span>
                                <div class="client-name">
                                    Lara Madrigal
                                </div>
                                <div class="client-title">
                                    Client
                                </div>
                            </span>
                        </div>
                    </div>
                    <div class="item">
                        <div class="divider"></div>
                        <p>
                            “Certe, inquam, pertinax non existimant oportere exquisitis rationibus conquisitis de quo enim ipsam. Torquem detraxit hosti et quidem faciunt, ut aut.”
                        </p>
                        <div class="testimonial-profile">
                            <img src="{{ asset('media/client.png') }}" alt="Client">
                            <span>
                                <div class="client-name">
                                    Lara Madrigal
                                </div>
                                <div class="client-title">
                                    Client
                                </div>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of Testimonial Section -->
@endsection