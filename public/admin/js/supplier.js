function sendReallocation(aid)
{

    var reVal = $(".reVal_" + aid).val();
    var confirm_action = confirm("Do you really want to Send " + reVal + " ReAllocation");
    if (confirm_action == true) {

        $.ajax({
            url: url + "/reallocation/" + aid + "/" + reVal,
            type: "GET",
            success: function (result)
            {

            }
        })

    }

}

$(document).on('keyup', ".reallocation", function (e) {

    var id = $(this).attr('id');
    var quantity = $(this).val();
    if (quantity > 0)
    {
        $(".reall_btn_" + id).show();
    } else
    {
        $(".reall_btn_" + id).hide();
    }
});