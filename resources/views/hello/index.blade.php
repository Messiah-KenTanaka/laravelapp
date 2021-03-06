@extends('layouts.helloapp')

@section('title', 'Index')

@section('menuber')
    @parent
    インデックスページ
@endsection

@section('content')
    <table>
        <tr>
            <th>Name</th>
            <th>Mail</th>
            <th>Age</th>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->mail }}</td>
                    <td>{{ $item->age }}</td>
                </tr>
            @endforeach
        </tr>
    </table>
@endsection