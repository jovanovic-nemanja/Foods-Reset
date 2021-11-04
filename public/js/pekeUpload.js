/*
 *  PekeUpload 1.0.6 - jQuery plugin
 *  written by Pedro Molina
 *  http://www.pekebyte.com/
 *
 *  Copyright (c) 2013 Pedro Molina (http://pekebyte.com)
 *  Dual licensed under the MIT (MIT-LICENSE.txt)
 *  and GPL (GPL-LICENSE.txt) licenses.
 *
 *  Built for jQuery library
 *  http://jquery.com
 *
 */
(function($) {

  $.fn.pekeUpload = function(options){

    // default configuration properties
    var defaults = {
      onSubmit:       false,
      btnText:        "Add File",
      url:        "upload.php",
      theme:        "custom",
      field:        "file",
      allowed_number_of_uploads:        1,
      data:         null,
      multi:        true,
      showFilename:       true,
      showPercent:        true,
      showErrorAlerts:    true,
      allowedExtensions:  "",
      invalidExtError:    "Invalid File Type",
      maxSize: 100,
      sizeError:      "Size of the file is greather than allowed",
      onFileError:        function(file,error){},
      onFileSuccess:      function(file,data){}
    };

    var options = $.extend(defaults, options);

    //Main function
    var obj;
    var file = new Object();
    var fileinput = this;
    this.each(function() {
      obj = $(this);
      //HTML code depends of theme
      if (options.theme == "bootstrap"){
      var html = '<a href="javascript:void(0)" class="btn btn-flat btn-upload btn-sm btn-info" style="display:inline;"> <span class="icon-upload icon-white"></span> '+options.btnText+'</a><div class="pekecontainer"></div>';
      }
      if (options.theme == "custom"){
        var html = '<a href="javascript:void(0)" class="btn-pekeupload">'+options.btnText+'</a><div class="pekecontainer"></div>';
      }

      obj.after(html);
      obj.hide();
      //Event when clicked the newly created link
      obj.next('a').click(function(){
        obj.click();
      });
      //Event when user select a file
      obj.change(function(){
        var numItems = $(".property_image").length ; 
        
        //console.log(numItems);
       
        if(numItems < options.allowed_number_of_uploads)
        {
             file.name = obj.val().split('\\').pop();
            file.size = (obj[0].files[0].size/1024)/1024;
            if (validateresult()==true){
              if (options.onSubmit==false){
                UploadFile();
              }
              else{
                $("#progress_bar").prepend('<br /><span class="filename">'+file.name+'</span>');
                obj.parent('form').bind('submit',function(){
                  $("#progress_bar").html('');
                  UploadFile();
                  });
              }
            }
        }
        else
        {
            $("#progress_bar").html('<span class="text-danger">You can save only '+options.allowed_number_of_uploads+' files</div>');
        }
       
      });
    });
    //Function that uploads a file
    function UploadFile(){
      var error = true;
      if (options.theme=="bootstrap"){
        var htmlprogress = '<div class="file"><div class="filename"></div><div class="progress progress-striped active"><div class="bar progress-bar" style="width: 0%;"><span class="badge badge-info"></span></div></div></div>';
      }
      if (options.theme=="custom"){
        var htmlprogress = '<div class="file"><div class="filename"></div><div class="progress-pekeupload"><div class="bar-pekeupload pekeup-progress-bar" style="width: 0%;"><span></span></div></div></div>';
      }
      $("#progress_bar").prepend(htmlprogress);
      var formData = new FormData();
      formData.append(options.field, obj[0].files[0]);
      formData.append('data', options.data);
      $.ajax({
            url: options.url,
            type: 'POST',
            data: formData,
                    // dataType: 'json',
            success: function(data){
              var percent = 100;
              $("#progress_bar").find('.progress-bar:first').width(percent+'%');
                $("#progress_bar").find('.progress-bar:first').text(percent+"%");
                if (data!=''){
                  if (options.multi==false){
                    obj.attr('disabled','disabled');
                  }
                  options.onFileSuccess(file,data);
                }
                else{
                  options.onFileError(file,data);
                  $("#progress_bar").find('.file:first').remove();
                  if((options.theme == "bootstrap")&&(options.showErrorAlerts==true)){
                    $("#progress_bar").prepend('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button> '+data+'</div>');
                    bootstrapclosenotification();
                  }
                  if((options.theme == "custom")&&(options.showErrorAlerts==true)){

                    $("#progress_bar").prepend('<div class="alert-pekeupload"><button type="button" class="close" data-dismiss="alert">&times;</button> '+data+'</div>');
                    customclosenotification();
                  }
                  error = false;
                }
            },
            xhr: function() {  // custom xhr
                  myXhr = $.ajaxSettings.xhr();
                  if(myXhr.upload){ // check if upload property exists
                    myXhr.upload.addEventListener('progress',progressHandlingFunction, false); // for handling the progress of the upload
                }
                return myXhr;
              },
            cache: false,
                  contentType: false,
                  processData: false
          });
      return error;
    }
    //Function that updates bars progress
    function progressHandlingFunction(e){
        if(e.lengthComputable){
          var total = e.total;
          var loaded = e.loaded;
          if (options.showFilename==true){
          $("#progress_bar").find('.file').first().find('.filename:first').text(file.name);
          }
          if (options.showPercent===true){
          var percent = Number(((e.loaded * 100)/e.total).toFixed(2));
                $("#progress_bar").find('.file').first().find('.progress-bar:first').width(percent+'%');
            }
            $("#progress_bar").find('.file').first().find('.progress-bar:first').html('<center>'+percent+"%</center>");
        }
    }
    //Validate master
    function validateresult(){
      var canUpload = true;
      if (options.allowedExtensions!=""){
        var validationresult = validateExtension();
        if (validationresult == false){
          canUpload = false;
          if((options.theme == "bootstrap")&&(options.showErrorAlerts==true)){
            $("#progress_bar").prepend('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button> '+options.invalidExtError+'</div>');
            bootstrapclosenotification();
          }
          if((options.theme == "custom")&&(options.showErrorAlerts==true)){
            $("#progress_bar").prepend('<div class="alert-pekeupload"><button type="button" class="close">&times;</button> '+options.invalidExtError+'</div>');
            customclosenotification();
          }
          options.onFileError(file,options.invalidExtError);
        }
        else{
          canUpload = true;
        }
      }
      if (options.maxSize>0){
        var validationresult = validateSize();
        if (validationresult == false){
          canUpload = false;
          if((options.theme == "bootstrap")&&(options.showErrorAlerts==true)){
            $("#progress_bar").prepend('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button> '+options.sizeError+'</div>');
            bootstrapclosenotification();
          }
          if((options.theme == "custom")&&(options.showErrorAlerts==true)){
            $("#progress_bar").prepend('<div class="alert-pekeupload"><button type="button" class="close" data-dismiss="alert">&times;</button> '+options.sizeError+'</div>');
            customclosenotification();
          }
          options.onFileError(file,options.sizeError);
        }
        else{
          canUpload = true;
        }
      }
      return canUpload
    }
    //Validate extension of file
    function validateExtension(){
      var ext = obj.val().split('.').pop().toLowerCase();
      var allowed = options.allowedExtensions.split("|");
      if($.inArray(ext, allowed) == -1) {
          return false;
      }
      else{
        return true;
      }
    }
    //Validate Size of the file
    function validateSize(){
      if (file.size > options.maxSize){
        return false;
      }
      else{
        return true;
      }
    }
    //Function that allows close alerts of bootstap
    function bootstrapclosenotification(){
      $("#progress_bar").find('.alert-error').click(function(){
        $(this).remove();
      });
    }
    function customclosenotification(){
      $("#progress_bar").find('.alert-pekeupload').click(function(){
        $(this).remove();
      });
    }
  };

})(jQuery);