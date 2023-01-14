
          <h1 class="page-header">Résultats académiques des étudiants</h1>

       <div class="col-md-12">   
       <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Liste des étudiants</h3>
        </div> 
        <div class="panel-body">  
  <table id="students" class="table table-bordered">
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
    $sql=  mysqli_query($conn, "SELECT * FROM student_info ");
    while($row = mysqli_fetch_assoc($sql)) {
  
    ?>
      <tr>

        <td><?php echo $row['LRN_NO'] ?></td>
        <td><?php echo $row['LASTNAME'] . ' ' . $row['FIRSTNAME'] ?></td>
        <td><?php echo $row['GENDER'] ?></td>
        <td><center><a class="btn btn-info" href="rms.php?page=record&id=<?php echo $row['STUDENT_ID'] ?>">Voir résultats</a></center></td>
      </tr>
      <?php
    
    } mysqli_close($conn);
      ?>
      
    </tbody>
  </table>
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


