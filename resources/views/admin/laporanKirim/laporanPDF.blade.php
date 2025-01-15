<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengiriman Paket</title>
    <style>
      * {
          /* Change your font family */
          font-family: sans-serif;
      }

      h1 {
          text-align: center;
      }
      .content-table {
          border-collapse: collapse;
          margin: 25px 0;
          font-size: 0.9em;
          width: 100%;
          border-radius: 5px 5px 0 0;
          overflow: hidden;
          box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
      }

      .content-table thead tr {
          background-color: #009879;
          color: #ffffff;
          text-align: left;
          font-weight: bold;
      }

      .content-table th,
      .content-table td {
          padding: 12px 15px;
      }

      .content-table tbody tr {
          border-bottom: 1px solid #dddddd;
      }

      .content-table tbody tr:nth-of-type(even) {
          background-color: #f3f3f3;
      }

      .content-table tbody tr:last-of-type {
          border-bottom: 2px solid #009879;
      }

      .content-table tbody tr.active-row {
          font-weight: bold;
          color: #009879;
      }
    </style>
</head>
<body>
  <h1>Detail Pengiriman Paket</h1>
    <table class="content-table">
        <thead>
			<tr>
				<th>No</th>
				<th>Kode</th>
				<th>Tanggal</th>
				<th>Lokasi Penerima</th>
				<th>Nama Penerima</th>
				<th>Nama Layanan</th>
				<th>Detail Paket</th>
			</tr>
        </thead>
        <tbody>
			@foreach ($laporanKirim as $row)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $row->kode }}</td>
					<td>{{ $row->tanggal }}</td>
					<td>{{ $row->lokasi_tujuan }}</td>
					<td>{{ $row->penerima->nama }}</td>
					<td>{{ $row->layanan->nama_layanan }}</td>
					<td>
						<ul>
							<li>Berat: {{ $row->paket->berat }} kg</li>
							<li>Isi: {{ $row->paket->deskripsi }}</li>
						</ul>
					</td>
				</tr>
			@endforeach
        </tbody>
      </table>
</body>
</html>