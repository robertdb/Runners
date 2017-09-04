<!--Section posts-->
<section class="item-posts">
  <!--create publiction -->
  <div class="create-post">
    <img class="user-img" src="img/users/user-1.jpg" alt="">
    <form class="form-post" action="{{ route('post.create') }}" method="post">
      <textarea  class="text-form"rows="2" cols="30" placeholder="¿En que estás pensando?" name="body"></textarea>
      <div id="form-files">
        <img id="btn_img" width="25px" height="25px" src="img/icons/upload-img.png" alt="">
        <input type="file" id="btn_file">
        <img width="25px" height="25px" src="img/icons/upload-video.png" alt="">
        <input type="file" id="btn_file">
      </div>
      <input id="submit-post"type="submit" name="" value="Publicar">
      <input type="hidden" value="{{ Session::token() }}" name="_token">
    </form>
  </div>

  <!--show posts-->
  @foreach ($posts as $post)

    <article class="post-container-flex" data-postid="{{ $post->id }}">
      <img src="img/users/user-2.jpg" alt="" class="user-img">
      <div class="detail-post">
        <div class="user-info-post">
          <h5><a href="#" class="profile-link">{{ $post->user->name }}</a></h5>
          <p class="">{{ $post->created_at }}</p>
        </div>
        <div class="text-post">
          <p>{{ $post->body }}</p>
        </div>
      </div>
      @if(Auth::user() == $post->user)
        <ul style="list-style:none; display:flex; flex-flow: row">
          <li><a class="edit" href="{{ route('post.edit', ['id' => $post->id]) }}">Editar</a></li>
          <li>|</li>
          <li><a href="#">Borrar</a></li>
        </ul>
      @endif
    </article>

  @endforeach

</section>

<!--edit modal-->
<div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editar post</h4>
            </div>
            <div class="modal-body">
                <form>
                  {!! method_field('put') !!}
                    <div class="form-group">
                        <label for="post-body">Editar texto</label>
                        <textarea class="form-control" name="post-body" id="post-body" rows="5"></textarea>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="modal-save">Guardar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    var token = '{{ Session::token() }}';
    var urlEdit = '{{ route('post.edit') }}';
</script>
