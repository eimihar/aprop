<?php $this->set('title', $project->name);?>
<style type="text/css">
    .card
    {
        background: #eceeef;
        color: #4b4b4b;
    }
</style>
<div class="row">
    <div class="col-sm-6">
        <div style="padding: 10px;color: #737373; ">
            <div class="row">
                <div class="col-sm-6">
                    <div><strong>Gaji Pokok</strong></div>
                    <div><?php echo $project->min_basic_salary;?></div>
                </div>
                <div class="col-sm-6">
                    <div><strong>Gaji Bersih</strong></div>
                    <div><?php echo $project->min_net_salary;?></div>
                </div>
            </div>
        </div>
        <div style="color: #737373; margin-top: 20px; border-top: 1px solid #f2f2f2; padding-top: 10px; padding: 10px;">
            <?php echo nl2br($project->description);?>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="row">
            <?php foreach($projectImages as $projectImage):?>
            <div class="col-sm-6">
                <img style="width: 100%;" src="/apps/images/<?php echo $projectImage->path;?>" />
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
