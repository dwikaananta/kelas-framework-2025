<x-layout>
    <div class="container my-5 p-3 shadow-sm">
        <div class="row">
            <div class="col-6">
                <h1>Data Cars</h1>
            </div>
            <div class="col-6 text-end">
                <a href="/cars/create" class="btn btn-sm btn-dark">
                    Add New Car
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
                    <th>Code</th>
                    <th>Name</th>
                    <th>Engine Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $key => $car)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $car->code }}</td>
                        <td>{{ $car->name }}</td>
                        <td>{{ $car->engine_number }}</td>
                        <td>
                            <form action="/cars/{{ $car->id }}" method="POST" class="btn-group">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Del.</button>
                                <a href="/cars/{{ $car->id }}/edit"
                                    class="btn btn-sm btn-success">Edit</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $cars->links() }}
    </div>
</x-layout>
