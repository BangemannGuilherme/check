<tr>
    <td>{{ $usuario->id }}</td>
    <td>{{ $usuario->username }}</td>
    <td>{{ $usuario->name }}</td>
    <td>{{ $usuario->email }}</td>
    <td>{{ $usuario->rfid }}</td>
    <td>{{ $usuario->code }}</td>
    <td>{{ Carbon\Carbon::parse($usuario->created_at)->format('d/m/Y H:i') }}</td>
    <td>
        @if ($usuario->admin)
        <span style="color: green">Sim</span> 
        @else
        <span style="color: red">Não</span>
        @endif
    </td>
    <td class="text-center">
        <a title="Editar Usuário" class="btn btn-info" href="{{ url('admin/users/edit/' . $usuario->id) }}" ><i class="fa fa-edit fa-fw"></i></a>
        @if ($usuario->username == 'admin')
        <a title="Excluir Usuário" class="btn btn-danger disabled" href=""><i class="fas fa-trash-alt"></i></a>
        @else
        <a title="Excluir Usuário" class="btn btn-danger" href="{{ route('usuario.destroy',  ['id' => $usuario->id]) }}"><i class="fas fa-trash-alt"></i></a>
        @endif
    </td>
</tr>

<style>
    a.disabled {
        pointer-events: none;
        cursor: default;
    }
</style>
