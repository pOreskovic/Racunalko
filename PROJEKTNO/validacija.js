$(function() {

    $("form[name='prijava']").validate({
        errorClass: "error",
        rules: {

            email: {
                required: true,

            },
            password: {
                required: true,

            },
        },

        messages: {
            email: {
                required: "Potrebno je upisati email",
            },
            password: {
                required: "Potrebno je upisati lozinku",
            },
        },

        submitHandler: function(form) {
            form.submit();
        }
    });
});