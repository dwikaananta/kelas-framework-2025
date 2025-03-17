<x-layout>
    <div style="min-height: 80vh; display: flex">
        <form action="/login" method="POST"
          class="m-auto shadow p-5" style="min-width: 600px">
            @csrf
            <h1 class="text-center mb-4">Form Login</h1>

            <input type="text" name="email"
             class="form-control mb-3 @error('email') is-invalid @enderror"
             placeholder="john.doe@example.com">
            @error ('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

            <input type="password" name="password"
             class="form-control mb-3"
             placeholder="******">

            <button class="btn btn-primary w-100" style="border-radius: 5rem">
                Sign In
            </button>
        </form>
    </div>
</x-layout>
