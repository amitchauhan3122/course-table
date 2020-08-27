        <title>Rest-Api</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?= base_url(); ?>assets/css/animsition.min.css">
        <link rel="icon" href="<?=base_url()?>/favicon.png" type="image/png">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/style.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <div class="container animsition">
            <h3 align="center"><?= $title; ?></h3>
            <a class="btn btn-danger" type="button" href="<?= base_url(); ?>subjects">Back to Home_page<span class="sr-only">(current)</span></a>
            <br />
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="panel-title">CRUD REST API in Codeigniter</h3>
                        </div>
                        <div class="col-md-6" align="right">
                            <button type="button" id="add_button" class="button btn btn-info btn-xs">Add</button>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <span id="success_message"></span>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="userModal" class="modal fade">
                <div class="modal-dialog">
                    <form method="post" id="user_form">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="button close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Add User</h4>
                            </div>
                            <div class="modal-body">
                                <label>Enter First Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" />
                                <span id="first_name_error" class="text-danger"></span>
                                <br />
                                <label>Enter Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" />
                                <span id="last_name_error" class="text-danger"></span>
                                <br />
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="user_id" id="user_id" />
                                <input type="hidden" name="data_action" id="data_action" value="Insert" />
                                <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
<script src="<?= base_url(); ?>assets/js/animsition.min.js"></script><br>
<script type="text/javascript" language="javascript" >
$(document).ready(function(){
    
    function fetch_data()
    {        
        $.ajax({
            url:"<?= base_url(); ?>test_api/action",
            method:"POST",
            data:{data_action:'fetch_all'},
            success:function(data)
            {
                $('tbody').html(data);
            }
        });
    }

    fetch_data();

    $('#add_button').click(function(){
        $('#user_form')[0].reset();
        $('.modal-title').text("Add User");
        $('#action').val('Add');
        $('#data_action').val("Insert");
        $('#userModal').modal('show');
    });

    $(document).on('submit', '#user_form', function(event){
        event.preventDefault();
        $.ajax({
            url:"<?php echo base_url() . 'test_api/action' ?>",
            method:"POST",
            data:$(this).serialize(),
            dataType:"json",
            success:function(data)
            {
                if(data.success)
                {
                    $('#user_form')[0].reset();
                    $('#userModal').modal('hide');
                    fetch_data();
                    if($('#data_action').val() == "Insert")
                    {
                        $('#success_message').html('<div class="alert alert-success">Data Inserted</div>');
                    }
                }

                if(data.error)
                {
                    $('#first_name_error').html(data.first_name_error);
                    $('#last_name_error').html(data.last_name_error);
                }
            }
        })
    });

    $(document).on('click', '.edit', function(){
        var user_id = $(this).attr('id');
        $.ajax({
            url:"<?php echo base_url(); ?>test_api/action",
            method:"POST",
            data:{user_id:user_id, data_action:'fetch_single'},
            dataType:"json",
            success:function(data)
            {
                $('#userModal').modal('show');
                $('#first_name').val(data.first_name);
                $('#last_name').val(data.last_name);
                $('.modal-title').text('Edit User');
                $('#user_id').val(user_id);
                $('#action').val('Edit');
                $('#data_action').val('Edit');
            }
        })
    });

    $(document).on('click', '.delete', function(){
        var user_id = $(this).attr('id');
        if(confirm("Are you sure you want to delete this?"))
        {
            $.ajax({
                url:"<?php echo base_url(); ?>test_api/action",
                method:"POST",
                data:{user_id:user_id, data_action:'Delete'},
                dataType:"JSON",
                success:function(data)
                {
                    if(data.success)
                    {
                        $('#success_message').html('<div class="alert alert-success">Data Deleted</div>');
                        fetch_data();
                    }
                }
            })
        }
    });
    $(".animsition").animsition({
        inClass: 'fade-in-left-lg',
        outClass: 'fade-out-left-lg',
        inDuration: 500,
        outDuration: 500,
        linkElement: '.animsition-link',
        // e.g. linkElement: 'a:not([target="_blank"]):not([href^="#"])'
        loading: true,
        loadingParentElement: 'body', //animsition wrapper element
        loadingClass: 'animsition-loading',
        loadingInner: '', // e.g '<img src="loading.svg" />'
        timeout: false,
        timeoutCountdown: 5000,
        onLoadEvent: true,
        browser: [ 'animation-duration', '-webkit-animation-duration'],
        // "browser" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
        // The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
        overlay : false,
        overlayClass : 'animsition-overlay-slide',
        overlayParentElement : 'body',
        transition: function(url){ window.location.href = url; }
    });
    
});
</script>
<!-- <script>
    $(document).ready(function() {
        
    });
</script>     -->