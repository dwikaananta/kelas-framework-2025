<x-layout>
    <div class="container my-5 p-3 shadow-sm">
        <form action="/users" method="POST">
            @csrf
            <div class="mb-3">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="">Password</label>
                <input type="text" name="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-dark">Store a User</button>
            <a href="/users" class="btn btn-secondary">Back to Users</a>
        </form>
    </div>
</x-layout>
