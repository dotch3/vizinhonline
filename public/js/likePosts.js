$('.post').find('.interaction').find('like').eq(0).on('click', function () {
    console.log('it works');
});


$('.like').on('click', function (event) {
    event.preventDefault();
    postId = event.target.parentNode.parentNode.dataset['postId'];
    console.log('like event', event);
    $.ajax({
        method: 'POST',
        url: urlLike,
        data: {
            postId: postId,
            _token: token
        }
    });
});
