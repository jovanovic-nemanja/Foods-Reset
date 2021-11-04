$(document).ready(function () {
    $('.multipleSelect').fastselect(
        {
            loadOnce: false,
            userOptionPrefix: 'Add '
        });
    $(".dis_res").click(function () {
        var id = $(this).val();
        if (id == 0) {
            $(".dis_res_div").show();
        } else if (id == 1) {
            $(".dis_res_div").hide();
        }
    });
    $(".supplier_category").change(function () {
        var cate_id2 = $(this).val();

        if (cate_id2 > 0) {
            $.ajax({
                url: url + "/getproduct/" + cate_id2,
                type: "get",
                success: function (result) {

                    var data = $.parseJSON(result);
                    $(".supplier_products").html('');
//              $("#product_detail_").append('<option>Please Select</option>');
                    $.each(data, function (i, v) {
                        $(".supplier_products").append("<option value=" + v.id + ">" + v.product_name + "</option>")
                    });

                    $(".supplier_products").append("<option value='other_product'>Other</option>")

                }
            });
        }
    });
    $(".supplier_products").change(function () {
        var sel_pro = $(this).val();
        if (sel_pro == 'other_product') {
            $("#other_product_div").show();
        } else {
            $("#other_product_div").hide();
        }
    });

});

function remove_div(div_id) {
    $("#" + div_id).remove();
    var numItems = $(".document_files").length;
    if (numItems < 1) {
        $("#upload-doc-div").show();
        $("#file_limit").hide();
        $("#file_holder").hide();
        $("#progress_bar").html("");
    }
}


$(document).ready(function () {

    $('#add_new_option').click(function () {
        var numItems = $('#box_body1 .holder_div').length;
        var template = $('#add_new_template').html();
        template = template.replace(/index/g, numItems + 1);
        template = template.replace(/required11/g, 'required');
        $('#box_body1').append(template);
        var tt = numItems + 1;


        $(".spool-" + tt).chosen({
            width: '200px'
        });

        $(".chosen-container").css("width", '100%');

        $('.datetimepicker44').datetimepicker({
            format: 'Y-m-d h:i',
            formatDate: 'Y-m-d h:i',
            timepicker: true
        });
    });

    $("#upload-button").pekeUpload({
        theme: "bootstrap",
        url: url + "/public/doc-upload.php",
        allowed_number_of_uploads: 1,
        allowedExtensions: "jpg|jpeg|gif|png|doc|docx|xls|xlsx|pdf|zip|rar|JPG|JPEG|GIF|PNG",
        onFileSuccess: function (file, response) {
            var data = JSON.parse(response)
            var file_extension = data.raw_name.substr((~-data.raw_name.lastIndexOf(".") >>> 0) + 2);
            $("#file_holder").show();
            $("#prev_upload tbody").append('<tr id="' + data.file_id + '" class="document_files"><td data-title="Filename">' + data.raw_name + '</td><td data-title="Remove File"><a class="fa fa-trash-o" href="javascript:void(0);" onclick=javascript:remove_div("' + data.file_id + '"); ><span class="glyphicon glyphicon glyphicon-remove"></span></a><input type="hidden" name="support_file[]" value="' + data.file_name + '" /></td></tr> ');
            $(".file").remove();

            $("#prev_upload table").show();
            var numItems = $(".property_image").length;
            if (numItems == 1) {
                $("#upload-doc-div").hide();
                $("#file_limit").show();
            }
        }
    });


});

function removePost(id) {
    $("#tr-" + id).remove();
}


$('.upload-button1').pekeUpload({
    theme: "bootstrap",
    url: url + "/public/doc-upload.php",
    allowed_number_of_uploads: 1,
    allowedExtensions: "jpg|jpeg|gif|png|doc|docx|xls|xlsx|pdf|zip|rar|JPG|JPEG|GIF|PNG",
    onFileSuccess: function (file, response) {
        var data = JSON.parse(response);
        var file_extension = data.raw_name.substr((~-data.raw_name.lastIndexOf(".") >>> 0) + 2);
        $("#file_holder").show();
        $("#prev_upload tbody").append('<tr id="' + data.file_id + '" class="document_files"><td data-title="Filename">' + data.raw_name + '</td><td data-title="Remove File"><a class="fa fa-trash-o" href="javascript:void(0);" onclick=javascript:remove_div("' + data.file_id + '"); ><span class="glyphicon glyphicon glyphicon-remove"></span></a><input type="hidden" name="support_file[]" value="' + data.file_name + '" /></td></tr> ');
        $(".file").remove();

        $("#prev_upload table").show();
        var numItems = $(".property_image").length;
        if (numItems == 1) {
            $("#upload-doc-div").hide();
            $("#file_limit").show();
        }
    }
});

$(document).ready(function () {
    var x = setInterval(function () {
        $.ajax({
            url: url + "/check/post/time",
            type: "get",
            success: function (result) {
                var data = JSON.parse(result);
                if (Object.keys(data.time).length > 0) {
                    $.each(data.time, function (i, v) {
                        if (v == 'accepted' || v == 'Unfilled') {
                            $(".timer-" + i).remove();
                            $("#change_status-" + i).text(v);
                            $("#change_status1-" + i).html('');
                        }
                        else {
                            $('#time-' + i).text(v);
                            $("#change_status-" + i).text(v);
                        }

                    });
                }
            }
        });
    }, 1000);

});

$(document).on('keyup keypress blur change', '.intnum', function (e) {

    var pr = $(this).val();
    pr = pr.replace(",", "");

    $(this).val(numberWithCommas(pr));

});
//  $('.intnum').on('keyup keypress blur change', function(e) {
//
//
//
//     var pr = $(this).val();
//     pr = pr.replace(",", "");
//
//     $(this).val(numberWithCommas(pr));
//});
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

