function enableEditAcount(){
    if($('#enable_button').text() == "Disable Editing"){
        $( "#username" ).prop( "disabled", true );
        $( "#email" ).prop( "disabled", true );
        $( "#phone_number" ).prop( "disabled", true );
        $( "#edit_button" ).prop( "disabled", true );
        $( "#password" ).prop("disabled", true);
        $('#enable_button').text('Enable Editing');
    }
    else{        
        $( "#username" ).prop( "disabled", false );
        $( "#email" ).prop( "disabled", false );
        $( "#phone_number" ).prop( "disabled", false );
        $( "#edit_button" ).prop( "disabled", false );
        $( "#password" ).prop("disabled", false);
        $('#enable_button').text('Disable Editing');

    }
    //$("#username").removeProp('disabled');
    //$("input").attr('disabled','enabled');
    return;
}
function changeButtonState(){
    if($('#profile').val().length > 0){        
        $('#change_profile_button').prop('disabled', false);
    }
    else{
        $('#change_profile_button').prop('disabled', true);
    }
}
function weekSetting(course_id, week_id){
    try {
        $("#primary").css("display", "none");
        $("#secondary").css("display", "block");
    } catch (error) {
        console.log(error);
    }
}