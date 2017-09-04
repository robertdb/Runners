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
  var postBodyElement = null;

  $('.edit').on('click', function (event) {
      event.preventDefault();

      postBodyElement = event.target.parentNode.parentNode.childNodes[1];
      var postBody = postBodyElement.textContent;
      postId = event.target.parentNode.parentNode.dataset['postid'];
      $('#post-body').val(postBody);
      $('#edit-modal').modal();
      console.log(postId);
      console.log(postBody);
  });

  $('#modal-save').on('click', function () {
      $.ajax({
              method: 'PUT',
              url: "http://localhost:8081/edit",
              data: {body: $('#post-body').val(), postId: 4, _token: token}
          })
          .done(function (msg) {
              $(postBodyElement).text(msg['new_body']);
              $('#edit-modal').modal('hide');
          });
  });

});
