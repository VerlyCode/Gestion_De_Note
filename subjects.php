
          <h1 class="page-header">Matières</h1>
      <?php
            include 'newsubject.php';
                ?> 
       <div class="col-md-8 " id="s_page">
        
             
              <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Liste des matières</h3>
        </div> 
        <div class="panel-body">  

  <table id="students" class="table table-hover table-bordered">
    <thead>
      <tr>
        <th style="width:20%">Code</th>
        <th style="width:10%">Nom</th>
        <th style="width:10%">Filière</th>
        <th style="width:10% ;text-align:center">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
    include 'db.php';

    
    $sql=  mysqli_query($conn, "SELECT *,`DESCRIPTION` as para FROM subjects Order by SUBJECT ");
    while($row = mysqli_fetch_assoc($sql)) {

        $count = mysqli_num_rows($sql);
     
    ?>

      <tr>
         <input type="hidden" id="id<?php echo $row["SUBJECT_ID"] ?>" name="id" value="<?php echo $row['SUBJECT_ID'] ?>">
        <td><input id="sub<?php echo $row["SUBJECT_ID"] ?>"  name="subj" type="text" style="border:0px" value="<?php echo $row['CODE'] ?>" readonly></td>
          <td><input id="para<?php echo $row["SUBJECT_ID"] ?>"  name="subj" type="text" style="border:0px" value="<?php echo $row['SUBJECT'] ?>" readonly></td>
        <td><input id="des<?php echo $row["SUBJECT_ID"] ?>" name="desc" type="text" style="border:0px;width:100%" value="<?php echo $row['DESCRIPTION'] ?>" readonly></td>
        <td><center><a  onclick="update_subject(<?php echo $row["SUBJECT_ID"] ?>)" class="btn btn-info" ><i class="fa fa-pencil-square" aria-hidden="true"></i> Editer</a></center></td>
      </tr>
    
      <?php
    
    }
     mysqli_close($conn);
      ?>
      
    </tbody>
  </table>
</div>
</div>
</div>

<script>
  function update_subject($i){
    var act,sub,para,desc,i =$i;
      para = $("#para"+i).val();
      $("#id").val($("#id"+i).val());
      $("#sub").val($("#sub"+i).val());
      $("#para").val($("#para"+i).val());
      $("#des").val($("#des"+i).val());
      $("#head").html("Update Subject");
      $("#btn_add").html("Modifier");


  }
</script>


      <div class="col-md-4" id="">
        
            <div class="container frm-new">
      <div class="row main">
        <div class="main-login main-center">
        <h3 id="head">Ajouter une matière</h3>
          <form class="" method="post">
            <div class="form-group">
              <label for="sub" class="cols-sm-2 control-label">Code</label>
              <div class="cols-sm-4">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-book fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" id="sub" name="sub" id="sub"
                  style="width:200px"  placeholder="Enter Subject" value="<?php if(isset($_POST['sub'])){echo $_POST['sub'];} ?>"/>
                </div>
                 <p>
            <?php if(isset($errors['sub'])){echo "<div class='erlert'><h5>" .$errors['sub']. "</h5></div>"; } ?>
            </p>
              </div>
            </div>

            <div class="form-group">
              <label for="para" class="cols-sm-2 control-label">Nom</label>
              <div class="cols-sm-4">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-book fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" id="para" name="para" id="para"
                  style="width:200px"  placeholder="Enter Subject" value="<?php if(isset($_POST['para'])){echo $_POST['para'];} ?>"/>
                </div>
                 <p>
            <?php if(isset($errors['para'])){echo "<div class='erlert'><h5>" .$errors['sub']. "</h5></div>"; } ?>
            </p>
              </div>
            </div>



            <div class="form-group">
              <label for="des" class="cols-sm-2 control-label">Filière</label>
              <div class="cols-sm-4">
                <div class="input-group">
                  <input type="text" class="form-control" id="des" name="des" id="des"
                  style="width:200px"  placeholder="Enter field" value="<?php if(isset($_POST['des'])){echo $_POST['des'];} ?>"/>
                </div>
                 <p>
            <?php if(isset($errors['des'])){echo "<div class='erlert'><h5>" .$errors['des']. "</h5></div>"; } ?>
            </p>
                </div>
              </div>
            </div>




            <div class="form-group ">
            <input type="reset" class="btn btn-info " id="reset" name="reset" value="Annuler">
              <button class="btn btn-info" id="btn_add">Ajouter</button>
            </div>
            

          </form>
        </div>
      </div>

    </div>
 <script type="text/javascript">
        $(function() {
            $("#students").dataTable(
        { "aaSorting": [[ 0, "asc" ]] }
      );
        });
    </script>
