@extends('layout.basicApp')

@section('title', 'Usuários')

@section('content')
   

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Usuários</p>
        </div>
        <div class="menu">
            <ul>
                <li>
                    <a href="{{route('usuario.create')}}">Novo</a>
                    
                </li>
            </ul>
        </div>
        
        <div class="informacao-pagina">
            
            <div style="width:95%; margin-left:auto; margin-right:auto">
                
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>ID do Usuário</th>
                            <th>Nível Acesso</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                        </tr>
                    </thead>
                    <tbody>
                @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->is_admin}}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            
                            <td style="background-color: rgb(214, 3, 56); border:1px solid black; border-radius:5px">
                                <form id="form_{{$user->id}}" method="POST" action="{{ route('usuario.destroy', $user->id) }}">
                                    @method('DELETE')
                                    @csrf
                                    <a style="text-decoration:none; color: #fff" href="#" 
                                    onclick="document.getElementById('form_{{$user->id}}').submit()">
                                    Excluir
                                    </a>
                                </form>
                            </td>
                            <td style="background-color: rgb(253, 145, 4); border:1px solid black; border-radius:5px">
                                <a style="text-decoration:none; color: #fff" href="{{ route('usuario.edit', $user) }}">
                                    Editar
                                </a>
                            </td>
                        </tr>
                @endforeach
                    </tbody>
                </table>
                {{-- Call provider in listProvider Methods: --}}
                <div class="pagination">
                    
                    {{-- {{$users->appends($request)->links()}}<br> --}}
                    
                <div>
            </div>
        </div>
    </div>
    
    

@endsection