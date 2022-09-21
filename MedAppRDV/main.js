let today = new Date();
let currentMonth = today.getMonth();
let currentYear = today.getFullYear();

let selectYear = document.getElementById("year");
let selectMonth = document.getElementById("month");

let months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

let monthAndYear = document.getElementById("monthAndYear");
showCalendar(currentMonth, currentYear);


function next() {
    currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
    currentMonth = (currentMonth + 1) % 12;
    showCalendar(currentMonth, currentYear);
}

function previous() {
    currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
    currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
    showCalendar(currentMonth, currentYear);
}

function jump() {
    currentYear = parseInt(selectYear.value);
    currentMonth = parseInt(selectMonth.value);
    showCalendar(currentMonth, currentYear);
}

function showCalendar(month, year) {

    let firstDay = (new Date(year, month)).getDay();
    let daysInMonth = 32 - new Date(year, month, 32).getDate();

    let tbl = document.getElementById("calendar-body");
    tbl.innerHTML = "";
    monthAndYear.innerHTML = months[month] + " " + year;
    selectYear.value = year;
    selectMonth.value = month;
    let date = 1;
    for (let i = 0; i < 6; i++) {
        let row = document.createElement("tr");
        for (let j = 0; j < 7; j++) {
            if (i === 0 && j < firstDay) {
                let cell = document.createElement("td");
                let cellText = document.createTextNode("");
                cell.appendChild(cellText);
                row.appendChild(cell);
            }
            else if (date > daysInMonth) {
                break;
            }

            else {
                let cell = document.createElement("td");
                let cellText = document.createTextNode(date);
                if (date === today.getDate() && year === today.getFullYear() && month === today.getMonth()) {
                    cell.classList.add("bg-info");
                } 
                cell.appendChild(cellText);
                row.appendChild(cell);
                date++;
            }


        }

        tbl.appendChild(row);
    }
    addEventsToCalendar();
}


function addEventsToCalendar() {
    let allDays = document.getElementById("calendar-body").getElementsByTagName("td");
    for(let day of allDays){
        day.style = "cursor : pointer;"
        day.onclick = function(){            
            document.getElementById("calender-entry-title").innerHTML = 
                day.innerText + ' ' + 
                document.getElementById("monthAndYear").innerText;

            document.getElementById("calender-entry").style = "visibility:visible";

            let selectedDay = document.getElementById("selected-day");

            if (selectedDay !== null) {
                selectedDay.style = "";
                selectedDay.id = "";
            }

            day.style = "background : #dee2e6;"
            day.id = "selected-day"

            const storedEvents = calendarData.filter((el)=>{
                const targetDate = new Date(document.getElementById("calender-entry-title").innerHTML);
                const elDate = new Date(el.appointmentDate);
                return elDate.getDate() === targetDate.getDate() && elDate.getMonth() === targetDate.getMonth() && elDate.getYear() === targetDate.getYear();
            });
            populateEvents(storedEvents);        
        }
    }
}

function populateEvents(storedEvents) {
    let innerHTML = "<ul style='list-style: none;margin-left: -16px;'>"
    for(let storedEvent of storedEvents.sort(storedEventComparer)) {
        if(storedEvent) {
            let patient = patientsData.filter((p)=>{
                return p.id === storedEvent.patientID;
            })[0];
            if(patient){
                innerHTML += "<li><span style='color:red;cursor:pointer;' onclick='removeDataFromBackend(" + storedEvent.id + ")'>X</span> " + patient.name + " | " + patient.cin +" | " + storedEvent.appointmentTitle + " ► " + storedEvent.appointmentDate + "</li>";
            }
        }
    }
    innerHTML += "</ul>"
    document.getElementById("calender-entry-summary").innerHTML = innerHTML;
}

function storedEventComparer(a, b) {
    a = new Date(a.appointmentDate);
    b =  new Date(b.appointmentDate);
    if ( a < b ){
        return -1;
    }
    if ( a > b ){
        return 1;
    }
}

function addEvent() { 
    let eventTitle = document.getElementById("eventTitle").value;
    let eventTime = document.getElementById("eventTime").value;
    let patientID = document.getElementById("patientID").value;
        
    // yyyy-mm-dd hh:mm:ss
    const eventDate = dateToSubmit(eventTime);
    submitDataToBackend(patientID, eventTitle, eventDate);

    document.getElementById("eventTitle").value = "";
    document.getElementById("eventTime").value = "";
    document.getElementById("patientID").value = "";
}

function dateToSubmit(eventTime){
    const dateString = 
    document.getElementById('calender-entry-title').innerHTML+ ' ' + eventTime + ':00';
    console.log(dateString)
    return new Date(dateString).toISOString().replace('T',' ').split('.')[0];
}

function submitDataToBackend(patientID, eventTitle, eventDate){
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'calenderPost.php', true);
    xhr.onload = function () {
        console.log(this.responseText);
        document.location = document.location.href;
    };
    xhr.send(JSON.stringify({
        patientID,
        eventTitle,
        eventDate 
    }));
}

function removeDataFromBackend(id){
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'calenderRemove.php', true);
    xhr.onload = function () {
        console.log(this.responseText);
        document.location = document.location.href;
    };
    xhr.send(JSON.stringify({
        id 
    }));
}


function patientLookup(){
    const patientSerachKeyword = document.getElementById("patient").value.toLowerCase();
    const filtredPatients = patientsData.filter((el)=>{
        return el.cin.toLowerCase().indexOf(patientSerachKeyword) !== -1 
        || el.name.toLowerCase().indexOf(patientSerachKeyword) !== -1;
    });

    let innerHTML = "";
    for(let patient of filtredPatients){
        innerHTML += "<li style='cursor:pointer;' onclick='populatePatientData(" + patient.id + ", \""+ patient.cin +"\", \""+ patient.name +"\")'>"
         + patient.cin + " : " +  patient.name + "</li>";
    }
    if(innerHTML){
        document.getElementById("patient-selection").innerHTML = innerHTML;
    }
    else{
        document.getElementById("patient-selection").innerHTML = "Le patient n'existe pas, <a href='createpatient.php'>cliquez pour l'ajouter</a>";
    }
    document.getElementById("patient-selection").style.display = "";
}

function populatePatientData(id, cin, name){
    document.getElementById("patientID").value = id;
    document.getElementById("patient").value = cin + " : " + name;
    document.getElementById("patient-selection").style.display = "none";
}