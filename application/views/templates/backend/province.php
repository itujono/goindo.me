<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    $title1 = 'Create New Province Data';
    $actions = 'saveprovince';
    $controller = 'province';
    if($getprovince->idPROVINCE != NULL){
       $title1 = 'Update Province Data';
    } 
    $url = base_url().'Administrator/'.$controller.'/'.$actions;
?>
<div class="uk-width-medium-1-1">
  <h4 class="heading_a uk-margin-bottom"><?php echo $title1;?></h4>

  <?php if (!empty($message)){ ?>
      <div class="uk-alert uk-alert-<?php echo $message['type']; ?>" data-uk-alert>
        <a href="#" class="uk-alert-close uk-close"></a>
        <h4><?php echo $message['title']; ?></h4>
        <?php echo $message['text']; ?>
      </div>
  <?php } ?>

  <div class="md-card">
    <div class="md-card-content">
      <ul class="uk-tab uk-tab-grid" data-uk-tab="{connect:'#tabs_4'}">
        <li class="uk-width-1-2 <?php echo $tab['data-tab']?>>"><a href="#">Province List</a></li>
        <li class="uk-width-1-2 <?php echo $tab['form-tab']?>"><a href="#">Form Province</a></li>
      </ul>
      <ul id="tabs_4" class="uk-switcher uk-margin">
        <li>
          <table id="dt_individual_search" class="uk-table" cellspacing="0" width="100%">
            <thead>
              <tr>
                  <th>No.</th>
                  <th>Picture.</th>
                  <th>Province Name</th>
                  <th>Population</th>
                  <th>Density</th>
                  <th>Area</th>
                  <th>Created</th>
                  <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No.</th>
                <th>Picture.</th>
                <th>Province Name</th>
                <th>Population</th>
                <th>Density</th>
                <th>Area</th>
                <th>Created</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
            <?php 
            if(!empty($listprovince)){
              foreach ($listprovince  as $key => $province) { 
              $id = encode($province->idPROVINCE);
            ?>
             <tr>
                <td><?php echo $key+1; ?></td>
                <td><img class="img_thumb" src="<?php echo $province->imagePROVINCE;?>" alt="<?php echo $province->namePROVINCE;?>"/></td>
                <td><?php echo $province->namePROVINCE; ?></td>
                <td><?php echo $province->populationPROVINCE; ?></td>
                <td><?php echo $province->densityPROVINCE;?></td>
                <td><?php echo $province->areaPROVINCE;?></td>
                <td><?php echo date('d F Y', strtotime($province->createdatePROVINCE));?></td>
                <?php
                 $id2 = '/1';
                 $icn = '&#xE8F4;'; 
                 $nm = 'Activate'; 
                 if($province->statusPROVINCE == 1){
                     $id2 = ''; 
                     $icn = '&#xE8F5;';
                     $nm = 'Not Activate';
                 }
                  $msg1 = 'Are you sure want to '.$nm.' <b>'.$province->namePROVINCE.'</b> ?';
                  $msg2 = 'Are you sure want to change this data ' . ' <b>'.$province->namePROVINCE.'</b> ?';
                  $url1 = 'Administrator/'.$controller.'/actionedit/'.urlencode($id).$id2;
                  $url2 = 'Administrator/'.$controller.'/provincelist/'.urlencode($id);
                ?>
                <td class="uk-text-center">
                  <a href="#" onclick="UIkit.modal.confirm('<?php echo $msg1; ?>', function(){ document.location.href='<?php echo site_url($url1);?>'; });"><i class="md-icon material-icons"><?php echo $icn; ?></i></a>
                  <a href="#" onclick="UIkit.modal.confirm('<?php echo $msg2; ?>', function(){ document.location.href='<?php echo site_url($url2);?>'; });"><i class="md-icon material-icons">&#xE254;</i></a>
                </td>
              </tr>
            <?php } ?>
            <?php } ?>
            </tbody>
          </table>
        </li>
        <!-- END LIST SLIDER -->

        <!-- START FORM INPUT AREA -->
        <li>
          <h3 class="heading_a uk-margin-bottom">Create or Update Province Data</h3>
          <form method="post" name="formprovince" action="<?php echo $url;?>" enctype="multipart/form-data" id="form_validation">
          <?php echo form_hidden('idPROVINCE',encode($getprovince->idPROVINCE),'hidden'); ?>
            <div class="uk-grid" data-uk-grid-margin>
              <div class="uk-width-medium-1-1">
                <div class="md-card">
                  <div class="md-card-content">
                    <?php
                      if(!empty($getprovince->imagePROVINCE)){
                    ?>
                    <div class="uk-margin-bottom uk-text-center uk-position-relative">
                        <a href="#" class="uk-modal-close uk-close uk-close-alt uk-position-absolute" onclick="UIkit.modal.confirm('Are you sure want to delete this picture?', function(){ document.location.href='<?php echo base_url().'Administrator/'.$controller."/deleteimgprovince/".encode($getprovince->idPROVINCE); ?>'; });"></a>
                        <img src="<?php echo $getprovince->imagePROVINCE;?>" alt="<?php echo $getprovince->namePROVINCE;?>" class="img_medium"/>
                    </div>
                    <?php } else { ?>
                      <?php echo form_upload('imgPROVINCE','','class="md-input" required'); ?>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="uk-grid" data-uk-grid-margin>
              <div class="uk-width-medium-1-3 uk-margin-top">
                  <label>Province Name</label>
                  <br>
                  <input type="text" class="md-input label-fixed" name="namePROVINCE" autocomplete value="<?php echo $getprovince->namePROVINCE;?>"/>
                  <p class="text-red"><?php echo form_error('namePROVINCE'); ?></p>
              </div>
              <div class="uk-width-medium-1-3 uk-margin-top">
                  <label>Population</label>
                  <br>
                  <input type="text" class="md-input label-fixed" name="populationPROVINCE" autocomplete value="<?php echo $getprovince->populationPROVINCE;?>"/>
                  <p class="text-red"><?php echo form_error('populationPROVINCE'); ?></p>
              </div>
              <div class="uk-width-medium-1-3 uk-margin-top">
                  <label>Density</label>
                  <br>
                  <input type="text" class="md-input label-fixed" name="densityPROVINCE" autocomplete value="<?php echo $getprovince->densityPROVINCE;?>"/>
                  <p class="text-red"><?php echo form_error('densityPROVINCE'); ?></p>
              </div>
            </div>
            <div class="uk-grid" data-uk-grid-margin>
              <div class="uk-width-medium-1-2 uk-margin-top">
                  <label>Area</label>
                  <br>
                  <input type="text" class="md-input label-fixed" name="areaPROVINCE" autocomplete value="<?php echo $getprovince->areaPROVINCE;?>"/>
                  <p class="text-red"><?php echo form_error('areaPROVINCE'); ?></p>
              </div>
              <div class="uk-width-medium-1-2 uk-margin-top">
                  <label>Capital</label>
                  <br>
                  <input type="text" class="md-input label-fixed" name="capitalPROVINCE" autocomplete value="<?php echo $getprovince->capitalPROVINCE;?>"/>
                  <p class="text-red"><?php echo form_error('capitalPROVINCE'); ?></p>
              </div>
            </div>
            <div class="uk-grid" data-uk-grid-margin>
              <div class="uk-width-medium-1-2 uk-margin-top">
                  <label>Largest City</label>
                  <br>
                  <input type="text" class="md-input label-fixed" name="largestcityPROVINCE" autocomplete value="<?php echo $getprovince->largestcityPROVINCE;?>"/>
                  <p class="text-red"><?php echo form_error('largestcityPROVINCE'); ?></p>
              </div>
              <div class="uk-width-medium-1-2 uk-margin-top">
                <div class="parsley-row">
                  <?php
                    $checkdis= '';
                    if($getprovince->statusPROVINCE == 1) $checkdis = 'checked' ;
                  ?>
                  <input type="checkbox" data-switchery <?php echo $checkdis; ?> data-switchery-size="large" data-switchery-color="#d32f2f" name="statusPROVINCE" id="switch_demo_large">
                  <label for="switch_demo_large" class="inline-label"><b>Active Province</b></label>
                </div>
              </div>
            </div>
            <div class="uk-grid" data-uk-grid-margin>
              <div class="uk-width-medium-1-1 uk-margin-top">
                <label>Description</label>
                <br>
                <textarea cols="30" rows="4" name="descPROVINCE" class="md-input label-fixed"><?php echo $getprovince->descPROVINCE;?></textarea>
                <p class="text-red"><?php echo form_error('descPROVINCE'); ?></p>
              </div>
            </div>
              <div class="uk-width-medium-1-1 uk-margin-top">
               <div class="uk-form-row">
                 <span class="uk-input-group-addon"><?php echo form_submit('submit', 'SAVE', 'class="md-btn md-btn-primary" id="show_preloader_md"'); ?></span>
               </div>
              </div>
                </div>
              </div>
            </div>
          </form>
        </li>
        <!-- END FORM INPUT AREA -->
      </ul>
    </div>
  </div>
</div>