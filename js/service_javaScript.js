function validateForm() {
    var pass1 = $('#passwordTF');
    var pass2 = $('#passwordCheckTF');
    var msgText = $('#pswdCheckID');
    var sbmtBtn = $('#reg_btn_submit');

        $(document).ready(function () {
            if (pass1.val() === pass2.val()) {
                if(pass1.val() === "" || pass2.val() === ""){
                    msgText.html("<b>Chyba:</b> Pole na heslo nejsou vyplněná.");
                    sbmtBtn.prop('disabled', true);
                } else {
                    msgText.html("<b>OK:</b> Zadaná hesla jsou stejná");
                    sbmtBtn.prop('disabled', false);
                }
            } else {
                msgText.html("<b>Chyba:</b> Zadaná hesla se liší, " +
                    "zkuste proším ještě jednou.");
                sbmtBtn.prop('disabled', true);
            }
        });
}

// Funkce potrebne pro sledovani a funkcionovani tlacitka "Scroll Nahoru"
// /**
//  * Pozorovani scrolovani stranky uzivatelem
//  */
// window.onscroll(function () {
//     scrollTracking();
// })
// /**
//  * Vykonny kod pri scrolovani stranky uzivatelem.
//  * Skryvani nebo ukazani tlacitka "Nahoru"
//  */
// function scrollTracking() {
//     if (document.documentElement.scrollTop > 50) {
//         document.getElementById("scrl_tT_Btn").style.display = "block";
//     } else {
//         document.getElementById("scrl_tT_Btn").style.display = "none";
//     }
// }
//
// /**
//  * Samotne scrolovani nahoru
//  */
// function scrollToTop() {
//     document.documentElement.scrollTop = 0;
// }

