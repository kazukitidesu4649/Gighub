@extends('layouts.app')

@section('content')
<div class="container">
    <h1>イベント詳細</h1>

    <table class="table">
        <tr><th>ID</th><td>{{ $event->event_id }}</td></tr>
        <tr><th>タイトル</th><td>{{ $event->title }}</td></tr>
        <tr><th>日付</th><td>{{ $event->date }}</td></tr>
        <tr><th>会場</th><td>{{ $event->venue }}</td></tr>
        <tr><th>open</th><td>{{ $event->open }}</td></tr>
        <tr><th>start</th><td>{{ $event->start }}</td></tr>
        <tr><th>ticket</th><td>{{ $event->ticket }}</td></tr>
        <tr><th>配信ticket</th><td>{{ $event->stream_ticket }}</td></tr>
        <tr><th>配信URL</th><td>{{ $event->stream_url }}</td></tr>
        <tr><th>ステータス</th><td>{{ $event->status }}</td></tr>
    </table>

    <a href="{{ route('events.edit', $event->event_id) }}" class="btn btn-warning">編集</a>
    <form action="{{ route('events.destroy', $event->event_id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('削除しますか？')">削除</button>
    </form>
    <a href="{{ route('events.index') }}" class="btn btn-secondary">戻る</a>
</div>
@endsection
