<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title"><?php echo $user->full_name;?> (<?php echo $user->sector;?>)
                <span style="float: right;"><em><?php echo $user->created_at->diffForHumans();?></em></span>
            </h4>
        </div>
        <div class="modal-body">
            <form method="post">
                <div class="form-group">
                    <h5>Full Name</h5>
                    <?php echo $user->full_name;?>
                </div>
                <div class="form-group">
                    <h5>Phone No.</h5>
                    <?php echo $user->phone_no;?>
                </div>
                <div class="form-group">
                    <h5>Email</h5>
                    <?php echo $user->email;?>
                </div>
                <div class="form-group">
                    <h4>Salary</h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group" style="padding-bottom: 5px;">
                                <h6>Basic Salary</h6>
                                <?php echo $user->basic_salary;?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <h6>Net Salary</h6>
                                <?php echo $user->net_salary;?>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="margin-top: 20px;">
                    <h4>Applied Projects (<?php echo $user->projects->count();?>)</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <?php foreach($user->projects as $userProject):?>
                                <?php $project = $userProject->project;?>
                                <tr>
                                    <td><a href="<?php echo $url->admin('projects', 'edit?id='.$project->id);?>" target="_blank"><?php echo $project->name;?></a></td>
                                </tr>
                            <?php endforeach;?>
                        </table>
                    </div>
                </div>
            </form>
        </div>
        <!--<div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>-->
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
