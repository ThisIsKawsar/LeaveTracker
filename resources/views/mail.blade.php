<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave</title>
</head>

<body>
    <h2>Hello,{{ $data['name'] }}</h2>
    <p>Your Leave Request Status is {{ $data['status'] }}</p>
    @if (isset($data['comments']))
        <p>Comment: {{ $data['comments'] }}</p>
    @endif




    <p>Dear,</p>

    <p>Thank you.</p>
</body>

</html>
