<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    $title1 = 'Create New Island Data';
    $actions = 'saveisland';
    $controller = 'island';
    if($getisland->idISLAND != NULL){
       $title1 = 'Update Island Data';
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
        <li class="uk-width-1-2 <?php echo $tab['data-tab']?>>"><a href="#">Island List</a></li>
        <li class="uk-width-1-2 <?php echo $tab['form-tab']?>"><a href="#">Form Island</a></li>
      </ul>
      <ul id="tabs_4" class="uk-switcher uk-margin">
      <!-- START LIST SLIDER -->
        <li>
          <table id="dt_individual_search" class="uk-table" cellspacing="0" width="100%">
            <thead>
              <tr>
                  <th>No.</th>
                  <th>Picture.</th>
                  <th>Island Name</th>
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
                <th>Island Name</th>
                <th>Population</th>
                <th>Density</th>
                <th>Area</th>
                <th>Created</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
            <?php 
            if(!empty($listisland)){
              foreach ($listisland  as $key => $island) { 
              $id = encode($island->idISLAND);
            ?>
             <tr>
                <td><?php echo $key+1; ?></td>
                <td><img class="img_thumb" src="<?php echo $island->imageISLAND;?>" alt="<?php echo $island->nameISLAND;?>"/></td>
                <td><?php echo $island->nameISLAND; ?></td>
                <td><?php echo $island->populationISLAND; ?></td>
                <td><?php echo $island->densityISLAND;?></td>
                <td><?php echo $island->areaISLAND;?></td>
                <td><?php echo date('d F Y', strtotime($island->createdateISLAND));?></td>
                <?php
                 $id2 = '/1';
                 $icn = '&#xE8F4;'; 
                 $nm = 'Aktifkan'; 
                 if($island->statusISLAND == 1){
                     $id2 = ''; 
                     $icn = '&#xE8F5;';
                     $nm = 'Non Aktifkan';
                 }
                  $msg1 = 'Apakah kamu yakin akan '.$nm.' <b>'.$island->nameISLAND.'</b> ?';
                  $msg2 = 'Apakah kamu yakin akan merubah data ' . ' <b>'.$island->nameISLAND.'</b> ?';
                  $url1 = 'Administrator/'.$controller.'/actionedit/'.urlencode($id).$id2;
                  $url2 = 'Administrator/'.$controller.'/islandlist/'.urlencode($id);
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
          <h3 class="heading_a uk-margin-bottom">Create or Update Island Data</h3>
          <form method="post" name="formisland" action="<?php echo $url;?>" enctype="multipart/form-data" id="form_validation">
          <?php echo form_hidden('idISLAND',encode($getisland->idISLAND),'hidden'); ?>
            <div class="uk-grid" data-uk-grid-margin>
              <div class="uk-width-medium-1-1">
                <div class="md-card">
                  <div class="md-card-content">
                    <?php
                      if(!empty($getisland->imageISLAND)){
                    ?>
                    <div class="uk-margin-bottom uk-text-center uk-position-relative">
                        <a href="#" class="uk-modal-close uk-close uk-close-alt uk-position-absolute" onclick="UIkit.modal.confirm('Are you sure want to delete this picture?', function(){ document.location.href='<?php echo base_url().'Administrator/'.$controller."/deleteimgisland/".encode($getisland->idISLAND); ?>'; });"></a>
                        <img src="<?php echo $getisland->imageISLAND;?>" alt="<?php echo $getisland->nameISLAND;?>" class="img_medium"/>
                    </div>
                    <?php } else { ?>
                      <?php echo form_upload('imgISLAND','','class="md-input" required'); ?>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="uk-grid" data-uk-grid-margin>
              <div class="uk-width-medium-1-3 uk-margin-top">
                  <label>Island Name</label>
                  <br>
                  <input type="text" class="md-input label-fixed" name="nameISLAND" autocomplete value="<?php echo $getisland->nameISLAND;?>"/>
                  <p class="text-red"><?php echo form_error('nameISLAND'); ?></p>
              </div>
              <div class="uk-width-medium-1-3 uk-margin-top">
                  <label>Population</label>
                  <br>
                  <input type="text" class="md-input label-fixed" name="populationISLAND" autocomplete value="<?php echo $getisland->populationISLAND;?>"/>
                  <p class="text-red"><?php echo form_error('populationISLAND'); ?></p>
              </div>
              <div class="uk-width-medium-1-3 uk-margin-top">
                  <label>Density</label>
                  <br>
                  <input type="text" class="md-input label-fixed" name="densityISLAND" autocomplete value="<?php echo $getisland->densityISLAND;?>"/>
                  <p class="text-red"><?php echo form_error('densityISLAND'); ?></p>
              </div>
            </div>
            <div class="uk-grid" data-uk-grid-margin>
              <div class="uk-width-medium-1-2 uk-margin-top">
                  <label>Area</label>
                  <br>
                  <input type="text" class="md-input label-fixed" name="areaISLAND" autocomplete value="<?php echo $getisland->areaISLAND;?>"/>
                  <p class="text-red"><?php echo form_error('areaISLAND'); ?></p>
              </div>
              <div class="uk-width-medium-1-2 uk-margin-top">
                  <label>Capital</label>
                  <br>
                  <input type="text" class="md-input label-fixed" name="capitalISLAND" autocomplete value="<?php echo $getisland->capitalISLAND;?>"/>
                  <p class="text-red"><?php echo form_error('capitalISLAND'); ?></p>
              </div>
            </div>
            <div class="uk-grid" data-uk-grid-margin>
              <div class="uk-width-medium-1-2 uk-margin-top">
                  <label>Largest City</label>
                  <br>
                  <input type="text" class="md-input label-fixed" name="largestcityISLAND" autocomplete value="<?php echo $getisland->largestcityISLAND;?>"/>
                  <p class="text-red"><?php echo form_error('largestcityISLAND'); ?></p>
              </div>
              <div class="uk-width-medium-1-2 uk-margin-top">
                <div class="parsley-row">
                  <?php
                    $checkdis= '';
                    if($getisland->statusISLAND == 1) $checkdis = 'checked' ;
                  ?>
                  <input type="checkbox" data-switchery <?php echo $checkdis; ?> data-switchery-size="large" data-switchery-color="#d32f2f" name="statusISLAND" id="switch_demo_large">
                  <label for="switch_demo_large" class="inline-label"><b>Active Island</b></label>
                </div>
              </div>
            </div>
            <div class="uk-grid" data-uk-grid-margin>
              <div class="uk-width-medium-1-1 uk-margin-top">
                <label>Deskripsi</label>
                <br>
                <textarea cols="30" rows="4" name="descISLAND" class="md-input label-fixed"><?php echo $getisland->descISLAND;?></textarea>
                <p class="text-red"><?php echo form_error('descISLAND'); ?></p>
              </div>
            </div>
              <div class="uk-width-medium-1-1 uk-margin-top">
               <div class="uk-form-row">
                 <span class="uk-input-group-addon"><?php echo form_submit('submit', 'SIMPAN', 'class="md-btn md-btn-primary" id="show_preloader_md"'); ?></span>
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