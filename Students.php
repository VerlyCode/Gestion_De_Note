
 <script>
    $(document).ready(function(){

    $(document).on('click', '#getUser', function(e){
  
     e.preventDefault();
  
     var uid = $(this).data('id');      
 
     $.ajax({
          url: 'view_students.php',
          type: 'POST',
          data: 'id='+uid,
          beforeSend:function()
{
 $("#content").html('Working on Please wait ..');
},
success:function(data)
{
   $("#content").html(data);
},
     })

    });
})
  </script>
   <?php
  include 'newstudent.php';
  ?>

          <h1 class="page-header">Etudiants <button style="float:right" type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
      <i class="glyphicon glyphicon-plus"></i> Inscription</button></h1>
  
 

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
     
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Nouveau étudiant</h4>
        </div>
        <div class="modal-body">

 

        
 <form class="form-horizontal" method="post">
<fieldset>
<div class="container">

<div class="col-md-12" style="width:70%;border-bottom:1px solid #333">
<h4><b>Informations personnelles </b></h4>
</div>
<br>
<br>
<div class="col-md-4">
<br>
<div class="form-group">
  <label class="col-xs-4 control-label" for="lrn">Matricule</label>  
  <div class="col-xs-6">
  <input id="lrn" name="lrn" type="text" placeholder="Matricule " maxlength="12" class="form-control input-xs" required="">
  </div>
</div>

<!-- Prepended text-->
<div class="form-group">
  <label class="col-xs-4 control-label" for="name">Nom(s)</label>
  <div class="col-xs-8">
    <div class="input-group">
      <input id="name" class="form-control input-xs"
      style="text-transform: capitalize;" name="lname" placeholder="Nom(s)"  type="text" required="">
      <input id="name" class="form-control input-xs"
      style="text-transform: capitalize;" name="fname" placeholder="Prénom(s)"  type="text" required="">
     
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-xs-6 control-label" for="gender">Genre</label>
  <div class="col-xs-6">
    <select id="gender" name="gender" class="form-control input-xs">
      <option value="MALE">Masculin</option>
      <option value="FEMALE">Feminin</option>
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-xs-4 control-label" for="address">Lieu de naissance</label>
  <div class="col-xs-8">
    <div class="input-group">
      <input id="address" class="form-control"
      style="text-transform: capitalize;" name="bp" placeholder="Lieu de naissance"  type="text" required="">    </div>
  </div>
</div>
</div>


<div class="col-md-4">
<br>
<br>
<br>

<div class="form-group">
  <label class="col-xs-5 control-label" for="dob">Date de naissance</label>  
  <div class="col-xs-7">
  <input id="dob" name="dob" type="date" placeholder="YYYY-MM-DD" class="form-control input-md" required="">
  </div>
</div>

<div class="form-group">
  <label class="col-xs-5 control-label" for="pob">Adresse</label>  
  <div class="col-xs-7">
  <input id="pob" name="pob" type="text" style="text-transform: capitalize;" placeholder="Entrer l'adresse" class="form-control input-xs" required="">
  </div>
</div>


<div class="form-group">
    <label class="col-xs-5 control-label" for="passwordt">Mot de passe de l'etudiant</label>
    <div class="col-xs-7">
        <input id="passwordt" name="passwordt" type="password"
            style="text-transform: capitalize;" placeholder="Entrer Mot de passe"
            class="form-control input-xs" required="">
    </div>
</div>

<div class="form-group">
  <label class="col-xs-5 control-label" for="pg">Parent/Mentor</label>
  <div class="col-xs-7">
    <div class="input-group">
      <input id="pg" name="pg" class="form-control" style="text-transform: capitalize;" placeholder="Entrer Nom complet" type="text" required="">
      <input id="pg" name="pg_add" class="form-control" style="text-transform: capitalize;" placeholder="Entrer Adresse" type="text" required="">

    </div>
  </div>
</div>
</div>
<div class="col-md-12" style="width:70%;border-bottom:1px solid #333">
<h4><b>Detail Académique </b></h4>
</div>
<br>
<br>
<div class="col-md-12">
<br>

  <div class="form-group">
    <label class="col-xs-2 control-label" for="sy">Année scolaire</label>
  
  <div class="col-xs-10">
    <input class="form-control" style="width:150px" id="sy" name="sy" type="text"
     placeholder="FROM-TO">

  </div>
  </div>

  <div class="form-group">
  <label class="col-xs-2 control-label" for="ave">Niveau</label> 
  <div class="col-xs-6">
  <input id="ave" name="ave" type="integer" style="width:100px;text-align:right"
   class="form-control input-xs" required="">

  </div>
</div>


</div>
</div>

</div>


</fieldset>





        </div>
        <div class="modal-footer">
        <!--<input type="reset" class="btn btn-success " id="reset" name="reset" value="Reset Form">-->
      <input type="submit" class="btn btn-success " name="submitb" value="Enregistrer">
      
        </form>
          <button type="button" class="btn btn-success" data-dismiss="modal">Annuler</button>
        </div>
      </div>
      
    </div>
  </div>



       <div class="col-md-12">
          
       <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Liste des étudiants</h3>

        </div> 
        <div class="panel-body"> 
  <table id="students" class="table table-bordered table-condensed">
    <thead>
      <tr id="heads">
        <th style="width:10%;text-align:center">Matricule.</th>
        <th style="width:30%;text-align:center">Nom(s)</th>
        <th style="width:20%;text-align:center">Genre</th>
        <th style="width:10% ;text-align:center">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
    include 'db.php';
    $sql=  mysqli_query($conn, "SELECT * FROM student_info order by LASTNAME ");
    while($row = mysqli_fetch_assoc($sql)) {
      $sid = $row['STUDENT_ID'];
        


    ?>
      <tr>


        <td><?php echo $row['LRN_NO'] ?></td>
        <td><?php echo $row['LASTNAME'] . ', ' . $row['FIRSTNAME']. ' ' . $row['MIDDLENAME'] ?></td>
        
        <td style="text-align:center"><?php echo $row['GENDER'] ?></td>
        
     
      <td style="text-align:center"> 
     <a  class="btn btn-info" data-toggle="modal" data-target="#view-modal" data-id="<?php echo $sid ?>" id="getUser">Voir profil</a>
     </td>
       </tr>

      <?php
    
    } mysqli_close($conn);
      ?>
    </tbody>
  </table>
</div>
</div> 
</div>

       <div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog"> 
               <div class="modal-content modal-lg">  
             
                  <div class="modal-header"> 
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                     <h4 class="modal-title">
                     <i class=""></i> PROFIL
                     </h4> 
                  </div> 
                       <div id="content">
                      
                     </div>
                  
                                 
              </div> 
            </div>
          </div>  



<script type="text/javascript">
        $(function() {
            $("#students").dataTable(
        { "aaSorting": [[ 2, "asc" ]] }
      );
        });
    </script>
