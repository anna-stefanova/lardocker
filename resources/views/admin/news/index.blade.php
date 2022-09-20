@extends('layouts.admin')
@section('title') Все новости @endsection
@section('content')
    <a  class="btn btn-outline-secondary mb-2" href="{{ route('admin.news.create') }}">Добавить запись</a>
    <div class="table-responsive">
        @include('inc.message')
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Наименование</th>
                <th scope="col">Категория</th>
                <th scope="col">Автор</th>
                <th scope="col">Статус</th>
                <th scope="col">Дата добавления</th>
                <th scope="col">Управление</th>
            </tr>
            </thead>
            <tbody>
            @forelse($newsList as $news)
                <tr>
                    <td>{{ $news->id }}</td>
                    <td>{{ $news->title }}</td>
                    <td>{{ $news->category->title }}</td>
                    <td>{{ $news->author }}</td>
                    <td>{{ $news->status }}</td>
                    <td>{{ $news->created_at }}</td>
                    <td><a href="{{ route('admin.news.edit', ['news' => $news]) }}">Редактировать</a>
                        <a href="javascript:;" class="delete" rel="{{ $news->id }}" style="color: red;">Удалить</a></td>
                </tr>
            @empty
                <tr><td colspan="6">Записей нет</td></tr>
            @endforelse
            </tbody>
        </table>


    </div>{{ $newsList->links() }}
@endsection

@push('js')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function () {
            let elements = document.querySelectorAll('.delete');
            elements.forEach((e, k) => {
                e.addEventListener('click', function () {
                    const id = e.getAttribute('rel');
                    if (confirm(`Подтверждаете удаление записи с №ID = ${id}`)) {
                        send(`/admin/news/${id}`).then(()=>{
                           location.reload();
                        });
                    } else {
                        alert("Удаление отменено");
                    }
                });
            });
        })

        async function send(url) {
            let response = await fetch(url, {
               method: 'DELETE',
               headers: {
                   'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
               }
            });

            let result = await response.json();
            return result.ok;
        }
    </script>
@endpush
