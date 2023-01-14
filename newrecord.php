 	<?php

include 'db.php';


                
                  # code...
                      $school=$_POST['school'];
                      $niveau=$_POST['yr'];
                      $filiere=$_POST['sec'];
                      $year=$_POST['year'];
                      $student= $_POST['id'];
                      $mat=$_POST['subject'];
                      $noteCC = $_POST['noteCC'];
                      $noteEE = $_POST['noteEE'];
                      $coefficient = $_POST['coef'];
                      $som = 0;
                      $moymat=0;
                      $decision = ''; 
                      $grade = '';
                  //var_dump($noteCC);
                 // var_dump(mysqli_query($conn,"INSERT into results(STUDENT_ID,Ecole,Niveau,Filiere,Annee,Matiere,NoteCC,NoteEE,Coefficient,Moyenne,Grade,Valide) VALUES ('$student','$school','$niveau','$filiere','$year','$mat','$noteCC','$notEE','$coefficient','$moymat','$grade','$decision')"));
                 // var_dump($coefficient)

                
                        if (!empty($noteCC) && !empty($noteEE) && !empty($coefficient)) {
                          if (($noteCC <= 20 && $noteCC>=0) && ($noteEE <= 20 && $noteEE>=0) && ($coefficient <= 8 && $coefficient>=1)) {
                            
                            $som = $noteCC + $noteEE;
                            $moymat = $som / 2;
                            $moyGen = $moymat * $coefficient;
                            if ($moymat <= 20 && $moymat>=16) {
                              $grade = 'A';
                              $decision = 'Valide';
                            }
                            elseif ($moymat <= 15.99 && $moymat>=14) {
                              $grade = 'B';
                              $decision = 'valide';
                            }
                            elseif ($moymat <= 13.99 && $moymat>=12) {
                              $grade = 'C';
                              $decision = 'valide';
                            }
                            elseif ($moymat <= 11.99 && $moymat>=9) {
                              $grade = 'D';
                              $decision = 'ajourne';
                            }elseif ($moymat <= 8 && $moymat>=6) {
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

                  if(mysqli_query($conn,"INSERT into results(STUDENT_ID, Ecole, Niveau, Filiere, Annee, Matiere, NoteCC, NoteEE, Coefficient, Moyenne, Grade, Valide) VALUES ('{$student}','{$school}','{$niveau}','{$filiere}','{$year}','{$mat}','{$noteCC}','{$noteEE}','{$coefficient}','{$moymat}','{$grade}','{$decision}')")) {
                    
                    echo "<div class='erlert-success'><center><h4>" . "Résultats enregistrés avec succès." . "</h4></center></div>";
                ?>


               <div class="modal-content modal-lg">  
                  
                       <div>

                       <div class="row">
                          <div class="col-md-5 text-right">
                          <label>Ecole</label>
                          </div>
                          <div class="col-md-4 text-left">
                          <?php echo $school ; ?>
                      
                            </div>
                         </div>

                         <div class="row">
                          <div class="col-md-5 text-right">
                          <label>Niveau</label>
                          </div>
                          <div class="col-md-4 text-left">
                          <?php echo $niveau ; ?>
                      
                            </div>
                         </div>

                         <div class="row">
                          <div class="col-md-5 text-right">
                          <label>Filière</label>
                          </div>
                          <div class="col-md-4 text-left">
                          <?php echo $filiere ; ?>
                      
                            </div>
                         </div>

                         <div class="row">
                          <div class="col-md-5 text-right">
                          <label>Année académique</label>
                          </div>
                          <div class="col-md-4 text-left">
                          <?php echo $year ; ?>
                      
                            </div>
                         </div>

                       <div class="row">
                          <div class="col-md-5 text-right">
                          <label>Matière</label>
                          </div>
                          <div class="col-md-4 text-left">
                          <?php echo $mat ; ?>
                      
                            </div>
                         </div>

                         <div class="row">
                          <div class="col-md-5 text-right">
                          <label>Note CC</label>
                          </div>
                          <div class="col-md-4 text-left">
                          <?php echo $noteCC ; ?>
                      
                            </div>
                         </div>

                         <div class="row">
                          <div class="col-md-5 text-right">
                          <label>Note EE</label>
                          </div>
                          <div class="col-md-4 text-left">
                          <?php echo $noteEE ; ?>
                      
                            </div>
                         </div>

                         <div class="row">
                          <div class="col-md-5 text-right">
                          <label>Coefficient</label>
                          </div>
                          <div class="col-md-4 text-left">
                          <?php echo $coefficient ; ?>
                      
                            </div>
                         </div>

                       <div class="row">
                          <div class="col-md-5 text-right">
                          <label>Moyenne</label>
                          </div>
                          <div class="col-md-4 text-left">
                          <?php echo $moymat ; ?>
                      
                            </div>
                         </div>
                        
                       
                       <div class="row">
                          <div class="col-md-5 text-right">
                          <label>Grade</label>
                          </div>
                          <div class="col-md-4 text-left">
                          <?php echo $grade ;  ?>
                      
                            </div>
                         </div>

                         <div class="row">
                          <div class="col-md-5 text-right">
                          <label>Validé ou Ajourné</label>
                          </div>
                          <div class="col-md-4 text-left">
                          <?php echo $decision ;?>
                      
                            </div>
                         </div>
                      
                     </div>
                  
                                 
            </div>
	 
              
          <?php } else {


                      echo $school;
                      echo $niveau;
                      echo $filiere;
                      echo $year;
                      echo $student;
                      echo $mat;
                      echo $noteCC;
                      echo $noteEE;
                      echo $coefficient;
                      echo $grade;
                      echo $decision;
                      echo $moymat;


                      echo "erreur";
                    "<script>
                    alert('Failed to Submit.');
                    </script>";
                  }




              
                /*function  CalculResultat() {
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
                                
                               */ 
                              
                              
   












/*

$id = $_POST['id'];
$school = $_POST['school'];
$yr = $_POST['yr'];
$sec = $_POST['sec'];
$tny = $_POST['tny'];

$dc = $_POST['dc'];
$p = $_POST['p'];
$Tdc = $_POST['Tdc'];
$Tp = $_POST['Tp'];
$user = $_SESSION['ID'];

$search_qry = mysqli_query($conn, "SELECT * from student_year_info left join student_info on student_year_info.STUDENT_ID = student_info.STUDENT_ID WHERE STUDENT_ID = '$id' AND YEAR ='$yr' ");
$row = mysqli_query['search_qry'];
$student = $row['FIRSTNAME'] .' '. $row['LASTNAME'];
$num_row = mysqli_num_rows($search_qry);
		if($num_row >= 1){
			echo "<script>
			alert('Student Year Record is already Exist!');
			 location.replace(document.referrer);
			</script>";
			
		}else{

		$sql= mysqli_query($conn,"INSERT INTO student_year_info
			 (STUDENT_ID, SCHOOL, YEAR, SECTION, TOTAL_NO_OF_YEAR, SCHOOL_YEAR, ADVANCE_UNIT, LACK_UNIT, ADVISER,  RANK, TO_BE_CLASSIFIED, TDAYS_OF_CLASSES, TDAYS_PRESENT,ACTION)
			 VALUES('$id','$school', '$yr', '$sec', '$tny', '$sy', '$au', '$lu', '$adv',  '$rank', '$tbca', '$Tdc', '$Tp','Promoted' ) ");
			$last_id = mysqli_insert_id($conn);
			$sc= count($subject);
			mysqli_query($conn, "INSERT into history_log (transaction,user_id,date_added) 
		VALUES ('added record of $student','$user',NOW() )");


			for($w=0;$w < $sc;$w++){
				if($subject[$w] != ''){
				mysqli_query($conn,"INSERT INTO total_grades_subjects (STUDENT_ID, SYI_ID, SUBJECT, 1ST_GRADING, 2ND_GRADING, 3RD_GRADING, 4TH_GRADING, UNITS, FINAL_GRADES, PASSED_FAILED)
				VALUES('$id', '$last_id', '$subject[$w]', '$una[$w]', '$ikaduwa[$w]', '$ikatlo[$w]', '$ikaapat[$w]', '$u[$w]', '$f[$w]', '$a[$w]')");
			}
			}
			
		

		$mc = count($month);

		for($i=0 ; $i < $mc; $i++)
		{
			mysqli_multi_query($conn,"INSERT INTO attendance (STUDENT_ID, SYI_ID, MONTH, DAYS_OF_CLASSES, DAYS_PRESENT)
				VALUES('$id', '$last_id', '$month[$i]', '$dc[$i]', '$p[$i]')");
		}

		$query = mysqli_query($conn,"SELECT *,COUNT(TGS_ID) as tg_count, SUM(FINAL_GRADES)as fin_grade FROM total_grades_subjects WHERE SYI_ID = '$last_id' ");
		while($row=mysqli_fetch_assoc($query)){
			$ga = $row['fin_grade'] / $row['tg_count'];
			mysqli_query($conn,"UPDATE student_year_info SET GEN_AVE = '$ga' WHERE SYI_ID = '".$row['SYI_ID']."' ");
		}

		$query2 = mysqli_query($conn,"SELECT * FROM total_grades_subjects WHERE SYI_ID = '$last_id' AND PASSED_FAILED='FAILED' ");
		while($row2=mysqli_fetch_assoc($query2)){
			
			$counts =  mysqli_num_rows($query2);
			$query3 = mysqli_query($conn,"SELECT * FROM grade WHERE grade_id = '$yr'");
			$row3=mysqli_fetch_assoc($query3);
			$tbca2 = $row3['grade'];
			
			if($counts > 2){
			mysqli_query($conn,"UPDATE student_year_info SET ACTION = 'Retained',TO_BE_CLASSIFIED='$tbca2' WHERE SYI_ID = '".$row2['SYI_ID']."' "); 
			}
			else{
			mysqli_query($conn,"UPDATE student_year_info SET ACTION = 'Conditional(Promoted)',TO_BE_CLASSIFIED='$tbca2' WHERE SYI_ID = '".$row2['SYI_ID']."' "); 
			}
		}
			 
			
			header('location:rms.php?page=record&id='.$id);

		} 
		*/
    
		mysqli_close($conn);


    ?>