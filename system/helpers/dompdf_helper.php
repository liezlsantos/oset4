<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
function pdf_create($html, $filename='', $stream=TRUE, $papersize = 'letter', $orientation = 'portrait') 
{
    require_once("dompdf/dompdf_config.inc.php");
	$dompdf = new DOMPDF();
	$dompdf->load_html($html);
	$dompdf->set_paper($papersize, $orientation);
	$dompdf->render();
	
	if ($stream) {
        $dompdf->stream($filename.".pdf");
    } else {
        return $dompdf->output();
    }
}

function create_pdf($data, $filename='', $stream=TRUE, $papersize = 'letter', $orientation = 'portrait')
{
	require_once("dompdf/dompdf_config.inc.php");
	$dompdf = new DOMPDF();
	$dompdf->load_html(' ');
		
	$dompdf->render();
		
	$canvas = $dompdf->get_canvas();
	$font = Font_Metrics::get_font("helvetica");
	$fontBold = Font_Metrics::get_font("helvetica", "bold");
	
	$row = 1;
	$y = 25;
	for($i = 0; $i < count($data); $i++)
	{
		if(strpos($data[$i], "STUDENT") !== FALSE)
			$canvas->text(40, $y+=15, $data[$i], $fontBold, 10, array(0,0,0));
		elseif(strpos($data[$i], "COLLEGE") !== FALSE || strpos($data[$i], "UNIVERSITY") !== FALSE)
			$canvas->text(40, $y+=15, $data[$i], $fontBold, 10, array(0,0,0));
		elseif(strpos($data[$i], "__") !== FALSE || $data[$i] == " ")
			$canvas->text(40, $y+=9, $data[$i], $font, 10, array(0,0,0));
		else
			$canvas->text(40, $y+=15, $data[$i], $font, 10, array(0,0,0));
		
		if($y > 730)
		{
			$dompdf->get_canvas()->new_page();
			$y = 50;
		}

	}
		
	if ($stream) {
        $dompdf->stream($filename.".pdf");
    } else {
        return $dompdf->output();
    }
}
?>