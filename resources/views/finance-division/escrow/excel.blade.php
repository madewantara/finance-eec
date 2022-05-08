<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <table>
        <thead>
            <tr>
                <th colspan=10 rowspan=2 style="text-align: center">
                    <h1><b>PT. Era Elektra Corpora Indonesia</b></h1>
                    <h1><b>Mandiri Escrow Transaction</b></h1>
                </th>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr>
                <th style="text-align: center; width: 30px"><b>No</b></th>
                <th style="text-align: center; width: 90px"><b>Date</b></th>
                <th style="text-align: center; width: 130px"><b>Token</b></th>
                <th style="text-align: center; width: 200px"><b>Description</b></th>
                <th style="text-align: center; width: 200px"><b>Referral</b></th>
                <th style="text-align: center; width: 100px"><b>Debit</b></th>
                <th style="text-align: center; width: 100px"><b>Credit</b></th>
                <th style="text-align: center; width: 140px"><b>PIC</b></th>
                <th style="text-align: center; width: 140px"><b>Paid To</b></th>
                <th style="text-align: center; width: 140px"><b>Project</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataTrans as $trans)
                <tr>
                    <td style="text-align: center;vertical-align:center;">
                        {{ $loop->iteration }}.
                    </td>
                    <td style="text-align: center;vertical-align:center;">
                        {{ date('Y-m-d', strtotime($trans[0][0]->date)) }}
                    </td>
                    <td style="vertical-align:center;">{{ $trans[0][0]->token }}</td>
                    <td>
                        @foreach ($trans[0] as $t)
                            &nbsp;{{ $t->description }}<br>
                        @endforeach
                    </td>
                    <td style="vertical-align:center;">
                        @foreach ($trans[0] as $t)
                            {{ $t->transactionAccount[0]->referral }} - {{ $t->transactionAccount[0]->name }}<br>
                        @endforeach
                    </td>
                    <td style="text-align: center;vertical-align:center;">
                        @foreach ($trans[0] as $t)
                            @if (empty($t->debit))
                                -<br>
                            @else
                                Rp. {{ number_format($t->debit, 0, ',', '.') }}<br>
                            @endif
                        @endforeach
                    </td>
                    <td style="text-align: center;vertical-align:center;">
                        @foreach ($trans[0] as $t)
                            @if (empty($t->credit))
                                -<br>
                            @else
                                Rp. {{ number_format($t->credit, 0, ',', '.') }}<br>
                            @endif
                        @endforeach
                    </td>

                    @if (empty($trans[0][0]->pic))
                        <td style="text-align: center;vertical-align:center;">-</td>
                    @else
                        <td style="text-align: center;vertical-align:center;">{{ $trans[0][0]->pic }}</td>
                    @endif

                    <td style="text-align: center;vertical-align:center;">{{ $trans[0][0]->paid_to }}</td>

                    @if (empty($trans[0][0]->transactionProject->name))
                        <td style="text-align: center;vertical-align:center;">-</td>
                    @else
                        <td style="text-align: center;vertical-align:center;">
                            {{ $trans[0][0]->transactionProject->name }}</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
