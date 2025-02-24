<x-layout>
    <div class="container my-5 p-3 shadow-sm">
        <form action="/users" method="POST">
            @csrf
            <div class="mb-3">
                <label for="">Name</label>
                <input type="text" name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') ? old('name') : '' }}"
                >
                @error ('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="">Email</label>
                <input type="text" name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') ? old('email') : '' }}"
                >
                @error ('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control
                    @error('password') is-invalid @enderror"
                    value="{{ old('password') ? old('password') : '' }}"
                >
                @error ('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-dark">Store a User</button>
            <a href="/users" class="btn btn-secondary">Back to Users</a>
        </form>
    </div>
</x-layout>
