$(document).ready(function() {

    $('#add_rapport_form').validate({
        rules: {
            titreR: {required: true,},
            commission_id: {required: true},
            categorieR: {required: true},
            description: {required: true},
            titreR: {required: true},
            PDF: {required: true},
            image: {
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

            var form_data = new FormData($("#add_rapport_form")[0]);

            $.ajax({
                url: '/admin/rapport',
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

                        let table = $('#example').DataTable();

                        $("#exampleModal").modal('hide');

                        table.row.add(
                            $(
                                '<tr id="rowId' + response.id +'">' +
                                '<td>' + ((table.data().count() / 7 ) + 1 ) + '</td>' +
                                '<td>' +$('#categorieR').val() + '</td>' +
                                '<td>' +$('#titreR').val() + '</td>' +
                                '<td>' +$('#description').val() + '</td>' +
                                '<td>' +$('#commission_id option:selected').text() + '</td>' +
                                '<td>' +$('#datePub').val() + '</td>' +
                                '<td>' +
                                    '<form action="rapport/' + response.id +'" method="POST">' +
                                    '<a href="' + $('#url').val() +'/admin/rapport/' + response.id +'/edit" class="btn btn-primary1" >Modifier</a>\n' +
                                    '<a href="' + $('#url').val() +'/storage/PDFrapport/' + response.path+ '" class="btn btn-warning" >Télécharger</a>' +
                                    '<button type="button" class="btn btn-danger" onclick="delete_element( \'/admin/rapport/' + response.id +'\',' + response.id + ', \'yes\')">' +
                                    'Supprimer' +
                                    '</button>' +
                                    '</form>' +
                                '</td>' +
                                '</tr>'
                            )
                        ).draw();

                        $('#titreR').val('');
                        $('#datePub').val('');
                        $('#categorieR').val('');
                        $('#description').val('');
                        $('#commission_id').prop('selectedIndex',0);

                        swal({
                            title: 'Insertion réussite',
                            text: 'Le rapport a été correctement ajoutée',
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
