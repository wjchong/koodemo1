$('#member-registration').submit(function(){
    check = $("#confirm").prop("checked");
    if($('#member-registration').valid()==true){
        if (!check) {
            e.preventDefault();
            alert('By signing up, I agree to BlockChange Terms of Services, and Privacy Policy.');
            $("#confirm").focus();
            return false;
        }

        if(grecaptcha.getResponse() == "") {
            alert("You can't proceed. Check your Recaptcha...");
            return false;
        }
        $('#pshoBtn').attr('disabled' , true);
        $('#pshoBtn').html('<i class="fa fa-refresh fa-spin" style="color:#fff"></i>');
        return true;
    }else{
        return false;
    }
});

$('#member-login').submit(function(){
    if($('#member-login').valid()==true){
        $('#pshoBtnl').attr('disabled' , true);
        $('#pshoBtnl').html('<i class="fa fa-refresh fa-spin" style="color:#fff"></i>');
        return true;
    }else{
        return false;
    }
});

$('#member-profile').submit(function(){
    if($('#member-profile').valid()==true){
        $('#profileBtn').attr('disabled' , true);
        $('#profileBtn').html('<i class="fa fa-refresh fa-spin" style="color:#fff"></i>');
        return true;
    }else{
        return false;
    }
});

$('#member-forget').submit(function(){
    if($('#member-forget').valid()==true){
        $('#frgPswd').attr('disabled' , true);
        $('#frgPswd').html('<i class="fa fa-refresh fa-spin" style="color:#fff"></i>');
        return true;
    }else{
        return false;
    }
});

$('#member-resetPswd').submit(function(){
    if($('#member-resetPswd').valid()==true){
        $('#rstPswd').attr('disabled' , true);
        $('#rstPswd').html('<i class="fa fa-refresh fa-spin" style="color:#fff"></i>');
        return true;
    }else{
        return false;
    }
});

$('#member-profile-update').submit(function(){
    if($('#member-profile-update').valid()==true){
        $('#prfBtn').attr('disabled' , true);
        $('#prfBtn').html('<i class="fa fa-refresh fa-spin" style="color:#fff"></i>');
        return true;
    }else{
        return false;
    }
});

$('#member-password-update').submit(function(){
    if($('#member-password-update').valid()==true){
        $('#pswdBtn').attr('disabled' , true);
        $('#pswdBtn').html('<i class="fa fa-refresh fa-spin" style="color:#fff"></i>');
        return true;
    }else{
        return false;
    }
});


