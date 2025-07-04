@extends('layouts.app')

@section('content')
<br>
<div class="container mt-4">
    <div class="row justify-content-center">
        
    
        <div class="col-md-8">
			<h1>Gente</h1>
			<form method="GET" action="{{ route('user.index') }}" id="buscador">
				<div class="row">
					<div class="form-group col"><?php //en una columna  ?>
						<input type="text" id="search" class="form-control" />
					</div>
					<div class="form-group col btn-search"><?php //en otra columna  ?>
						<input type="submit" value="Buscar" class="btn btn-success"/>
					</div>
				</div>
			</form>
			<hr>

			@foreach($users as $user)
			<div class="profile-user">

            @if($user->image)
				<div class="container-avatar">
					<img src="{{ route('user.avatar',['filename'=>$user->image]) }}" class="avatar" />
				</div>
				@endif

                <div class="user-info">
					<h2>{{'@'.$user->nick}}</h2>
					<h3>{{$user->name .' '. $user->surname}}</h3>
					<p>{{'Se unió: '.\FormatTime::LongTimeFilter($user->created_at)}}</p>
                    <a href="{{ route('profile', ['id' => $user->id])}}" class="btn btn-success">Ver perfil</a>
				</div>
                <div class="clearfix"></div>
				<hr>
			</div>
			@endforeach
        <!-- PAGINACION -->
			{{$users->links()}}

        </div>

    </div>
</div>
@endsection
