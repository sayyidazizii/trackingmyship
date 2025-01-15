<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan TopUp Saldo Dompet</title>
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
  <h1>TopUp Saldo Dompet</h1>
    <table class="content-table">
        <thead>
          <tr>
            <th>No</th>
            <th>Waktu</th>
            <th>Status</th>
            <th>Jumlah TopUp</th>
            <th>Bonus Poin</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <@foreach ($laporan as $row)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$row->waktu}}</td>
                <td>{{$row->topup_status}}</td>
                <td>{{$row->saldo}}</td>
                <td>{{$row->bonus}}</td>
                <td>{{$row->total}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
</body>
</html>