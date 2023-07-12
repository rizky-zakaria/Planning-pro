<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <style>
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #FAFAFA;
            font: 12pt "Tahoma";
        }

        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        .page {
            width: 190mm;
            height: 277mm;
            margin-top: 10mm;
            margin-bottom: 10mm;
            margin-left: 10mm;
            margin-right: 10mm;
        }

        .subpage {
            padding: 1cm;
            border: 5px red solid;
            height: 257mm;
            outline: 2cm #FFEAEA solid;
        }

        .instansi {
            justify-content: center;
            margin-left: 10mm;
            font-size: 0.8em;
            font-style: bold;
        }

        @page {
            size: A4;
            margin: 0;
        }

        @media print {

            html,
            body {
                width: 210mm;
                height: 297mm;
            }

            .page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }
        }
    </style>
</head>

<body style="font-size: 12px">

    @foreach ($instansis as $instansi)
    <div class="page">
        <table width="100%">
            <tr>
                <td style="text-align: center; background-color:brown; color:white">
                    <p style="font-size: 1.2em"><b>REKAPITULASI</b></p>
                    <hr width="30%">
                    <h4>ENGINEERING ESTIMATE (EE)</h4>
                </td>
            </tr>
        </table>
        <br>

        <div class="page-break"></div>

        <table class="instansi">
            <tr>
                <td>INSTANSI</td>
                <td>:</td>
                <td>{{ $instansi->nama_instansi }}</td>
            </tr>
            <tr>
                <td>PROGRAM</td>
                <td>:</td>
                <td>{{ $instansi->program_instansi }}</td>
            </tr>
            <tr>
                <td>KEGIATAN</td>
                <td>:</td>
                <td>{{ $instansi->kegiatan_instansi }}</td>
            </tr>
            <tr>
                <td>PEKERJAAN</td>
                <td>:</td>
                <td>{{ $instansi->tujuan_proyek }}</td>
            </tr>
            <tr>
                <td>LOKASI</td>
                <td>:</td>
                <td>{{ $instansi->lokasi_instansi }}</td>
            </tr>
            <tr>
                <td>TAHUN ANGGARAN</td>
                <td>:</td>
                <td>{{ $instansi->tahun_anggaran }}</td>
            </tr>
        </table>

        <table width="100%" border="1" cellpadding="10" cellspacing="0"
            style="margin-top: 10px; font-weight:bold; font-size: 0.8em;">
            <thead style="background-color: brown; color: white">
                <tr>
                    <th width="5%">NO</th>
                    <th>RINCIAN PEKERJAAN</th>
                    <th>SATUAN</th>
                    <th>VOLUME</th>
                    <th>HARGA SATUAN (RP)</th>
                    <th>JUMLAH HARGA (RP)</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($instansi->proyeks as $proyek)
                @php
                $totalBiaya = 0;
                foreach ($proyek->uraians as $uraian) {
                $totalBiaya += $uraian['total_biaya'];
                }
                $pajak = ($totalBiaya * 11) / 100;
                $jumlahTotal = $totalBiaya + $pajak;
                $pembulatan = round($jumlahTotal, 0);
                @endphp
                <tr style="background-color: grey; color:white">
                    <td></td>
                    <td>{{ $proyek->nama_proyek }}</td>
                    <td>Rp. {{ number_format($totalBiaya, 2, ',', '.') }}</td>
                </tr>
                @foreach ($proyek->uraians as $uraian)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $uraian->nama_uraian }}</td>
                    <td>Rp. {{ number_format($uraian->total_biaya ?? 0, 2, ',', '.') }}</td>
                </tr>
                @endforeach
                @endforeach --}}

                @foreach ($instansi->proyeks as $proyek)
                @foreach ($proyek->uraians as $uraian)
                <tr>
                    <td></td>
                </tr>
                @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
    @endforeach

</body>

</html>