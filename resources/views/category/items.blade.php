<html>

<body>
    <h1>Category ID is {{ $result['category_id'] }}</h1>
    <h1>Category name is {{ $result['category_name'] }}</h1>
    <ul>
        @foreach ($result['categories'] as $item)
            <li>{{ $item['name'] }}</li>
        @endforeach
    </ul>
</body>

</html>
