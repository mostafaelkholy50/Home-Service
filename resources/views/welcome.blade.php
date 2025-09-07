<x-main>
    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>

    @endif
    @if (session('error'))
        <div class="alert alert-danger text-center">
            {{ session('error') }}
        </div>

    @endif
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-6 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1">
                    <img class="img-fluid" src="{{ asset('img/home 1.jpg') }}" alt="Image">
                </button>
                <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="1" aria-label="Slide 2">
                    <img class="img-fluid" src="{{ asset('img/home 2.jpg') }}" alt="Image">
                </button>
                <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="2" aria-label="Slide 3">
                    <img class="img-fluid" src="{{ asset('img/home 3.jpg') }}" alt="Image">
                </button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('img/home 1.jpg') }}" alt="Image">
                    <div class="carousel-caption">
                        <h1 class="display-1 text-uppercase text-white mb-4 animated zoomIn">
                            All Your Home Services in One Place
                        </h1>
                        <a href="#" class="btn btn-primary py-3 px-4">Learn More</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('img/home 2.jpg') }}" alt="Image">
                    <div class="carousel-caption">
                        <h1 class="display-1 text-uppercase text-white mb-4 animated zoomIn">
                            Cleaning, Plumbing, Electrical & More
                        </h1>
                        <a href="#" class="btn btn-primary py-3 px-4">Book Now</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('img/home 3.jpg') }}" alt="Image">
                    <div class="carousel-caption">
                        <h1 class="display-1 text-uppercase text-white mb-4 animated zoomIn">
                            Connect with Trusted Service Providers
                        </h1>
                        <a href="#" class="btn btn-primary py-3 px-4">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->
    <!-- Service Start -->
    <div class="container-fluid service pt-6 pb-6">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="display-6 text-uppercase mb-5">Our Home Services</h1>
            </div>
            <div class="row g-4">
                @foreach ($services as $service)
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.{{ $loop->iteration }}s">
                        <div class="service-item">
                            <div class="service-inner pb-5">
                                <img class="img-fluid w-100" src="{{ asset('storage/' . $service->image) }}"
                                    alt="{{ $service->name }}">
                                <div class="service-text px-5 pt-4">
                                    <h5 class="text-uppercase">{{ $service->name }}</h5>
                                    <p>{{ \Illuminate\Support\Str::limit($service->description, 100) }}</p>
                                </div>
                                <form method="GET" action="{{ route('provider.AllService') }}" class="mb-4">

                                    <a class="btn btn-light px-3"
                                        href="{{ route('provider.AllService', ['service_id' => $service->id]) }}">Read More
                                        <i class="bi bi-chevron-double-right ms-1"></i></a>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Service End -->
<!-- Team Start -->
<div class="container-fluid team py-6">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="display-6 text-uppercase mb-5">Meet Our Professional Service Providers</h1>
        </div>
        <div class="row g-4">
            @foreach ($providers as $provider)
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.{{ $loop->index + 3 }}s">
                    <div class="card h-100 shadow border-0">
                        <img src="{{ asset('storage/' . ($provider->user->image ?? 'img/default.jpg')) }}"
                            class="card-img-top" alt="Profile Image">
                        <div class="card-body text-center d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title">{{ $provider->user->name }}</h5>
                                <p class="card-text text-muted mb-3">
                                    {{ $provider->service->name ?? 'No Service Assigned' }}
                                </p>
                            </div>

                            <form method="get" action="{{ route('provider.show') }}">
                                @csrf
                                <input type="hidden" name="provider_id" value="{{ $provider->id }}">
                                <button type="submit" class="btn btn-primary w-100 mt-3">
                                    View Profile
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Team End -->



</x-main>
