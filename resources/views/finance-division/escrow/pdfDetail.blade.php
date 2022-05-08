<!DOCTYPE html>
<html lang="en" style="margin: 16px 16px;">

<head>
    <meta charset="UTF- 8">
</head>

<body
    style="border: 1px solid black; border-radius: 1rem; font-family:'Times New Roman', Times, serif; orientation: landscape">
    <main class="content" style="margin-left: 80px; margin-right: 80px;">
        <div class=" content-main">
            <table style="width:100%;">
                <thead>
                    <tr style="padding-top: 50px;">
                        <th style="width:25%;padding-top:20px;">
                            <img src="{{ public_path('assets/image/logo/main-logo.png') }}" alt="logo"
                                style="width: 120px">
                        </th>
                        <th style="width:50%;text-align: center; padding-top:20px;">
                            <b>Mandiri Escrow Disbursement Voucher</b><br>
                            <i style="font-weight: 500">Bukti Pengeluaran Mandiri Operasional</i>
                        </th>
                        <th style="width:25%; height: 15px;text-align: left; font-size:11pt; padding-top:20px;">
                            <p style="margin-bottom: -10px;"><b>No :</b>
                                <span>{{ $transactionDebit[0]->token }}</span>
                            </p>
                            <p style="margin-bottom: 30px;"><b>Date/Tanggal :</b>
                                <span>{{ date('d F Y', strtotime($transactionDebit[0]->date)) }}</span>
                            </p>
                            <p style="margin-bottom: -10px;"><b>Bank :</b>
                                <span>.......................................</span>
                            </p>
                            <p style="margin-bottom: -10px;"><b>Cheque/BG No :</b>
                                <span>......................</span>
                            </p>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2" style="text-align: left; font-size:12pt; padding-top:20px;">
                            <b>Paid to :</b>
                            <span style="font-weight: 500">{{ $transactionDebit[0]->paid_to }}</span>
                        </th>
                        <th></th>
                    </tr>
                    <tr>
                        <th colspan="2"
                            style="text-align: left; font-weight: 500; font-size:12pt; padding-bottom: 10px;">
                            <i>Dibayarkan kepada</i>
                        </th>
                        <th></th>
                    </tr>
                </thead>
            </table>
            <table style="margin-bottom: 50px; width:100%;">
                <thead style="width:100%; background-color: lightgrey; text-align: center;">
                    <tr>
                        <th style="width: 35%; height: 30px; border: 1px solid black;">Description<br><i>Deskripsi</i>
                        </th>
                        <th style="width: 15%; height: 30px; border: 1px solid black;">Referral<br><i>Kode Akun</i></th>
                        <th style="width: 25%; height: 30px; border: 1px solid black;">Account Name<br><i>Nama Akun</i>
                        </th>
                        <th style="width: 25%; height: 30px; border: 1px solid black;">Amount (Rp)<br><i>Jumlah</i></th>
                    </tr>
                </thead>
                <tbody style="padding: 3px 3px;">
                    @foreach ($transactionDebit as $t)
                        <tr style="page-break-inside:avoid;">
                            <td style="height: 30px; border: 1px solid black; text-align: center;">
                                {{ $t->description }}</td>
                            <td style="height: 30px; border: 1px solid black; padding-left: 5px; text-align:center;">
                                {{ $t->transactionAccount[0]->referral }}</td>
                            <td style="height: 30px; border: 1px solid black; text-align: center;">
                                {{ $t->transactionAccount[0]->name }}
                            </td>
                            <td style="height: 30px; border: 1px solid black; text-align: center;">
                                Rp. {{ number_format($t->debit, 0, ',', '.') }}
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="2" style="padding-top: 10px; font-size:12pt;">
                            <b>In words :
                                <span><i>{{ ucwords($inWords) }}
                                        Rupiah</i></span></b>
                        </td>
                        <td rowspan="2" style="border: 1px solid black; text-align: center;">
                            <b><i>Jumlah</i></b>
                        </td>
                        <td rowspan="2" style="border: 1px solid black; text-align: center;">
                            <b><i>Rp. {{ number_format($sum, 0, ',', '.') }}</i></b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="font-size:12pt;">
                            <i>Terbilang</i>
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <table style="width:100%;">
                <thead style="width:100%; background-color: lightgrey; text-align: center;">
                    <tr>
                        <th style="width: 20%; height: 30px; border: 1px solid black;">Prepared by<br><i>Dibuat oleh</i>
                        </th>
                        <th style="width: 20%; height: 30px; border: 1px solid black;">Checked by<br><i>Diperiksa
                                oleh</i></th>
                        <th style="width: 20%; height: 30px; border: 1px solid black;">Approved by<br><i>Disetujui
                                oleh</i>
                        </th>
                        <th style="width: 20%; height: 30px; border: 1px solid black;">Paid by<br><i>Dibayar oleh</i>
                        </th>
                        <th style="width: 20%; height: 30px; border: 1px solid black;">Recieved by<br><i>Diterima
                                oleh</i></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="height: 120px; border: 1px solid black;"></td>
                        <td style="height: 120px; border: 1px solid black;"></td>
                        <td style="height: 120px; border: 1px solid black;"></td>
                        <td style="height: 120px; border: 1px solid black;"></td>
                        <td style="height: 120px; border: 1px solid black;"></td>
                    </tr>
                    <tr>
                        <td colspan="4" style="padding: 10px 0"><i>Printed on
                                <b>{{ date('d F, Y', strtotime($todayDate)) }}</b></i>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>
