<x-layout>
    <div class="container my-5 p-3 shadow-sm">
        <form action="/cars" method="POST">
            <h1>Create Car</h1>
            @csrf
            <div class="mb-3">
                <label for="">Owner</label>
                <select name="user_id"
                 class="form-select @error('user_id') is-invalid @enderror">
                    <option value="">Choose the owner</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                @error ('user_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="">Code</label>
                <input type="text" name="code"
                    class="form-control @error('code') is-invalid @enderror"
                    value="{{ old('code') ? old('code') : '' }}"
                >
                @error ('code')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
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
                <label for="">Engine Number</label>
                <input type="text" name="engine_number"
                    class="form-control @error('engine_number') is-invalid @enderror"
                    value="{{ old('engine_number') ? old('engine_number') : '' }}"
                >
                @error ('engine_number')
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
