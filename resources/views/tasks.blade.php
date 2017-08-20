@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="flex-center position-ref full-height">

                <div class="content">

                    <div class="title m-b-md">
                        ALL TASKS
                    </div>

                    <hr>

                    <div class="block text-left">
                        @if(count($errors->all()))
                            <div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                @foreach ($errors->all() as $error)
                                    <p><strong>Oops!</strong> {{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <p><strong>Success!</strong> {{Session::get('success')}}</p>
                            </div>
                        @endif

                            <div class="alert alert-success alert-dismissible delete-alert" style="display: none;">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <p><strong>Success!</strong> Task deleted successfully</p>
                            </div>
                    </div>

                    <table class="table task-table text-left">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Created On</th>
                            <th>Updated On</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tasks as $task)

                            <tr id="{{$task->id}}">
                                <td>{{$task->name}}</td>
                                <td>{{$task->description}}</td>
                                <td>{{\Carbon\Carbon::parse($task->created_at)->format('d/m/Y')}}</td>
                                <td>{{\Carbon\Carbon::parse($task->updated_at)->format('d/m/Y')}}</td>

                                <td>
                                    <span data-toggle="tooltip" title="Edit">
                                        <button class="btn btn-success btn-sm edit_task" value="{{$task->id}}">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </span>
                                    <span data-toggle="tooltip" title="Delete">
                                        <button  class="btn btn-danger no-margin delete-modal btn-sm" value="{{$task->id}}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </span>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade delete">
        <div class="modal-dialog">
            <div class="modal-content modal-success">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add New Task</h4>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this task?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger no-margin" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success no-margin delete-task">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade edit">
        <div class="modal-dialog">
            <div class="modal-content modal-success">
                <form action="{{url('tasks/update')}}" method="post">
                    {{csrf_field()}}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add New Task</h4>
                    </div>
                    <div class="modal-body extended_body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger no-margin" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success no-margin">Update Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection


@section('script')
    <script>
        $(document).ready(function () {

            /*delete user*/
            $(document).on('click', '.delete-modal', function () {
                $('.delete-task').val($(this).val());
                $('.delete').modal('toggle');
            });

            $(document).on('click', '.delete-task', function () {
                var id = $(this).val();
                $.ajax({
                    type: 'post',
                    url: '{{url('/task/delete')}}' + "/" + id,
                    data: {
                        id: id,
                        '_token': '{{csrf_token()}}'
                    },
                    success: function (data) {
                        $('.delete').modal('toggle');
                        $('.delete-alert').show();
                        $('.task-table tr#' + id + '').hide();
                    }
                })
            });

            $(document).on('click', '.edit_task', function () {
                var id = $(this).val();
                $.ajax({
                    type: 'get',
                    url: '{{url('/task/edit')}}' + "/" + id,
                    success: function (data) {
                        $('.extended_body').html(data);
                       $('.edit').modal('toggle');
                    }
                })
            });
        });
    </script>
@stop
