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
                        <th colspan="9" style="padding-top: 60px; padding-bottom: 60px; text-align: left;"><img
                                src="{{ public_path('assets/image/logo/head-logo.png') }}" style="width: 300px;">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="9">
                            <div class="content-head" style="text-align: center;">
                                <h3><b>PT. Era Elektra Corpora Indonesia</b></h3>
                                <h3 style="margin-top: -10px; padding-bottom:15px;"><b>Financial Account List</b></h3>
                            </div>
                        </td>
                    </tr>
                </tbody>
                <thead style="width:100%; background-color: lightgrey; text-align: center;">
                    <tr>
                        <th style="width: 3%; height: 30px; border: 1px solid black;">No.</th>
                        <th style="width: 10%; height: 30px; border: 1px solid black;">Date
                            Code</th>
                        <th style="width: 11%; height: 30px; border: 1px solid black;">Token
                        </th>
                        <th style="width: 15%; height: 30px; border: 1px solid black;">Description
                        </th>
                        <th style="width: 15%; height: 30px; border: 1px solid black;">Referral
                        </th>
                        <th style="width: 12%; height: 30px; border: 1px solid black;">Debit
                        </th>
                        <th style="width: 12%; height: 30px; border: 1px solid black;">Credit
                        </th>
                        <th style="width: 10%; height: 30px; border: 1px solid black;">PIC
                        </th>
                        <th style="width: 12%; height: 30px; border: 1px solid black;">Project
                        </th>
                    </tr>
                </thead>
                <tbody style="padding: 3px 3px;">
                    @foreach ($arrayData as $ad)
                        <tr style="page-break-inside:avoid;">
                            <td style="height: 30px; border: 1px solid black; text-align: center;">
                                {{ $loop->iteration }}.
                            </td>
                            <td style="height: 30px; border: 1px solid black; text-align: center;">
                                {{ $ad['Date'] }}</td>
                            <td style="height: 30px; border: 1px solid black; padding-left: 5px;">
                                {{ $ad['Token'] }}</td>
                            <td style="height: 30px; border: 1px solid black; text-align: center;">
                                {{ $ad['Description'] }}
                            </td>
                            <td style="height: 30px; border: 1px solid black; text-align: center;">
                                {{ $ad['Referral'] }}
                            </td>
                            <td style="height: 30px; border: 1px solid black; text-align: center;">
                                Rp. {{ number_format($ad['Debit'], 0, ',', '.') }}
                            </td>
                            <td style="height: 30px; border: 1px solid black; text-align: center;">
                                Rp. {{ number_format($ad['Credit'], 0, ',', '.') }}
                            </td>
                            <td style="height: 30px; border: 1px solid black; text-align: center;">
                                {{ $ad['PIC'] }}
                            </td>
                            <td style="height: 30px; border: 1px solid black; text-align: center;">
                                {{ $ad['Project'] }}
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="9" style="padding: 10px 0"><i>Printed on {{ $todayDate }}</i>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>
