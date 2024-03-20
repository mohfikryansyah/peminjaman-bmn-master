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
    <p>Informasi tanggal pengembalian barang : 
        @isset($infoMail['barang1'])
        {{ $infoMail['barang1'] }}
        @endisset

        @isset($infoMail['barang2'])
        {{ $infoMail['barang2'] }}
        @endisset

        @isset($infoMail['barang3'])
        {{ $infoMail['barang3'] }}
        @endisset

        
        , tersisa {{ $infoMail['selisih'] }} Hari!</p>
    <p>Segera lakukan pengembalian barang.</p>
</body>
</html>