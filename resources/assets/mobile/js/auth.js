$(function () {
    $('.mobile-auth').validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                minlength: true,
            }
        },
        messages: {
            password: {
                required: 'Campo Obrigatório',
                minlength: 'Informe a senha com no mínimo 6 carácteres'
            },
            email: {
                required: 'Campo Obrigatório',
                email: 'Informe um e-mail válido',
            }
        },
        highlight: function (input) {
            console.log(input);
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.input-group').append(error);
            $(element).parents('.form-group').append(error);
        }
    });

    $('.mobile-auth-create').validate({
        rules: {
            terms: {
                required: true
            },
            name: {
                required: true
            },
            password: {
                required: true,
                minlength: 6,
            },
            password_confirmation: {
                equalTo: '[name="password"]',
                minlength: 6,
                required: true
            },
            email: {
                required: true,
                email: true,
            }
        },
        messages: {
            name: {
                required: 'Campo Obrigatório'
            },
            password: {
                required: "Campo Obrigatório",
                minlength: "Informe a senha com no mínimo 6 carácteres",
            },
            terms: {
                required: 'Campo Obrigatório'
            },
            password_confirmation: {
                minlength: 'Informe a senha com no mínimo 6 carácteres',
                required: 'Campo Obrigatório',
                equalTo: 'O campo confirme a senha deve ser igual a senha informada'
            },
            email: {
                required: 'Campo Obrigatório',
                email: 'Informe um e-mail válido',
            }
        },
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.input-group').append(error);
            $(element).parents('.form-group').append(error);
        }
    });
});