<div class="card">
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div
        class="card-header"
    >
        <div class="row justify-content-between align-items-center">
            <div class="col-md-4">
                <a
                    href="{{ route('admin.posts.create') }}"
                    class="btn btn-outline-info"
                >
                    Agregar Post
                </a>
            </div>
            <div class="col-md-8 text-right">
                <input
                    wire:model.debounce.500ms="search"
                    class="form-control"
                    placeholder="Ingrese el nombre de un post"
                >
            </div>
        </div>
    </div>
    @if ($posts->count())
        
        <div
            class="card-body"
        >
            <table
                class="table table-striped"
            >
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Titulo</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->name }}</td>
                            <td>
                                <button
                                    wire:click="edit({{ $post->id }})"
                                    class="btn btn-sm btn-primary"
                                >
                                    Edit
                                </button>
                                <button
                                    wire:click="delete({{ $post->id }})"
                                    class="btn btn-sm btn-danger"
                                >
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div
            class="card-footer"
        >
            {{ $posts->links() }}
        </div>

    @else
        <div
            class="card-body"
        >
            <strong>No hay registros</strong>
        </div>
    @endif
</div>
