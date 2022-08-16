function delete_element(url, id, datatable)
{
    swal({
        title: `Voulez-vous vraiment supprimer cet élément?`,
        text: "Si vous le supprimez, il disparaîtra pour toujours.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: url,
                    method: "POST",
                    data: {
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                        '_method':'DELETE',
                        id: id
                    },
                    success: function(resp){
                        let title = 'Suppression réussite';
                        let message = 'l\'élement a été correctement supprimé'
                        let icon = 'success';

                        if(resp.success === 'yes')
                        {
                            if( datatable === 'yes')
                            {
                                let nRow = $('#rowId'+id);

                                table = $('#example').dataTable();

                                table.fnDeleteRow( nRow, null, true );
                            }
                            else
                            {
                                $('#rowId'+id).remove();
                            }


                        }
                        else
                        if(resp.success === 'no')
                        {
                            title = 'Suppression impossible';
                            message = resp.error_message;
                            icon = 'info';

                        }

                        swal({
                            title: title,
                            text: message,
                            icon: icon,
                            buttons: true,
                            dangerMode: false,
                        })
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        swal({
                            title: 'Erreur',
                            text: "Erreur lors de la récupération des donnés",
                            icon: "error",
                            buttons: true,
                            dangerMode: false,
                        })
                    }
                })
            }
        });

}

$(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
});
