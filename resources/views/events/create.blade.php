@extends('layouts.app')

@section('content')
<div class="container">
    <h1>新規イベント作成</h1>

    <form action="{{ route('events.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">イベントタイトル</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">日付</label>
            <input type="date" name="date" class="form-control" value="{{ old('date') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">開場時間</label>
            <input type="time" name="open" id="open_time" class="form-control time-input" value="{{ old('open') }}" step="300">
        </div>

        <div class="mb-3">
            <label class="form-label">開始時間</label>
            <input type="time" name="start" id="start_time" class="form-control time-input" value="{{ old('start') }}" step="300">
        </div>

        <div class="mb-3">
            <label class="form-label">チケット</label>
            <input type="number" name="ticket" class="form-control" value="{{ old('ticket') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">配信チケット</label>
            <input type="number" name="stream_ticket" class="form-control" value="{{ old('stream_ticket') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">配信URL</label>
            <input type="url" name="stream_url" class="form-control" value="{{ old('stream_url') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">ステータス</label>
            <select name="status" class="form-control">
                <option value="決定">決定</option>
                <option value="NG">NG</option>
                <option value="オファー中">オファー中</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">保存</button>
        <a href="{{ route('events.index') }}" class="btn btn-secondary">キャンセル</a>
    </form>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById('open_time').addEventListener('change', function () {
            let openTime = this.value;
            if (openTime) {
                let [hours, minutes] = openTime.split(':').map(Number);
                minutes += 30; // 30分追加

                if (minutes >= 60) {
                    minutes -= 60;
                    hours = (hours + 1) % 24; // 24時間制にする
                }

                let startTime = ('0' + hours).slice(-2) + ':' + ('0' + minutes).slice(-2);
                document.getElementById('start_time').value = startTime;
            }
        });
    });
</script>
@endsection