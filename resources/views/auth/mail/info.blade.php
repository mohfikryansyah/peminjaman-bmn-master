<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informasi Pengembalian Barang</title>
</head>
<body>
    <h1>{{ $infoMail['title'] }}</h1>
    <p>Informasi tanggal pengembalian barang : {{ $infoMail['barang'] }}, tersisa {{ $infoMail['selisih'] }} Hari!</p>
    <p>Segera lakukan pengembalian barang.</p>
</body>
</html>