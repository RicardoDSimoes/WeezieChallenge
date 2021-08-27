<meta name="_token" content="{{csrf_token()}}">
<div class="modal fade" id="userEditModal" tabindex="-1" role="dialog" aria-
     labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="alert alert-danger" style="display: none"></div>
            <div class="modal-header">
                <h5 class="modal-title" id="demoModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-
                        label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" id="formUserEdit" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="modal-body">
                    <div class="form_group row">
                        <div class="col-sm-1"></div>
                        <label type="title" class="col-sm-4 col-form-label"> User</label>
                        <div class="col-sm-6">
                            <input type="text" name="user" class="form-control" id="user">
                            <input type="hidden" name="idUser" id="idUser">
                        </div>
                    </div>
                    <br>
                    <div class="form_group row">
                        <div class="col-sm-1"></div>
                        <label type="title" class="col-sm-4 col-form-label"> Email</label>
                        <div class="col-sm-6">
                            <input type="text" name="emailUser" class="form-control" id="emailUser">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="userUpdateSubmit">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
