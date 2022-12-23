<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script language='JavaScript'>
        var txt="Print Qr Code Wisata {{ $item->nama }}";
        var speed=300;
        var refresh=null;
        function action() { document.title=txt;
        txt=txt.substring(1,txt.length)+txt.charAt(0);
        refresh=setTimeout("action()",speed);}action();
    </script>
    <link rel="shortcut icon" href="{{ url('backend/images/favicon.png') }}" />
</head>
<body>
    <center>
        <h1 style="margin-bottom: 24px">{{ $item->nama }}</h1>
        {!! QrCode::size(500)->generate(route('detail-wisata', $item->slug)); !!}
    </center>
</body>
<script>
    window.print()
</script>
</html>
