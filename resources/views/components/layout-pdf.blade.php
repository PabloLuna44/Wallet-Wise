<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{$namePage}} | {{$title}}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4;">

    <div style="max-width: 600px; margin: 20px auto; padding: 20px; background-color: #ffffff; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <h1 style="font-size: 24px; color: #333;">{{$namePage}}</h1>
        <h2 style="font-size: 20px; color: #555;">{{$title}}</h2>
        <h2 style="font-size: 20px; color: #555;">Date: {{$date}}</h2>

        <div style="margin-top: 20px;">
            {{$slot}}
        </div>
    </div>

</body>
</html>