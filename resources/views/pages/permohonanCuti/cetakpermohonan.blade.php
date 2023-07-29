<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>LAPORAN CUTI DAN IZIN KARYAWAN</title>


</head>

<style>
    #table-data {
        border-collapse: collapse;
        padding: 3px;
    }

    #table-data td, #table-data th {
        border: 3px solid black;

    }
    .horizontal_center{
     /*mengatur border bagian atas tag div */
       border-top: 6px solid black;
     /* mengatur tinggi tag div*/
     height: 2px;
     /*mengatur lebar tag div*/
     width : 700px;
    }
</style>
</head>
<body>

    <h1 align="center"><img src="" style="width:35px; height=35px;">PT NUSA JAYA INDAH UTAMA</h1>
    <table border="0" width="100%">
      <tr align="center">
          <td>Jl. Laskar Dalam No.49, RT.003/RW.002</td>
      </tr>
      <tr align="center">
           <td> Pekayon Jaya Kec. Bekasi Selatan</td>
          </tr>
          <tr align="center">
          <td>Bekasi, Jawa Barat 17148, Indonesia</td>
      </tr>
  </table>
      <div class="horizontal"></div>
       <div class="row">

        <h3 align="center"> LAPORAN CUTI DAN IZIN KARYAWAN </h3>
    </div>
   
   </table>
   <div class="card-body">
    <table border="3" width="100%">
        <tr>
            <th class="text-center">No</th>
            <th>Nama karyawan</th>
            <th>Nik</th>
            <th>Divisi</th>
            <th>Jenis Permohonan</th>
            <th>Alasan</th>
            <th>Mulai</th>
            <th>Berakhir</th>
            <th>Jml Sisa Cuti Tahunan</th>

        </tr>
        @foreach($permohonan as $i => $p)
        <tr>
            <td style="text-align:center">{{$i+1}}</td>
            <td style="text-align:center">{{$p->name}}</td>
            <td class="align-middle">{{$p->NIK}}</td>
            <td class="text-truncate">{{$p->divisi}}</td>
            <td style="text-align:center">{{$p->jenis_cuti}}</td>
            <td style="text-align:center">{{$p->alasan_cuti}}</td>
            <td style="text-align:center" >{{$p->tgl_mulai}}</td>
            <td style="text-align:center">{{$p->tgl_akhir}}</td>
            <td style="text-align:center">{{$p->jumlah_cuti}}</td>
        </tr>

    </tr>
</tbody>
@endforeach
</table>
   </div>
   </div>
</body>
</html>