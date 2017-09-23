<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    $title1 = 'Create New City Data';
    $actions = 'savecity';
    $controller = 'city';
    if($getcity->idCITY != NULL){
       $title1 = 'Update City Data';
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
        <li class="uk-width-1-2 <?php echo $tab['data-tab']?>>"><a href="#">City List</a></li>
        <li class="uk-width-1-2 <?php echo $tab['form-tab']?>"><a href="#">Form City</a></li>
      </ul>
      <ul id="tabs_4" class="uk-switcher uk-margin">
        <li>
          <table id="dt_individual_search" class="uk-table" cellspacing="0" width="100%">
            <thead>
              <tr>
                  <th>No.</th>
                  <th>Picture.</th>
                  <th>City Name</th>
                  <th>Province</th>
                  <th>Created</th>
                  <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No.</th>
                <th>Picture.</th>
                <th>City Name</th>
                <th>Province</th>
                <th>Created</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
            <?php 
            if(!empty($listcity)){
              foreach ($listcity  as $key => $city) { 
              $id = encode($city->idCITY);
            ?>
             <tr>
                <td><?php echo $key+1; ?></td>
                <td><img class="img_thumb" src="<?php echo $city->imageCITY;?>" alt="<?php echo $city->nameCITY;?>"/></td>
                <td><?php echo $city->nameCITY; ?></td>
                <td><?php echo $city->namePROVINCE; ?></td>
                <td><?php echo date('d F Y', strtotime($city->createdateCITY));?></td>
                <?php
                 $id2 = '/1';
                 $icn = '&#xE8F4;'; 
                 $nm = 'Activate'; 
                 if($city->statusCITY == 1){
                     $id2 = ''; 
                     $icn = '&#xE8F5;';
                     $nm = 'Not Activate';
                 }
                  $msg1 = 'Are you sure want to '.$nm.' <b>'.$city->nameCITY.'</b> ?';
                  $msg2 = 'Are you sure want to change this data ' . ' <b>'.$city->nameCITY.'</b> ?';
                  $url1 = 'Administrator/'.$controller.'/actionedit/'.urlencode($id).$id2;
                  $url2 = 'Administrator/'.$controller.'/citylist/'.urlencode($id);
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
        <!-- END LIST CITY -->

        <!-- START FORM INPUT CITY -->
        <li>
          <h3 class="heading_a uk-margin-bottom">Create or Update City Data</h3>
          <form method="post" name="formcity" action="<?php echo $url;?>" enctype="multipart/form-data" id="form_validation">
          <?php echo form_hidden('idCITY',encode($getcity->idCITY),'hidden'); ?>
            <div class="uk-grid" data-uk-grid-margin>
              <div class="uk-width-medium-1-1">
                <div class="md-card">
                  <div class="md-card-content">
                    <?php
                      if(!empty($getcity->imageCITY)){
                    ?>
                    <div class="uk-margin-bottom uk-text-center uk-position-relative">
                        <a href="#" class="uk-modal-close uk-close uk-close-alt uk-position-absolute" onclick="UIkit.modal.confirm('Are you sure want to delete this picture?', function(){ document.location.href='<?php echo base_url().'Administrator/'.$controller."/deleteimgcity/".encode($getcity->idCITY); ?>'; });"></a>
                        <img src="<?php echo $getcity->imageCITY;?>" alt="<?php echo $getcity->nameCITY;?>" class="img_medium"/>
                    </div>
                    <?php } else { ?>
                      <?php echo form_upload('imgCITY','','class="md-input" required'); ?>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="uk-grid" data-uk-grid-margin>
              <div class="uk-width-medium-1-1 uk-margin-top">
                  <label>Province Name</label>
                  <br>
                  <?php echo form_dropdown('idPROVINCE', $getprovince, $getcity->idPROVINCE,'required id="select_demo_5" data-md-selectize data-md-selectize-bottom'); ?>
                  <p class="text-red"><?php echo form_error('idPROVINCE'); ?></p>
              </div>
            </div>
              <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1-2 uk-margin-top">
                    <label>City Name</label>
                    <br>
                    <input type="text" class="md-input label-fixed" name="nameCITY" autocomplete value="<?php echo $getcity->nameCITY;?>"/>
                    <p class="text-red"><?php echo form_error('nameCITY'); ?></p>
                </div>
                <div class="uk-width-medium-1-2 uk-margin-top">
                  <div class="parsley-row">
                    <?php
                      $checkdis= '';
                      if($getcity->statusCITY == 1) $checkdis = 'checked' ;
                    ?>
                    <input type="checkbox" data-switchery <?php echo $checkdis; ?> data-switchery-size="large" data-switchery-color="#d32f2f" name="statusCITY" id="switch_demo_large">
                    <label for="switch_demo_large" class="inline-label"><b>Active City</b></label>
                  </div>
                </div>
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
        <!-- END FORM INPUT CITY -->
      </ul>
    </div>
  </div>
</div>