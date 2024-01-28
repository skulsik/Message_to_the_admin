@extends('index')

@role('root')
    @section('content')

        <div class="container p-4">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 border border-dark rounded p-4">
                    <h3><i class="bi bi-card-text h3"></i><span class="ps-3">Список сообщений</span></h3>
                    <hr>
                    @if(!empty($list_messages[0]))
                        <table class="table">
                            @foreach($list_messages as $message)
                                <tr>
                                    <td class="col-md-5">
                                        {{ $message->name }}
                                    </td>
                                    <td class="col-md-5 text-center">
                                        {{ $message->phone }}
                                    </td>
                                    <td class="col-md-1 text-center">
                                        {{ $message->email }}
                                    </td>
                                    <td class="col-md-1 text-center">
                                        <div class="modal fade" id="{{ $message->slug }}del" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-danger" id="exampleModalLabel">Удаление сообщения</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Вы действительно хотите удалить сообщение <span class="text-primary">{{ $message->id }}</span>?</p>
                                                        <a href="{{ route('delete_message', ['id' => $message->id])}}" title="Удалить" class="btn btn-danger">Удалить</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="bi bi-trash3 text-danger h3 border-0 bg-light" data-bs-toggle="modal" data-bs-target="#{{ $message->slug }}del">
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <div class="alert-dark rounded p-5">
                            <h5>Сообщений пока нет!</h5>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    @endsection
@endrole
