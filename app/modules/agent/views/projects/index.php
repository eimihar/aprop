<h1>Projects (<?php echo $projects->count();?>)</h1>
<p><a href="<?php echo $url->admin('projects', 'add');?>">Add</a> projects, manage and etc.</p>
<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <tr>
                    <th width="24px">#</th>
                    <th>Name</th>
                    <th>Min salaries</th>
                    <th style="width: 56px;"></th>
                </tr>
                <?php
                $no = 0;
                /** @var \Illuminate\Database\Eloquent\Collection $projects */
                foreach($projects as $project):?>
                    <?php $no++;?>
                <tr>
                    <td><?php echo $no;?>.</td>
                    <td><?php echo $project->name;?></td>
                    <td><?php echo $project->min_basic_salary.' / '.$project->min_net_salary;?></td>
                    <td>
                        <a href="<?php echo $url->admin('projects', 'edit?id='.$project->id);?>" class="fa fa-pencil"></a>
                        <a href="#" class="fa fa-trash"></a>
                    </td>
                </tr>
                <?php endforeach;?>
                <?php if($projects->count() == 0):?>
                <tr>
                    <td colspan="4" align="center">Oops, no project added yet.</td>
                </tr>
                <?php endif;?>
            </table>
        </div>
    </div>
</div>