<?php
      include 'db.php';
      $sql=  mysqli_query($conn, "SELECT * FROM student_info where STUDENT_ID = '".$_GET['id']."' ");
      while($row = mysqli_fetch_assoc($sql)) {

?>

  <h1 class="page-header"><?php echo $row['LASTNAME'] . ', ' . $row['FIRSTNAME']. ' ' . $row['MIDDLENAME'] ?></h1>
            
<?php
      } mysqli_close($conn);
  ?>

      <form action="newrecord.php" method="post">
        <input name="id" type="hidden" value="<?php echo $_GET["id"] ?>">
      <div class="col-md-6">
        <div class="row">
          <label class="col-md-4 te" for="school">School</label>
        <div class="col-md-6">
          <input type="text" name="school" class="form-control" id ="school" value="ESIGN" required>
        </div>
      </div>
        <br>
        <div class="row">
          <label class="col-md-4 te" for="yr">Niveau</label>
        <div class="col-md-6">
          <select type="text" name="yr" class="form-control" id ="yr" required>
                  <option > </option>
              <?php 
              include 'db.php';
              $query=mysqli_query($conn,"SELECT * FROM grade Order by grade_id");
              while($row=mysqli_fetch_assoc($query)){
              ?>
              <option value="<?php echo $row['grade'] ?>"><?php echo $row['grade'] ?> </option>
              <?php }  ?>
           </select>
                </div>
                </div>
                <br>
        <div class="row">
          <label class="col-md-4 te" for="sec">Filière</label>
          <div class="col-md-6">
            <input type="text" name="sec" class="form-control" id ="sec"required>
          </div>
        </div>
        <br>
        <div class="row">
          <label class="col-md-4 te" for="tny">Total nombre d'années</label>
        <div class="col-md-6">
          <?php 
        include 'db.php';
        $tquery = mysqli_query($conn,"SELECT * from student_year_info where STUDENT_ID = '".$_GET['id']."' ");
        $tcount = mysqli_num_rows($tquery);
        $trow=mysqli_fetch_assoc($tquery);
          ?>
            <input type="text" name="tny" class="form-control" id ="" value="<?php echo $tcount ?>" readonly>
              <?php
          ?>
        </div>
        </div>
        <br>
        <div class="row">
          <label class="col-md-4 te" for="sy">Année Académique</label>
        <div class="col-md-6">

        <select type="text" name="year" class="form-control" id ="yr" required>
          <?php 
                include 'db.php';
                $sql=  mysqli_query($conn, "SELECT * FROM school_year Order by school_year DESC ");
                while($row = mysqli_fetch_assoc($sql)) {
                ?>
              
          <option value="<?php echo $row['school_year'] ?>"><?php echo $row['school_year']  ?></option>
          <?php }  ?>
                                    
        </select>

        </div>
        </div>
        <br>
        
      <div class="col-md-7">
      <br>
      <br>


        <table class="table-bordered" method="post">
          <thead>
            <tr>
              <th style="width:140px;text-align:center">Matiere</th>
              <th style="width:50px;text-align:center"  >CC</th>
              <th style="width:50px;text-align:center" >EE</th>
              <th style="width:60px;text-align:center"  >Coefficient</th>

              
            </tr>
          </thead>

          <tbody id="">
          <?php
            for($i =0 ; $i<1; $i++)
            ?>
          <tr id="rowws" class="<?php echo $i ?>">
            <td style="width:50px;text-align:center;height:30px;font-size:12px">
              <select name="subject" >
              <option></option>
              <?php
                include 'db.php';
                $sql = mysqli_query($conn, " SELECT * from subjects");
                while($row=mysqli_fetch_assoc($sql)){
                  $id = $row['SUBJECT_ID'];
                  $subj = $row['SUBJECT'];
                ?>
                  <option name="subj" ><?php echo $subj ?> </option>
                  <?php
                }
                mysqli_close($conn);
                ?>
            
              </select>
            </td>


              <td style="width:50px;text-align:center;height:30px;font-size:12px">
                <input style="width:50px" class="cc" type="number" name="noteCC" require>
              </td>

              <td style="width:50px;text-align:center;height:30px;font-size:12px">
                <input style="width:50px" class="ee" type="number" name="noteEE" require>
              </td>

              <td style="width:50px;text-align:center;height:30px;font-size:12px">
                <input style="width:50px" class="coef" type="number" name="coef" require>
              </td>
          
              </tr>



         
            
          </tbody>

        </table>
        <br>
        <br>
        <br>

      <button class="btn btn-success" type="submit" name ="submit">Enregistrer</button>
      </div>

      </form>



