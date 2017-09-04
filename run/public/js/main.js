function checkActual(){
  var pointer = $('.icon-nav');
  var id = $(pointer).attr('id');
  if (id === 'actual')
    /*$('#actual').css(,);
    $('#actual').css(,);*/
  console.log(id);
}

$(document).ready(function() {

  var postId = 0;
  var textPost = null;

  $('.edit').on('click', function (event) {
      event.preventDefault();

      postId = $(this).closest("[data-postid]").data().postid;
      textPost= $(this).closest("article").find('[class*="text-post"]').children();

      //console.log(textPost.html());
      //console.log(postId);

      $('#post-body').val(textPost.html());
      $('#edit-modal').modal();

  });

  $('#modal-save').on('click', function () {
      $.ajax({
              method: 'PUT',
              url: "http://localhost:8000/posts/edit",
              data: {body: $('#post-body').val(), postId: postId, _token: token}
          })
          .done(function (msg) {
              textPost.html(msg.body);
              //console.log(msg.postId);
              //console.log(msg);

              $('#edit-modal').modal('hide');
          });
  });

});
