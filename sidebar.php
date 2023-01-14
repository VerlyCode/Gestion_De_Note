<?php 
include 'db.php';

$query = mysqli_query($conn,"SELECT * FROM school_year where status='Yes' ");
$s = mysqli_fetch_assoc($query);
$school_year=$s['school_year'];
?>




 <ul class="nav navbar-nav side-nav">
 <li>
<a href="rms.php?page=home"><i class="fa fa-fw fa-dashboard"></i> Tableau de bord</a>
</li>
<li>
<a id=demo1 href="javascript:void(0)" data-toggle="collapse" data-target="#masterlistCollapse"><i class="fa fa-fw fa-files-o"></i> Menu principal <i class="fa fa-fw fa-caret-down"></i></a>
<ul id="masterlistCollapse" class="collapse">
    <li>
        <a href="rms.php?page=Students"><i class="fa fa-fw fa-users"></i> Liste des étudiants</a>
    </li>
    <li class="">
        <a href="rms.php?page=subjects"><i class="fa fa-fw fa-book"></i> Liste des matières</a>
    </li>

</ul>
</li>
<li>
    <a href="javascript:void(0)" data-toggle="collapse" data-target="#recordsCollapse"><i class="fa fa-fw fa-file"></i> Dossiers        <i class="fa fa-fw fa-caret-down"></i></a>
    <ul class="collapse" id="recordsCollapse">
        <li>
            <a href="rms.php?page=records"><i class="fa fa-fw fa-files-o"></i>Résultats académiques </a>
        </li>
       
    </ul>
</li>
<li>
    <a href="javascript:void(0)" data-toggle="collapse" data-target="#reportsCollapse"><i class="fa fa-fw fa-file"></i> Procès verbal       <i class="fa fa-fw fa-caret-down"></i></a>
    <ul id="reportsCollapse" class="collapse">
        
        <li>
            <a href="rms.php?page=list_report"><i class="fa fa-fw fa-files-o"></i> PV</a>
        </li>
        
    </ul>
</li>
<li>
    <a href="rms.php?page=users"><i class="fa fa-users"></i> Utilisateurs</a>
</li>
<li>
    <a href="javascript:void(0)" data-toggle="collapse" data-target="#maintenanceCollapse"><i class="fa fa-fw fa-gears"></i> Maintenance       <i class="fa fa-fw fa-caret-down"></i></a>
    <ul id="maintenanceCollapse" class="collapse">
        <li>
            <a href="rms.php?page=school_year"><i class="fa fa-fw fa-calendar"></i>Année académique</a>
        </li>
        <li>
            <a href="rms.php?page=grade"><i class="fa fa-fw fa-file-text-o"></i> Grades</a>
        </li>
    </ul>
</li>

</ul>
<script>
    $('.side-nav li a').each(function(){
        if((location.href).includes($(this).attr('href')) == true){
            $(this).closest('li').addClass("active")
            console.log($(this).closest('li').parent('ul').attr('id'))
            if($(this).closest('li').parent('ul').hasClass('collapse') == true){
                $('[data-target="#'+$(this).closest('li').parent('ul').attr('id')+'"]').click()
            }
        }
    })
</script>

                