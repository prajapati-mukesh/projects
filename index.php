function delete_all()
{
 //check "select all" if all checkbox items are checked
  if ($('.checkbox:checked').length <= 0 )
  {
      alert('please select at least one actor for delete');
  }
  else
  {
    if (confirm("Are You Sure For Delete This Selected Records........!") == true)
    {
      document.getElementById('delete_all').submit();      
    }
  }
}

<script type="text/javascript">
  //select all checkboxes
$("#select_all").change(function(){  //"select all" change
    var status = this.checked; // "select all" checked status
    $('.checkbox').each(function(){ //iterate all listed checkbox items
        this.checked = status; //change ".checkbox" checked status
    });
});

$('.checkbox').change(function(){ //".checkbox" change
    //uncheck "select all", if one of the listed checkbox item is unchecked
    if(this.checked == false){ //if this item is unchecked
        $("#select_all")[0].checked = false; //change "select all" checked status to false
    }
   
    //check "select all" if all checkbox items are checked
    if ($('.checkbox:checked').length == $('.checkbox').length ){
        $("#select_all")[0].checked = true; //change "select all" checked status to true
    }
});

</script>

/* HTML CODE*/
 <form method="post" id="delete_all" action="<?php echo base_url('admin/languages/delete_all/'.$page)?>"> 
      <thead>
        <tr>
          <th colspan="6">
<?php
            if (isset($heading))
            {
              echo $heading;
            }
?>
          </th>
        </tr>
        <tr>
          <td><input type="checkbox" id="select_all"></th>
          <th class="header">Sr No <i class="fa fa-sort"></i></th>
          <th class="header">Language Code <i class="fa fa-sort"></i></th>
          <th class="header">Language Title <i class="fa fa-sort"></i></th>
          <th class="header">Created On <i class="fa fa-sort"></i></th>
          <th class="header" colspan="2">Action <i class="fa fa-sort"></i></th>
        </tr>
      </thead>
      <tbody>
i<?php
      if(isset($message))
      {
?>
        <tr>
          <td colspan="6"><?php  echo $message;?></td>
        </tr>
<?php

      }
      if (isset($languages))
      {
        foreach ($languages as $language) 
        {
?>
          <tr>
            <td width="10%"><input class="checkbox" type="checkbox" id="<?php echo $language['id'];?>" name="delete_languages[]" value="<?php echo $language['id'];?>"></td>
            
            <td width="10%">
              <?php echo ++$cnt; ?></span>
            </td>

            <td width="20%">
              <?php echo $language['language_code'];?>    
            </td>
            
            <td width="20%">
              <span class="<?php if($this->session->userdata('language') == $language['language_title']) {echo 'label label-success';}?>">
                <label id="change_language" onClick="change_language(this)"><?php echo $language['language_title'];?></label>
              </span>

            </td>
            
            <td width="20%">
              <?php echo $language['created_on'];?>    
            </td>

            <td width="30%">
                <a href="<?php echo base_url('admin/languages/edit/'.$language['id']).'/'.$page;?>" class="fa fa-edit" style="font-size:28px;color:sky"></a>
                &nbsp;&nbsp;&nbsp;
                <a href="javascript:delete_alert(<?php echo $language['id']; ?>, <?php echo $page; ?>)" class="fa fa-trash-o" style="font-size:28px;color:red;"></a>
            </td>
          </tr>      
<?php
        }
      }
?>
      </tbody>
</form>
