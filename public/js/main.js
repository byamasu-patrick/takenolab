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
    $("#assignment").click(function(){
        try {
            $(".materials").css("display", "none");
            $(".assignment").css("display", "block");
            //$(".weekSetting").attr("disabled", false);
        } catch (error) {
           console.log(error); 
        }
    });
    $("#material_cont").click(function(){
        try {
            $(".materials").css("display", "block");
            $(".assignment").css("display", "none");
            //$(".weekSetting").attr("disabled", false);
        } catch (error) {
           console.log(error); 
        }
    });
    // Dynamically add questions and answers to the fields
    //add_answers();
    add_questions();

};
function add_answers(addAnswerButton, answersWrapper, remove_button, id){
    let counter = 1;
    let maxAnsField = 5;
    let answerHTML = `
        <div class="row">
            <div class="form-check form-switch" style="max-width: 20%; margin-left: 15px; margin-bottom:5px; float: left;">
                <input class="form-check-input" name="correctAnsw`+ id +`" style="background-color: rgb(109, 130, 74);" type="radio" id="correctAnsw">
                <label class="form-check-label" style="color: rgb(109, 130, 74);font-size: 10px; margin-right: 5px; margin-left: 3px;" for="correctAnsw">Correct Ans</label>
            </div>
            <input type="text" style="max-width: 70%; margin-bottom:5px; float: left;" class="form-control" name="answers`+ id +`[]" value="" placeholder="Write answers here..."/>
            <a href="javascript:void(0);" style="max-width: 8%;  float: left;" class="`+ remove_button +`"><span class="fa fa-times" style="margin-right: 4px; color: rgb(109, 130, 74); font-size: 22px; margin-left: 10px;"></span></a>
        </div>
    `;       
    $("."+ addAnswerButton).click(function(){
        if (counter < maxAnsField) {
            //alert(counter);
            $("."+ answersWrapper).append(answerHTML);
            counter++;
        }
    });
    $("."+ answersWrapper).on('click', '.'+ remove_button, function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        counter--; //Decrement field counter
    });
    return;
}
function add_questions(){
    let counter = 1;
    let maxQuesFields = 16;
    try {        
        let addQuestions = $(".add_question");
        $(addQuestions).click(function(){
            if (counter < maxQuesFields) {
                let questionsHTML=`<div class="row border" id="question_rem`+ counter +`" style="padding: 10px; height: auto; margin-bottom: 15px;">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-9"><label for="description" style="margin-top: 10px;">Please insert questions here</label></div>
                            <div class="col-3 remove_question`+ counter +`"><a href="javascript:void(0);" style="float: right;"><span class="fa fa-times" style="margin-right: 4px; color: rgb(109, 130, 74); font-size: 22px; margin-left: 10px;"></span></a></div>
                        </div>
                        <textarea class="form-control border" style="" name="questions[]" id="questions" rows="4" placeholder="Write down the question here"></textarea><br><hr>
                        <small>Click on the below button to add answers, and select the correct answer between multiple possible answer</small><br>
                        <div class="form-group answers`+ counter +`" style="max-width: 100%; margin-bottom: 10px; padding-top: 10px;">
                        
                        </div>
                        <a style="float: right; margin-top: 15px; margin-right: 20px; border: 1px solid rgb(109, 130, 74); border-radius: 3px; text-decoration: none; cursor: pointer; padding: 5px; font-size: 12px; color: rgb(109, 130, 74);" href="javascript:void(0);" class="add_answer`+ counter +`" title="Add Answers"><span class="fa fa-plus" style="margin-right: 4px;"></span>Add Answers</a>
                    </div><hr>
                    </div>`;
                $(questionsHTML).insertBefore(".questionBef");
                $(".remove_question"+ counter).click(function(e){
                    e.preventDefault();
                    $("#question_rem"+ counter).remove(); //Remove field html
                    counter--; //Decrement field counter
                });  
                add_answers('add_answer'+ counter , 'answers'+ counter, 'remove_question'+ counter, counter);     
                              
                counter++;        
            }
        });
        
    } catch (error) {
        
    }
}
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

   
