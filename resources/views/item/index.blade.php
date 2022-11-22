<html>

<body>
    <ul>
        @foreach ($result['items'] as $item)
            <li>
                {{ $item['name'] }}<br>
                {{ $item['price'] }}<br>
                {{ $item['category_id'] }}<br>
            </li>
        @endforeach
    </ul>
</body>

</html>
