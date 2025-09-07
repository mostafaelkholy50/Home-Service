<x-main>
    <div class="container-fluid py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="display-6 text-uppercase mb-5">Add Your Service</h1>
                <p>Fill in the details below to add your professional service to our platform.</p>
            </div>

            @if (session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger text-center">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row g-4 justify-content-center mt-5">
                <div class="col-lg-8">
                    <div class="card shadow border-0 p-4 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="card-body">
                            <form action="{{ route('provider.store-service') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-4">
                                    <label for="image" class="form-label">Profile Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>

                                <div class="mb-4">
                                    <label for="service_id" class="form-label">Service Type</label>
                                    <select class="form-select" id="service_id" name="service_id" required>
                                        <option value="" selected disabled>Select a service</option>
                                        @foreach ($services as $service)
                                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone')  }}" required>
                                </div>

                                <div class="mb-4">
                                    <label for="price" class="form-label">Price (EGP)</label>
                                    <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" required>
                                </div>

                                <div class="mb-4">
                                    <label for="description" class="form-label">Service Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="5" required>{{ old('description') }}</textarea>
                                </div>

                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary btn-lg">Save My Service</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main>
