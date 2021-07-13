
let indexVideo = 0;
let courses_g = 0;
let lecture_video_g = 0;
window.onload = function(){
    $('#prev').attr('disabled', true);
    $("#video_to_play video").bind("ended", function(){
        alert("Video has finished to play... \n Click okay to load the next video");
        index = indexVideo;
        //Register the progress and load next video not continue learning
        console.log(courses_g);
        console.log("\n\n---------------------------------------------------\n\n");
        console.log(lecture_video_g);
        sendProgressVideo(lecture_video_g[indexVideo].course_id, lecture_video_g[indexVideo].id, lecture_video_g[indexVideo].topic_id);
        loadNextVideo(courses_g, lecture_video_g, index);
    });
    //setTimeout(function(){ $('#video_to_play video').trigger('play'); }, 1000);
}
function getVideos(courses, lecture_video){
    try {
        if (courses_g == 0 && lecture_video_g == 0) {            
            courses_g = courses;
            lecture_video_g = lecture_video;
            // alert(lecture_video_g);
            if($("#week_1").prop("disabled")){
                $("#week_1").attr("disabled", false);
            }
        }
    } catch (error) {
        console.log(error);
    }
}
function loadNextVideo(courses, lecture_video, index)
{
    try {
        //console.log(lecture_video[index + 1].lecture_video);        
        if ((index == indexVideo) || (indexVideo == 0)) {
            $('#prev').attr('disabled', true);
            indexVideo = indexVideo + 1;
            console.log(indexVideo);            
            if(lecture_video.length > indexVideo){
                let videoplayer = $("#video_to_play video source").attr('src', '/videos/courses/'+ lecture_video[indexVideo].course_name +'/'+ lecture_video[indexVideo].lecture_video);
                $("#video_to_play video")[0].load();
                $("#video_to_play video")[0].pause();
                console.log("Load state: "+ $("#video_to_play video")[0].readyState);
                $("#lecture_title").text(lecture_video[indexVideo].lesson_name);
            }
            else{
                $("#next").attr('disabled', true);
            }

        } else {
            indexVideo = indexVideo + 1;
            console.log(indexVideo); 
            $('#prev').attr('disabled', true);
            if(lecture_video.length > indexVideo){
                let videoplayer = $("#video_to_play video source").attr('src', '/videos/courses/'+ lecture_video[indexVideo].course_name +'/'+ lecture_video[indexVideo].lecture_video);
                $("#video_to_play video")[0].load();
                $("#video_to_play video")[0].pause();
                console.log("Load state: "+ $("#video_to_play video")[0].readyState);
                $("#lecture_title").text(lecture_video[indexVideo].lesson_name);
            }
            else{
                $("#next").attr('disabled', true);
            }
            $('#prev').attr('disabled', false);
        }
        
    } catch (error) {
        console.log(error);
    }
}
function loadPreviousVideo(courses, lecture_video){
    try {
        if (indexVideo != 0) {
            if (lecture_video.length <= indexVideo) {
                indexVideo = indexVideo - 1;
                console.log(indexVideo); 
                $("#next").attr('disabled', false);
                let videoplayer = $("#video_to_play video source").attr('src', '/videos/courses/'+ lecture_video[indexVideo].course_name +'/'+ lecture_video[indexVideo].lecture_video);
                $("#video_to_play video")[0].load();
                $("#video_to_play video")[0].pause();
                $("#lecture_title").text(lecture_video[indexVideo].lesson_name);
                if (indexVideo == 0) {
                    $('#prev').attr('disabled', true); 
                }                
            }
            else{
                if (indexVideo != 0) {
                    indexVideo = indexVideo - 1;
                    console.log(indexVideo); 
                    let videoplayer = $("#video_to_play video source").attr('src', '/videos/courses/'+ lecture_video[indexVideo].course_name +'/'+ lecture_video[indexVideo].lecture_video);
                    $("#video_to_play video")[0].load();
                    $("#video_to_play video")[0].pause();
                    $("#next").attr('disabled', false);
                    $("#lecture_title").text(lecture_video[indexVideo].lesson_name);
                    if (indexVideo == 0) {
                        $('#prev').attr('disabled', true); 
                    }
                }
            }
        }
        else{
            $('#prev').attr('disabled', true); 
        }
        
    } catch (error) {
        console.log(error);
        
    }
}
function sendProgressVideo(course_id, video_id, week_id){
    try {
        // Send the ajax request when the video has finished to play in order to track 
        // the progress of the learning, then send back the progress
        $.ajax({
            url: '/student/courses/progress',
            type: 'POST',
            dataType: 'JSON',
            beforeSend: function (xhr){
              // Let first register the CSRF_TOKEN to the header of the ajax request      
              var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
              console.log(CSRF_TOKEN);
              if(CSRF_TOKEN){
                return xhr.setRequestHeader('X-CSRF_TOKEN', CSRF_TOKEN);
              }
            },
            data:{
              'course_id': course_id,
              'lecture_video_id': video_id,
              'week_id': week_id
            },
            success: function(result){
                // When the result of the progress is sent back, then update the progress of learning
                //if (result.length > 0) {
                    console.log(result);
                //}
            },
            error:function(){ 
              alert("Error!!!!");
          }
        });
    } catch (error) {
        
    }
}