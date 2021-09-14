<?php

//╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩
// █▄██▄█ Afficher le planning  █▄██▄█ 

// Instanciation of the array
// Array hour
$timeSlot = ['08:00','08:30','09:00','09:30','10:00','10:30','11:00','11:30','12:00','12:30','13:00','13:30','14:00','14:30','15:00','15:30','16:00','16:30','17:00','17:30','18:00','18:30','19:00'];
// Replace the URL / file path with the .ics url
$file = [
    "0" => "https://ecolearies-2019-2020.hyperplanning.fr/hp/Telechargements/ical/Edt_BOSC.ics?version=2019.0.5.0&idICal=634997D3BA41C51479C0F502A8E21898&param=643d5b312e2e36325d2666683d3126663d31",
    "1" => "https://ecolearies-2019-2020.hyperplanning.fr/hp/Telechargements/ical/Edt_VIRTUEL_IMEP.ics?version=2019.0.5.0&idICal=43708BCEA620863A76CA5397269D1BC8&param=643d5b312e2e36325d2666683d3126663d31",
    "2" => "https://ecolearies-2019-2020.hyperplanning.fr/hp/Telechargements/ical/Edt_VIRTUEL_IMEP.ics?version=2019.0.5.0&idICal=43708BCEA620863A76CA5397269D1BC8&param=643d5b312e2e36325d2666683d3126663d31",
    "3" => "https://ecolearies-2019-2020.hyperplanning.fr/hp/Telechargements/ical/Edt_VIRTUEL_IMEP.ics?version=2019.0.5.0&idICal=43708BCEA620863A76CA5397269D1BC8&param=643d5b312e2e36325d2666683d3126663d31",
    "4" => "https://ecolearies-2019-2020.hyperplanning.fr/hp/Telechargements/ical/Edt_VIRTUEL_IMEP.ics?version=2019.0.5.0&idICal=43708BCEA620863A76CA5397269D1BC8&param=643d5b312e2e36325d2666683d3126663d31",
    "5" => "https://ecolearies-2019-2020.hyperplanning.fr/hp/Telechargements/ical/Edt_VIRTUEL_IMEP.ics?version=2019.0.5.0&idICal=43708BCEA620863A76CA5397269D1BC8&param=643d5b312e2e36325d2666683d3126663d31",
    "6" => "https://ecolearies-2019-2020.hyperplanning.fr/hp/Telechargements/ical/Edt_VIRTUEL_IMEP.ics?version=2019.0.5.0&idICal=43708BCEA620863A76CA5397269D1BC8&param=643d5b312e2e36325d2666683d3126663d31"
];
// Global view 'echo'
$aff = (string) '<section id="s2"><div id="slotHour">';
foreach ($timeSlot as $timeSlots) {
    $aff .= '<span>'.$timeSlots.'</span>';
}
$aff .= '</div>';


// Traitement of the datas ICS
class ics {
    /* Function is to get all the contents from ics and explode all the datas according to the events and its sections */
    function getIcsEventsAsArray($file) {
        $icalString = file_get_contents ( $file );
        $icsDates = array ();
        /* Explode the ICs Data to get datas as array according to string ‘BEGIN:’ */
        $icsData = explode ( "BEGIN:", $icalString );
        /* Iterating the icsData value to make all the start end dates as sub array */
        foreach ( $icsData as $key => $value ) {
            $icsDatesMeta [$key] = explode ( "\n", $value );
        }    
        /* Itearting the Ics Meta Value */
        foreach ( $icsDatesMeta as $key => $value ) {
            foreach ( $value as $subKey => $subValue ) {
                /* to get ics events in proper order */
                $icsDates = $this->getICSDates ( $key, $subKey, $subValue, $icsDates );
            }    
        }    
        return $icsDates;
    }    

    /* funcion is to avaid the elements wich is not having the proper start, end  and summary informations */
    function getICSDates($key, $subKey, $subValue, $icsDates) {
        if ($key != 0 && $subKey == 0) {
            $icsDates [$key] ["BEGIN"] = $subValue;
        } else {
            // echo $subValue.'<hr>';
            $subValueArr = explode ( ":", $subValue, 2 );
            if (isset ( $subValueArr [1] )) {
                $icsDates [$key] [$subValueArr [0]] = $subValueArr [1];
            }    
        }    
        return $icsDates;
    }    
}    


// Loop on the differents files
foreach ($file as $files) {

    // Instanciation of the actual date
    $dateInit = date('m/d/Y', mktime(0,0,0,12,13,2019));
    /* Getting events from isc file */
    $obj = new ics();
    $icsEvents = $obj->getIcsEventsAsArray( $files );
    /* Here we are getting the timezone to get the event dates according to gio location */
    $timeZone = (string) 'europe/paris';
    // Delete the first value which is the head of the file
    unset( $icsEvents [1] );
    // Instanciation of the view
    $datas = array();
    
    foreach( $icsEvents as $icsEvent){
        /* Getting start date and time */
        $start = isset( $icsEvent ['DTSTART;VALUE=DATE'] ) ? $icsEvent ['DTSTART;VALUE=DATE'] : $icsEvent ['DTSTART'];
        /* Converting to datetime and apply the timezone to get proper date time */
        $startDt = new DateTime ( $start );
        $startDt->setTimeZone ( new DateTimezone ( $timeZone ) );
        $startDateA = $startDt->format ( 'm/d/Y' );
        $startDateB = $startDt->format ( 'H:i' );
        /* Getting end date with time */
        $end = isset( $icsEvent ['DTEND;VALUE=DATE'] ) ? $icsEvent ['DTEND;VALUE=DATE'] : $icsEvent ['DTEND'];
        $endDt = new DateTime ( $end );
        $endDt->setTimeZone ( new DateTimezone ( $timeZone ) );
        $endDateA = $endDt->format ( 'm/d/Y' );
        $endDateB = $endDt->format ( 'H:i' );
        /* Getting the name of event */
        $eventName = isset ( $icsEvent['DESCRIPTION;LANGUAGE=fr']) ? $icsEvent['DESCRIPTION;LANGUAGE=fr'] : '';
        
        if (mb_substr($startDateA,0,10,'utf8') == $dateInit) {
            $item =[$startDateA,$startDateB,$endDateA,$endDateB,$eventName];
            array_push($datas,$item);
        }
    }
    
    
    // Switch case for the next lesson after the hour beginning 
    $switch = (int) 0;
    // Loop on the array $data to 
    $aff .= '<div id="slotLesson">';
    for ( $b = 0 ; $b < count($timeSlot) ; $b++) {
        // Switch case if no lesson 
        $switchLesson = (int) 0;
        if ($b > $switch || $switch == 0) {
            foreach ($datas as $data) {
                if ($data[1] === $timeSlot[$b]) {
                    // Split by RegExp of the lesson's description
                    $view = preg_split('/[\\\\][n]/', $data[4], -1, PREG_SPLIT_OFFSET_CAPTURE);
                    // Modify the switch for multi-format
                    $switch = array_search($data[3], $timeSlot);
                    // Modify the switch "no lesson"
                    $switchLesson = 1;
                    // Number of 1/2 heures and loop to view
                    $slotStart = array_search($data[1], $timeSlot);
                    $slotEnd = array_search($data[3], $timeSlot);
                    $number = $slotEnd - $slotStart;
                    for ($c = 0 ; $c <= $number ; $c++) {
                        if ($c <= 2) {
                            $aff .= '<span class="lesson">'.$view[$c][0].'</span>';
                        } else {
                            $aff .= '<span class="lesson"></span>';
                        }
                    }
                } 
            }
            // No lesson
            if ($switchLesson === 0) {
                $aff .= '<span class="noLesson"></span>';
            }
        }
    }
    $aff .= '</div>';    
}

$aff .= '</section>';
// Display the datas
echo $aff;

// TAF : éliminer les dates passées et/ou ne sortir que la date concernée