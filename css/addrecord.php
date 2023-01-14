<!--$("#rowws").clone().appendTo("#table-body").show();-->
<script>
    $(document).ready(function(){

      /*$("#rowwss").hide();

            if($('#yr').val() == '1'){
              $('#class').val('Grade 8');
            }else if($('#yr').val() == '2'){
              $('#class').val('Grade 9');
            }else if($('#yr').val() == '3'){
              $('#class').val('Grade 10');
            }else if($('#yr').val() == '4'){
              $('#class').val('Grade 11');
            };*/
      
          });
        function newrow($i){

          var data, i = $i +1;
          data = '<tr id="rowws" class="'+i+'">'+
            '<td style="width:50px;text-align:center;height:30px;font-size:12px">'+
              '<select name="subj[]" onchange="newrow('+i+')">'+
              '<option></option>'+
              ' <?php
                            include 'db.php';
                            $sql = mysqli_query($conn, " SELECT * from subjects where `FOR`='All' OR `FOR`= '".$_GET['prog']."' ");
                while($row=mysqli_fetch_assoc($sql)){
                              $id = $row['SUBJECT_ID'];
                              $subj = $row['SUBJECT'];
              ?>'+
                  '<option value="<?php echo $id ?>"><?php echo $subj ?> </option>'+
                  '<?php
                                }
                                mysqli_close($conn);
                                ?>'+
              '</select> </td>'+
              '<td style="width:50px;text-align:center;height:30px;font-size:12px">'+
              '<input style="width:50px" class="grade'+i+'" onkeyup="calculateSum2('+i+')" onkeydown="calculateSum2('+i+')" type="text" name="1st[]"></td><td style="width:50px;text-align:center;height:30px;font-size:12px">'+
              ' <input style="width:50px" class="grade'+i+'" onkeyup="calculateSum2('+i+')" onkeydown="calculateSum2('+i+')" type="text" name="2nd[]"></td><td style="width:50px;text-align:center;height:30px;font-size:12px">'+
              '<input style="width:50px" class="grade'+i+'" onkeyup="calculateSum2('+i+'>)" onkeydown="calculateSum2('+i+')" type="text" name="3rd[]"></td>'+
              '<td style="width:50px;text-align:center;height:30px;font-size:12px">'+
              '<input style="width:50px" class="grade'+i+'" onkeyup="calculateSum2('+i+')" onkeydown="calculateSum2('+i+')" type="text" name="4th[]"></td>'+
              '<td style="width:60px;text-align:center;height:30px;font-size:12px">'+
              '<input style="width:50px;text-align:center" id="fin'+i+'" type="number" name="final[]" readonly=""></td>'+
              '<td style="width:60px;text-align:center;height:30px;font-size:12px">'+
              '<input style="width:50px" type="text" name="units[]"></td>'+
              '<td style="width:60px;text-align:center;height:30px;font-size:12px">'+
                '<input type="text" name="action[]" id="action'+i+'" style="text-align:center" readonly="" >'+

                '</td>'+
              ' <td><a onclick="remtrr('+i+')"  id="remtr">X</a></td>'+
                '</tr>';

                $("#table-body").append(data);
        }
        function adds(){

        }
        function remtrr($i){
          var i = $i;
        $("."+ i).remove();
        }
      </script>
    
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
          <?php 
                include 'db.php';
                $id = $_GET['id'];
                $query=mysqli_query($conn,"SELECT * from student_year_info where STUDENT_ID = '$id' order by SYI_ID DESC limit 1");
                $count = mysqli_num_rows($query);
                if($count > 0){
                while($row = mysqli_fetch_assoc($query)){
                $g=$row['TO_BE_CLASSIFIED'] ;
                $query1=mysqli_query($conn,"SELECT * from grade where grade = '$g'");
                while($row1 = mysqli_fetch_assoc($query1)){
        
                ?>
                  <option value="<?php echo $row1['grade_id'] ?>"><?php echo $row1['grade']  ?></option>
                  <?php } 
                  ?>
                  <?php 
                      $query2=mysqli_query($conn,"SELECT * from grade where grade != '$g'");
                while($row2 = mysqli_fetch_assoc($query2)){
                  ?>
                    <option value="<?php echo $row2['grade_id'] ?>"><?php echo $row2['grade']  ?></option>
                  <?php } }
                  }else{ ?>
        
                  <?php 
                      $query2=mysqli_query($conn,"SELECT * from grade order by ABS(grade) asc limit 1");
                while($row2 = mysqli_fetch_assoc($query2)){
                  ?>
                    <option value="<?php echo $row2['grade_id'] ?>"><?php echo $row2['grade']  ?></option>
                    <?php } } ?>
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

        <select type="text" name="yr" class="form-control" id ="yr" required>
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
              <th style="width:50px;text-align:center"  >Moyenne</th>
              <th style="width:60px;text-align:center"  >Grade</th>
              <th style="width:120px;text-align:center"  >Validé<br>or<br>Ajourné</th>
              
            </tr>
          </thead>


          <tbody id="table-body">
          <?php
            for($i =0 ; $i<1; $i++)
            ?>
          <tr id="rowws" class="<?php echo $i ?>">
            <td style="width:50px;text-align:center;height:30px;font-size:12px">
              <select name="subj[]" onchange="newrow(<?php echo $i ?>)">
              <option></option>
              <?php
                include 'db.php';
                $sql = mysqli_query($conn, " SELECT * from subjects");
                while($row=mysqli_fetch_assoc($sql)){
                  $id = $row['SUBJECT_ID'];
                  $subj = $row['SUBJECT'];
                ?>
                  <option value="<?php echo $id ?>"><?php echo $subj ?> </option>
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
              
              <td style="width:50px;text-align:center;height:30px;font-size:12px">
                <input style="width:50px" class="moy" name="">
              </td>
              
              <td style="width:60px;text-align:center;height:30px;font-size:12px">
                <input style="width:70px;text-align:center" class="grade" type="text" name="" >
              </td>
              
              <td style="width:60px;text-align:center;height:30px;font-size:12px">
                <input style="width:70px;text-align:center" class="deci" type="text" name="" >
              </td>
              
              
              
                
              </tr>



                <?php
                

                function CalculResultat(){
                  $noteCC = $_POST['noteCC'];
                  $noteEE = $_POST['noteEE'];
                  $coefficient = $_POST['coef'];
                  $som = 0;
                  $decision = ''; 
                  $grade = '';

                    if (!empty($noteCC) && !empty($noteEE) && !empty($coefficient)) {

                      if (($noteCC <= 20 || $noteCC>=0) && ($noteEE <= 20 || $noteEE>=0) && ($coefficient <= 8 || $coefficient>=1)) {
                        
                        $som = $noteCC + $noteEE;
                        $moymat = $som / 2;
                        $moyGen = $moymat * $coefficient;
                        if ($moyGen <= 20 || $moyGen>=16) {
                          $grade = 'A';
                          $decision = 'Valide';
                        }
                        elseif ($moyGen <= 15.99 || $moyGen>=14) {
                          $grade = 'B';
                          $decision = 'valide';
                        }
                        elseif ($moyGen <= 13.99 || $moyGen>=12) {
                          $grade = 'C';
                          $decision = 'valide';
                        }
                        elseif ($moyGen <= 11.99 || $moyGen>=9) {
                          $grade = 'D';
                          $decision = 'ajourne';
                        }elseif ($moyGen <= 8 || $moyGen>=6) {
                          $grade = 'E';
                          $decision = 'ajourne';
                        }
                        else {
                          $grade = 'E-';
                          $decision = 'ajourne';
                        }
                      }
                      else {
                        echo 'Verifier les informations saisie';
                      }
                      
                    }else {
                      echo 'veuillez remplir les champs';
                    }
                
                  }
                if (isset($_POST['submit'])) {
                  CalculResultat();
                  var_dump(CalculResultat());
                }
                
                ?>
            
          </tbody>

        </table>
        <button class="bt" type="submit" name ="submit">Verly</button>
      <button class="btn btn-success" type="submit" name ="submit">Calculer</button>
      </div>

      </form>
      </div>
      
  

</script>