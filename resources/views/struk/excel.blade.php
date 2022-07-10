<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SISP</title>
</head>
<body>
  <table border="1">
    <thead>
      <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Ref</th>
        <th>Cabang</th>
        <th>Berita</th>
        <th>Nominal</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $no           = 1;
        $totalNominal = 0;
      ?>
      @foreach ($struk as $key)
        <?php $totalNominal += $key->NOMINAL; ?>
        <tr>
          <td>{{ $no++ }}</td>
          <td>{{ $key->PODTPO }}</td>
          <td>{{ $key->POREFN }}</td>
          <td>{{ $key->nama_lokasi }}</td>
          <td>{{ $key->PODESC }}</td>
          <td>{{ formatRupiah($key->NOMINAL) }}</td>
        </tr>
      @endforeach
      <tr>
        <td colspan="5">Total Nominal</td>
        <td>{{ formatRupiah($totalNominal) }}</td>
      </tr>
      <tr>
        <td colspan="5">Transaksi Terbesar</td>
        <td>{{ formatRupiah($terbesar) }}</td>
      </tr>
      <tr>
        <td colspan="5">Transaksi Terkecil</td>
        <td>{{ formatRupiah($terkecil) }}</td>
      </tr>
    </tbody>
  </table>
</body>
</html>
