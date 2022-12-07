@extends('layout.main')

@section('content')
    
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <a href="/posts" class="btn btn-primary mb-3 d-block">Back</a>
            <img src="{{ asset('storage/' . $post->img) }}" width="1200" height="400" class="img-fluid">
            <h2 class="mb-3 mt-3 card-title text-center"> {{ $post->title }} </h2>
            <article class="my-3">
               {{ $post->body }} 
            </article>

            <div class="card mb-4">
                <div class="card-body">
                    <form action="/comment" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" placeholder="" name="nama">
                        </div>

                        <div class="input-group">
                            <span class="input-group-text">Comment</span>
                            <textarea class="form-control" aria-label="With textarea" name="komentar"></textarea>
                        </div>

                        <input type="hidden" name="post_id" value="{{ $post->id }}">

                        <button type="submit" class="btn btn-danger mt-3">Submit Comment</button>
                        <br><br>
                    </form>

                    <p class="fw-bold">Comments: </p>
                    @foreach ($post->comment as $pc)
                        <h6 class="card-title">{{ $pc->nama }}</h6>
                        <p class="fw-normal fs-6">{{ $pc->komentar }}</p>

                        @auth
                        <form action="/comment/{{ $pc->id }}" method="POST" class="mb-3">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" 
                            onclick="edit_comment({{ $pc->id }})">
                                Edit
                            </button>
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Kidz?')">Delete</button>
                        </form>
                        @endauth

                        @auth
                        <form action="/reply" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="" name="reply">
                                <button class="btn btn-outline-danger" type="submit">Reply</button>
                            </div>
                            <input type="hidden" name="comment_id" value="{{ $pc->id }}">
                        </form>
                        @endauth

                        <p class="fw-bold">Reply:</p>
                        @foreach ($reply_comment($pc->id) as $rc)
                            <div class="card mx-3 mb-1">
                                <div class="card-body">
                                    <h8 class="card-title">Admin</h8>
                                    <p class="card-text">{{ $rc->reply }}</p>
                                </div>
                            </div>
                        @endforeach
                        <hr>

                    @endforeach
                </div>
            </div>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Comment</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="update_comment">
                    @method('PUT')
                    @csrf
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="">

                    <label class="form-label">Comment</label>
                    <textarea class="form-control" aria-label="With textarea" name="komentar" id="komentar"></textarea>

                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>

    <script>
        function edit_comment(id) {
            $.get('/comment/' + id + '/edit', function(comment) {
                $('#nama').val(comment.nama); // mengambil data field nama
                $('#komentar').html(comment.komentar); // mengambil data field komentar
                $('#update_comment').attr('action', '/comment/' + id); // memberi nilai pada atribut action
            })
        }
    </script>

@endsection