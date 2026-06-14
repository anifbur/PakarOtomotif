<!DOCTYPE html>
<html>
<head>
    <title>Sistem Pakar Motor Matic</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand" href="#">
            Sistem Pakar Motor Matic
        </a>

       <div class="navbar-nav">

    <a class="nav-link" href="{{ route('gejala.index') }}">
        Gejala
    </a>

    <a class="nav-link" href="{{ route('diagnosa.index') }}">
        Diagnosa
    </a>
    <a class="nav-link" href="{{ route('rule.index') }}">
    Rule
</a>
<a class="nav-link" href="/konsultasi">
    Konsultasi
</a>

<a class="nav-link" href="/riwayat-diagnosa">
    Riwayat
</a>

</div>

    </div>
</nav>

<div class="container mt-4">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    @endif

    @yield('content')

</div>

</body>
</html> 