@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    新しいタスク
                </div>

                <div class="panel-body">
                    @include('common.errors')

                    <form action="{{url('tasks/create')}}" method="POST" class="form-horizontal">
                        @csrf

                        <div class="form-group">
                            <label for="task-title" class="col-sm-3 control-label">タスク</label>

                            <div class="col-sm-6">
                                <input type="text" name="title" id="title-name" class="form-control" value="{{ old('task') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i> タスク追加
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            @if (count($tasks) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        現在のタスク
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <tr>
                                    <th>タスク</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td class="table-text">
                                            <div>{{ $task->title }}</div>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary" href="{{url('tasks/show', ['id' => $task->id])}}">
                                                詳細
                                            </a>
                                        </td>
                                        <td>
                                            <form  action="{{ url('tasks/delete/'.$task->id) }}"
                                                   method="POST"
                                                   onclick='return confirm("本当に削除しますか？");'>
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i> 削除
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection