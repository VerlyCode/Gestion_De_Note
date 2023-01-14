<?php session_start(); ?>

    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <script type="text/javascript">
      function getParameterByName(name, url) {
    if (!url) {
      url = window.location.href;
    }
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}
    </script>
   <script type="text/javascript">


$(document).ready(function()
{

    $('#fetch').on('change',function()
    {
        var value = $(this).val();
        var id = getParameterByName('id');
        var val = 'id='+ encodeURIComponent(id) + '&request='+ encodeURIComponent(value);
        
        
            $.ajax({
                type:'POST',
                url:'updateRecord.php?prog=<?php echo $_GET["prog"] ?>',
                data:val, 
                beforeSend:function()
{
 $("#fetch-feild").html('Working on Please wait ..');
},
success:function(data)
{
   $("#fetch-feild").html(data);
},
                
            }); 
        
    });
    
});


</script>
<script>

var selectElmt = document.getElementById("Comboniveau");
var valeurselectionnee = selectElmt.options[selectElmt.selectedIndex].value;
var textselectionne = selectElmt.options[selectElmt.selectedIndex].text;

$_SESSION['val'] = textselectionne;


</script>

    <style>
      input {
        border: 0;
        outline: 0;
        background: transparent;
        border-bottom: 1px solid black;
    }
    table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
    </style>
 
    <?php
    include 'db.php';
    $id = $_GET['id'];
    $sql=  mysqli_query($conn, "SELECT * FROM student_info where STUDENT_ID = '$id' ");
    while($row = mysqli_fetch_assoc($sql)) {


    ?>

          <h1 class="page-header"><?php echo $row['LASTNAME'] . ', ' . $row['FIRSTNAME']. ' ' . $row['MIDDLENAME'] ?></h1>
          <?php
    } mysqli_close($conn);
      ?>
      
      <form action="" method="post">
      <div class="col-md-5">
      <div class="form-inline">
      <div class="form-group">
      <a href="rms.php?page=record&id=<?php  echo $_GET['id']?>" class="btn btn-success"> Tout voir</a>
      <label for="focusedInput">Selecionner niveau:</label>
      <select name="" class="form-control" style="height:30px;font-size:12px" id="Comboniveau">
        <option > </option>
    <?php 
    include 'db.php';
    $query=mysqli_query($conn,"SELECT * FROM grade Order by grade_id");
    while($row=mysqli_fetch_assoc($query)){
    ?>
    <option value="<?php echo $row['grade_id'] ?>"><?php echo $row['grade'] ?> </option>
    <?php }  ?>
      </select>
    </div>
    </div>
    </div>
    </form>


    <div class="col-md-7 text-right">
    <?php $query = mysqli_query($conn,"SELECT school_year FROM school_year where status='Yes'");
    while($sy = mysqli_fetch_assoc($query)){ ?>
      <a class='btn btn-success' href="rms.php?page=addrecord&id=<?php echo $_GET['id'] ?>"><i class="fa fa-plus"> Ajouter résultat</i></a>
      <?php
    } ?>
    </div>
    <br>
    <br>
    <input type="text" style="width:100%;text-align:center"  disabled>
    <br>
    <br>


     <style type="text/css">
         	@media print {  
		@page {
			size:8.5in 14in;
			max-width:8.5in;
		}
		}
		#stud{
			width:8.5in;
			height:14in;
			overflow:hidden;
			margin:auto;
			border:2px solid #000;
			background-color:white;
		}
         </style>

            
          <div class="container">
         
          <div class="row">
          	<div class="col-sm-3">
        <div class="input-group">
    </div>
    </div>

		<br> <br>
       <div class="col-md-8" id="stud" style="padding:50px">   
       <div style="margin-left:.5in;margin-right:.5in;margin-top:.1in;margin-bottom:.1in;line-height:1mm;">

       <table>
	<tr>
		<td style="width:20%;">
		
		</td>
		<td style="width:800px;font-size:12px;line-height:3mm;text-align:center" >
		<p><b>Résultat de l'étudiant</b></p>
		<p>Student List</p>
		</td>
		<td style="width:20%;">
			<br>
			<?php
			include 'db.php';
			$id = $_GET['id'];
			$sql = mysqli_query($conn,"SELECT * from student_info where STUDENT_ID = '$id'");
			while($row = mysqli_fetch_assoc($sql)){
			?>
		  <p><b>Matricule</b></p>
      <br>
			<label style="font-size:13px" for=""><?php echo $row['LRN_NO'] ?></label>
			<?php 
			} 
      
      

      ?>
		</td>
	</tr>
</table>
  <table id="students" class="table table-bordered" >
    <thead>
      <tr id="heads">
        <td style="width:10%">Année</th>
        <td style="width:10%">Niveau</th>
        <td style="width:10%">Matière</th>
        <td style="width:10%">Moyenne</th>
        <td style="width:10%">Grade</th>
        <td style="width:10%">Statut</th>

      </tr>
    </thead>
    <tbody>
    <?php
    include 'db.php';
  

    $id = $_GET['id'];

    $sql=  mysqli_query($conn, "SELECT * FROM results WHERE STUDENT_ID = '".$id."' Order by Niveau");
    while($row3 = mysqli_fetch_assoc($sql)) {


    ?>
      <tr>

        <td><?php echo $row3['Annee'] ?></td>
        <td><?php echo $row3['Niveau'] ?></td>
        <td><?php echo $row3['Matiere'] ?></td>
        <td><?php echo $row3['Moyenne'] ?></td>
        <td><?php echo $row3['Grade'] ?></td>
        <td><?php echo $row3['Valide'] ?></td>



      </tr>
      <?php
    
    } mysqli_close($conn);
      ?>
      
    </tbody>
  </table>
</div>
</div>
</div>         
 </div>








    
   
    </div>
 </div>
    </div>
   

    </div>
    </div>
    
    

