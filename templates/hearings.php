<?php 

function renderHearings($page)
{
	$out = "<table style=\"width:100%;\">";
	$out .= "<tr>";
	$out .= "<th style=\"width:20%;\">Datum und Uhrzeit</th>";
	$out .= "<th style=\"width:20%;\">Aktenzeichen</th>";
	$out .= "<th style=\"width:20%; border-bottom: 1px solid #9f9f9f;\" rowspan=\"2\">Berichterstatter</th>";
	$out .= "<th style=\"width:30%; border-bottom: 1px solid #9f9f9f;\" rowspan=\"2\">Thematik</th>";
	$out .= "</tr>";
	$out .= "<tr>";
	$out .= "<th style=\"width:20%; border-bottom: 1px solid #9f9f9f;\">Ort</th>";
	$out .= "<th style=\"width:30%; border-bottom: 1px solid #9f9f9f;\">Spruchkörper</th>";
	$out .= "</tr>";

	foreach($page->children as $child)
	{
		if (!$child->completed)
		{
			$out .= "<tr>";
			$out .= "<td>" . $child->date_time . "</td>";
			$out .= "<td>" . $child->casenumber . "</td>";
			$out .= "<td style=\"border-bottom: 1px solid #9f9f9f;\" rowspan=\"2\">" . $child->rapporteur->title . "</td>";
			$out .= "<td style=\"border-bottom: 1px solid #9f9f9f;\" rowspan=\"2\">" . $child->matter . "</td>";
			$out .= "</tr>";
			$out .= "<tr>";
			$out .= "<td style=\"border-bottom: 1px solid #9f9f9f;\">" . $child->location . "</td>";
			$out .= "<td style=\"border-bottom: 1px solid #9f9f9f;\">" . $child->chamber->title . "</td>";
			$out .= "</tr>";
		}
	}

	$out .= "</table>";

	return $out;
}

$body .= renderHearings($page);

