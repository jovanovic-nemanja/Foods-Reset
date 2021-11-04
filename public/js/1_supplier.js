$(document).ready(function () {
              $('.intnum').on('keyup keypress blur change', function(e) {
     var pr = $(this).val();
     pr = pr.replace(",", "");
  
     $(this).val(numberWithCommas(pr));
});
    $('.multipleSelect').fastselect(
            {
                 loadOnce: false,
            });
    $(".dis_res").click(function ()
    {
        var id = $(this).val();
        if (id == 0)
        {
            $(".dis_res_div").show();
        } else if (id == 1)
        {
            $(".dis_res_div").hide();
        }
    });
    $(".supplier_category").change(function ()
    {
        $(".productTag").html('');
//        $(".multipleSelect").html('');
                        $("#search-keyword").hide();
        var cate_id2 = $(this).val();
        $.ajax({
          url:url+"/getproducttag/"+cate_id2,
          type:"get",
          success: function(result)
          {
              
          }
      });
     
      $(".search-keyword2").hide();
      $("#search-keyword2-"+cate_id2).show();
      
//      $(".multipleSelect").attr('data-url',url+'/public/category_files/data-'+cate_id2+'.json');
        if (cate_id2 > 0)
        {
            $.ajax({
                url: url + "/getproduct/" + cate_id2,
                type: "get",
                success: function (result)
                {

                    var data = $.parseJSON(result);
                    $(".supplier_products").html('');
              $(".supplier_products").append('<option>Please Select</option>');
                    $.each(data, function (i, v)
                    {
                        $(".supplier_products").append("<option value=" + v.id + ">" + v.product_name + "</option>")
                    });

//                    $(".supplier_products").append("<option value='other_product'>Other</option>")

                }
            });
        }
    });
    $(".supplier_products").change(function ()
    {
        $(".productTag").html('');
                        $("#search-keyword").hide();
        var sel_pro = $(this).val();
      
        if (sel_pro == 'other_product')
        {
            $("#other_product_div").show();
        } else
        {
            $("#other_product_div").hide();
        }
        
        
//         $.ajax({
//                url: url + "/getproduct/tag/"+sel_pro,
//                type: "get",
//                success: function (result)
//                {
//
//                    var data = $.parseJSON(result);
//                    
////              $("#product_detail_").append('<option>Please Select</option>');
//                 if(data.length != 0)
//                    {
//                        $(".productTag").html('');
//                        $("#search-keyword").show();
//                    $.each(data, function (i, v)
//                    {
//                       
//                        $(".productTag").append("<option value=\""+v+"\">"+v+"</option>");
//                    });
//                }
//
//                  
//
//                }
//            });
        
        
    });
    $("#upload-button").pekeUpload({
        theme: "bootstrap",
        url: url + "/public/doc-upload.php",
        allowed_number_of_uploads: 999,
        allowedExtensions: "jpg|jpeg|gif|png|doc|docx|xls|xlsx|pdf|zip|rar|JPG|JPEG|GIF|PNG",
        onFileSuccess: function (file, response) {
            var data = JSON.parse(response)
            var file_extension = data.raw_name.substr((~-data.raw_name.lastIndexOf(".") >>> 0) + 2);
            $("#file_holder").show();
            $("#prev_upload tbody").append('<tr id="' + data.file_id + '" class="document_files"><td data-title="Filename">' + data.raw_name + '</td><td data-title="Remove File"><a class="fa fa-trash-o" href="javascript:void(0);" onclick=javascript:remove_div("' + data.file_id + '"); ><span class="glyphicon glyphicon glyphicon-remove"></span></a><input type="hidden" name="support_file[]" value="' + data.file_name + '" /></td></tr> ');
            $(".file").remove();
            $("#prev_upload table").show();
            var numItems = $(".property_image").length;
            if (numItems == 999)
            {
                $("#upload-doc-div").hide();
                $("#file_limit").show();
            }
        }
    });
});

function remove_div(div_id)
{
    alert('ssssssssssss');
    $("#" + div_id).remove();
    var numItems = $(".document_files").length;

    if (numItems < 1)
    {
        $("#upload-doc-div").show();
        $("#file_limit").hide();
        $("#file_holder").hide();
        $("#progress_bar").html("");
    }
}

  function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}