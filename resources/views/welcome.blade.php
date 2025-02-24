<x-layout>
    <div class="container py-5">
        <div class="row bg-dark text-light rounded py-3 row-gap-3">
            <div class="col-3 fw-bold">App Name</div>
            <div class="col-9 fw-bold">: {{ $title }}</div>
            <div class="col-3 fw-bold">Description</div>
            <div class="col-9 fw-bold">: {{ $description }}</div>
            <div class="col-3 fw-bold">Author</div>
            <div class="col-9 fw-bold">: {{ $author }}</div>
            <div class="col-3 fw-bold">Version</div>
            <div class="col-9 fw-bold">: {{ $version }}</div>
            <div class="col-3 fw-bold">Email</div>
            <div class="col-9 fw-bold">: {{ $email }}</div>
        </div>
    </div>
</x-layout>
