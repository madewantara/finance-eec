<!DOCTYPE html>
<html lang="en" style="margin: 16px 16px;">

<head>
    <meta charset="UTF- 8">
</head>

<body
    style="border: 1px solid black; border-radius: 1rem; font-family:'Times New Roman', Times, serif; orientation: landscape">
    <footer class="footer"
        style="margin-left: 80px; margin-right: 80px; bottom: 10px; position:fixed; width:100%;">
        <div style="text-align: center; font-size: 12px; margin-left:25px;">
            <p>Head Office : Eightyeight@Kasablanka Tower A 26D floor. Jl. Raya Casablanca Kav. 88 Jakarta Selatan -
                12870
            </p>
            <p style="margin-top: -8px;">Operational Office : Grand Palace Rukan A-16. Jl. Benyamin Suaeb No. 5 -
                Kemayoran.
                Jakarta Pusat - 10530</p>
            <p style="margin-top: -8px;">Phone : 62-21-22606878, Email : eecindonesia@eecindonesia.co.id</p>
        </div>
    </footer>

    <main class="content" style="margin-left: 80px; margin-right: 80px;">
        <div class=" content-main">
            <table style="margin-bottom: 90px; width:100%;">
                <thead>
                    <tr>
                        <th colspan="10" style="padding-top: 60px; padding-bottom: 20px; text-align: left;"><img
                                src="{{ public_path('assets/image/logo/head-logo.png') }}" style="width: 300px;">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="10">
                            <div class="content-head" style="text-align: center;">
                                <h3><b>PT. Era Elektra Corpora Indonesia</b></h3>
                                <h3 style="margin-top: -10px; padding-bottom:15px;"><b>Mandiri Escrow
                                        Transaction</b></h3>
                            </div>
                        </td>
                    </tr>
                </tbody>
                <thead style="width:100%; background-color: lightgrey; text-align: center;">
                    <tr>
                        <th style="width: 2%; height: 30px; border: 1px solid black;">No.</th>
                        <th style="width: 10%; height: 30px; border: 1px solid black;">Date
                            Code</th>
                        <th style="width: 11%; height: 30px; border: 1px solid black;">Token
                        </th>
                        <th style="width: 14%; height: 30px; border: 1px solid black;">Description
                        </th>
                        <th style="width: 13%; height: 30px; border: 1px solid black;">Referral
                        </th>
                        <th style="width: 10%; height: 30px; border: 1px solid black;">Debit
                        </th>
                        <th style="width: 10%; height: 30px; border: 1px solid black;">Credit
                        </th>
                        <th style="width: 10%; height: 30px; border: 1px solid black;">PIC
                        </th>
                        <th style="width: 10%; height: 30px; border: 1px solid black;">Paid To
                        </th>
                        <th style="width: 10%; height: 30px; border: 1px solid black;">Project
                        </th>
                    </tr>
                </thead>
                <tbody style="padding: 3px 3px;">
                    @if (count($dataTrans) == 0)
                        <tr>
                            <td colspan="10"
                                style="text-align: center;vertical-align:middle;border: 1px solid black; height: 25px;">
                                There are no mandiri escrow transactions
                            </td>
                        </tr>
                    @else
                        @foreach ($dataTrans as $trans)
                            <tr>
                                <td style="text-align: center;vertical-align:middle;border: 1px solid black;">
                                    {{ $loop->iteration }}.
                                </td>
                                <td style="text-align: center;vertical-align:middle;border: 1px solid black;">
                                    {{ date('Y-m-d', strtotime($trans[0][0]->date)) }}
                                </td>
                                <td style="text-align: center;vertical-align:middle;border: 1px solid black;">
                                    {{ $trans[0][0]->token }}</td>
                                <td style="vertical-align:middle;border: 1px solid black;">
                                    @foreach ($trans[0] as $t)
                                        &nbsp;{{ $t->description }}<br>
                                    @endforeach
                                </td>
                                <td style="vertical-align:middle;border: 1px solid black;">
                                    @foreach ($trans[0] as $t)
                                        {{ $t->transactionAccount[0]->referral }} -
                                        {{ $t->transactionAccount[0]->name }}<br>
                                    @endforeach
                                </td>
                                <td style="text-align: center;vertical-align:middle;border: 1px solid black;">
                                    @foreach ($trans[0] as $t)
                                        @if (empty($t->debit))
                                            -<br>
                                        @else
                                            Rp. {{ number_format($t->debit, 0, ',', '.') }}<br>
                                        @endif
                                    @endforeach
                                </td>
                                <td style="text-align: center;vertical-align:middle;border: 1px solid black;">
                                    @foreach ($trans[0] as $t)
                                        @if (empty($t->credit))
                                            -<br>
                                        @else
                                            Rp. {{ number_format($t->credit, 0, ',', '.') }}<br>
                                        @endif
                                    @endforeach
                                </td>

                                @if (empty($trans[0][0]->pic))
                                    <td style="text-align: center;vertical-align:middle;border: 1px solid black;">-</td>
                                @else
                                    <td style="text-align: center;vertical-align:middle;border: 1px solid black;">
                                        {{ $trans[0][0]->pic }}</td>
                                @endif

                                <td style="text-align: center;vertical-align:middle;border: 1px solid black;">
                                    {{ $trans[0][0]->paid_to }}</td>

                                @if (empty($trans[0][0]->transactionProject->name))
                                    <td style="text-align: center;vertical-align:middle;border: 1px solid black;">-</td>
                                @else
                                    <td style="text-align: center;vertical-align:middle;border: 1px solid black;">
                                        {{ $trans[0][0]->transactionProject->name }}</td>
                                @endif
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="10" style="padding: 10px 0"><i>Printed on
                                    <b>{{ date('d F, Y', strtotime($todayDate)) }}</b></i>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>
