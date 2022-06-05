@extends('layouts.helloapp')

@section('title', 'show')

@section('menuber')
    @parent
    詳細ページ
@endsection

@section('content')
    @if ($items != null)
        @foreach ($items as $item)
        <table>
            <tr>
                <th width="50px">id:</th>
                <td width="50px">{{ $item->id }}</td>
                <th width="50px">name:</th>
                <td>{{ $item->name }}</td>
                <th width="50px">mail:</th>
                <td>{{ $item->mail }}</td>
                <th width="50px">age:</th>
                <td>{{ $item->age }}</td>
            </tr>
        </table>
        @endforeach
    @endif
@endsection

@section('footer')
copyright 2020 tuyano
@endsection