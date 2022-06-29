<!DOCTYPE html>
<html lang="en" style="margin: 16px 16px;">

<head>
    <meta charset="UTF-8">
    <style>
        .row {
            display: flex;
            clear: both;
        }

        .column {
            float: left;
            width: 50%;
        }

        .stamp {
            position: absolute;
            z-index: -999;
            margin-left: 150px;
            margin-top: 10px;
            opacity: 0.7;
        }
    </style>
</head>

<body
    style="border: 1px solid black; border-radius: 1rem; font-family:'Times New Roman', Times, serif; orientation: landscape">
    <footer class="footer" style="margin-left: 0px; margin-right: 80px; bottom: 10px; position:fixed; width:100%;">
        <div style="text-align: center; font-size: 10px; margin-left:25px;">
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
        <div class="content-main">
            <table style="margin-bottom: 0px; width:100%;">
                <thead>
                    <tr>
                        <th style="padding-top: 20px; padding-bottom: -30px; text-align: left;"><img
                                src="{{ public_path('assets/image/logo/head-logo.png') }}" style="width: 200px;">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="content-head" style="text-align: center;">
                                <h4><b>N E R A C A &nbsp;&nbsp; 31-DESEMBER-{{ $year }}</b></h4>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="row">
                <div class="column">
                    <table style="width: 100%">
                        <thead style="background-color: lightgrey; text-align: center; font-size: 12px;">
                            <tr>
                                <th style="width: 10%; height:20px; border: 1px solid black;">No</th>
                                <th style="width: 55%; height: 20px; border: 1px solid black;">A K T I V A</th>
                                <th style="width: 35%; height: 20px; border: 1px solid black;">Rp.</th>
                            </tr>
                        </thead>
                        <tbody style="padding: 3px 3px; font-size: 11.5px;">
                            <tr style="height:10px;">
                                <td
                                    style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black; border-top: 1px solid black;">
                                    <b>1</b>
                                </td>
                                <td
                                    style="vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black; border-top: 1px solid black;">
                                    <b>&nbsp;&nbsp;<u>AKTIVA LANCAR</u></b>
                                </td>
                                <td
                                    style="text-align: right; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black; border-top: 1px solid black;">
                                    <b>{{ number_format($aktivalancar, 0, ',', '.') }}&nbsp;&nbsp;</b>
                                </td>
                            </tr>
                            <tr style="height:10px;">
                                <td
                                    style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                </td>
                                <td
                                    style="vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    &nbsp;&nbsp;1.1. Kas</td>
                                <td
                                    style="text-align: right; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    {{ number_format($kas, 0, ',', '.') }}&nbsp;&nbsp;</td>
                            </tr>
                            <tr style="height:10px;">
                                <td
                                    style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                </td>
                                <td
                                    style="vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    &nbsp;&nbsp;1.2. Bank</td>
                                <td
                                    style="text-align: right; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    {{ number_format($bank, 0, ',', '.') }}&nbsp;&nbsp;</td>
                            </tr>
                            <tr style="height:10px;">
                                <td
                                    style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                </td>
                                <td
                                    style="vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    &nbsp;&nbsp;1.3. Biaya Dibayar di Muka</td>
                                <td
                                    style="text-align: right; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    {{ number_format($biayamuka, 0, ',', '.') }}&nbsp;&nbsp;</td>
                            </tr>
                            <tr style="height:10px;">
                                <td
                                    style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                </td>
                                <td
                                    style="vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    &nbsp;&nbsp;1.4. Pajak Dibayar di Muka</td>
                                <td
                                    style="text-align: right; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    {{ number_format($pajakmuka, 0, ',', '.') }}&nbsp;&nbsp;</td>
                            </tr>
                            <tr style="height:10px;">
                                <td
                                    style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                </td>
                                <td
                                    style="vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    &nbsp;&nbsp;1.5. Stock</td>
                                <td
                                    style="text-align: right; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    {{ number_format($stock, 0, ',', '.') }}&nbsp;&nbsp;</td>
                            </tr>

                            <tr style="height:10px;">
                                <td
                                    style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    <b>2</b>
                                </td>
                                <td
                                    style="vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    <b>&nbsp;&nbsp;<u>AKTIVA LAIN-LAIN</u></b>
                                </td>
                                <td
                                    style="text-align: right; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    <b>{{ number_format($aktivalain, 0, ',', '.') }}&nbsp;&nbsp;</b>
                                </td>
                            </tr>
                            <tr style="height:10px;">
                                <td
                                    style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                </td>
                                <td
                                    style="vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    &nbsp;&nbsp;2.1. <i>Test Equipment</i></td>
                                <td
                                    style="text-align: right; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    {{ number_format($test, 0, ',', '.') }}&nbsp;&nbsp;</td>
                            </tr>
                            <tr style="height:10px;">
                                <td
                                    style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                </td>
                                <td
                                    style="vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    &nbsp;&nbsp;2.2. <i>Tools</i> dan Alat Kerja</td>
                                <td
                                    style="text-align: right; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    {{ number_format($tools, 0, ',', '.') }}&nbsp;&nbsp;</td>
                            </tr>

                            <tr style="height:10px;">
                                <td
                                    style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    <b>3</b>
                                </td>
                                <td
                                    style="vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    <b>&nbsp;&nbsp;<u>AKTIVA TETAP</u></b>
                                </td>
                                <td
                                    style="text-align: right; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    <b>{{ number_format($aktivatetap, 0, ',', '.') }}&nbsp;&nbsp;</b>
                                </td>
                            </tr>
                            <tr style="height:10px;">
                                <td
                                    style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                </td>
                                <td
                                    style="vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    &nbsp;&nbsp;3.1. Tanah</td>
                                <td
                                    style="text-align: right; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    {{ number_format($tanah, 0, ',', '.') }}&nbsp;&nbsp;</td>
                            </tr>
                            <tr style="height:10px;">
                                <td
                                    style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                </td>
                                <td
                                    style="vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    &nbsp;&nbsp;3.2. Bangunan</td>
                                <td
                                    style="text-align: right; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    {{ number_format($bangunan, 0, ',', '.') }}&nbsp;&nbsp;</td>
                            </tr>
                            <tr style="height:10px;">
                                <td
                                    style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                </td>
                                <td
                                    style="vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    &nbsp;&nbsp;3.3. Kendaraan</td>
                                <td
                                    style="text-align: right; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    {{ number_format($kendaraan, 0, ',', '.') }}&nbsp;&nbsp;</td>
                            </tr>
                            <tr style="height:10px;">
                                <td
                                    style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                </td>
                                <td
                                    style="vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    &nbsp;&nbsp;3.4. Peralatan Kantor</td>
                                <td
                                    style="text-align: right; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    {{ number_format($inventaris, 0, ',', '.') }}&nbsp;&nbsp;</td>
                            </tr>
                            <tr style="height:10px;">
                                <td
                                    style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;">
                                </td>
                                <td
                                    style="vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;">
                                    &nbsp;&nbsp;3.5. Amortisasi</td>
                                <td
                                    style="text-align: right; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;">
                                    {{ number_format($amortisasi, 0, ',', '.') }}&nbsp;&nbsp;</td>
                            </tr>

                            <tr style="height: 20px; font-size:12px;">
                                <td colspan="2"
                                    style="text-align: center; vertical-align:middle; border: 1px solid black;"><b>TOTAL
                                        AKTIVA</b>
                                </td>
                                <td style="text-align: right; vertical-align:middle; border: 1px solid black;">
                                    <b>{{ number_format($aktivalancar + $aktivalain + $aktivatetap, 0, ',', '.') }}</b>&nbsp;&nbsp;
                                </td>
                            </tr>

                            <tr style="height:10px;">
                                <td colspan="10" style="padding: 10px 0"><i>Printed on
                                        <b>{{ date('d F, Y', strtotime($todayDate)) }}</b></i>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="column">
                    <table style="width: 100%">
                        <thead style="background-color: lightgrey; text-align: center; font-size:12px;">
                            <tr>
                                <th style="width: 10%; height: 20px; border: 1px solid black;">No</th>
                                <th style="width: 55%; height: 20px; border: 1px solid black;">P A S I V A</th>
                                <th style="width: 35%; height: 20px; border: 1px solid black;">Rp.
                                </th>
                            </tr>
                        </thead>
                        <tbody style="padding: 3px 3px; font-size: 11.5px;">
                            <tr style="height:10px;">
                                <td
                                    style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black; border-top: 1px solid black;">
                                    <b>4</b>
                                </td>
                                <td
                                    style="vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black; border-top: 1px solid black;">
                                    <b>&nbsp;&nbsp;<u>HUTANG LANCAR</u></b>
                                </td>
                                <td
                                    style="text-align: right; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black; border-top: 1px solid black;">
                                    <b>{{ number_format($hutanglancar, 0, ',', '.') }}&nbsp;&nbsp;</b>
                                </td>
                            </tr>
                            <tr style="height:10px;">
                                <td
                                    style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                </td>
                                <td
                                    style="vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    &nbsp;&nbsp;4.1. Hutang Usaha</td>
                                <td
                                    style="text-align: right; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    {{ number_format($hutangusaha, 0, ',', '.') }}&nbsp;&nbsp;</td>
                            </tr>
                            <tr style="height:10px;">
                                <td
                                    style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                </td>
                                <td
                                    style="vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    &nbsp;&nbsp;4.2. Hutang Bank</td>
                                <td
                                    style="text-align: right; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    {{ number_format($hutangbank, 0, ',', '.') }}&nbsp;&nbsp;</td>
                            </tr>
                            <tr style="height:10px;">
                                <td
                                    style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                </td>
                                <td
                                    style="vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    &nbsp;&nbsp;4.3. Hutang Biaya</td>
                                <td
                                    style="text-align: right; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    {{ number_format($hutangbiaya, 0, ',', '.') }}&nbsp;&nbsp;</td>
                            </tr>
                            <tr style="height:10px;">
                                <td
                                    style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                </td>
                                <td
                                    style="vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    &nbsp;&nbsp;4.4. Hutang Pajak</td>
                                <td
                                    style="text-align: right; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    {{ number_format($hutangpajak, 0, ',', '.') }}&nbsp;&nbsp;</td>
                            </tr>
                            <tr style="height:10px;">
                                <td
                                    style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                </td>
                                <td
                                    style="vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    &nbsp;&nbsp;4.5. Hutang Lain-lain</td>
                                <td
                                    style="text-align: right; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    {{ number_format($hutanglain, 0, ',', '.') }}&nbsp;&nbsp;</td>
                            </tr>

                            <tr style="height:10px;">
                                <td
                                    style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    <b>5</b>
                                </td>
                                <td
                                    style="vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    <b>&nbsp;&nbsp;<u>HUTANG JANGKA PANJANG</u></b>
                                </td>
                                <td
                                    style="text-align: right; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    <b>{{ number_format($hutangjangkapanjang, 0, ',', '.') }}&nbsp;&nbsp;</b>
                                </td>
                            </tr>
                            <tr style="height:10px;">
                                <td
                                    style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                </td>
                                <td
                                    style="vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    &nbsp;&nbsp;5.1. Hutang <i>Leasing</i></td>
                                <td
                                    style="text-align: right; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    {{ number_format($hutangleasing, 0, ',', '.') }}&nbsp;&nbsp;</td>
                            </tr>
                            <tr style="height:10px;">
                                <td
                                    style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                </td>
                                <td
                                    style="vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    &nbsp;&nbsp;5.2. Hutang Jangka Panjang Lain</td>
                                <td
                                    style="text-align: right; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    {{ number_format($hutangpanjang, 0, ',', '.') }}&nbsp;&nbsp;</td>
                            </tr>

                            <tr style="height:10px;">
                                <td
                                    style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    <b>6</b>
                                </td>
                                <td
                                    style="vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    <b>&nbsp;&nbsp;<u>MODAL DAN LABA</u></b>
                                </td>
                                <td
                                    style="text-align: right; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    <b>{{ number_format($modaldanlaba, 0, ',', '.') }}&nbsp;&nbsp;</b>
                                </td>
                            </tr>
                            <tr style="height:10px;">
                                <td
                                    style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                </td>
                                <td
                                    style="vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    &nbsp;&nbsp;6.1. Modal Disetor</td>
                                <td
                                    style="text-align: right; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    {{ number_format($modal, 0, ',', '.') }}&nbsp;&nbsp;</td>
                            </tr>
                            <tr style="height:10px;">
                                <td
                                    style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                </td>
                                <td
                                    style="vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    &nbsp;&nbsp;6.2. Laba Ditahan {{ $year - 1 }}</td>
                                <td
                                    style="text-align: right; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    {{ number_format($labaditahan, 0, ',', '.') }}&nbsp;&nbsp;</td>
                            </tr>
                            <tr style="height:10px;">
                                <td
                                    style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                </td>
                                <td
                                    style="vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    &nbsp;&nbsp;6.3. Laba Tahun {{ $year }}</td>
                                <td
                                    style="text-align: right; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    {{ number_format($laba, 0, ',', '.') }}&nbsp;&nbsp;</td>
                            </tr>
                            <tr style="height:10px;">
                                <td
                                    style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    &nbsp;
                                </td>
                                <td
                                    style="vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    &nbsp;
                                </td>
                                <td
                                    style="text-align: right; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black;">
                                    &nbsp;
                                </td>
                            </tr>
                            <tr style="height:10px;">
                                <td
                                    style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;">
                                    &nbsp;
                                </td>
                                <td
                                    style="vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;">
                                    &nbsp;
                                </td>
                                <td
                                    style="text-align: right; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;">
                                    &nbsp;
                                </td>
                            </tr>

                            <tr style="height: 20px; font-size:12px;">
                                <td colspan="2"
                                    style="text-align: center; vertical-align:middle; border: 1px solid black;">
                                    <b>TOTAL
                                        PASIVA</b>
                                </td>
                                <td style="text-align: right; vertical-align:middle; border: 1px solid black;">
                                    <b>{{ number_format($hutanglancar + $hutangjangkapanjang + $modaldanlaba, 0, ',', '.') }}</b>&nbsp;&nbsp;
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div style="float: left; width: 60%;"></div>
                <div style="float: left; width: 40%;">
                    <p style="margin-bottom: 0px; text-align:center; font-size: 12px;">Jakarta,
                        {{ $todayDateInd->format('j F Y') }}</p>
                    <p style="margin-bottom: 00px; margin-top: 5px; text-align:center; font-size: 12px;"><b>PT ERA
                            ELEKTRA CORPORA
                            INDONESIA</b></p>
                    @if (count($signatureReport) != 0)
                        <img class="stamp"
                            src="{{ public_path('storage/Signature/' . $signatureReport['signature'][0]->image) }}"
                            alt="stamp" style="width:70px; text-align:center;">
                    @endif
                    <p style="margin-bottom: 0px; margin-top: 90px; text-align:center; font-size: 12px;">
                        @if (count($signatureReport) != 0)
                            <b>{{ $signatureReport['user']['fullname'] }}</b>
                        @else
                            ___________________________
                        @endif
                    </p>
                    <p style="margin-top: 3px; text-align:center; font-size: 12px;">
                        @if (count($signatureReport) != 0)
                            {{ $signatureReport['user']['Contracts'][0]['Position']['title'] }}
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
