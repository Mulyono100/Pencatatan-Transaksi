<table>
    <tr>
        <th>NOMOR</th>
        <th>TANGGAL</th>
        <th>KODE TRANSAKSI</th>
        <th>NAMA BARANG</th>
        <th>HARGA BARANG</th>
        <th>JUMLAH BELI</th>
        <th>TOTAL HARGA</th>
        <th>SUBTOTAL</th>
        <th>JUMLAH BAYAR</th>
        <th>KEMBALIAN</th>
    </tr>
    <tr>
        <td>{{$transaksi->id}}</td>
        <td>{{$transaksi->tanggal}}</td>
        <td>{{$transaksi->kode_transaksi}}</td>

        <td>
            <strong>CATATAN</strong><br>
            @foreach($transaksi->detailtransaksi as $t)

            <span>{{$t->nama_barang}}</span>||<span>{{$t->harga_barang}}</span>||<span>{{$t->total_beli}}</span><br>
            @endforeach
        </td>
        <td></td>
        <td></td>
        <td>{{$t->total_harga}}</td>

        <td>{{$t->subtotal}}</td>
        <td>{{$t->bayar}}</td>
        <td>{{$t->kembalian}}</td>

    </tr>

</table>