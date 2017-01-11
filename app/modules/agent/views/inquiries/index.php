<h1>Inquiries (<?php echo $users->count();?>)</h1>
<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone No.</th>
                    <th>Email</th>
                    <th>Salary (RM)</th>
                    <th>Time</th>
                    <th></th>
                </tr>
                <?php $no = 0;?>
                <?php foreach($users as $user):?>
                    <?php $no++;?>
                <tr>
                    <td><?php echo $no;?>.</td>
                    <td><?php echo $user->full_name;?></td>
                    <td><?php echo $user->phone_no;?></td>
                    <td><?php echo $user->email;?></td>
                    <td><?php echo $user->basic_salary;?> / <?php echo $user->net_salary;?></td>
                    <td><?php echo $user->created_at;?></td>
                    <td><a href="javascript:;" onclick="ci.modal.open('inquiries/detail?id='+<?php echo $user->id;?>);" class="fa fa-search"></a></td>
                </tr>
                <?php endforeach;?>
            </table>
        </div>
    </div>
</div>
