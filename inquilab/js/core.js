function loginstudent(){
    var email = $('#email').val();
    var password = $('#password').val();
    console.log(email);
    $.ajax({
        type: "POST",
        url: "http:/inquilab/helper.php?submitType=loginstudent",
        data: "email="+email+"&password="+password, 
        
        beforeSend: function() {
            $('.formResult').html('Processing....');
            console.log("inside");
            },
        success: function(html) {
            $('.formResult').html(html);
        }
    });
}


function loginassociate(){
    var username = $('#username').val();
    var password = $('#apassword').val();
    console.log(password);
    console.log(username);
    $.ajax({
        type: "POST",
        url: "http:/inquilab/helper.php?submitType=loginassociate",
        data: "username="+username+"&password="+password, 
        
        beforeSend: function() {
            $('.formResult').html('Processing....');
            console.log("inside");
            },
        success: function(html) {
            $('.formResult').html(html);
        }
    });
}