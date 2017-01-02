<h1>Inquiries (<?php echo $inquiries->count();?>)</h1>
<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone No.</th>
                    <th>Email</th>
                    <th>Time</th>
                </tr>
                <?php $no = 0;?>
                <?php foreach($inquiries as $inquiry):?>
                    <?php $no++;?>
                <tr>
                    <td><?php echo $no;?>.</td>
                    <td><?php echo $inquiry->full_name;?></td>
                    <td><?php echo $inquiry->phone_no;?></td>
                    <td><?php echo $inquiry->email;?></td>
                    <td><?php echo $inquiry->created_at;?></td>
                </tr>
                <?php endforeach;?>
            </table>
        </div>
    </div>
</div>
