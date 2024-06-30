<!DOCTYPE html>
<html>
<head>
    <title>Categories</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
@auth
    <p>Welcome, {{ Auth::user()->name }}!</p>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
@else
    <p>Please <a href="{{ route('login') }}">login</a> to access the categories.</p>
    <p>Don't have an account? <a href="{{ route('register') }}">Register here</a>.</p>
@endauth

<select id="category">
    <option value="">Select Category</option>
    @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
</select>
<div id="subcategories"></div>

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
                    let select = $('<select></select>');
                    select.append('<option value="">Select Subcategory</option>');
                    data.forEach(function(subcategory) {
                        select.append('<option value="' + subcategory.id + '">' + subcategory.name + '</option>');
                    });
                    $(container).append(select);
                    select.change(function() {
                        let subcategoryId = $(this).val();
                        let newContainer = $('<div></div>');
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
</body>
</html>
