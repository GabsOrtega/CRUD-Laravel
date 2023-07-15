<x-base>
    <form name="cadUsuario" id="formularioValidation">
        @csrf
        <div class="form-group">
            <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" id="name" class="form-control" required>

            <br>
            <label for="E-mail" class="form-label">E-mail</label>
            <input type="email" name="email" id="E-mail" class="form-control" required>

            <br>
            <label for="date" class="form-label">Data de Nascimento</label>
            <input type="text" name="date" id="date" class="form-control">

            <br>
            <label for="password" class="form-label">Senha</label>
            <input type="password" name="password" id="password" class="form-control" required>

            <br>
            <label for="password" class="form-label">Confirmar Senha</label>
            <input type="password" name="password_confirm" id="password_confirm" data-rule-equalTo="#password" class="form-control" required>

            <br><br>
            <button type="submit" class="btn btn-primary" id="salvar">Salvar</button>
            <a href="/" class="btn btn-danger">Cancelar</a>
    </form>
    <script>
        $(document).ready(function() {
            $("#date").mask("00/00/0000")
        })

        $(function() {
            $('#formularioValidation').validate({
                rules: {
                    name: {
                        required: true
                    },

                    email: {
                        required: true,
                        email: true
                    },

                    password: {
                        required: true,
                        minlength: 8
                    },

                    password_confirm: {
                        required: true,
                        minlength: 8
                    }
                }
            })

            $('form[name="cadUsuario"]').submit(function(event) {
                event.preventDefault();

                $.ajax({
                    url: "{{ route('cadastrar_usuario') }}",
                    type: "post",
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(response) {
                        Swal.fire({
                            title: 'Usuário Cadastrado',
                            text: 'Parabens! O Usuário foi cadastrado com sucesso!',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        })
                    },
                    error: function(response) {
                        Swal.fire({
                            title: 'Usuário Não Cadastrado',
                            text: 'Houve um Erro ao Cadastrar o Usuário em nossa Base de dados',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        })
                    }
                });
            })
        })
    </script>

</x-base>
