<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js" defer></script>
<script>

    $(document).ready(function(){

        //get data from UserController to fill the User's table
        $('#users').DataTable({
            "bPaginate": false, //remove pagination for aesthetic reasons
            "bInfo": false,
            search: true, // enable Search field
            ajax:{
                url:"/users",
            },
            columns:[
                {data:'id'},
                {data:'name'},
                {data:'email'},
                {data:'created_at'},
                {data:'updated_at'},
                {data:'action'},
                {data:'delete'},
            ]
        });

        //When edit button it's clicked
        $(document).on('click', '.edit', function(){
            var table = $('#users').DataTable(); //get Table info
            $tr = $(this).closest('tr');
            var data = table.row($tr).data(); //get the clicked row
            console.log(data);

            //add the user's values into modal's form
            $('#idUser').val(data['id']);
            $('#user').val(data['name']);
            $('#emailUser').val(data['email']);

            //open edit's modal.
            $('#userEditModal').modal('show');

        });

        //when submit button into edit's modal it's clicked
        jQuery('#userUpdateSubmit').click(function(e){
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN' : $('meta[name="_token"]').attr('content')
                }
            });

            //jquery to controller's update function
            var url = '/users/' + $('#idUser').val();
            jQuery.ajax({
                url: url,
                type:'PATCH',
                cache:'false',
                _token:'{{csrf_token()}}',
                data:{
                    id: jQuery('#idUser').val(),
                    user: jQuery('#user').val(),
                    email: jQuery('#emailUser').val(),
                },
                success: function (result){
                    if(result.errors)
                    {
                        jQuery('.alert-danger').html('');

                        jQuery.each(result.errors, function(key, value){
                            jQuery('.alert-danger').show();
                            jQuery('.alert-danger').append('<li>'+value+'</li>');
                        });
                    }
                    else{
                        jQuery('.alert-danger').hide();
                        location.reload();
                        $('#userEditModal').modal('hide');
                    }
                }});
        });

        //when delete button clicked
        $(document).on('click', '.delete', function(){
            var table = $('#users').DataTable();
            var token = $("meta[name='csrf-token']").attr("content");
            $tr = $(this).closest('tr');
            var data = table.row($tr).data();
            console.log(data);

            //pop up with button to confirm.
            if(confirm("Do you really want to remove this user?")){

                //query to destroy controller function
                jQuery.ajax({
                    url: "users/" + data['id'],
                    type:'DELETE',
                    data:{
                        "_token": token,
                    },
                    success: function(){
                        location.reload();
                    }
                    });
            }
        })
    });

</script>
@include('auth.editModal')
