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
                <h1 class="fw-bold">{{ $total_car }}</h1>
            </div>
        </div>

        <h3>Welcome to Dashboard !</h3>
        <p class="fw-bold">{{ auth()->user()->name }}</p>

        <h4>My Cars :</h4>
        <div class="row">
            @foreach ($my_car as $key => $car)
                <div class="col-1">{{ $key + 1 }}</div>
                <div class="col-11">
                    {{ $car->code }} - <span class="fw-bold">{{ $car->name }}</span>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
