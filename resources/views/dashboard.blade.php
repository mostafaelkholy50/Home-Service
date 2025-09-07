<x-main>
    <div class="container-fluid py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="display-6 text-uppercase mb-5">Welcome, {{ Auth::user()->name }}</h1>
                <p>Manage your services and orders from here.</p>
            </div>
            <div class="row g-4 justify-content-center mt-5">

                <div class="col-lg-5 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="card h-100 shadow border-0 p-4">
                        <div class="card-body text-center">
                            <img src="{{ asset('storage/' . (Auth::user()->image ?? 'users/user.jpg')) }}"
                                class="rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;"
                                alt="Profile Image">
                            <h5 class="card-title">{{ Auth::user()->name }}</h5>
                            <p class="card-text text-muted">{{ Auth::user()->email }}</p>
                            <a href="#" class="btn btn-outline-primary mt-3">Edit Profile</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="card h-100 shadow border-0 p-4">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase mb-4">Your Service Details</h5>
                            @if ($provider)
                                <img src="{{ isset($provider->service->image) ? asset('storage/' . $provider->service->image) : asset('users/user.jpg') }}"
                                    class="img-fluid w-100 mb-3" alt="{{ $provider->service->name ?? 'Service Image' }}">
                                <p><strong>Service:</strong> {{ $provider->service->name ?? 'N/A' }}</p>
                                <p><strong>Price:</strong> EGP {{ number_format($provider->price ?? 0) }}</p>
                                <p><strong>Description:</strong> {{ $provider->description ?? 'No description provided.' }}
                                </p>
                                <a href="{{ route('provider.create-service') }}"
                                    class="btn btn-outline-primary py-3 px-5 w-100 mb-3">
                                    Edit Service
                                </a>

                                <a href="#" class="btn btn-primary py-3 px-5 w-100 disabled" aria-disabled="true">
                                    Go Premium To Add More Services
                                </a>
                            @else
                                <div class="alert alert-info text-center">
                                    <p>You haven't added a service yet.</p>
                                    <a href="{{ route('provider.create-service') }}" class="btn btn-primary mt-2">Add New
                                        Service</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-main>
