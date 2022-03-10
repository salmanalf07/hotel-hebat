<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-size: 13pt !important;
        }

        table {
            width: 90% !important;
        }

        .border {
            border-top: 2px black solid !important;
            border-bottom: 2px black solid !important;
            font-weight: bold !important;
            font-size: 15pt !important;
            text-align: center !important;
        }
    </style>
</head>

<body>
    <section>
        <?php
        $created = date_create($data->created_at);
        $checkin = date_create($data->check_in);
        $checkout = date_create($data->check_out);
        ?>
        <table align="center">
            <tr>
                <td width="20%"></td>
                <td width="2%"></td>
                <td width="23%"></td>
                <td width="15%"></td>
                <td width="2%"></td>
                <td width="23%"></td>
            </tr>
            <tr>
                <td colspan="6" style="font-size: 20pt;font-weight: bold;">
                    HOTEL HEBAT
                </td>

            </tr>
            <tr>
                <td colspan="6">Jl. Raya tengah taman, bandung</td>
            </tr>
            <tr>
                <td colspan="5">-</td>
                <td>{{date_format($created,"d-m-Y H:i:s")}}</td>
            </tr>
            <tr>
                <td class="border" colspan="6">TANDA PEMESANAN KAMAR</td>
            </tr>
            <tr>
                <td>Nomor Pesanan</td>
                <td>:</td>
                <td colspan="4"></td>
            </tr>
            <tr>
                <td>Nama Pemesan</td>
                <td>:</td>
                <td colspan="4">{{$data->pemesan}}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td colspan="4">{{$data->email}}</td>
            </tr>
            <tr>
                <td>No HP</td>
                <td>:</td>
                <td colspan="4">{{$data->nohp}}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td colspan="4">-</td>
            </tr>
            <tr>
                <td>Tamu</td>
                <td>:</td>
                <td colspan="4">{{$data->tamu}}</td>
            </tr>
            <tr>
                <td>Type Kamar</td>
                <td>:</td>
                <td colspan="4">{{$data->room_id}}</td>
            </tr>
            <tr>
                <td>Jumlah Kamar</td>
                <td>:</td>
                <td colspan="4">{{$data->kamar}}</td>
            </tr>
            <tr>
                <td>Check-In</td>
                <td>:</td>
                <td>{{date_format($checkin,"d-m-Y")}}</td>
                <td>Check-Out</td>
                <td>:</td>
                <td>{{date_format($checkout,"d-m-Y")}}</td>
            </tr>
            <tr>
                <td colspan="6" style="border-top: 2px black solid !important;"></td>
            </tr>
            <tr>
                <td colspan="5"></td>
                <td style="font-weight: bold;">Hormat Kami,</td>
            </tr>
            <tr>
                <td colspan="5"></td>
                <td>Hotel Hebat</td>
            </tr>
        </table>
    </section>
</body>

</html>