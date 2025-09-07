<x-main>

    <!-- Page Header -->
    <div class="container-fluid page-header pt-5 mb-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center pt-5">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="bg-white p-5 rounded shadow">
                        <h1 class="display-6 text-uppercase mb-3 animated slideInDown">Services</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Service Filter -->
    <div class="container py-5">
        <form method="GET" action="{{ route('provider.AllService') }}" class="mb-4">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <select name="service_id" class="form-select form-select-lg" onchange="this.form.submit()">
                        <option value="all" {{ ($selectedService == 'all' || !$selectedService) ? 'selected' : '' }}>
                            All Services
                        </option>
                        @foreach($services as $service)
                            <option value="{{ $service->id }}" {{ $selectedService == $service->id ? 'selected' : '' }}>
                                {{ $service->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>

        <!-- Providers Grid -->
        <div class="row g-4">
            @forelse($providers as $provider)
                <div class="col-md-4">
                    <div class="card h-100 shadow border-0">
                        {{-- Provider Image --}}
                        @if($provider->user && $provider->user->image)
                            <img src="{{ asset('storage/' . $provider->user->image) }}" class="card-img-top"
                                 alt="Provider Image" style="height: 250px; object-fit: cover;">
                        @else
                            <img src="https://via.placeholder.com/400x250?text=No+Image" class="card-img-top"
                                 alt="No Image">
                        @endif

                        {{-- Provider Info --}}
                        <div class="card-body">
                            <h5 class="card-title">{{ $provider->name }}</h5>
                            <p class="card-text mb-1"><strong>Service:</strong> {{ $provider->service->name ?? '-' }}</p>
                            <p class="card-text mb-3"><strong>Price:</strong> {{ $provider->price ?? '-' }} EGP</p>
                        </div>

                        {{-- Buttons --}}
                        <div class="card-footer bg-white border-0 d-flex gap-2 px-3 pb-3">
                            <form method="get" action="{{ route('provider.show') }}" class="w-100">
                                @csrf
                                <input type="hidden" name="provider_id" value="{{ $provider->id }}">
                                <button type="submit" class="btn btn-outline-primary w-100">View</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center mt-4">
                    <p class="fs-5 text-muted">No providers found for this service.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-main>
