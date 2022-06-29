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
                <th colspan=3 rowspan=2 style="text-align: center; vertical-align:center;">
                    <h1><b>LABA-RUGI USAHA TAHUN {{ $year }}</b></h1>
                </th>
            </tr>
            <tr></tr>
        </thead>
        <tbody>
            <tr>
                <td style="text-align: center;vertical-align:center; width: 30px;">
                    <b>1</b>
                </td>
                <td style="vertical-align:center; width: 300px;"><b>PENDAPATAN</b></td>
                <td style="text-align: right;vertical-align:center; width: 250px;">
                    <b>Rp. {{ number_format($pendapatan, 0, ',', '.') }}</b>
                </td>
            </tr>
            <tr>
                <td style="text-align: center;vertical-align:center; width: 30px;">
                    <b>2</b>
                </td>
                <td style="vertical-align:center; width: 300px;"><b>BIAYA LANGSUNG (COST OF GOODSOLD)</b></td>
                <td style="text-align: right;vertical-align:center; width: 250px;">
                    <b>Rp. {{ number_format($biayalangsung, 0, ',', '.') }}</b>
                </td>
            </tr>
            <tr>
                <td style="text-align: center;vertical-align:center; width: 30px;">
                    <b>3</b>
                </td>
                <td style="vertical-align:center; width: 300px;"><b>GROSS MARGIN</b></td>
                <td style="text-align: right;vertical-align:center; width: 250px;">
                    <b>Rp. {{ number_format($gross, 0, ',', '.') }}</b>
                </td>
            </tr>
            <tr>
                <td style="text-align: center;vertical-align:center; width: 30px;">
                    <b>4</b>
                </td>
                <td style="vertical-align:center; width: 300px;"><b>BIAYA OPERASIONAL</b></td>
                <td style="text-align: right;vertical-align:center; width: 250px;">
                    <b>Rp. {{ number_format($operasional, 0, ',', '.') }}</b>
                </td>
            </tr>
            <tr>
                <td style="text-align: center;vertical-align:center; width: 30px;"></td>
                <td style="vertical-align:center; width: 300px;">4.1. Biaya Karyawan</td>
                <td style="text-align: center;vertical-align:center; width: 250px;">
                    Rp. {{ number_format($karyawan, 0, ',', '.') }}
                </td>
            </tr>
            <tr>
                <td style="text-align: center;vertical-align:center; width: 30px;"></td>
                <td style="vertical-align:center; width: 300px;">4.2. Biaya Kantor</td>
                <td style="text-align: center;vertical-align:center; width: 250px;">
                    Rp. {{ number_format($kantor, 0, ',', '.') }}
                </td>
            </tr>
            <tr>
                <td style="text-align: center;vertical-align:center; width: 30px;"></td>
                <td style="vertical-align:center; width: 300px;">4.3. Biaya Pemasaran</td>
                <td style="text-align: center;vertical-align:center; width: 250px;">
                    Rp. {{ number_format($pemasaran, 0, ',', '.') }}
                </td>
            </tr>
            <tr>
                <td style="text-align: center;vertical-align:center; width: 30px;"></td>
                <td style="vertical-align:center; width: 300px;">4.4. Adm, Legal dan Finance Cost</td>
                <td style="text-align: center;vertical-align:center; width: 250px;">
                    Rp. {{ number_format($adm, 0, ',', '.') }}
                </td>
            </tr>
            <tr>
                <td style="text-align: center;vertical-align:center; width: 30px;"></td>
                <td style="vertical-align:center; width: 300px;">4.5. Biaya Penyusutan dan Amortisasi</td>
                <td style="text-align: center;vertical-align:center; width: 250px;">
                    Rp. {{ number_format($penyusutan, 0, ',', '.') }}
                </td>
            </tr>
            <tr>
                <td style="text-align: center;vertical-align:center; width: 30px;">
                    <b>5</b>
                </td>
                <td style="vertical-align:center; width: 300px;"><b>PELUNASAN PEMBAYARAN PAJAK</b></td>
                <td style="text-align: right;vertical-align:center; width: 250px;">
                    <b>Rp. {{ number_format($pajak, 0, ',', '.') }}</b>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="vertical-align:center; text-align: center;"><b>LABA BERSIH TAHUN
                        {{ $year }}</b></td>
                <td style="text-align: right;vertical-align:center; width: 250px;">
                    <b>Rp. {{ number_format($gross - $operasional - $pajak, 0, ',', '.') }}</b>
                </td>
            </tr>

            <tr></tr>
            <tr></tr>
            <tr></tr>

            <tr>
                <td></td>
                <td></td>
                <td style="text-align: center;vertical-align:center;">Jakarta,
                    {{ $todayDateInd->format('j F Y') }}</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td style="text-align: center;vertical-align:center;"><b>PT ERA ELEKTRA CORPORA
                        INDONESIA</b></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td rowspan="2" style="vertical-align: center; text-align: center;">
                    @if (count($signatureReport) != 0)
                        <i>(Signed)</i>
                    @endif
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td></td>
                <td></td>
                <td style="text-align: center;vertical-align:center;">
                    @if (count($signatureReport) != 0)
                        <b>{{ $signatureReport['user']['fullname'] }}</b>
                    @endif
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td style="text-align: center;vertical-align:center;">
                    @if (count($signatureReport) != 0)
                        {{ $signatureReport['user']['Contracts'][0]['Position']['title'] }}
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
