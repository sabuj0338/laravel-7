// for product price change
$(document).ready(function () {
    changeProductPrice();
});
function changeProductPrice(){
    let price = document.getElementById('product_price').value;
    document.getElementById('product_price_text').innerText = price;
}

// for address modal hide show
// $(document).ready(function () {
    // $('#addressModal').modal('show');
    // $('#addressModal').modal({
    //     backdrop: 'static',
    //     keyboard: false,
    //     show: true
    // })
    // console.log('{{ Auth::user()->name }}');
// });
// for alert hide
window.setTimeout(function () {
    $(".alert").fadeTo(500, 0).slideUp(500, function () {
        $(this).remove();
    });
}, 3000);

// for tooltip
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
});

$(document).ready(function () {
    $('.dropdown').hover(function () {
        $(this).find('.dropdown-menu').first().stop(true, true).slideDown(150);
    }, function () {
        $(this).find('.dropdown-menu').first().stop(true, true).slideUp(105)
    });
});
