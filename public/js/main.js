window.onload = () => {
    $("#go_to_main").click(function(){
        try {
            $("#primary").css("display", "block");
            $("#secondary").css("display", "none");
            $(".weekSetting").attr("disabled", false);
        } catch (error) {
           console.log(error); 
        }
    });
};

function weekSetting(course_id, week_id){
    try {
        //if ($("#setting"+ week_id).text() == "Week Settings") {
            $("#primary").css("display", "none");
            $("#secondary").css("display", "block");

            $("#setting"+ week_id).attr("disabled", true);
            $("#setting_week_id").val(week_id);
        // } else {
        //     $("#primary").css("display", "block");
        //     $("#secondary").css("display", "none");
        //     $("#setting"+ week_id).text("Week Settings");
        // }
        
    } catch (error) {
        console.log(error);
    }
}

   
