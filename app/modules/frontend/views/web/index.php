<div class="row">
    <div class="col-sm-8">
        <div class="row">
            <div class="col-sm-10">
                <div>
                    <h3>Borang Semakan Online</h3>
                    <hr/>
                    <div>
                        <form method="post">
                            <div class="form-group">
                                <label>Nama penuh anda</label>
                                <input type="text" name="inquiry[full_name]" class="form-control" placeholder="Nama penuh" />
                            </div>
                            <div class="form-group">
                                <label>No telefon</label>
                                <input type="text" class="form-control" name="inquiry[phone_no]" placeholder="No telefon" />
                            </div>
                            <div class="form-group">
                                <label>Emel</label>
                                <input type="email" class="form-control" name="inquiry[email]" placeholder="Alamat emel. Contoh hello@example.com" />
                            </div>
                            <div class="form-group">
                                <label>Gaji terkini</label>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="input-group" style="padding-bottom: 5px;">
                                            <span class="input-group-addon">Gaji pokok</span>
                                            <input type="text" class="form-control" name="inquiry[basic_salary]" placeholder="RM ..." />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">Gaji bersih</span>
                                            <input type="text" class="form-control" name="inquiry[net_salary]" placeholder="RM ..." />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <small class="form-text">Maklumat sulit seperti gaji dan no telefon hanya akan digunapakai untuk semakan, atau cara untuk hubungi tuan/puan</small>
                            </div>
                            <div class="form-group" style="text-align: center;">
                                <input type="submit" value="Semak" class="btn btn-primary" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4" style="border-left: 1px solid #f0f0f0;">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Projek Terkini</h4>
                <hr/>
            </div>
            <div class="panel-body">
                <?php
                /** @var \App\Entity\Project $project */
                foreach($projects as $project):?>
                <div class="row">
                    <div class="col-sm-12" style="padding-bottom: 10px;">
                        <div style="float: left; width: 50px;">
                            <img style="height: 50px; width: 50px;" src="<?php echo $project->getMainImageUrl();?>" />
                        </div>
                        <div style="float: left; padding-left: 10px;">
                            <div>
                                <a href="<?php echo $url->route('@web.project', array('project-slug' => $project->slug));?>">
                                    <?php echo $project->name;?>
                                </a>
                            </div>
                            <div>
                                <?php echo $project->created_at->diffForHumans();?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>