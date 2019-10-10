@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    タスク編集
                </div>

                <div class="panel-body">
                    @include('common.errors')

                    <form action="{{ url('tasks/edit/'.$task->id) }}"
                          method="POST"
                          class="form-horizontal">
                        @csrf

                        <div class="form-group">
                            <label for="task-title" class="col-sm-3 control-label">タスク</label>

                            <div class="col-sm-6">
                                <input type="text" name="title" id="title-name" class="form-control"
                                                                value="{{ old('task', $task->title) }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-primary">
                                    送信
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection