function validateForm() {
    var pass1 = $('#passwordTF');
    var pass2 = $('#passwordCheckTF');
    var msgText = $('#pswdCheckID');
    var sbmtBtn = $('#reg_btn_submit');

        $(document).ready(function () {
            if (pass1.val() === pass2.val()) {
                msgText.html("<b>OK:</b> Zadaná hesla jsou stejná");
                sbmtBtn.prop('disabled', false);
            } else {
                msgText.html("<b>Chyba:</b> Zadaná hesla se liší, " +
                    "zkuste proším ještě jednou.");
                sbmtBtn.prop('disabled', true);
            }
        });
}

function newSubmitValidity() {
    // var inputs = $('#regForm').getElementsByClassName("form-control");
    // var result = true;
    // for (let i = 0; i < inputs.length; i++) {
    //     if (inputs[i].val() === "") {
    //         result = false;
    //         break;
    //     }
    // }
    // if (result) {
    //     sbmtBtn.prop('disabled', false);
    //     alert("Pole jsou vyplnene");
    // } else {
    //     sbmtBtn.prop('disabled', true);
    //     alert("Pole jsou prazdne!");
    // }
    // $('#pswdCheckID').html("<b>Chyba:</b> Pole jsou prazdné.");
}