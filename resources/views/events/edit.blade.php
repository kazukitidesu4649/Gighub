@extends('layouts.app')

@section('content')
<div class="container">
    <h1>イベント編集</h1>

    <form action="{{ route('events.update', $event->event_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">イベントタイトル</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $event->title) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">日付</label>
            <input type="date" name="date" class="form-control" value="{{ old('date', $event->date) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">open</label>
            <input type="time" name="open" class="form-control" value="{{ old('open', $event->open) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">start</label>
            <input type="time" name="start" class="form-control" value="{{ old('start', $event->start) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">ticket</label>
            <input type="number" name="ticket" class="form-control" value="{{ old('ticket', $event->ticket) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">stream_ticket</label>
            <input type="number" name="stream_ticket" class="form-control" value="{{ old('stream_ticket', $event->stream_ticket) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">stream_url</label>
            <input type="url" name="stream_url" class="form-control" value="{{ old('stream_url', $event->stream_url) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">ステータス</label>
            <select name="status" class="form-control">
                <option value="決定" {{ old('status', $event->status) == '決定' ? 'selected' : '' }}>決定</option>
                <option value="NG" {{ old('status', $event->status) == 'NG' ? 'selected' : '' }}>NG</option>
                <option value="オファー中" {{ old('status', $event->status) == 'オファー中' ? 'selected' : '' }}>オファー中</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">保存</button>
        <a href="{{ route('events.index') }}" class="btn btn-secondary">キャンセル</a>
    </form>
</div>
@endsection
