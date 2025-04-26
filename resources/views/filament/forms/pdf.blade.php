<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        font-family: Arial, sans-serif;
        font-size: 14px;
    }

    thead {
        background-color: #f4f4f4;
    }

    th, td {
        padding: 12px 15px;
        border: 1px solid #ddd;
        text-align: left;
    }

    th {
        background-color: #f8fafc;
        font-weight: bold;
        color: #333;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f5f9;
    }
</style>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Available Stock</th>
        </tr>
    </thead>
    <tbody>
        @foreach($records as $record)
            <tr>
                <td>{{ $record->name }}</td>
                <td>{{ $record->category->name }}</td>
                <td>{{ $record->quantity }}</td>
                <td>{{ $record->stock }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
