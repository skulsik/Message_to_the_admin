<div class="container p-4">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 border border-dark rounded p-4">
            <h3><i class="bi bi-card-text h3"></i><span class="ps-3">Есть вопросы, тогда пишите нам!</span></h3>
            <hr>
            <div id="ErrorText"></div>
            <form id="FormMessage" name="FormMessage" class="form-control p-3">
                <div class="form-group row mb-3">
                    <label class="col-sm-2 col-form-label">Имя</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Введите ваше имя">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label class="col-sm-2 col-form-label">Телефон</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Введите номер телефона">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label class="col-sm-2 col-form-label">Электронная почта</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Введите почту">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button id="SendMessage" name="SendMessage" class="btn btn-warning">Отправить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        $(document).ready(function(){
            $('#SendMessage').click(function(e){
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });

                $.ajax({
                    url: "{{ url('/api/create_message/') }}",
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        name: $('#name').val(),
                        phone: $('#phone').val(),
                        email: $('#email').val()
                    },
                    success: function(response) {
                        if(response.result == 'error') {
                            var content = '<div class="alert alert-danger">';
                            console.log(response.result)

                            $.each(response.errors, function (key, value) {
                                console.log(value);
                                content += ' - ' + value + '<br>';
                            })
                            document.getElementById("ErrorText").innerHTML = content + '</div>';
                        }
                        else document.getElementById("ErrorText").innerHTML = '<div class="alert alert-success">Сообщение успешно отправлено!</div>';
                    }
                });
            });
        });
    }, false);
</script>
