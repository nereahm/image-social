@extends('layouts.app')

@section('content')
<br>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

			<div class="profile-user">

				@if($user->image)
					<div class="container-avatar">
						<img src="{{ route('user.avatar',['filename'=>$user->image]) }}" class="avatar" />
						
					</div>
				@endif

				<div class="user-info">
					<h1>{{'@'.$user->nick}}</h1>
					<h2>{{$user->name .' '. $user->surname}}</h2>
					<p>{{'Se unió: '.\FormatTime::LongTimeFilter($user->created_at)}}</p><?php //muestra la fecha  ?>
				</div>

				<div class="clearfix"></div><?php //(limpiar flotados)  ?>
				<hr>
			</div>

			
            <?php //lista de mis imgenes///////////////// ?>
			@foreach($user->images as $image)
            <div class="card pub_image">
            @include('includes.image',['image'=>$image])   
                       <div class="comments m-2">
                            <a href="{{ route('image.detail', ['id' => $image->id])}}" class="btn btn-sm btn-warning btn-comments">
                                Comentarios ({{count($image->comments)}})
                            </a>
                       </div>   
                    
            </div>
			@endforeach

        </div>
    </div>
</div>
@endsection

