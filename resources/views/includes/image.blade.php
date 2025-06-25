<div class="card-body">
                   @if($image->user->image)
                    <div class="container-avatar">
                        <!--  <img src="{{ url('/user/avatar/'.Auth::user()->image) }}" alt=""/> --><?php //puede ser asi tambien ?>
                        <img src="{{ route('user.avatar',['filename'=>$image->user->image]) }}" class="avatar" />
                    </div>
                    @endif
                    <div class="data-user"><!--// con style de css lo modifiqe  -->
                        <a href="">
                            {{$image->user->name.' '.$image->user->surname}}
                            <span class="nickname">
                                {{' | @'.$image->user->nick}}
                            </span>
                        </a>
		            </div>
                    <div class="image-container">
			          <img src="{{ route('image.file',['filename' => $image->image_path]) }}" />
		           </div>

                   <div class="description">
                    <span class="nickname">{{'@'.$image->user->nick}} </span>
                    <span class="nickname date">{{' | '.\FormatTime::LongTimeFilter($image->created_at)}}</span>
                    <p>{{$image->description}}</p>
		           </div>

                   <div class="likes">
                            <!-- Comprobar si el usuario le dio like a la imagen -->
                            <?php $user_like = false; ?>
                            @foreach($image->likes as $like)
                            @if($like->user->id == Auth::user()->id)<?php //si el id del usuario de la tabla likes es igual al id del usuario identificado ?>
                            <?php $user_like = true; ?>
                            @endif
                            @endforeach
                            @if($user_like)<?php //si es true el usuario le dio like ?>
                            <img src="{{asset('img/heart-red.png')}}" data-id="{{$image->id}}" class="btn-dislike"/><?php //muestra el corazon rojo ?>
                            @else      
                            <img src="{{asset('img/heart-black.png')}}" data-id="{{$image->id}}" class="btn-like"/>
                            @endif

                        <span class="number_likes">{{count($image->likes)}}</span> <?php //me muestra el numero de los likes ?>   
                        
                   </div>
            </div>