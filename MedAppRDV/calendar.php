<link rel="stylesheet" href="MedAppRDV/style.css">
<style>
    .booked-day{
        color:red;
    }
    #calender-entry {
        visibility: hidden;
        border: black 1px solid;
        width: 500px;
        height: 400px;
        position: absolute;
        background: white;
        top: 20%;
        left: 400px;
        overflow-y: scroll;
    }
</style>
<div>
    <div class="card">
        <h3 class="card-header" id="monthAndYear"></h3>
        <table class="table table-bordered table-responsive-sm" id="calendar">
            <thead>
            <tr>
                <th>Dim</th>
                <th>Lun</th>
                <th>Mar</th>
                <th>Mer</th>
                <th>Jeu</th>
                <th>Ven</th>
                <th>Sam</th>
            </tr>
            </thead>

            <tbody id="calendar-body">

            </tbody>
        </table>

        <div class="form-inline">

            <button class="btn btn-outline-primary col-sm-6" id="previous" onclick="previous()">Précédent</button>

            <button class="btn btn-outline-primary col-sm-6" id="next" onclick="next()">Suivant</button>
        </div>
        <br/>
        <form class="form-inline">
            <label class="lead mr-2 ml-2" for="month">Aller à : </label>
            <select class="form-control col-sm-4" name="month" id="month" onchange="jump()">
                <option value=0>Janvier</option>
                <option value=1>Fevrier</option>
                <option value=2>Mars</option>
                <option value=3>Avril</option>
                <option value=4>Mai</option>
                <option value=5>Juin</option>
                <option value=6>Juillet</option>
                <option value=7>Aout</option>
                <option value=8>Septembre</option>
                <option value=9>Octobre</option>
                <option value=10>Novembre</option>
                <option value=11>Decembre</option>
            </select>


            <label for="year"></label><select class="form-control col-sm-4" name="year" id="year" onchange="jump()">
            <option value=1990>1990</option>
            <option value=1991>1991</option>
            <option value=1992>1992</option>
            <option value=1993>1993</option>
            <option value=1994>1994</option>
            <option value=1995>1995</option>
            <option value=1996>1996</option>
            <option value=1997>1997</option>
            <option value=1998>1998</option>
            <option value=1999>1999</option>
            <option value=2000>2000</option>
            <option value=2001>2001</option>
            <option value=2002>2002</option>
            <option value=2003>2003</option>
            <option value=2004>2004</option>
            <option value=2005>2005</option>
            <option value=2006>2006</option>
            <option value=2007>2007</option>
            <option value=2008>2008</option>
            <option value=2009>2009</option>
            <option value=2010>2010</option>
            <option value=2011>2011</option>
            <option value=2012>2012</option>
            <option value=2013>2013</option>
            <option value=2014>2014</option>
            <option value=2015>2015</option>
            <option value=2016>2016</option>
            <option value=2017>2017</option>
            <option value=2018>2018</option>
            <option value=2019>2019</option>
            <option value=2020>2020</option>
            <option value=2021>2021</option>
            <option value=2022>2022</option>
            <option value=2023>2023</option>
            <option value=2024>2024</option>
            <option value=2025>2025</option>
            <option value=2026>2026</option>
            <option value=2027>2027</option>
            <option value=2028>2028</option>
            <option value=2029>2029</option>
            <option value=2030>2030</option>
        </select></form>
        <div class="form-inline" id="calender-entry">
            <h3 id="calender-entry-title" style="width: 100%;"></h3>
            
            <label class="lead mr-2 ml-2" for="eventTitle" >Patient : </label>
            <input id="patient"
            onkeydown="patientLookup()" 
            class=" col-sm-12" type="text" style="border:gray 1px solid !important">
            <div id="patient-selection" 
            style="height:200px;width:100%;overflow-y:scroll;background: white;display:none">
            </div>
            <input type="hidden" id="patientID" />
            
            <label class="lead mr-2 ml-2" for="eventTitle">titre : </label>            
            <input id="eventTitle" class=" col-sm-12" type="text" style="border:gray 1px solid !important">
            

            <label class="lead mr-2 ml-2" for="evenTime">horraire : </label>
            <input id="eventTime" class=" col-sm-12" type="time"  style="border:gray 1px solid !important">
            
            
            <button style="width:100%" class="btn btn-outline-primary" onclick="addEvent()">Ajouter</button>

            <div id="calender-entry-summary">                
            </div>

            <button style="position:absolute;top: 0;right: 0;border: 1;" onclick="document.getElementById('calender-entry').style = '';">X</button>

        </div>
    </div>
</div>

<?php
    $servername = "localhost";
    $username = "cabinetmedical_user";
    $password = "c@b!n3t321";
    $dbname = "cabinetmedical";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "select * from appointment";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $calendarEvents = "";
        while($row = $result->fetch_assoc()) {
            $calendarEvents = $calendarEvents . 
            "{" . 
                "'id': " . $row["appointment_id"] . "," .
                "'patientID': " . $row["patient_id"] . "," .
                "'appointmentTitle': '" . $row["appointment_title"] . "'," .
                "'appointmentDate':  '" . $row["appointment_date"]  . "'," .
            "},";
        }
        echo "<script>" . "const calendarData = [" . $calendarEvents . "];" . "</script>";
      
    } else {
      echo "<div>0 results</div>";
    }



    $sql = "select * from patients";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $patients = "";
        while($row = $result->fetch_assoc()) {
            $patients = $patients . 
            "{" . 
                "'id': " . $row["id"] . "," .       
                "'cin': '" . $row["cin"] . "'," .
                "'name':  '" . $row["nom"] . ' ' . $row["prenom"]  . "'," .
            "},";
        }
        echo "<script>" . "const patientsData = [" . $patients . "];" . "</script>";
      
    } else {
      echo "<div>0 results</div>";
    }


    $conn->close();
?>

<script src="MedAppRDV/main.js"></script>