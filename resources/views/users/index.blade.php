<x-layout>
    <div class="container my-5 p-3 shadow-sm">
        <div class="row">
            <div class="col-6">
                <h1>Data Users</h1>
            </div>
            <div class="col-6 text-end">
                <a href="/users/create" class="btn btn-sm btn-dark">
                    Add New User
                </a>
            </div>
        </div>

        <form action="" class="row justify-content-end my-3">
            <div class="col-6 d-flex">
                <input name="search" type="search" value="{{ request('search') }}" class="form-control" placeholder="Search . . .">
                <button class="btn btn-sm btn-dark text-nowrap">Search Data</button>
            </div>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Total Car</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="
                            {{ $user->cars->count() == 0
                                ? 'text-danger'
                                : 'text-success' }}
                         ">
                            {{-- perhitungan total car --}}
                            {{ $user->cars->count() }} Cars
                        </td>
                        <td>
                            <form action="/users/{{ $user->id }}" method="POST" class="btn-group">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Del.</button>
                                <a href="/users/{{ $user->id }}/edit"
                                    class="btn btn-sm btn-success">Edit</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $users->links() }}
    </div>
</x-layout>
