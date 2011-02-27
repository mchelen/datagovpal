<style type="text/css" media="screen">
	table {
		font-size: x-small;
		font-family: sans-serif;
	}
	
</style>
<?php

# author: Joe Crawford http://twitter.com/artlung
# https://gist.github.com/728507


// source csv file
$filepath = '../data_gov_catalog.csv';

// open file
$handle = fopen($filepath, "r");

// read file 
$lines = file($filepath);

// read first line containing headers
$headers = explode(',',$lines[0]);

print "<pre>";
print_r($headers);
print "</pre>";


// initialize output array
$cleaned_data = array();

// Array
// (
//     [0] => URL
//     [1] => Title
//     [2] => Agency
//     [3] => Subagency
//     [4] => Category
//     [5] => Date Released
//     [6] => Date Updated
//     [7] => Time Period
//     [8] => Frequency
//     [9] => Description
//     [10] => Data.gov Data Category Type
//     [11] => Specialized Data Category Designation
//     [12] => Keywords
//     [13] => Citation
//     [14] => Agency Program Page
//     [15] => Agency Data Series Page
//     [16] => Unit of Analysis
//     [17] => Granularity
//     [18] => Geographic Coverage
//     [19] => Collection Mode
//     [20] => Data Collection Instrument
//     [21] => Data Dictionary/Variable List
//     [22] => Applicable Agency Information Quality Guideline Designation
//     [23] => Data Quality Certification
//     [24] => Privacy and Confidentiality
//     [25] => Technical Documentation
//     [26] => Additional Metadata
//     [27] => FGDC Compliance (Geospatial Only)
//     [28] => Statistical Methodology
//     [29] => Sampling
//     [30] => Estimation
//     [31] => Weighting
//     [32] => Disclosure Avoidance
//     [33] => Questionnaire Design
//     [34] => Series Breaks
//     [35] => Non-response Adjustment
//     [36] => Seasonal Adjustment
//     [37] => Statistical Characteristics
//     [38] => Feeds Access Point
//     [39] => Feeds File Size
//     [40] => XML Access Point
//     [41] => XML File Size
//     [42] => CSV/TXT Access Point
//     [43] => CSV/TXT File Size
//     [44] => XLS Access Point
//     [45] => XLS File Size
//     [46] => KML/KMZ Access Point
//     [47] => KML File Size
//     [48] => ESRI Access Point
//     [49] => ESRI File Size
//     [50] => Map Access Point
//     [51] => Data Extraction Access Point
//     [52] => Widget Access Point
// 
// )



$row = 20;

// try to open file
if (($handle = fopen($filepath, "r")) !== FALSE) {
// loop through lines of the file
    while (($data = fgetcsv($handle, ",")) !== FALSE) {
    // count the number of fields in the line
        $num = count($data);
        // echo "<p> $num fields in line $row: <br /></p>\n";

   // populate output array
		$cleaned_data[] = array(
			'Agency' => $data[2],
			'SubAgency'=> $data[3],
			'Filesize' => $data[39],
			'XML File Size' => $data[41], // [41] => 
			// [42] => CSV/TXT Access Point
			'CSV/TXT File Size' => $data[43], // [43] => 
			// [44] => XLS Access Point
			// [45] => XLS File Size
			// [46] => KML/KMZ Access Point
			// [47] => KML File Size
		);


        $row++;
        // for ($c=0; $c < $num; $c++) {
        //     echo $data[$c] . "<br />\n";
        // }

		// print_r($)
    }
    fclose($handle);
}


/*
foreach($lines as $x) {

	$lines = str_getcsv($x);
	$cleaned_data[] = array(
		'Agency' => $lines[2],
		'SubAgency'=> $lines[3],
		'Filesize' => $lines[39],
	);
	
}
*/
print "<table cellspacing=0 cellpadding=2 border=1>";
foreach($cleaned_data as $data) {
	print "<tr><td>" . implode($data, '</td><td>') . "</td></tr>";
}
print "</table>";

exit;


// [39] => Feeds File Size
// [40] => XML Access Point
// [41] => XML File Size
// [42] => CSV/TXT Access Point
// [43] => CSV/TXT File Size
// [44] => XLS Access Point
// [45] => XLS File Size
// [46] => KML/KMZ Access Point
// [47] => KML File Size
// [48] => ESRI Access Point
// [49] => ESRI File Size

// print_r($headers);
exit;




$row = 20;
if (($handle = fopen($filepath, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
        // for ($c=0; $c < $num; $c++) {
        //     echo $data[$c] . "<br />\n";
        // }

		// print_r($)
    }
    fclose($handle);
}

// print_r($file);


?>
