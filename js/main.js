$(function(){
 //To the user registration
 $("#regsubmit").click(function(){
     var name = $("#name").val();
     var username = $("#username").val();
     var password = $("#password").val();
     var email = $("#email").val();
     var dataString='name='+name+'&username='+username+'&password='+password+'&email='+email;
     $.ajax({
       type:"POST",
       url:"getregister.php",
       data:dataString,
       success:function(data){
          $("#result").html(data);
       }
     });
     return false; 
 });

  //To the user Login
 $("#loginsubmit").click(function(){
     var email = $("#email").val();
     var password = $("#password").val();
     var dataString='email='+email+'&password='+password;
     $.ajax({
       type:"POST",
       url:"getlogin.php",
       data:dataString,
       success:function(data){
          if ($.trim(data)=="empty") {
              $(".empty").show();
              setTimeout(function(){
               $(".empty").fadeOut();
              },3000);
          } else if($.trim(data)=="disabled"){
               $(".disabled").show();
               setTimeout(function(){
               $(".disabled").fadeOut();
              },3000);
          }else if($.trim(data)=="error"){
               $(".error").show();
               setTimeout(function(){
               $(".error").fadeOut();
              },3000);
          }else{
            window.location="exam.php";
          }
       }
     });
     return false; 
 });
});