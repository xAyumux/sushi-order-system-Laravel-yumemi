<html>

<body>
    <ul>
        @foreach ($result['options'] as $option)
            <li>
                {{ $option['name'] }}<br>
            </li>
        @endforeach
    </ul>
</body>

</html>
