jQuery(function(n){n(document).on("nfFormReady",function(){n(".footer-wrap .nf-form-cont .submit-container input[type=button]").hide(),n(".footer-wrap .nf-form-cont input:not([type=button])").keypress(function(t){13===t.keyCode&&n(".nf-form-cont .submit-container input[type=button]").click()})})});