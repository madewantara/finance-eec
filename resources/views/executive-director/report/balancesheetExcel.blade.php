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
                <th colspan=7 rowspan=2 style="text-align: center; vertical-align:center;">
                    <h1><b>N E R A C A &nbsp;&nbsp; 31-DESEMBER-{{ $year }}</b></h1>
                </th>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr>
                <th style="text-align: center; width: 30px; background-color: lightgrey;"><b>No</b></th>
                <th style="text-align: center; width: 300px"><b>A K T I V A</b></th>
                <th style="text-align: center; width: 200px"><b>Rp.</b></th>
                <th style="text-align: center; width: 30px"></th>
                <th style="text-align: center; width: 30px"><b>No</b></th>
                <th style="text-align: center; width: 300px"><b>P A S I V A</b></th>
                <th style="text-align: center; width: 200px"><b>Rp.</b></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="text-align: center;vertical-align:center;">
                    <b>1</b>
                </td>
                <td style="vertical-align:center;"><b><u>AKTIVA LANCAR</u></b></td>
                <td style="text-align: right;vertical-align:center;">
                    <b>{{ number_format($aktivalancar, 0, ',', '.') }}</b>
                </td>
                <td></td>
                <td style="text-align: center;vertical-align:center;">
                    <b>4</b>
                </td>
                <td style="vertical-align:center;"><b><u>HUTANG LANCAR</u></b></td>
                <td style="text-align: right; vertical-align:center;">
                    <b>{{ number_format($hutanglancar, 0, ',', '.') }}</b>
                </td>
            </tr>
            <tr>
                <td style="text-align: center;vertical-align:center;"></td>
                <td style="vertical-align:center;">1.1. Kas</td>
                <td style="text-align: center;vertical-align:center;">
                    {{ number_format($kas, 0, ',', '.') }}
                </td>
                <td></td>
                <td style="text-align: center;vertical-align:center;"></td>
                <td style="vertical-align:center;">4.1. Hutang Usaha</td>
                <td style="text-align: center; vertical-align:center;">
                    {{ number_format($hutangusaha, 0, ',', '.') }}
                </td>
            </tr>
            <tr>
                <td style="text-align: center;vertical-align:center;"></td>
                <td style="vertical-align:center;">1.2. Bank</td>
                <td style="text-align: center;vertical-align:center;">
                    {{ number_format($bank, 0, ',', '.') }}
                </td>
                <td></td>
                <td style="text-align: center;vertical-align:center;"></td>
                <td style="vertical-align:center;">4.2. Hutang Bank</td>
                <td style="text-align: center; vertical-align:center;">
                    {{ number_format($hutangbank, 0, ',', '.') }}
                </td>
            </tr>
            <tr>
                <td style="text-align: center;vertical-align:center;"></td>
                <td style="vertical-align:center;">1.3. Biaya Dibayar di Muka</td>
                <td style="text-align: center;vertical-align:center;">
                    {{ number_format($biayamuka, 0, ',', '.') }}
                </td>
                <td></td>
                <td style="text-align: center;vertical-align:center;"></td>
                <td style="vertical-align:center;">4.3. Hutang Biaya</td>
                <td style="text-align: center; vertical-align:center;">
                    {{ number_format($hutangbiaya, 0, ',', '.') }}
                </td>
            </tr>
            <tr>
                <td style="text-align: center;vertical-align:center;"></td>
                <td style="vertical-align:center;">1.4. Pajak Dibayar di Muka</td>
                <td style="text-align: center;vertical-align:center;">
                    {{ number_format($pajakmuka, 0, ',', '.') }}
                </td>
                <td></td>
                <td style="text-align: center;vertical-align:center;"></td>
                <td style="vertical-align:center;">4.4. Hutang Pajak</td>
                <td style="text-align: center; vertical-align:center;">
                    {{ number_format($hutangpajak, 0, ',', '.') }}
                </td>
            </tr>
            <tr>
                <td style="text-align: center;vertical-align:center;"></td>
                <td style="vertical-align:center;">1.5. Stock</td>
                <td style="text-align: center;vertical-align:center;">
                    {{ number_format($stock, 0, ',', '.') }}
                </td>
                <td></td>
                <td style="text-align: center;vertical-align:center;"></td>
                <td style="vertical-align:center;">4.5. Hutang Lain-lain</td>
                <td style="text-align: center; vertical-align:center;">
                    {{ number_format($hutanglain, 0, ',', '.') }}
                </td>
            </tr>

            <tr>
                <td style="text-align: center;vertical-align:center;">
                    <b>2</b>
                </td>
                <td style="vertical-align:center;"><b><u>AKTIVA LAIN-LAIN</u></b></td>
                <td style="text-align: right;vertical-align:center;">
                    <b>{{ number_format($aktivalain, 0, ',', '.') }}</b>
                </td>
                <td></td>
                <td style="text-align: center;vertical-align:center;">
                    <b>5</b>
                </td>
                <td style="vertical-align:center;"><b><u>HUTANG JANGKA PANJANG</u></b></td>
                <td style="text-align: right; vertical-align:center;">
                    <b>{{ number_format($hutangjangkapanjang, 0, ',', '.') }}</b>
                </td>
            </tr>
            <tr>
                <td style="text-align: center;vertical-align:center;"></td>
                <td style="vertical-align:center;">2.1. Test Equipment</td>
                <td style="text-align: center;vertical-align:center;">
                    {{ number_format($test, 0, ',', '.') }}
                </td>
                <td></td>
                <td style="text-align: center;vertical-align:center;"></td>
                <td style="vertical-align:center;">5.1. Hutang Leasing</td>
                <td style="text-align: center; vertical-align:center;">
                    {{ number_format($hutangleasing, 0, ',', '.') }}
                </td>
            </tr>
            <tr>
                <td style="text-align: center;vertical-align:center;"></td>
                <td style="vertical-align:center;">2.2. Tools dan Alat Kerja</td>
                <td style="text-align: center;vertical-align:center;">
                    {{ number_format($tools, 0, ',', '.') }}
                </td>
                <td></td>
                <td style="text-align: center;vertical-align:center;"></td>
                <td style="vertical-align:center;">5.2. Hutang Jangka Panjang Lain</td>
                <td style="text-align: center; vertical-align:center;">
                    {{ number_format($hutangpanjang, 0, ',', '.') }}
                </td>
            </tr>

            <tr>
                <td style="text-align: center;vertical-align:center;">
                    <b>3</b>
                </td>
                <td style="vertical-align:center;"><b><u>AKTIVA TETAP</u></b></td>
                <td style="text-align: right;vertical-align:center;">
                    <b>{{ number_format($aktivatetap, 0, ',', '.') }}</b>
                </td>
                <td></td>
                <td style="text-align: center;vertical-align:center;">
                    <b>6</b>
                </td>
                <td style="vertical-align:center;"><b><u>MODAL DAN LABA</u></b></td>
                <td style="text-align: right; vertical-align:center;">
                    <b>{{ number_format($modaldanlaba, 0, ',', '.') }}</b>
                </td>
            </tr>
            <tr>
                <td style="text-align: center;vertical-align:center;"></td>
                <td style="vertical-align:center;">3.1. Tanah</td>
                <td style="text-align: center;vertical-align:center;">
                    {{ number_format($tanah, 0, ',', '.') }}
                </td>
                <td></td>
                <td style="text-align: center;vertical-align:center;"></td>
                <td style="vertical-align:center;">6.1. Modal Disetor</td>
                <td style="text-align: center; vertical-align:center;">
                    {{ number_format($modal, 0, ',', '.') }}
                </td>
            </tr>
            <tr>
                <td style="text-align: center;vertical-align:center;"></td>
                <td style="vertical-align:center;">3.2. Bangunan</td>
                <td style="text-align: center;vertical-align:center;">
                    {{ number_format($bangunan, 0, ',', '.') }}
                </td>
                <td></td>
                <td style="text-align: center;vertical-align:center;"></td>
                <td style="vertical-align:center;">6.2. Laba Ditahan {{ $year - 1 }}</td>
                <td style="text-align: center; vertical-align:center;">
                    {{ number_format($labaditahan, 0, ',', '.') }}
                </td>
            </tr>
            <tr>
                <td style="text-align: center;vertical-align:center;"></td>
                <td style="vertical-align:center;">3.3. Kendaraan</td>
                <td style="text-align: center;vertical-align:center;">
                    {{ number_format($kendaraan, 0, ',', '.') }}
                </td>
                <td></td>
                <td style="text-align: center;vertical-align:center;"></td>
                <td style="vertical-align:center;">6.3. Laba Tahun {{ $year }}</td>
                <td style="text-align: center; vertical-align:center;">
                    {{ number_format($laba, 0, ',', '.') }}
                </td>
            </tr>
            <tr>
                <td style="text-align: center;vertical-align:center;"></td>
                <td style="vertical-align:center;">3.4. Peralatan Kantor</td>
                <td style="text-align: center;vertical-align:center;">
                    {{ number_format($inventaris, 0, ',', '.') }}
                </td>
                <td></td>
                <td style="text-align: center;vertical-align:center;"></td>
                <td style="vertical-align:center;"></td>
                <td style="text-align: center; vertical-align:center;">
                </td>
            </tr>
            <tr>
                <td style="text-align: center;vertical-align:center;"></td>
                <td style="vertical-align:center;">3.5. Amortisasi</td>
                <td style="text-align: center;vertical-align:center;">
                    {{ number_format($amortisasi, 0, ',', '.') }}
                </td>
                <td></td>
                <td style="text-align: center;vertical-align:center;"></td>
                <td style="vertical-align:center;"></td>
                <td style="text-align: center; vertical-align:center;">
                </td>
            </tr>

            <tr>
                <td colspan="2" style="text-align: center;vertical-align:center;"><b>TOTAL AKTIVA</b></td>
                <td style="text-align: right;vertical-align:center;">
                    <b>{{ number_format($aktivalancar + $aktivalain + $aktivatetap, 0, ',', '.') }}</b>
                </td>
                <td></td>
                <td colspan="2" style="text-align: center;vertical-align:center;"><b>TOTAL PASIVA</b></td>
                <td style="text-align: right;vertical-align:center;">
                    <b>{{ number_format($hutanglancar + $hutangjangkapanjang + $modaldanlaba, 0, ',', '.') }}</b>
                </td>
            </tr>

            <tr></tr>
            <tr></tr>
            <tr></tr>

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td colspan="2" style="text-align: center;vertical-align:center;">Jakarta,
                    {{ $todayDateInd->format('j F Y') }}</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td colspan="2" style="text-align: center;vertical-align:center;"><b>PT ERA ELEKTRA CORPORA
                        INDONESIA</b></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td colspan="2" rowspan="4"></td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td colspan="2" style="text-align: center;vertical-align:center;"><b>Dyah Saraswati</b></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td colspan="2" style="text-align: center;vertical-align:center;">Direktur Utama</td>
            </tr>
        </tbody>
    </table>
</body>

</html>
