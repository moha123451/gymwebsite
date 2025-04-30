<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- إضافة رابط Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    @include('header') <!-- تضمين الهيدر -->
    @yield('content') <!-- محتوى الصفحات المختلفة -->
    @include('footer') <!-- تضمين الفوتر -->
</body>

</html>
