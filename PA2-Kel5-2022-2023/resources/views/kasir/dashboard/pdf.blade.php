
<!DOCTYPE html>
<html>
<head>
	<title>Nota Pesanan</title>
	<style type="text/css">
		body {
			font-family: Arial, sans-serif;
			font-size: 12px;
		}

		.header {
			text-align: center;
			margin-bottom: 20px;
		}

		.title {
			font-size: 18px;
			font-weight: bold;
			margin-bottom: 10px;
		}

		.section {
			margin-bottom: 20px;
		}

		.section .label {
			display: inline-block;
			width: 120px;
			font-weight: bold;
		}

		.section .value {
			display: inline-block;
			width: 300px;
		}

		.detail {
			margin-bottom: 20px;
			border-top: 1px solid #ccc;
			border-bottom: 1px solid #ccc;
			padding: 10px 0;
		}

		.detail .product {
			font-weight: bold;
			margin-bottom: 10px;
		}

		.detail .item {
			margin-bottom: 5px;
		}

		.total {
			text-align: right;
			font-weight: bold;
			margin-bottom: 10px;
		}

		.shipping {
			margin-top: 20px;
		}

		.shipping .title {
			font-size: 16px;
			font-weight: bold;
			margin-bottom: 10px;
		}

		.shipping .item {
			margin-bottom: 5px;
		}
        table {
			width: 100%;
			border-collapse: collapse;
			margin-bottom: 20px;
		}
		th {
			background-color: #f2f2f2;
			font-weight: bold;
			padding: 10px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
		td {
			padding: 10px;
			border-bottom: 1px solid #ddd;
		}
	</style>
</head>
<body>
	<div class="header">
		<div class="title">NOTA PESANAN</div>
		<div class="number">Nomor Pesanan: {{ $pembelian->user_id }}</div>
		<div class="date">Tanggal Pesanan: {{ \Carbon\Carbon::parse($pembelian->tanggal_pembelian)->format('Y-m-d') }}</div>
	</div>

	<div class="section">
		<div class="label">Nama Penerima:</div>
		<div class="value">{{ $pembelian->username }}</div>
	</div>

	<div class="section">
		<div class="label">Alamat:</div>
		<div class="value">{{ $pembelian->alamat }}</div>
	</div>

	<div class="section">
		<div class="label">Nomor Telepon:</div>
		<div class="value">{{ $pembelian->no_telpon }}</div>
	</div>

	<div class="detail">
        <div class="product">DETAIL PRODUK</div>
        <table>
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pembelian->pembelianItems as $item)
                    <tr>
                        <td>{{ $item->produk->name }}</td>
                        <td>Rp. {{ number_format($item->produk->harga, 2, ',', '.') }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>
                            <?php
                                $hargatotal = $item->jumlah * $item->produk->harga;
                            ?>
                            Rp. {{ number_format($hargatotal, 2) }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
	</div>

	<div class="total">
		Total Harga: Rp {{ number_format($pembelian->total_harga, 2, ',', '.') }}
	</div>
</body>
</html>






