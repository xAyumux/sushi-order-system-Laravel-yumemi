<html>

<body>
    <ul>
        @foreach ($result as $order)
            <li>
                {{ $order['table_number'] }}<br>
                {{ $order['order_items']['name'] }}<br>
                {{ $order['order_items']['price'] }}<br>
                {{ $order['order_items']['amount'] }}<br>
            </li>
        @endforeach
    </ul>
</body>

</html>
