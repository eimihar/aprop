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

    .project-list-item-thumbnail {
        width: 200px;
        height: 200px;
    }

    .project-list-item-thumbnail img {
    }

    .project-list-item-details {
        padding-left: 10px;
    }

    .project-description {
        overflow: hidden;
    }

    @media screen and (max-width: 540px) {
        .project-list-item-thumbnail img {
            width: 100%;
        }

        .project-list-item-thumbnail {
            width: 100%;
            height: 200px;
        }

        .project-list-item > div {
            display: block;
            padding-top: 10px;
            padding-bottom: 10px;
        }
    }

</style>
<div class="row">
    <div class="col-sm-12">
        <?php if($userPreferenced):?>
        <?php endif;?>
        <?php foreach($projects as $project):?>
            <?php $link = $url->route('@web.project', array('project-slug' => $project->slug));?>
            <div class="project-list-item">

                <div class="project-list-item-thumbnail">
                    <a href="<?php echo $link;?>">
                        <img style="width: 100%; height: 100%;" src="<?php echo $exe->url->images($project->main_image_path);?>" />
                    </a>
                </div>
                <div class="project-list-item-details">
                    <div><h4><a href="<?php echo $link;?>"><?php echo $project->name;?></a></h4></div>
                    <div style="opacity: 0.8; font-size: 0.9em;"><?php echo $project->created_at->diffForHumans();?></div>
                    <div class="project-description"><?php echo $project->getEllipsedDescription();?> <a href="<?php echo $link;?>">...</a></div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>
