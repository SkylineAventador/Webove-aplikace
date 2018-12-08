function validateForm() {
    //alert($('#passwordTF').val());
        $(document).ready(function () {
            if ($('#passwordTF').val() === $('#passwordCheckTF').val()) {
                $('#pswdCheckID').html("<b>OK:</b> Zadaná hesla jsou stejná");
            } else {
                $('#pswdCheckID').html("<b>Chyba:</b> Zadaná hesla se liší, " +
                    "zkuste proším ještě jednou.");
            }
        })
}