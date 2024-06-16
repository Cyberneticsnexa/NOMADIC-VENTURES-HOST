

/*
|--------------------------------------------------------------------------
| d3
|--------------------------------------------------------------------------
*/
$(document).ready(function() {

});

var buttone_id = null;
  $("a").click(function() {

    buttone_id = (this.id);
    if(buttone_id == 'profile_image'){
        $('#profile-change-from').attr("action", "/upload-member-profile-image");
        $("#product-title").html("Profile Image Upload");
     }
    if(buttone_id == 'front_end'){
        $('#profile-change-from').attr("action", "/upload-member-nic-front-image");
        $("#product-title").html("NIC Front Image Upload");
     }
     if(buttone_id == 'back_end'){
        $('#profile-change-from').attr("action", "/upload-member-nic-back-image");
        $("#product-title").html("NIC Back Image Upload");
     }
 });

   /*
    |--------------------------------------------------------------------------
    |Image cropper function
    |--------------------------------------------------------------------------
    */
    var  $model = $('#cropper-modal');
    var  $image = document.getElementById('canvas-image');
    var  cropper;
    var  num = 0;
    var  file_name = '';


    $(document).on('change', '#img_file', function(e) {

        if(cropper){
            $image.src = null;
            cropper.destroy(),
            cropper = null;
        }

        var files = e.target.files;

        var done = function(url){
            $image.src = url;
            if($('#canvas-image').show()){cropperInitialize();}
        }

        var reader;
        var file;
        var url;

      if(files && files.length>0){
          file = files[0];
          file_name = file.name;
          if(URL){
            done(URL.createObjectURL(file));
          }else if(FileReader){
            reader =  new FileReade();
            reder.onload = function(e){
              done(reader.result);
            }
            reader.readAsDataURL(file);
          }
      }

    });

    function cropperInitialize(){
        if(buttone_id == 'front_end' || buttone_id == 'back_end'){
            cropper = new Cropper($image,{
                dragMode: 'move',
                //aspectRatio: 1,
                autoCropArea: 1,
                restore: false,
                guides: false,
                center: false,
                highlight: false,
                cropBoxMovable: true,
                cropBoxResizable: true,
                toggleDragModeOnDblclick: false,
                //autoCropArea: 1,

                // viewMode: 1,
                // aspectRatio: 1,
                // maxContainerWidth: 100,
                // maxContainerHeight: 100,
                // maxCropBoxWidth: 100,
                // maxCropBoxHeight: 100,
                // maxCanvasHeight:100,
                // maxCanvasWidth:100,
                // movable: true,
                // maxWidth:54,
                 //maxHeight:86
             });
        }else{
            cropper = new Cropper($image,{
                dragMode: 'move',
                aspectRatio:1,
                autoCropArea: 1,
                restore: false,
                guides: false,
                center: false,
                highlight: false,
                cropBoxMovable: false,
                cropBoxResizable: false,
                toggleDragModeOnDblclick: false,
                 // autoCropArea: 1

                // viewMode: 1,
                // aspectRatio: 1,
                // maxContainerWidth: 100,
                // maxContainerHeight: 100,
                // maxCropBoxWidth: 100,
                // maxCropBoxHeight: 100,
                // maxCanvasHeight:100,
                // maxCanvasWidth:100,
                // movable: true,
                // maxWidth:100,
                // maxHeight:100
             });
        }


        //  cropper.initialCanvasData.maxWidth = 100;
        // cropper.initialCanvasData.maxHeight = 100;

        // console.log(cropper);
    }




    function clearlCrop(){
        if(cropper){
            $image.src = null;
            cropper.destroy(),
            cropper = null;
        }
        file_name = '';
        $("#img_file" ).val(null);
        $('#canvas-image').hide();
    }

    function imageCrop(){

        if($("#img_file").val()){

            canvas = cropper.getCroppedCanvas({
                width:350,
                height:350,
                });

            canvas.toBlob(function(blob){
                url = URL.createObjectURL(blob);
                reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onload = function(e){
                    var base64data = reader.result;
                    //$('#result-row').append($('<img>').attr('src', base64data));
                   // $('#result-row').append('<div class="col-lg-3"><img src="'+base64data+'"/></div>');
                    $('#result-row').html('<input type="hidden" name="image" value="'+base64data+'">\
                    <input type="hidden" name="image_name" value="'+file_name+'">');
                   invokeLoader();
                    document.getElementById("profile-change-from").submit();
                   }


            });

        }
        else{
            toastr.error( "image requierd");
        }

    };

function setBranch(){
    var bank_code = $('select[name="bank"]').val();
    if(bank_code != ''){
    //console.log(bankCode);
    $('select[name="bank_branch"]').empty();
        $.ajax({
            type: "GET",
            url: "/get-branch-list-ajax",
            headers: {
                'X-CSRF-TOKEN': $('meta[name=token]').attr('content')
            },
            data: {
            "_token"     : token,
            "bank_code"  : bank_code,
            },
            cache:false,
            success: function(response) {
                let $bankBranch = $('#branch');
                    $bankBranch.empty();
                    $bankBranch.append('<option value="">Select</option>');
                    $.each(response, function(key,item) {
                        $bankBranch.append('<option value="' + item.branch_code + '">' + item.branch_name + '</option>');
                    });
                    if(member_branch != null){
                        // setTimeout(function() {
                            //$('#branch').val(002);
                            $("#branch").val(member_branch).change();
                        // }, 2500);
                        member_branch = null;
                    }

            },

        });
    }

  }



  function removeImage(id,image,identify){

   Swal.fire({
    title: 'Are you sure?',
    text: "Do you want Delete?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes!'
  }).then((result) => {
    if (result.isConfirmed) {

        $.ajax({
            type: "post",
            url: "/remove-nic-ajax",
            headers: {
                'X-CSRF-TOKEN': $('meta[name=token]').attr('content')
            },
            data: {
              "_token"     : token,
              "id"  : id,
              "image"  : image,
              "identify" : identify,
            },
            cache:false,
            success: function(response) {
                if(response.success == true){
                    Swal.fire({
                        title: '',
                        text: response.message,
                        type: "success",
                        icon: 'success',
                    }).then((result) => {
                        if(identify == 'front'){
                            $("#nic-image-cropped-front").hide();
                        }else{
                            $("#nic-image-cropped-back").hide();
                        }
                       //location.reload();
                    });
                }else{
                    Swal.fire(
                        'Oops... image empty. Please try again!',
                        '',
                    'error')
                }

            },

        });

    }
});
}
