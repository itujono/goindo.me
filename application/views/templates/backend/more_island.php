<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    $title1 = 'Create New More Description Island Data';
    $actions = 'save_descisland';
    $controller = 'island';
    if($getmore->idDESC != NULL){
       $title1 = 'Update More Description Island Data';
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
        <li class="uk-width-1-2 <?php echo $tab['data-tab']?>>"><a href="#">More Description Island List</a></li>
        <li class="uk-width-1-2 <?php echo $tab['form-tab']?>"><a href="#">More Description Form</a></li>
      </ul>
      <ul id="tabs_4" class="uk-switcher uk-margin">
      <!-- START LIST SLIDER -->
        <li>
          <table id="dt_individual_search" class="uk-table" cellspacing="0" width="100%">
            <thead>
              <tr>
                  <th>No.</th>
                  <th>Island Name.</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Created</th>
                  <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No.</th>
                <th>Island Name.</th>
                <th>Title</th>
                <th>Description</th>
                <th>Created</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
            <?php 
            if(!empty($moreisland)){
              foreach ($moreisland  as $key => $more) { 
              $id = encode($more->idDESC);
            ?>
             <tr>
                <td><?php echo $key+1; ?></td>
                <td><?php echo $more->nameISLAND; ?></td>
                <td><?php echo $more->titleDESC; ?></td>
                <td><?php echo word_limiter($more->moreDESC,10);?></td>
                <td><?php echo date('d F Y', strtotime($more->createdateDESC));?></td>
                <?php
                 $id2 = '/1';
                 $icn = '&#xE8F4;'; 
                 $nm = 'Aktifkan'; 
                 if($more->statusDESC == 1){
                     $id2 = ''; 
                     $icn = '&#xE8F5;';
                     $nm = 'Non Aktifkan';
                 }
                  $msg1 = 'Apakah kamu yakin akan '.$nm.' <b>'.$more->titleDESC.'</b> ?';
                  $msg2 = 'Apakah kamu yakin akan merubah data ' . ' <b>'.$more->titleDESC.'</b> ?';
                  $url1 = 'Administrator/'.$controller.'/actionedit_more/'.urlencode($id).$id2;
                  $url2 = 'Administrator/'.$controller.'/more_desc_islandlist/'.urlencode($id);
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
          <h3 class="heading_a uk-margin-bottom">Create or Update More Description Island Data</h3>
          <form method="post" name="formmoreisland" action="<?php echo $url;?>" id="form_validation">
          <?php echo form_hidden('idDESC',encode($getmore->idDESC),'hidden'); ?>
            <div class="uk-grid" data-uk-grid-margin>
              <div class="uk-width-medium-1-3 uk-margin-top">
                <label>Island Name</label>
                <br>
                  <?php echo form_dropdown('idISLAND', $getisland, $getmore->idISLAND,'required id="select_demo_5" data-md-selectize data-md-selectize-bottom'); ?>
                  <p class="text-red"><?php echo form_error('idISLAND'); ?></p>
              </div>
              <div class="uk-width-medium-1-3 uk-margin-top">
                  <label>Title</label>
                  <br>
                  <input type="text" class="md-input label-fixed" name="titleDESC" autocomplete value="<?php echo $getmore->titleDESC;?>"/>
                  <p class="text-red"><?php echo form_error('titleDESC'); ?></p>
              </div>
              <div class="uk-width-medium-1-3 uk-margin-top">
                <div class="parsley-row">
                  <?php
                    $checkdis= '';
                    if($getmore->statusDESC == 1) $checkdis = 'checked' ;
                  ?>
                  <input type="checkbox" data-switchery <?php echo $checkdis; ?> data-switchery-size="large" data-switchery-color="#d32f2f" name="statusDESC" id="switch_demo_large">
                  <label for="switch_demo_large" class="inline-label"><b>Active More Description</b></label>
                </div>
              </div>
            </div>
            <div class="uk-grid" data-uk-grid-margin>
              <div class="uk-width-medium-1-1 uk-margin-top">
                <label>More Description</label>
                <br>
                <textarea cols="30" rows="4" name="moreDESC" class="md-input label-fixed"><?php echo $getmore->moreDESC;?></textarea>
                <p class="text-red"><?php echo form_error('moreDESC'); ?></p>
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