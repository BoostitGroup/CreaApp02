$(document).ready(function() {

    $('#add_evenement_form').validate({
        rules: {
            titreE: {required: true,},
            description: {required: true},
            categorieE: {required: true},
            description: {required: true},
            dateD: {required: true},
            dateF: {required: true},
            heureD: {required: true},
            heureF: {required: true},
            typeE: {required: true},
            localisation: {required: true},
            logo: {
                required: true,
                extension: "jpg|jpeg|png|ico|bmp"
            }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },
        submitHandler: function (form) {

            var form_data = new FormData($("#add_evenement_form")[0]);

            $.ajax({
                url: '/admin/evenement',
                type:"POST",
                data:form_data,
                processData: false,
                contentType: false,
                success:function(response){

                    if ($.type(response) === "string")
                    {
                        response = $.parseJSON(response);
                    }
                    if(response.success == 'ok')
                    {

                        $("#exampleModal").modal('hide');
                        $("#emoptydiv").hide();

                        $('#list-evenement').prepend(
                            '<div class="col-6" id="rowId' + response.id + '" style="text-align: center"> ' +
                                '<strong>' + $('#titreE').val() +'</strong>' +
                                    '<div> ' +
                                        '<img src="' + $('#url').val() + '/images/imagesEvenements/' + response.logo + ' " style="max-width:500px; margin:10px;"> ' +
                                    '</div>' +
                                '<strong>Catégorie de l\'évènement: </strong>'+ $('#categorieE option:selected').text() +'\n' +
                                '<br><strong>Description: </strong>'+ $('#description').val() +'\n' +
                                '<br><strong>Commission: </strong>'+ $('#commission_id option:selected').text().replace('-',' ') + '\n' +
                                '<br><strong>Type d\'évènement: </strong>'+ $('#typeE option:selected').text() +'\n' +
                                '<br><strong><i class="fas fa-map-marker-alt fa-1x" style="color:#FFD02A;"></i></strong> ' + $('#localisation').val() + '\n' +
                                '<br><strong><i class="fas fa-calendar-alt fa-1x" style="color:#FFD02A;"></i></strong> Du' + $('#dateD').val() + ' au ' + $('#dateF').val() + '\n' +
                                '<br><strong><i class="fas fa-clock fa-1x" style="color:#FFD02A;"></i></strong> De' + $('#heureD').val() + ' à ' + $('#heureF').val() + '\n' +

                                '<div>' +
                                    '<form action="evenement/' + response.id + '" method="POST">' +
                                        '<a href="' + $('#url').val() +'/admin/evenement/' + response.id +'/edit" class="btn btn-primary1" >' +
                                            '<i class="fa fa-edit"></i>' +
                                        '</a>' +

                                        '<button type="button" class="btn btn-danger" onclick="delete_element(  \'/admin/evenement/' + response.id +'\', ' + response.id + ', \'no\')">\n' +
                                            '<i class="fa fa-trash"></i>\n' +
                                        '</button>' +
                                    '</form>' +
                                '</div>' +
                            '</div>'

                        );

                        $('#titreE').val('');
                        $('#description').val('');
                        $('#dateD').val('');
                        $('#dateF').val('');
                        $('#heureD').val('');
                        $('#heureF').val('');
                        $('#typeE').val('');
                        $('#localisation').val('');
                        $('#logo').val('');
                        $('#categorieE').prop('selectedIndex',0);
                        $('#typeE').prop('selectedIndex',0);

                        swal({
                            title: 'Insertion réussite',
                            text: 'L\'évenement a été correctement ajoutée',
                            icon: 'success',
                            buttons: true,
                            dangerMode: false,
                        })
                    }
                },
                error: function(error) {

                    swal({
                        title: 'Erreur',
                        text: "Erreur lors de la récupération des donnés",
                        icon: "error",
                        buttons: true,
                        dangerMode: false,
                    })
                }
            });



        }
    });


});
