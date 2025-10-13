<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="utf-8">
    <title>{{ $title ?? 'Laporan' }}</title>
    <style>
        body { font-family: DejaVu Sans, Arial, sans-serif; font-size: 12px; color: #111; }
        h1 { font-size: 18px; margin-bottom: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 6px 8px; }
        th { background: #f3f4f6; text-align: left; }
        caption { text-align: left; font-weight: bold; margin-bottom: 6px; }
    </style>
    <meta name="color-scheme" content="light dark">
</head>
<body>
<main id="main" role="main" aria-labelledby="reportTitle">
    <h1 id="reportTitle">{{ $title ?? 'Laporan' }}</h1>
    <table role="table" aria-describedby="reportDesc">
        <caption id="reportDesc">Jadual data laporan yang dijana sistem.</caption>
        <thead>
        <tr>
            @foreach ($headings as $heading)
                <th scope="col">{{ $heading }}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        @foreach ($rows as $row)
            <tr>
                @foreach ($headings as $heading)
                    <td>{{ data_get($row, $heading) }}</td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
</main>
</body>
</html>
