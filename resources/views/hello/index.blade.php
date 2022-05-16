<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {font-size: 16pt; color: #999;}
        h1 {font-size: 100pt; text-align: right; color: #f6f6f6; margin: -50px 0px -100px 0px;}
    </style>
</head>
<body>
    <h1>Index</h1>

    <ol>
        @php
            $counter = 0;
        @endphp
        @while ($counter < count($data))
            <li>{{ $data[$counter++] }}</li>
            @php
                // $counter++;
            @endphp
        @endwhile
    </ol>

    @foreach ($data as $item)
        @if ($loop->first)
            <p>*データ一覧
            <ul>
        @endif
        <li>No, {{ $loop->iteration }}. {{ $item }}</li>
        @if ($loop->last)
            </ul><p>--ここまで</p>
        @endif
    @endforeach



    @foreach ($data as $item)
        <li>{{ $item }}
    @endforeach
        
    <ol>
    @for ($i = 1; $i < 100; $i++)
        @if ($i % 2 == 1)
            @continue
        @elseif ($i <= 10)
        <li>No, {{ $i }}
        @else
            @break
        @endif
    @endfor
    </ol>

    @isset($msg)
        <p>今日は,{{ $msg }}さん</p>
        <p>{{ $name }}</p>
    @else
        <p>何かか書いてください</p>
    @endisset
    <form action="/hello" method="POST">
        @csrf
        メッセージ
        <input type="text" name="msg"><br>
        名前
        <input type="text" name="name"><br>
        <input type="submit">
    </form>
</html>