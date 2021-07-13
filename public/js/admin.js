function updateAccounts(url_link){
    $('#row_profile').hide();
    $('#edit_acc').show();
    //
    console.log(url_link);
      $.ajax({
          url: url_link,
          type: "GET", 
          dataType: 'JSON',
          success: function(result){
             console.log(result);
             $('#name').val(result.name);
             $('#phone').val(result.phone);
             $('#email').val(result.email);
             $('#account_type').val(result.account_type);
             $('#password').val(result.password);
             $('#user_id').val(result.id);
          }
    });
}
function deleteAccount(id){
  //$('#edit_acc').show();
  console.log(id);
    $.ajax({
      url: '/admin/accounts/delete/'+ id,
      type: "GET",
      dataType: 'JSON',
      success: function(result){
        if ((result['status']) == "true") {
          console.log(result);          
          window.location.reload();
        }
      }
    });
}
function viewAccount(id){
  $('#edit_acc').hide();
  $('#row_profile').show();
  console.log(id);
    $.ajax({
      url: '/admin/accounts/view/'+ id,
      type: "GET",
      dataType: 'JSON',
      success: function(result){
        console.log(result);
        $("#user_id").val(result.id)
        $("#username").val(result.name);
        $("#email_").val(result.email);
        $("#phone_number").val(result.phone);
        $("#account_type_").val(result.account_type);
        $("#password_").val(result.password);
        if(result.profile != "profile"){
          $("#img_profile").attr('src', "/images/users/"+ result.profile);
         
        }
        else{
          //tknlb9.jpeg
          $("#img_profile").attr('src', "/images/tknlb9.jpeg");
         
        }
       
        
      }
    });
}
//Show course details and add new materials for the courses
function courseDetailsAdmin(course_id){
  // try {
  //   //event.preventDefault(); sort();
  //   // Let then send the ajax request to get all the teachers 
  //   $.ajax({
  //     url: '/admin/courses/course_materials?course_id='+ course_id,
  //     type: 'GET',
  //     dataType: 'JSON',
  //     success: function(result){      
  //         console.log(result);
  //         setTeacherOnList(result, course_id);
  //        //this.abort();
         
  //     },
  //     error:function(){ 
  //       alert("Error!!!!");
  //   }
  // });
    
  // } catch (error) {
    
  //}
}
// Submit the subtopic 
function sendFormData(id){
  // Getting the values from the input and Creating the Laravel Token
  topicName = $("#topic_name").val();
  firstSubtopicName = $("#first_subtopic").val();
  secondSubtopicName = $("#second_subtopic").val();
  thirdSubtopicName = $("#third_subtopic").val();
  
  //console.log($("#_token").val());
  //
  if((topicName.length > 0) && (firstSubtopicName.length > 0) && (secondSubtopicName.length > 0)
    && (thirdSubtopicName.length > 0)){
      console.log("Please wait...");
      
      // Let then send the ajax request to create our topics and subtopics
      $.ajax({
        url: '/admin/courses/create_topics',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function (xhr){
          // Let first register the CSRF_TOKEN to the header of the ajax request      
          // determining the token
          var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
          console.log(CSRF_TOKEN);
          if(CSRF_TOKEN){
            return xhr.setRequestHeader('X-CSRF_TOKEN', CSRF_TOKEN);
          }
        },
        data:{
          'course_id': id,
          'topic_name': topicName,
          'first_subtopic': firstSubtopicName,
          'second_subtopic': secondSubtopicName,
          'third_subtopic': thirdSubtopicName
        },
        success: function(result){
            console.log(result);
            $("#topic_name").val("");
            $("#first_subtopic").val("");
            $("#second_subtopic").val("");
            $("#third_subtopic").val("");
           //this.abort();
           
        },
        error:function(){ 
          alert("Error!!!!");
      }
    });
    //if(){        
     
    //}
  }
  
}
function addNewSubtopicForm(){
  $('#subtopic_new').add(``);
}
function getTeachers(course_id){
  try {
    //event.preventDefault(); sort();
    // Let then send the ajax request to get all the teachers 
    $.ajax({
      url: '/admin/courses/teachers',
      type: 'GET',
      dataType: 'JSON',
      success: function(result){      
          console.log(result);
          setTeacherOnList(result, course_id);
         //this.abort();
         
      },
      error:function(){ 
        alert("Error!!!!");
    }
  });
    
  } catch (error) {
    
  }
}
// Get student to be assgnied to courses
function getStudents(){
  try {
    
  } catch (error) {
    
  }
}
function setTeacherOnList(data, course_id){
  let dataList = "";
  $("#teacher_list").empty();
  if(data.length > 0){
    for (let i = 0; i < data.length; i++) {
      // Set values on the list
      $("#teacher_list").append(`<li onclick="event.preventDefault(); assignTeacherToCourse('/admin/courses/assign/`+ data[i].id +`?course_id=`+ course_id +`');"target="_blank" rel="noopener noreferrer" style="background: #f8f9fa; cursor: pointer;" class="list-group-item d-flex justify-content-between align-items-center teacher-link">
        <span class="text-lg">`+ data[i].name +`</span>
          <small class="text-secondary">`+ data[i].account_type +`</small>
      </li>`);
      
    }
    //$("a").removeAttr('href');
    $('.teacher-link').removeAttr('href');
  }
}
function assignTeacherToCourse(link){
  console.log(link);
  try {
    $.ajax({
      url: link,
      type: 'GET',
      dataType: 'JSON',
      success: function(result){      
        console.log(result);
          //setTeacherOnList(result, course_id);
         //this.abort();
        $('#form').modal('toggle');
        window.location.reload();
      },
      error:function(){ 
        alert("Error!!!!");
    }
    });
    
  } catch (error) {
    
  }
}