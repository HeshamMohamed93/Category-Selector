<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .category-container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            @auth
                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome, {{ Auth::user()->name }}</a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}" class="form-inline">
                        @csrf
                        <button class="btn btn-outline-light" type="submit">Logout</button>
                    </form>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
            @endauth
        </ul>
    </div>
</nav>

<div class="container category-container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-4">Categories</h2>
            <div class="form-group">
                <label for="category">Select Category:</label>
                <select id="category" class="form-control">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div id="subcategories"></div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#category').change(function() {
            let categoryId = $(this).val();
            $('#subcategories').html('');
            if (categoryId) {
                fetchSubcategories(categoryId, '#subcategories');
            }
        });
    });

    function fetchSubcategories(parentId, container) {
        $.ajax({
            url: '/subcategories/' + parentId,
            method: 'GET',
            success: function(data) {
                if (data.length > 0) {
                    let select = $('<select class="form-control mb-3"></select>');
                    select.append('<option value="">Select Subcategory</option>');
                    data.forEach(function(subcategory) {
                        select.append('<option value="' + subcategory.id + '">' + subcategory.name + '</option>');
                    });
                    $(container).append(select);
                    select.change(function() {
                        let subcategoryId = $(this).val();
                        let newContainer = $('<div class="mt-3"></div>');
                        $(container).append(newContainer);
                        if (subcategoryId) {
                            fetchSubcategories(subcategoryId, newContainer);
                        }
                    });
                }
            }
        });
    }
</script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
