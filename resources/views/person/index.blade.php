@extends('layouts.helloapp')

@section('title', 'Person.index')

@section('menuber')
    @parent
    インデックスページ
@endsection

@section('content')
    <table>
        <tr><th>DAta</th></tr>
        @foreach ($items as $item)
            <tr>
                <td>{{ $item->getData() }}</td>
            </tr>
        @endforeach
    </table>
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection