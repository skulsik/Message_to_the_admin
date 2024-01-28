@extends('index')

@section('content')
@role('root')

    <div class="container p-4">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 border border-dark rounded p-4">
                <h3><i class="bi bi-envelope-at h3"></i><span class="ps-3">Изменение почты суперпользователя</span></h3>
                <hr>

                <form method="POST" action="{{ route('update_admin_email') }}" class="form-control p-3">
                    @csrf
                    @if($errors->any())
                        <div>
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
                    <div class="form-group row mb-3">
                        <label class="col-sm-12 col-form-label">Текущий адресс почты администратора: <span class="text-primary">{{ $email }}</span></label>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-2 col-form-label">Введите новую почту</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Введите адрес электронной почты">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button id="SendMessage" name="SendMessage" class="btn btn-warning">Сохранить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endrole
@endsection
