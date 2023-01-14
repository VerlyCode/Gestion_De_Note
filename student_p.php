 
 <script>
  jQuery(document).ready(function(){
    $('#messsage').hide(); 
    
  });  
        </script>
  <div class="row">
    <div class="col-md-1 text-right">
    </div>
    </div>
    <div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-4">
    <?php include 'update_student.php'; ?>
    </div>
    <div class="col-md-4">
    </div>
    </div>

    

    <?php
    include 'db.php';
    $id = $_GET['id'];

    $sql = mysqli_query($conn, "SELECT * From student_info left join program on student_info.PROGRAM=program.PROGRAM_ID where STUDENT_ID = '$id' ");
    while($row = mysqli_fetch_assoc($sql)){
     ?>
     <div class="container">
         <div class="col-md-12">
         <form method="post"">
         <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"

         <div class="row">
         <div class="col-md-2 text-right">
         <label></label>
         </div>
         <div class="col-md-2 text-center">
         
          <br>
          <label></label>
            
          </div>

         </div>
         <div class="row">
         <div class="col-md-2 text-right">
         <label>Matricule:</label>
         </div>
         <div class="col-md-2 text-center">
          <input type="text" maxlength="12" class="form-control input-xs"  name="lrn" value="<?php echo $row['LRN_NO'] ?>"
          <br>
          <label></label>
            
          </div>

         </div>

         <div class="row">
         <div class="col-md-2 text-right">
         <label>Nom(s):</label>
         </div>
         <div class="col-md-2 text-center">
         <input type="text" class="form-control input-xs"  name="lname" value="<?php echo $row['LASTNAME'] ?>"
         <br>
          <label style="font-size:10px">(Nom)</label>
            
          </div>
          <div class="col-md-2 text-center">
          <input type="text" class="form-control input-xs"  name="fname" value="<?php echo $row['FIRSTNAME'] ?>"
          <br>
          <label style="font-size:10px">(Prénom)</label>
            
          </div>
          

        </div>
         <div class="row">
         <div class="col-md-2 text-right">
         <label>Genre:</label>
         </div>
         <div class="col-md-2 text-center">
          <select type="text" class="form-control input-xs"  name="gender">
          <option><?php echo $row['GENDER'] ?></option>
          <?php if($row['GENDER']=='MALE'){
              echo '<option>FEMALE</option>';

          }
          else{
             echo '<option>MALE</option>';
          }?>
          </select>
      
          <label></label>
            
          </div>

         </div>

        <div class="row">
         <div class="col-md-2 text-right">
         <label>Date de naissance:</label>
         </div>
         <div class="col-md-2 text-center">
          <input type="date" class="form-control input-xs"  name="dob" value="<?php echo $row['DATE_OF_BIRTH'] ?>"
          <br>
          <label></label>
            
          </div>

         </div>
         <div class="row">
         <div class="col-md-2 text-right">
         <label>Lieu de naissance:</label>
         </div>
         <div class="col-md-4 text-center">
         <input type="text" class="form-control input-xs"  name="bp" value="<?php echo $row['BIRTH_PLACE'] ?>"
          <br>
          <label></label>
            
          </div>

         
        

        </div>
         <div class="row">
         <div class="col-md-2 text-right">
         <label>Adresse:</label>
         </div>
         <div class="col-md-4 text-center">
          <textarea type="text" rows="2" class="form-control input-xs"  name="address" ><?php echo $row['ADDRESS'] ?></textarea>
          
          <label></label>
            
          </div>

         </div>


        <div class="row">
         <div class="col-md-2 text-right">
         <label>Parent ou Mentor:</label>
         </div>
         <div class="col-md-4 text-center">
          <textarea type="text" rows="2" class="form-control input-xs"  name="pg"><?php echo $row['PARENT_GUARDIAN'] ?></textarea>
          
          <label></label>
            
          </div>

         </div>

         <div class="row">
         <div class="col-md-2 text-right">
         <label>Adresse Parent ou Mentor :</label>
         </div>
         <div class="col-md-4 text-center">
          <input type="text" class="form-control input-xs"  name="pga" value="<?php echo $row['P_ADDRESS'] ?>"
          <br>
          <label></label>
            
          </div>

         </div>

         <div class="row">
         <div class="col-md-2 text-right">
         <label>Année scolaire:</label>
         </div>
         <div class="col-md-2 text-center">
          <input type="text" class="form-control input-xs"  name="sy" value="<?php echo $row['SCHOOL_YEAR'] ?>"
          <br>
          <label></label>
            
          </div>

         </div>


         <div class="row">
         <div class="col-md-2 text-right">
         <label>Niveau:</label>
         </div>
         <div class="col-md-2 text-center">
          <input type="texte" class="form-control input-xs"  name="ave" value="<?php echo $row['GEN_AVE'] ?>"
          <br>
          <label></label>
            
          </div>

         
         <div class="row">
         <div class="col-md-8 text-right">
          <button type="submit" class="btn btn-info"><i class="fa fa-pencil-square" aria-hidden="true"></i> Mettre à jour</button>
          
          </div>

         </div>
        </form>
          
          </div> 
        </div>

    <?php
    } mysqli_close($conn);
     ?>

</div>
</div>
</div> 
</div> 


   
