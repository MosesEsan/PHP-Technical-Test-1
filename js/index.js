/**
 * Created by mosesesan on 24/03/15.
 */

$(document).ready(function() {

    // submit the form
    $('form').submit(function(e) {

        // Get the forms data
        var name = $('input[name=name]').val();
        var email = $('input[name=email]').val();
        var phoneNumber = $('input[name=phoneNumber]').val();
        var city = $('input[name=city]').val();


        //Create the Data JSON object to be sent to the server
        var formData = { 'name':name, 'email': email, 'phoneNumber' : phoneNumber, 'city': city};

        // submit the form
        var formURL = $(this).attr("action");
        $.ajax({
                url : formURL,
                type: "POST",
                data : formData,
                dataType: 'json',
                success:function(data, textStatus, jqXHR){

                    console.log(data);

                    var errors = data.errors;

                    // if the success index does not have a true value, handle the errors
                    if (!data.success)
                    {
                        if (errors.name) displayError("name", errors.name);
                        else clearError("name");

                        if (errors.email) displayError("email", errors.email);
                        else clearError("email");

                        if (errors.phoneNumber) displayError("phoneNumber", errors.phoneNumber);
                        else clearError("phoneNumber");

                        if (errors.city) displayError("city", errors.city);
                        else clearError("city");

                    } else {
                        // Show the success message!
                        $('#add-user-form').append(
                            '<div class="alert alert-success">' +
                                'New User Added Successfully' +
                            '</div>'
                        );

                        $('#usersTable').append(
                            "<tr>" +
                                "<td>"+formData['name']+"</td>" +
                                "<td>"+formData['email']+"</td>" +
                                "<td>"+formData['phoneNumber']+"</td>" +
                                "<td>"+formData['city']+"</td>" +
                            "</tr>"
                        );

                        //reset the form
                        resetForm();
                    }
                },error: function(jqXHR, textStatus, errorThrown){
                //if fails
                }
            });

        e.preventDefault(); //Prevent default form action
    });

    //Filter rows
    var $rows = $('#usersTable tr');
    $('#filterCity').keyup(function() {
        var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

        $rows.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });

    /**** Helper Functions ***/
    function displayError(field, message)
    {
        // display the error message
        $('#'+field+'-group').addClass('has-error');
        $('#'+field+'-error').html(message);
    }

    function clearError(field)
    {
        $('#'+field+'-group').removeClass('has-error');
        $('#'+field+'-error').html("");
    }

    function resetForm()
    {
        //Reset all the values in the input boxes
        var $inputs = jQuery('#add-user-form :input');
        $('input').each(function(index,data) {
            $(this).val("");
        });

        //Remove all error messages
        $('.form-group').each(function(index,data) {
            $(this).removeClass('has-error');
        });

        $('.help-block').each(function(index,data) {
            $(this).html("");
        });
    }
});


/*Retired Code
//Validate the Data
if (name.length > 0 && email.length > 0 && city.length > 0)
{}else{
 alert("Please make sure you fill all required fields.")
}
*/