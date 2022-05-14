<!DOCTYPE html>
<html lang="en" style="margin: 16px 16px;">

<head>
    <meta charset="UTF-8">
    <style>
        .row {
            display: flex;
            clear: both;
        }

        .stamp {
            position: absolute;
            z-index: -999;
            margin-left: 85px;
            margin-top: 10px;
            opacity: 0.7;
        }

    </style>
</head>

<body
    style="border: 1px solid black; border-radius: 1rem; font-family:'Times New Roman', Times, serif; orientation: portrait">
    <footer class="footer"
        style="margin-left: 0px; margin-right: 80px; bottom: 10px; position:fixed; width:100%;">
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
                        <th style="padding-top: 60px; padding-bottom: 60px; text-align: left;"><img
                                src="{{ public_path('assets/image/logo/head-logo.png') }}" style="width: 300px;">
                        </th>
                    </tr>
                </thead>
            </table>
            <div class="row">
                <table style="width: 100%">
                    <thead style="background-color: lightgrey; text-align: center; font-size: 15px;">
                        <tr>
                            <th colspan="3" style="height:25px; border: 1px solid black;">LABA-RUGI
                                USAHA TAHUN
                                {{ $year }}</th>
                        </tr>
                    </thead>
                    <tbody style="padding: 3px 3px; font-size: 14px;">
                        <tr>
                            <td
                                style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black; border-top: 1px solid black; width: 5%; height:20px;">
                                <b>1</b>
                            </td>
                            <td
                                style="vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black; border-top: 1px solid black; width: 60%; height:20px;">
                                <b>&nbsp;&nbsp; PENDAPATAN</b>
                            </td>
                            <td
                                style="text-align: right; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black; border-top: 1px solid black; width: 10%; width: 35%; height:20px;">
                                <b>Rp. {{ number_format($pendapatan, 0, ',', '.') }}&nbsp;&nbsp;</b>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black; border-top: 1px solid black; width: 5%; height:20px;">
                                <b>2</b>
                            </td>
                            <td
                                style="vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black; border-top: 1px solid black; width: 60%; height:20px;">
                                <b>&nbsp;&nbsp; BIAYA LANGSUNG <i>(COST OF GOODSOLD)</i></b>
                            </td>
                            <td
                                style="text-align: right; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black; border-top: 1px solid black; width: 35%; height:20px;">
                                <b>Rp. {{ number_format($biayalangsung, 0, ',', '.') }}&nbsp;&nbsp;</b>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black; border-top: 1px solid black; width: 5%; height:20px;">
                                <b>3</b>
                            </td>
                            <td
                                style="vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black; border-top: 1px solid black; width: 60%; height:20px;">
                                <b>&nbsp;&nbsp; <i>GROSS MARGIN</i></b>
                            </td>
                            <td
                                style="text-align: right; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black; border-top: 1px solid black; width: 35%; height:20px;">
                                <b>Rp. {{ number_format($gross, 0, ',', '.') }}&nbsp;&nbsp;</b>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black; border-top: 1px solid black; width: 5%; height:20px;">
                                <b>4</b>
                            </td>
                            <td
                                style="vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black; border-top: 1px solid black; width: 60%; height:20px;">
                                <b>&nbsp;&nbsp; BIAYA OPERASIONAL</b>
                            </td>
                            <td
                                style="text-align: right; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black; border-top: 1px solid black; width: 35%; height:20px;">
                                <b>(Rp. {{ number_format($operasional, 0, ',', '.') }})&nbsp;&nbsp;</b>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black; width: 5%; height:20px;">
                            </td>
                            <td
                                style="vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black; width: 60%; height:20px;">
                                &nbsp;&nbsp;4.1. Biaya Karyawan</td>
                            <td
                                style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black; width: 35%; height:20px;">
                                Rp. {{ number_format($karyawan, 0, ',', '.') }}&nbsp;&nbsp;</td>
                        </tr>
                        <tr>
                            <td
                                style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black; width: 5%; height:20px;">
                            </td>
                            <td
                                style="vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black; width: 60%; height:20px;">
                                &nbsp;&nbsp;4.2. Biaya Kantor</td>
                            <td
                                style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black; width: 35%; height:20px;">
                                Rp. {{ number_format($kantor, 0, ',', '.') }}&nbsp;&nbsp;</td>
                        </tr>
                        <tr>
                            <td
                                style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black; width: 5%; height:20px;">
                            </td>
                            <td
                                style="vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black; width: 60%; height:20px;">
                                &nbsp;&nbsp;4.3. Biaya Pemasaran</td>
                            <td
                                style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black; width: 35%; height:20px;">
                                Rp. {{ number_format($pemasaran, 0, ',', '.') }}&nbsp;&nbsp;</td>
                        </tr>
                        <tr>
                            <td
                                style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black; width: 5%; height:20px;">
                            </td>
                            <td
                                style="vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black; width: 60%; height:20px;">
                                &nbsp;&nbsp;4.4. Adm, Legal & <i>Finance Cost</i></td>
                            <td
                                style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black; width: 35%; height:20px;">
                                Rp. {{ number_format($adm, 0, ',', '.') }}&nbsp;&nbsp;</td>
                        </tr>
                        <tr>
                            <td
                                style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black; width: 5%; height:20px;">
                            </td>
                            <td
                                style="vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black; width: 60%; height:20px;">
                                &nbsp;&nbsp;4.5. Biaya Penyusutan & Amortisasi</td>
                            <td
                                style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black; width: 35%; height:20px;">
                                Rp. {{ number_format($penyusutan, 0, ',', '.') }}&nbsp;&nbsp;</td>
                        </tr>
                        <tr>
                            <td
                                style="text-align: center; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black; border-top: 1px solid black; width: 5%; height:20px;">
                                <b>5</b>
                            </td>
                            <td
                                style="vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black; border-top: 1px solid black; width: 60%; height:20px;">
                                <b>&nbsp;&nbsp; PELUNASAN PEMBAYARAN PAJAK</b>
                            </td>
                            <td
                                style="text-align: right; vertical-align:middle; border-left: 1px solid black; border-right: 1px solid black; border-top: 1px solid black; width: 35%; height:20px;">
                                <b>(Rp. {{ number_format($pajak, 0, ',', '.') }})&nbsp;&nbsp;</b>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2"
                                style="text-align: center; vertical-align:middle; border: 1px solid black; height:30px;">
                                <b>LABA BERSIH TAHUN {{ $year }}</b>
                            </td>
                            <td style="text-align: right; vertical-align:middle; border: 1px solid black; height:30px;">
                                <b>Rp.
                                    {{ number_format($gross - $operasional - $pajak, 0, ',', '.') }}&nbsp;&nbsp;</b>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="10" style="padding: 10px 0"><i>Printed on
                                    <b>{{ date('d F, Y', strtotime($todayDate)) }}</b></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row" style="margin-top: 60px;">
                <div style="float: left; width: 60%;"></div>
                <div style="float: left; width: 40%;">
                    <p style="margin-bottom: 0px; text-align:center; font-size: 14px;">Jakarta,
                        {{ $todayDateInd->format('j F Y') }}</p>
                    <p style="margin-bottom: 00px; margin-top: 5px; text-align:center; font-size: 14px;"><b>PT ERA
                            ELEKTRA CORPORA
                            INDONESIA</b></p>
                    <img class="stamp" src="{{ public_path('assets/image/logo/stamp.png') }}" alt="stamp"
                        style="width:70px; text-align:center;">
                    <p style="margin-bottom: 0px; margin-top: 90px; text-align:center; font-size: 14px;"><b>Dyah
                            Saraswati</b></p>
                    <p style="margin-top: 3px; text-align:center; font-size: 14px;">Direktur Utama</p>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
