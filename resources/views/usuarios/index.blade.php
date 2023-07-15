<x-base>
    <div id="usuarios">
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-Mail</th>
                    <th scope="col">Data de Criação</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $u)
                    <tr>
                        <th scope="row">{{ $u->id }}</th>
                        <td>{{ $u->Nome }}</td>
                        <td>{{ $u['E-mail'] }}</td>
                        <td>{{ $u['Data de Criação'] }}</td>
                        <td><a href="{{ route('visualizar_usuario', ['id' => $u->id]) }}" class="btn btn-primary"
                                id="editar">Editar</a></td>
                        <td><a href="javascript:void(0)" id="delete"
                                data-url="{{ route('deletar_usuario', $u->id) }}" class="btn btn-danger">Excluir</a>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="cadastrar">
        <a href="{{ route('cadastrar_dados') }}" class="btn btn-primary">Criar um Novo Usuário</a>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {

            @if (count($usuarios) == 0)
                {
                    document.getElementById("usuarios").style.display = "none";
                }
            @else
                document.getElementById("usuarios").style.display = "block";
            @endif

            $('body').on('click', '#delete', function() {
                    Swal.fire({
                        title: 'Excluir Usuario',
                        icon: 'warning',
                        text: "Você tem certeza que deseja excluir esse usuário?",
                        showDenyButton: true,
                        confirmButtonText: 'Sim',
                        denyButtonText: 'Não'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            var dataUrl = $(this).data('url');

                            var headers = {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }

                            $.ajax({
                                url: dataUrl,
                                type: "post",
                                headers: headers,
                                dataType: 'json',
                                success: function(response) {
                                    Swal.fire({
                                        title: 'Usuário Deletado',
                                        text: 'O Usuário foi deletado com sucesso!',
                                        icon: 'success',
                                        confirmButtonText: 'OK'
                                    })
                                    setTimeout(function () {
                                        window.location.reload();
                                    }, 2000);
                                },
                                error: function(response) {
                                    Swal.fire({
                                        title: 'Usuário Não Deletado',
                                        text: 'Houve um Erro ao Deletar o Usuário da nossa Base de dados',
                                        icon: 'error',
                                        confirmButtonText: 'OK'
                                    })
                                }
                            });
                        }
                    })

                }


            )
        });
    </script>
</x-base>
