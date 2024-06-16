// $(document).ready(function() {
   
//     $('#register-agent-form').submit(function(event) {
//         var phoneInput = $('#add_contact_no').val();
//         var phoneRegex = /^0\d{9}$/;

//         if (!phoneRegex.test(phoneInput)) {
//             if (phoneInput.length > 0) {
               
//                 if(phoneInput.charAt(0)!=0)
//                     {
//                       $('#phoneError').text('Phone number should be start 0 digit');

//                     }
//                     else{
//                       $('#phoneError').text('Please enter a valid 10-digit phone number.');

//                     }
//             }
//             event.preventDefault();
//         } else {
//             $('#phoneError').text('');
//             loader();
//         }
//     });
// });


// function phonevalodation(){
//     var phoneInput = $('#add_contact_no').val();
//     var phoneRegex = /^0\d{9}$/;

//     if (!phoneRegex.test(phoneInput)) {
//         if (phoneInput.length > 0) {
           
//             if(phoneInput.charAt(0)!=0)
//                 {
//                   $('#phoneError').text('Phone number should be start 0 digit');

//                 }
//                 else{
//                   $('#phoneError').text('Please enter a valid 10-digit phone number.');

//                 }
//         }
       
//     } else {
//         $('#phoneError').text('');
        
//     }
// }



$("#agent-table")
    .DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "pdf", "print"],
    })
    .buttons()
    .container()
    .appendTo("#agent-table_wrapper .col-md-6:eq(0)");

function updateAgent(div) {
    Swal.fire({
        title: "Are you sure?",
        text: "Do you want edit this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, edit it!",
    }).then((result) => {
        if (result.isConfirmed) {
            var agent = JSON.parse($(div).attr("data-agent"));
            var modal = $("#edit-agent");
            modal.find('[name="id"]').val(agent.id);
            modal.find('[name="edit_name"]').val(agent.name);
            modal.find('[name="edit_email"]').val(agent.email);
            modal.find('[name="edit_contact_no"]').val(agent.contact_no);

            modal
                .find('[name="is_active"]')
                .val(agent.is_active)
                .trigger("change");
            modal.modal("show");
            validationEditAgent();
        }

    });

}

function validationEditAgent(){
   
    $("#edit-agent-register-form").validate({
        errorPlacement: function(error, element) {
            element.closest("div.form-group").append(error);
        },
        rules: {
            edit_name: {
                required: true,
                maxlength:255

            },
            edit_email: {
                required: true,
                maxlength:255,
                email:true

            },
            edit_contact_no: {
                required: true,
                maxlength:25

            },
            is_active: {
                required: true
            },
        },
        errorClass: "text-danger",
    });
}
