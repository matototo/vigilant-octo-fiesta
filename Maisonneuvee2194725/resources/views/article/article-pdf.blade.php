<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Article PDF</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif
        }
        img{
          border: solid;
          padding: 10px;
          border-radius: 5px;
          width: 80px;
          position: absolute;
          top:10px;
          right:10px
      }
    </style>
</head>
<img src="data:image/png;base64,{{ base64_encode($qrCode) }}" alt="QR Code">
</body>
</html>