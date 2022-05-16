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
                    <th colspan=3 rowspan=2 style="text-align: center">
                        <h1><b>PT. Era Elektra Corpora Indonesia</b></h1>
                        <h1><b>Financial Account</b></h1>
                    </th>
                </tr>
                <tr></tr>
                <tr></tr>
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
    @else
        <table>
            <thead>
                <tr>
                    <th colspan=3 rowspan=2 style="text-align: center">
                        <h1><b>PT. Era Elektra Corpora Indonesia</b></h1>
                        <h1><b>Financial Account</b></h1>
                    </th>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr>
                    <th style="text-align: center; width: 200px"><b>Referral Code</b></th>
                    <th style="text-align: center; width: 200px"><b>Name</b></th>
                    <th style="text-align: center; width: 200px"><b>Category</b></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="3" style="text-align: center;">There are no financial accounts.</td>
                </tr>
            </tbody>
        </table>
    @endif
</body>

</html>
