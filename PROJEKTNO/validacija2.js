$(function() {

    $("form[name='registracija']").validate({
        errorClass: "error",
        rules: {
            ime: {
                required: true,

            },
            prezime: {
                required: true,

            },
            email: {
                required: true,

            },
            password1: {
                required: true,
                minlength: 5,
                maxlength: 10,

            },
            password2: {
                required: true,
                equalTo: "#password1",
            }
        },

        messages: {
            ime: {
                required: "Potrebno je upisati Vaše ime",
            },
            prezime: {
                required: "Potrebno je upisati Vaše prezime",
            },
            email: {
                required: "Potrebno je upisati email",
            },
            password1: {
                required: "Potrebno je upisati lozinku",
                minlength: "Lozinka nesmije biti manja od 5 znakova",
                maxlength: "Lozinka nesmije biti veća od 10 znakova"
            },
            password2: {
                required: "Potrebno je ponoviti lozinku",
                equalTo: "Lozinke moraju biti iste",
            }
        },

        submitHandler: function(form) {
            form.submit();
        }
    });
});