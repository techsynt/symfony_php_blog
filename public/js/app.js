$('.btn').on("click", function () {
    $.ajax({
        url: '/number',
        method: 'POST'
    }).then(function(data) {
        $('.randNumber').text(data.number);
    });
})