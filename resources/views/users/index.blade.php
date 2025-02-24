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

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>john.doe@example.com</td>
                    <td>
                        <form action="#" method="POST" class="btn-group">
                            <button class="btn btn-sm btn-danger">Del.</button>
                            <a href="#" class="btn btn-sm btn-success">Edit</a>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</x-layout>
