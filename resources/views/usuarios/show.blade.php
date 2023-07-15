<x-base>
    <form name="cadUsuario" id="formularioValidation">
        @csrf
        <div class="form-group">
            <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $usuario->Nome }}" required>
        </div>

        <br>

        <div class="form-group">
            <label for="E-mail" class="form-label">E-mail</label>
            <input type="email" name="email" id="E-mail" class="form-control" value="{{ $usuario['E-mail'] }}" required>
        </div>
        <br>

        <div class="form-group">
            <label for="date" class="form-label">Data de Nascimento</label>
            <input type="text" name="date" id="date" class="form-control"
                value="{{ $usuario['Data de Nascimento'] }}">
        </div>

        <br>

        <div class="form-group">
            <label for="password" class="form-label">Senha</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <br>

        <div class="form-group">
        <label for="password" class="form-label">Confirmar Senha</label>
        <input type="password" name="password_confirm" id="password_confirm" data-rule-equalTo="#password" class="form-control" required>
        </div>

        <br>

        <div class="form-group">
            <label for="password" class="form-label">Data de Criação</label>
            <input type="text" name="dateCreate" id="dateCreate" class="form-control"
                value="{{ $usuario['Data de Criação'] }}" readonly>
        </div>

        <div class="form-group">
            <input type="hidden" name="id" id="id" class="form-control" readonly
                value="{{ $usuario->id }}">
        </div>


        <br><br>
        <button class="btn btn-primary" id="salvar">Salvar</button>
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

                date: {
                    required: false
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
                    url: "{{ route('atualizar_usuario', ['id' => $usuario->id]) }}",
                    type: "post",
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(response) {
                        Swal.fire({
                            title: 'Dados do Usuário Atualizado',
                            text: 'Parabens! O Dados do Usuário foi atualizado com sucesso!',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        })
                    },
                    error: function(response) {
                        Swal.fire({
                            title: 'Dados do Usuário Não Atualizado',
                            text: 'Houve um Erro ao Atualizar o Usuário em nossa Base de dados',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        })
                    }
                });
            })
        })
    </script>
</x-base>
