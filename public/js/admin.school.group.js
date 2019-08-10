$('.delete-btn').on('click', function (e){
    e.preventDefault();

    const link = $(this).attr('href');
    const id = $(this).attr('delete-btn-id');
    const csrf = $('meta[name=csrf-token]').attr("content");

    $.ajax({
        type: 'POST',
        url: link,
        data: {
            '_token': csrf,
        },
        success: (resp) => {
            $(`tr[row-id=${id}]`).remove()
        },
        error: (resp) => {
            alert('Coś poszło nie tak spróbuj później ponownie...');
        }
    });
});