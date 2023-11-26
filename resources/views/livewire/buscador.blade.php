<div class="">
    @if ($posts->count())
        <input wire:model="search" type="text" class="form-control mb-3" placeholder="Título del post">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($posts as $key => $post)
            <div class="col">
                <div class="card h-100">    
                    <img class="card-img-top img-fluid" src="{{Storage::url($post->imagen)}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->titulo}}</h5>
                        <p class="card-text">{{ $post->descripcion }}</p>
                        <a href="{{ route('post.edit',[$post->id]) }}" class="btn btn-primary">Editar</a>
                        <form action="/post/{{$post->id}}" id="form-{{$key}}" method="post">
                        @method('delete')
                        @csrf
                            <button class="btn btn-danger boton-eliminar mt-3">Eliminar</button>
                            <input type="hidden" name="_method" value="DELETE">
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="position-relative mt-5">
            <div class="position-absolute top-50 start-50 translate-middle">
                {{ $posts->links() }}
            </div>
        </div>
    @else 
        <div class="card-body">
            No existen posts relacionados
        </div>
    @endif
</div>
