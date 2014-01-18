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
	$y = 45;
	for($i = 2; $i < count($data); $i++)
	{
		if(strpos($data[$i], "Student") !== FALSE)
			$canvas->text(40, $y, $data[$i], $fontBold, 11, array(0,0,0));
		elseif(strpos($data[$i], "College") !== FALSE)
			$canvas->text(40, $y+=15, $data[$i], $fontBold, 11, array(0,0,0));
		elseif(strpos($data[$i], "__") !== FALSE || $data[$i] == " ")
			$canvas->text(40, $y+=9, $data[$i], $font, 11, array(0,0,0));
		else
			$canvas->text(40, $y+=15, $data[$i], $font, 11, array(0,0,0));
		
		if(($i+1)%51 == 0)
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