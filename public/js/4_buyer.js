    $(document).ready(function(){
        $('.intnum').on('keyup keypress blur change', function(e) {
     var pr = $(this).val();
     pr = pr.replace(",", "");
  
     $(this).val(numberWithCommas(pr));
});
		   $('.multipleSelect1').fastselect();	
                   
                   
    $(".category_select").change(function()
    {
        $(".product_detail").hide();
        var ids = $(this).val();
            ids = ids.split('-');
           var cate_id=  ids[0];
           var pro_id=  ids[1];
           
           
           
//           $(".multipleSelect").attr('data-url',url+'/public/category_files/data-'+cate_id+'.json');
            $.ajax({
          url:url+"/getproducttag/"+cate_id,
          type:"get",
          success: function(result)
          {
              
          }
      });
        var location_index = $(this).attr('id');
        
       
        if(cate_id > 0)
        {
            location_index = location_index.split('_');
            cat_index = location_index[1];
           
            
       $.ajax({
          url:url+"/getproduct/"+cate_id,
          type:"get",
          success: function(result)
          {
              
              var data = $.parseJSON(result);
              $("#product_detail_select_"+cat_index).html('');
//              $("#product_detail_").append('<option>Please Select</option>');
              var html1 = '';
              $.each(data , function(i,v)
              {
                  html1+="";
//                  $("#product_detail_select_"+cat_index).append("<option value="+v.id+">"+v.product_name+"</option>")
              });
//               $("#product_detail_category_"+cat_index).prepend(html1);
//              $("#product_detail_select_"+cat_index).val(pro_id);
              
//                $("#cat_"+cat_index).val($("#cat_"+cat_index+" option:first").val());
               $("#product_detail_select_"+cat_index).html('');
              $("#product_detail_"+cat_index).show();
              $("#product_detail_select_"+cat_index).show();
              $("#product_detail_category_"+cat_index).show();
              $("#product_detail_category_"+cat_index).after('<hr/>');
              
          }
          
       });
        $(".submit_div").show();
   }
   else
   {
//       $("#product_detail_"+cat_index).hide();
//         $("#product_detail_select_"+cat_index).hide();
//       $("#product_detail_category_"+cat_index).hide();
   }
    });
    $(".product_select").change(function()
    {
        var product_id = $(this).val();
        var cat_id = $(this).attr('id');
        cat_id = cat_id.split('_');
        cat_id = cat_id['1'];
       
//      if(product_id > 0)
//      {
//          $("#product_detail_category_"+cat_id).show();
//          $(".submit_div").show();
//          
//      }
//      else
//      {
//             $("#product_detail_category_"+cat_id).hide();
//      }
        
          
    });

    });
    


$('.productTag').on('keyup keypress blur change', function(e) {
       var Pid = $(this).attr('id');
        Pid = Pid.split('-');
        Pid = Pid[1];
    $(".minp1_"+Pid).show();
});
$(document).on("change", ".product_select_c", function (event) {
//    event.preventDefault();
   
   
   var iddd = $(this).val();
    iddd = iddd.split("_");
    
   var pro_id = iddd[0];
   var cat_index = iddd[1];
   var cat_idd = iddd[2];
   
// $('.show_pp_label').show();
// $('.pp_label').hide();
//$.ajax({
//                url: url + "/getproduct/tag/"+pro_id,
//                type: "get",
//                success: function (result)
//                {
//
//                    var data = $.parseJSON(result);
//                    $(".p1_tag_"+pro_id).html('');
////              $("#product_detail_").append('<option>Please Select</option>');
//                    if(data.length != 0)
//                    {
//                       
//                    $.each(data, function (i, v)
//                    {
//                        $(".p1_tag_"+pro_id).append("<option value=\""+v+"\">"+v+"</option>");
//                      
//                    });
//
//                    }
//
//                }
//            });
        

var checkbox_check = $('input:checkbox.product_check_'+cat_index+':checked').length;

   if(pro_id == '0')
   {
        if (this.checked) {
                    $(".p1_new_"+cat_idd).show();
//                    if($(".pp_label").hasClass('show_pp_label') == true)
//                    {
//                        
//                    }
//                    else
//                    {
//                       $(".pp_label").addClass('show_pp_label'); 
//                    }
                }
                else
                {
                      $(".p1_new_"+cat_idd).hide();
                }
   }
   else
   {
//           if($(".pp_label").hasClass('show_pp_label') == true)
//                    {
//                        alert('not add');
//                    }
//                    else
//                    {
//                          alert(' add');
//                       $(".pp_label").addClass('show_pp_label'); 
//                    }
                if (this.checked) {
                    $(".p1_"+pro_id).show();
                    $(".p_new_"+cat_idd).show();
                }
                else
                {
                      $(".p1_"+pro_id).hide();
                       $(".p_new_"+cat_idd).hide();
                }
   }
   
//    $('.show_pp_label').show();
//var l = $( ".pp_label_"+cat_idd+ ".pp_label").length;
//if(l == 0)
//{
//    $( ".pp_label_"+cat_idd).addClass('pp_label');
//}
//
////$(".pp_label").eq(0).show();
//$( ".pp_label_"+cat_idd).show();
// 


     $("#product_detail_select_"+cat_index).html('');
              $("#product_detail_"+cat_index).show();
              $("#product_detail_select_"+cat_index).show();
              $("#product_detail_category_"+cat_index).show();
              $("#hr_tag_"+cat_index).css('display', 'block');
              $(".submit_div").show();
              
              if(checkbox_check == 0)
              {
                    $("#product_detail_category_"+cat_index).hide();
              }
//              $("#product_detail_category_"+cat_index).after('<hr/>');
     
});
   function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

//
//
//
//$(document).ready(function() {
//    $("ul.dropdown-menu input[type=checkbox]").each(function() {
//        $(this).change(function() {
//            var line = "";
//            $("ul.dropdown-menu input[type=checkbox]").each(function() {
//                if($(this).is(":checked")) {
//                    line += $("+ span", this).text() + ";";
//                }
//            });
//            $("input.form-control").val(line);
//        });
//    });
//});
