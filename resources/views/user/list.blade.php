
<div class="row">
    <div class="col-sm-10"></div>
    <div class="col-sm-2">
        <a href="{{ route('user.form')}}" class="btn btn-primary">Nuevo Usuario</a>
    </div>
</div>
@if(Session::has('message'))
<p class="alert alert-success">
    {{Session::get('message')}}
</p>
@endif
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Name</th>   
            <th>Email</th> 
            <th>Password</th> 
            <th>Area_id</th>        
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->password }}</td>
            <td>{{ $user->area->name }}</td>
            <td>
                <a href="{{ route('user.update',['id' => $user->id]) }}" class="btn btn-warning">Editar</a>
                <a href="{{ route('user.delete',['id'=> $user->id]) }}" class="btn btn-danger">Borrar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>