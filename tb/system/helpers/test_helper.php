<?php
		$result_view =$_SESSION['helperr_result_view'];
		$trans =$_SESSION['helperr_trans'];
		$contact_info =$_SESSION['helperr_contact_info'];
		$pass_info =$_SESSION['helperr_pass_info'];
		//$hotel_details =$_SESSION['helperr_pass_hotel_details'];
//============================================================+
// File name   : example_061.php
// Begin       : 2010-05-24
// Last Update : 2010-08-08
//
// Description : Example 061 for TCPDF class
//               XHTML + CSS
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               Manor Coach House, Church Hill
//               Aldershot, Hants, GU12 4RQ
//               UK
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: XHTML + CSS
 * @author Nicola Asuni
 * @since 2010-05-25
 */

require_once('pdf/config/lang/eng.php');
require_once('pdf/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 061');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 10);

// add a page
$pdf->AddPage();
 $adult_co = explode("-",$result_view->adult);
			$adult_count = array_sum($adult_co);
			
			$child_co = explode("-",$result_view->child);
			$child_count = array_sum($child_co);
/* NOTE:
 * *********************************************************
 * You can load external XHTML using :
 *
 * $html = file_get_contents('/path/to/your/file.html');
 *
 * External CSS files will be automatically loaded.
 * Sometimes you need to fix the path of the external CSS.
 * *********************************************************
 */

// define some HTML content with style
$html = <<<EOF
<!-- EXAMPLE OF CSS STYLE -->
<style>
	h1 {
		color: #336699;
		font-family: times;
		font-size: 20pt;
		
	}
	p.first {
		color: #003300;
		font-family: helvetica;
		font-size: 13pt;
		
	}
	p.first span {
		color: #006600;
		font-style: italic;
	}
	p#second {
		color: rgb(00,63,127);
		font-family: times;
		font-size: 10pt;
		margin-top:4px;
		text-align: justify;
	}
	p#third {
		color: rgb(00,63,127);
		font-family: times;
		font-size: 10pt;
		text-align: justify;
	}
	p#second > span {
		background-color: #FFFFAA;
	}
	table.first {
		color: #C96716;
		font-family: helvetica;
		font-size: 10pt;
		border: 1.5px solid #175C87;
	}
	td {
	
		
	}
	td.second {
		border: 2px dashed green;
	}
	td.headertd {
		font-size: 10pt;
		font-weight:bold;
	}
	div.test {
		color: #CC0000;
		background-color: #FFFF66;
		font-family: helvetica;
		font-size: 10pt;
		border-style: solid solid solid solid;
		border-width: 2px 2px 2px 2px;
		border-color: green #FF00FF blue red;
		text-align: center;
	}
</style>

<h1 class="title"><img src="logo.jpg" height="80" width="140"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Booking Voucher </h1>

<p id="second">Booking Number : $trans->booking_number </p>

<p id="second">Dear Mr $contact_info->first_name </p>

<p id="third">Thank you for booking your hotel with Stayaway. We are pleased to confirm your booking details as below:</p>

<p id="second"><table class="first">  <tr>
        <td colspan="2" class="headertd" align="center" >Traveller Details</td>
        <td colspan="2"  class="headertd" align="center" >Your Reservation </td>
        </tr>
		 <tr>
        <td colspan="4">&nbsp;</td>
      </tr>
	 
      <tr>
        <td>Guest Name</td>
        <td>: Mr $contact_info->first_name </td>
        <td>Hotel Booking Number </td>
        <td>: $trans->booking_number</td>
      </tr>
      <tr>
        <td>No. of Adults</td>
        <td>: $adult_count  Adults</td>
        <td>Check - in</td>
        <td>: $result_view->check_in </td>
      </tr>
      <tr>
        <td>No. of Childern</td>
        <td>: $child_count Childern</td>
        <td>Check - out</td>
        <td>: $result_view->check_out</td>
      </tr>
       <tr>
        <td>Voucher Date</td>
        <td>: $trans->created_date</td>
        <td>Rooms</td>
        <td> : $result_view->no_of_room Room</td>
      </tr>
       <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>Nights</td>
        <td>: $result_view->nights nights</td>
      </tr>
	   <tr>
        <td colspan="4">&nbsp;</td>
      </tr>
	  
	  
     </table></p>

<p class="first">Hotel Details</p>
<p id="second">$result_view->hotel_name</p>
<p id="second">$result_view->description</p>
<p id="second">Address	: $result_view->address </p>
<p id="second">City		: $result_view->city</p>
<p id="second">Phone	: $result_view->phone</p>
<p id="second">Fax		: $result_view->fax </p>

<p class="first">Room Details</p>
<p id="second">Room Type : $result_view->room_type </p>

<p class="first">Fare Summary</p>
<p id="second">Total Room Price: $trans->amount USD</p>

<p class="first">Cancellation Policy</p>
<p id="second">$result_view->cancel_policy </p>




EOF;

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// *******************************************************************
// HTML TIPS & TRICKS
// *******************************************************************

// REMOVE CELL PADDING
//
// $pdf->SetCellPadding(0);
// 
// This is used to remove any additional vertical space inside a 
// single cell of text.

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// REMOVE TAG TOP AND BOTTOM MARGINS
//
// $tagvs = array('p' => array(0 => array('h' => 0, 'n' => 0), 1 => array('h' => 0, 'n' => 0)));
// $pdf->setHtmlVSpace($tagvs);
// 
// Since the CSS margin command is not yet implemented on TCPDF, you
// need to set the spacing of block tags using the following method.

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// SET LINE HEIGHT
//
// $pdf->setCellHeightRatio(1.25);
// 
// You can use the following method to fine tune the line height
// (the number is a percentage relative to font height).

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// CHANGE THE PIXEL CONVERSION RATIO
//
// $pdf->setImageScale(0.47);
// 
// This is used to adjust the conversion ratio between pixels and 
// document units. Increase the value to get smaller objects.
// Since you are using pixel unit, this method is important to set the
// right zoom factor.
// 
// Suppose that you want to print a web page larger 1024 pixels to 
// fill all the available page width.
// An A4 page is larger 210mm equivalent to 8.268 inches, if you 
// subtract 13mm (0.512") of margins for each side, the remaining 
// space is 184mm (7.244 inches).
// The default resolution for a PDF document is 300 DPI (dots per 
// inch), so you have 7.244 * 300 = 2173.2 dots (this is the maximum 
// number of points you can print at 300 DPI for the given width).
// The conversion ratio is approximatively 1024 / 2173.2 = 0.47 px/dots
// If the web page is larger 1280 pixels, on the same A4 page the 
// conversion ratio to use is 1280 / 2173.2 = 0.59 pixels/dots

// *******************************************************************

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('test.pdf', 'F');

//============================================================+
// END OF FILE                                                
//============================================================+
