<x-app>
    <x-slot name="title">Administer {{Auth::user()->name}}</x-slot>
    <x-slot name="link">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </x-slot>
    <main>
        <!-- Contenido de la portada principal -->
        <div class="user-dashboard">
            <x-panel/>

            <div class="account-info">
                <div class="greeting">
                    <h3>Nuestros Usuarios</h3>
                </div>
                <div class="user-data">
                    <table class="stats-table">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>email</th>
                            <th>admin</th>
                            <th>Creado</th>
                            <th>Eliminar</th>
                        </tr>
                        <?php $valor = 1 ?>
                        @foreach ($data as $item)
                            <tr>
                                <td class="center">{{$item->id}}</td>
                                <td>{{Str::limit($item->name,25)}}</td>
                                <td>{{Str::limit($item->email,28)}}</td>
                                <td class="center">@if($item->is_admin == 1) True @else False @endif</td>
                                <td class="center">{{$item->created_at}}</td>
                                <form action="{{ route('users.delete', ['id' => $item->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <td class="delete"><button type="submit">Eliminar</button></td>
                                </form>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            
        </div>
        <div class="area-button">
            <form action="{{route("users.create")}}" method="GET">
                @csrf
                <button type="submit" class="add">Agregar Administrador</button>
            </form>
        </div>
        <div class="p-5">
            {{$data->links()}}
        </div>
    </main>
</x-app>