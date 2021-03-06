<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    @if (count($arrayData) != 0)
        <table>
            <thead>
                <tr>
                    @foreach ($arrayData[0] as $key => $value)
                        <th style="text-align: center; width: 200px"><b>{{ ucfirst($key) }}</b></th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($arrayData as $row)
                    <tr>
                        @foreach ($row as $value)
                            <td>{{ $value }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>

</html>
