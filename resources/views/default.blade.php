<!DOCTYPE html>
<html>
<head>
    <title>{{ $options['title'] ?? 'Generated PDF' }}</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .content { margin: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; }
    </style>
</head>
<body>
<div class="content">
    <h1>{{ $options['title'] ?? 'Generated PDF' }}</h1>

    @if(is_array($data) || $data instanceof \Traversable)
        <table>
            @foreach($data as $item)
                <tr>
                    @foreach($item as $key => $value)
                        <td>{{ $value }}</td>
                    @endforeach
                </tr>
            @endforeach
        </table>
    @else
        {{ $data }}
    @endif
</div>
</body>
</html>
