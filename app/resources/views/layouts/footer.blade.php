<div class="bg-dark p-1">
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-5 d-flex align-items-center">
                <span class="mb-3 mb-md-0 text-secondary">
                    © 2024 MessageToTheAdmin, Inc. Все права защищены.<br>
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </span>
            </div>

            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                <li class="ms-3"><a class="text-secondary" href="https://t.me/skulsik"><i class="bi bi-telegram h2"></i></a></li>
                <li class="ms-3"><a class="text-secondary" href="https://github.com/skulsik"><i class="bi bi-github h2"></i></a></li>
                <li class="ms-3"><i class="bi bi-phone h2 text-secondary" title="8(952)-895-87-58"></i></li>
            </ul>
        </footer>
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

</body>
</html>
