$(function () {

    $(".select2").select2({
        placeholder: {
            id: "-1",
            text: "Selecione uma opção",
        },
    });

    $(".birth_date").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    $(".rg").inputmask("99.999.999-99", {"placeholder": ""});
    $(".cpf").inputmask("999.999.999-99", {"placeholder": ""});

    $(".phone").inputmask("(99) 9999-9999", {"placeholder": ""});
    $(".cell_phone").inputmask("(99) [9]9999-9999");
    $(".zip")
        .inputmask("99999-999")
        .on('change', function () {
            var value = $(this).val();
            value = value.replace('.', '');
            value = value.replace('-', '');
            $.ajax({
                method: 'get',
                url: 'https://viacep.com.br/ws/'+value+'/json/',
                dataType: 'json',
                success: function (data) {
                    $('.city').val(data.localidade);
                    $('.street').val(data.logradouro);
                    $('.district').val(data.bairro);
                    $('.state').val(data.uf);
                },
                error: function (error) {
                    
                }
            });
        });

    if(document.querySelector(".money-br") != null) {
        VMasker(document.querySelector(".money-br")).maskMoney({
            // Decimal precision -> "90"
            precision: 2,
            // Decimal separator -> ",90"
            separator: ',',
            // Number delimiter -> "12.345.678"
            delimiter: '.',
            unit: 'R$',
        });
    }

    /*$.fn.datepicker.dates['pt-br'] = {
        days: ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado"],
        daysShort: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab"],
        daysMin: ["Do", "Se", "Te", "Qua", "Qui", "Se", "Sa"],
        months: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
        monthsShort: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
        today: "Hoje",
        clear: "Limpar",
        format: "dd/mm/yyyy",
        titleFormat: "MM yyyy", /!* Leverages same syntax as 'format' *!/
        weekStart: 0
    };

    //Date picker
    $('.datepicker').datepicker({
        container: '.datepicker-container',
        language: 'pt-br'
    });*/

    $('.birth_date').bootstrapMaterialDatePicker({
        format: 'L',
        clearButton: false,
        time: false,
        lang: 'pt-br',
    });

    $('.datepicker').bootstrapMaterialDatePicker({
        format: 'L',
        clearButton: false,
        time: false,
        lang: 'pt-br',
        minDate: new Date()
    });

    $('[data-method]').append(function(){
        var method;
        if($(this).attr('data-method') != undefined || $(this).attr('data-method') != ""){
            method = $(this).attr('data-method');
        }else{
            method = "POST";
        }
        var typeAlert = $(this).attr('data-alert');
        var message = $(this).attr('data-message');
        var name = null;
        switch (typeAlert) {
            case 'pay':
                name = "pay";
                break;
            case 'award':
                name = "award";
                break;
            case 'send_email':
                name = "send_email";
                break;
            case 'released_for_certification':
                name = "released_for_certification";
                break;
            default:
                name = "delete_item";
                break;
        }
        return "\n" +
            "<form action='" + $(this).attr('href') + "' method='POST' data-message='" + message + "' name='" + name + "' style='display:none'>\n" +
            "   <input type='hidden' name='_method' value='" + $(this).attr('data-method') + "'>\n" +
            "   <input type='hidden' name='_token' value='" + $('meta[name="_token"]').attr('content') + "'>\n" +
            "</form>\n"
    })
        .removeAttr('href')
        .attr('style', 'cursor:pointer;')
        .attr('onclick', '$(this).find("form").submit();');


    /*Generic are you sure dialog*/

    $('form[name=pay]').submit(function () {
        return confirm($(this).attr('data-message'));
    });

    $('form[name=award]').submit(function () {
        return confirm($(this).attr('data-message'));
    });

    $('form[name=delete_item]').submit(function () {
        return confirm("Tem certeza que deseja excluir esse item?");
    });

    //Método para validar o CPF
    $.validator.addMethod("isCPF", function(value, element) {
        return validateCPF(value);
    });

    $('span[href]').on('click', function() {
        window.location.href = $(this).attr('href');
    });

});