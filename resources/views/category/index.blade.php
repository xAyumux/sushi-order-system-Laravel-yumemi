<html>

<body>
    <ul>
        @foreach ($result['categories'] as $category)
            <li>{{ $category['name'] }}</li>
        @endforeach
    </ul>
</body>

</html>
