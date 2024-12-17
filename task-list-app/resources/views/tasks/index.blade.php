@extends('tasks.app')

@section('content')
<div class="container">
    <h1>Danh sách Task</h1>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Thêm mới</a>
    <table class="table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tiêu đề</th>
                <th>Mô tả</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 1; @endphp
            @foreach ($tasks as $task)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->completed ? 'Hoàn thành' : 'Chưa hoàn thành' }}</td>
                <td>
                    <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info">Xem</a>
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Sửa</a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-task-id="{{ $task->id }}">
                        Xóa
                    </button>
                </td>
            </tr>
            @php $i++; @endphp
            @endforeach
        </tbody>
    </table>
</div>

<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Xác nhận xóa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Bạn có chắc chắn muốn xóa Task này không?
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteModal = document.getElementById('confirmDeleteModal');
        deleteModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const taskId = button.getAttribute('data-task-id');
            const form = document.getElementById('deleteForm');
            form.action = `/tasks/${taskId}`;
        });
    });
</script>
@endsection