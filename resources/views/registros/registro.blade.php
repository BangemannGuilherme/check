<tr>
    <td>{{ $registro->name }}</td>
    <td>{{ Carbon\Carbon::parse($registro->register_time)->format('d/m/Y H:i') }}</td>
    <td>{{ $registro->type }}</td>
</tr>