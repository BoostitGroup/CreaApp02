$(document).ready(function() {

    $('#add_commission_form').validate({
        rules: {
            type: {required: true,},
            secteur: {required: true}
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

            var form_data = $(form).serialize();

            $.ajax({
                url: '/admin/commission',
                type:"POST",
                data:form_data,
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
                                    '<td>' + ((table.data().count() / 4 ) + 1 ) + '</td>' +
                                    '<td>' +$('#type option:selected').text() + '</td>' +
                                    '<td>' +$('#secteur').val() + '</td>' +
                                    '<td>' +'<button type="button" class="btn btn-danger" '  +
                                            'onclick="delete_element( \'/admin/commission/' + response.id +'\',' + response.id + ', \'yes\')">\n' +
                                            'Supprimer <i class="fa fa-trash"></i>\n' + '</td>' +
                                    '</button>' +
                                '</tr>'
                            )
                        ).draw();

                        $('#secteur').val('');
                        $('#type').prop('selectedIndex',0);

                        swal({
                            title: 'Insertion réussite',
                            text: 'La commission a été correctement ajoutée',
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
