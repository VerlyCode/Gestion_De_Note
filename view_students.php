<div class="modal-body"> 

    <?php
    include 'db.php';
    $id = $_POST['id'];

  if($_POST['id']){
    $sql = mysqli_query($conn, "SELECT * From student_info left join program on student_info.PROGRAM = program.PROGRAM_ID where STUDENT_ID = '$id'");
    while($row = mysqli_fetch_assoc($sql)){
     ?>
         <input type="hidden" name="id" value="<?php echo $id ?>"
         <div class="row">
         <div class="col-md-5 text-right">
         <label>Matricule</label>
         </div>
         <div class="col-md-2 text-left">
          <?php echo $row['LRN_NO'] ?>

            
          </div>

         </div>
         <br>
         <div class="row">
         <div class="col-md-5 text-right">
         <label>Nom(s)</label>
         </div>
         <div class="col-md-4 text-left">
         <?php echo $row['LASTNAME'].", ".$row['FIRSTNAME']." ".$row['MIDDLENAME']; ?>
    
          </div>
        </div>
         <div class="row">
         <div class="col-md-5 text-right">
         <label>Genre:</label>
         </div>
         <div class="col-md-2 text-left">
         <?php echo $row['GENDER'] ?>
          <label></label>
            
          </div>

         </div>

        <div class="row">
         <div class="col-md-5 text-right">
         <label>Date de naissance:</label>
         </div>
         <div class="col-md-2 text-left">
         <?php echo $row['DATE_OF_BIRTH'] ?>
          <label></label>
            
          </div>

         </div>
         <div class="row">
         <div class="col-md-5 text-right">
         <label>Lieu de naissance:</label>
         </div>
         <div class="col-md-2 text-left">
        <?php echo $row['BIRTH_PLACE'] ?>
            
          </div>

        </div>
         <div class="row">
         <div class="col-md-5 text-right">
         <label>Addresse:</label>
         </div>
         <div class="col-md-4 text-left">
          <?php echo $row['ADDRESS'] ?>
          <label></label>
            
          </div>

         </div>


        <div class="row">
         <div class="col-md-5 text-right">
         <label>Parent ou Mentor:</label>
         </div>
         <div class="col-md-2 text-left">
          <?php echo $row['PARENT_GUARDIAN'] ?>
          <label></label>
            
          </div>

         </div>

         <div class="row">
         <div class="col-md-5 text-right">
         <label>Adresse du Parent ou Mentror:</label>
         </div>
         <div class="col-md-4 text-left">
          <?php echo $row['P_ADDRESS'] ?>
          <label></label>
            
          </div>

         </div>

       
          </div>

         </div>

       
         <div class="row">
         <div class="col-md-5 text-right">
         <label>Année scolaire:</label>
         </div>
         <div class="col-md-2 text-left">
         <?php echo $row['SCHOOL_YEAR'] ?>
          <label></label>
            
          </div>

         </div>

         <div class="row">
         <div class="col-md-5 text-right">
         <label>Niveau:</label>
         </div>
         <div class="col-md-2 text-left">
         <?php echo $row['GEN_AVE'] ?>
          <label></label>
            
          </div>

         </div>

        

         <div class="row">
         <div class="col-md-8 text-right">
         <!-- <button type="submit" class="btn btn-info"><i class="fa fa-pencil-square" aria-hidden="true"></i> Update</button> -->
          
          </div>

         </div>
         </div>
         </div>
         <div class="modal-footer">
           <a  class="btn btn-default" href="rms.php?page=student_p&id=<?php echo $id ?>">Modifier</a>
                  
                      <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>  
         </div>
        
       

        

    <?php
    }
    } mysqli_close($conn);
     ?>



 