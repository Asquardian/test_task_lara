@extends("layout")

@section('title', "Форма")

@section('content')
<div class="card card-form">
    <h1 class="text-center">Форма</h1>
    <form id="form">
        @csrf
        <div class="row gy-3">
            <div class="col-12">
                <label for="email">Email</label>
                <input type="text" class="form-control" placeholder="Email" name="email">
                <div class="error" id="email"></div>
            </div>
            <div class="col-12">
                <label for="phone">Телефон</label>
                <input type="text" class="form-control" placeholder="Телефон" name="phone">
                <div class="error" id="phone"></div>
            </div>
            <div class="col-12">
                <label for="name">Имя</label>
                <input type="text" class="form-control" placeholder="Имя" name="name">
                <div class="error" id="name"></div>
            </div>
        </div>
        <button id="button" class="btn btn-primary d-block mx-auto mt-2">Отправить</button>
    </form>

    <script>
        $(document).ready(() => {
            $("[name='phone']").mask("+7(999)999-99-99");
        })

        function createErrorString(key, error){
            let error_text = "";
            for(let i = 0; i < error.length; i++){
                error_text += error[i] + '<br>';
            }
            $(".error#" + key).html(error_text);
        }

        $('#form').submit(function (event) {
            event.preventDefault();

            var form_data = $(this).serialize();

            $(".form-control").attr('class', 'form-control');

            $.ajax({
                url: '/create/',
                type: 'POST',
                data: form_data,
                success: function (response) {
                    alert("Сообщение отправлено")
                },
                error: function (error) {
                    const form_error = error.responseJSON.errors;
                    for (let key in form_error) {
                        console.log(key);
                        $("[name='" + key + "']").attr('class', 'form-control is-invalid');
                        createErrorString(key, form_error[key]);
                    }
                }
            });
        });
    </script>
</div>
@endsection