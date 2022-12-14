<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>CETAK DATA TRANSAKTI</title>
        <style>
            p {
                text-align: center;
                font-size: 35px;
                font-weight: bold;
            }

            table.static {
                position: relative;
                border: 1px solid #543535;
            }

            table tr {
              text-align: center;
            }

            table tr td,th {
              padding: 10px;
            }
        </style>
    </head>
    <body onload="window.print()">
        <div>
            <p class="text-center">Laporan Data Transaksi</p>
            <table class="static" align="center" rules="all" style="width: 95%">
                <tr>
                    <th>ID</th>
                    <th>Product</th>
                    <th>User</th>
                    <th>Shipping Cost</th>
                    <th>Total</th>
                    <th>Transaction Date</th>
                    <th>Status</th>
                </tr>

                 @forelse($items as $item)
                  <tr>
                    <td>{{ $item->id }}</td>
                      <td>{{ $item->product->name }}</td>
                      <td>{{ $item->user->name }}</td>
                      <td>IDR {{ $item->shipping_cost }}</td>
                      <td>IDR {{ $item->transaction_total }}</td>
                      <td>{{ $item->created_at }}</td>
                      <td>{{ $item->transaction_status }}</td>
                  </tr>
                 @empty
                  <tr>
                    <td colspan="7" class="text-center">Empty Data</td>
                  </tr>
                 @endforelse
            </table>
        </div>
    </body>
</html>
