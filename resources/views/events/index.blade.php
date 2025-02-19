@extends('layouts.app')

@section('content')
<div class="container">
    <h1>イベント一覧</h1>
    <a href="{{ route('events.create') }}" class="btn btn-primary">新規イベント作成</a>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>タイトル</th>
                <th>日付</th>
                <th>開場</th>
                <th>開始</th>
                <th>チケット</th>
                <th>配信チケット</th>
                <th>配信URL</th>
                <th>ステータス</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
            <tr>
                <td>{{ $event->event_id }}</td>
                <td>{{ $event->title }}</td>
                <td>{{ $event->date }}</td>
                <td>{{ $event->open }}</td>
                <td>{{ $event->start }}</td>
                <td>{{ $event->ticket_price }}</td>
                <td>{{ $event->stream_ticket_price }}</td>
                <td>{{ $event->stream_ticket_url }}</td>
                <td>{{ $event->status }}</td>
                <td>
                    <a href="{{ route('events.show', $event->event_id) }}" class="btn btn-info btn-sm">詳細</a>
                    <a href="{{ route('events.edit', $event->event_id) }}" class="btn btn-warning btn-sm">編集</a>
                    <form action="{{ route('events.destroy', $event->event_id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('削除しますか？')">削除</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
