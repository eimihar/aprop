<?php $this->set('title', 'Senarai Projek Perumahan');?>
<?php $this->set('description', 'Direktori projek-projek perumahan tanpa deposit');?>
<style type="text/css">

    .project-list-item {
        min-height: 200px;
        margin-bottom: 20px;
        display: table;
        border-bottom: 1px solid #f0f0f0;
        padding-bottom: 20px;
    }

    .project-list-item > div{
        display: table-cell;
        vertical-align: top;
    }

    .project-list-item-thumbnail img {
    }

    .project-list-item-details {
        padding-left: 10px;
    }

</style>
<div class="row">
    <div class="col-sm-12">
        <?php foreach($projects as $project):?>
            <div class="project-list-item">
                <div class="project-list-item-thumbnail" style="width: 200px; height: 200px; ">
                    <img style="width: 100%; height: 100%;" src="<?php echo $exe->url->images('apps/images/'.$project->main_image_path);?>" />
                </div>
                <div class="project-list-item-details">
                    <div><h4><a href="<?php echo $url->route('@web.project', array('project-slug' => $project->slug));?>"><?php echo $project->name;?></a></h4></div>
                    <div><?php echo $project->description;?></div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>
