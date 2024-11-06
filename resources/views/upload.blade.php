<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        @session('status')
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endsession
        @error('image')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        <h2 class="text-center mb-4">Upload an Image</h2>

        <!-- Image Upload Form -->
        <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data" class="mb-5">
            @csrf
            <div class="row g-2 align-items-center">
                <div class="col-md-10">
                    <input type="file" name="image" id="image" class="form-control" required>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Upload Image</button>
                </div>
            </div>
        </form>
        <!-- Uploaded Images Table -->
        <h3 class="text-center">Uploaded Images Will Be Shown Here</h3>
        <table class="table table-bordered table-striped mt-3">
            <thead class="table-primary">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image Preview</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example row; replace with dynamic data -->
                @if ($images->isNotEmpty())
                    @foreach ($images as $image)
                        <tr>
                            <th scope="row">{{ $image->id }}</th>
                            <td><img src="{{ asset($image->filepath) }}" alt="Image" class="img-thumbnail"
                                    width="100"></td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="2">No Image Found.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <!-- Bootstrap 5 JS CDN (for any JavaScript functionality, e.g., modals) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
