$(function () {
    var Home = function(){
        this.init();
    };

    Home.prototype.init = function(){

    };

    Home.prototype._showBoxesOpen = function(id) {
        $.ajax({
            method: 'get',
            url: '/mobile/boxes/all_instalments_month/'+id,
            data: {},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {

            },
            success: function (data) {
                //Transformando a blade em objeto jquery
                data = $(data);
                $(data).modal('hide')
                //Adicionando o modal ao body
                $("body").append(data);
                //Ativando o modal
                $(data).modal('toggle');

                if ($(".modal-backdrop").length > 1) {
                    $(".modal-backdrop").not(':first').remove();
                }

                //Evento disparado ao esconder o modal
                $(data).on('hidden.bs.modal', function (e) {
                    $(this).remove();
                });
            },
            error: function (error) {

            }
        });
    };

    window.Home = new Home;
});