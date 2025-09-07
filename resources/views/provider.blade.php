<x-main>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">

                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="card-body p-4">

                        {{-- Profile image and name --}}
                        <div class="text-center">
                            <img src="{{ asset('storage/' . $provider->user->image) }}" alt="Profile Image"
                                class="rounded-circle shadow" width="130" height="130">
                            <h2 class="mt-3">{{ $provider->user->name }}</h2>
                            <h5 class="text-muted">{{ $provider->service->name ?? 'No Service Assigned' }}</h5>
                        </div>

                        {{-- Rating and Price --}}
                        <div class="d-flex justify-content-center mt-3 gap-4">
                            <div>
                                <span class="fw-bold text-dark">Price:</span>
                                <span class="text-primary">{{ $provider->price }} EGP</span>
                            </div>
                        </div>

                        <hr class="my-4">

                        {{-- Bio --}}
                        <div class="mb-4 p-3 bg-light rounded">
                            <h5 class="fw-bold mb-2">About the Provider</h5>
                            <p class="text-dark fs-5" style="line-height: 1.7;">
                                {{ $provider->description }}
                            </p>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="d-flex justify-content-between">
                            <a href="https://wa.me/{{ $provider->phone }}" target="_blank"
                                class="btn btn-outline-success w-100 me-2">
                                <i class="bi bi-whatsapp"></i> Contact on WhatsApp
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</x-main>
