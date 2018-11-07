function validate() {

    var x = document.getElementById("btn-submit");
    x.removeAttribute("disabled");


    // var valid = false;
    // //valid = checkEmpty("loginTF");
    //
    // if(valid) {
    //     $("#btn-submit").attr("disabled",true);
    // } else {
    //     $("#btn-submit").attr("disabled",false);
    // }
}

function validatePswrds() {
    return false;
}
function checkEmpty(obj) {
    if (document.getElementById(obj)) {
    //if($(obj).val() == "") {
        return true;
    } else {
        return false;
    }
}
function checkEmail(obj) {
    var result = true;

    var email_regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,3})+$/;
    result = email_regex.test($(obj).val());

    if(!result) {
        return false;
    }
    return result;
}