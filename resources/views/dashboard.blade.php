<x-layout>
    <div class="container">
        <div class="row my-5 justify-content-center gap-4">
            <div class="col-3 text-center bg-dark text-white py-3"
                style="border-radius: 4rem">
                <h3 class="mt-3">Total User</h3>
                <h1 class="fw-bold">{{ $total_user }}</h1>
            </div>

            <div class="col-3 text-center bg-dark text-white py-3"
                style="border-radius: 4rem">
                <h3 class="mt-3">Total Car</h3>
                <h1 class="fw-bold">50</h1>
            </div>
        </div>

        <h1>Welcome to Dashboard !</h1>
        <p>{{ auth()->user()->name }}</p>
    </div>
</x-layout>
