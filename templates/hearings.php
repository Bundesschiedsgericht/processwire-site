<?php 

function renderHearings($page)
{
	$out = "<table>";
	$out .= "<tr>";
	$out .= "<th style=\"width:15%\">Datum und Uhrzeit</th>";
	$out .= "<th style=\"width:15%\">Ort</th>";
	$out .= "<th style=\"width:15%\">Aktenzeichen</th>";
	$out .= "<th style=\"width:15%\">Spruchkörper</th>";
	$out .= "<th style=\"width:15%\">Berichterstatter</th>";
	$out .= "<th style=\"width:25%\">Thematik</th>";
	$out .= "</tr>";

	foreach($page->children as $child)
	{
		if (!$child->completed)
		{
			$out .= "<tr>";
			$out .= "<td>" . $child->date_time . "</td>";
			$out .= "<td>" . $child->location . "</td>";
			$out .= "<td>" . $child->casenumber . "</td>";
			$out .= "<td>" . $child->chamber->title . "</td>";
			$out .= "<td>" . $child->rapporteur->title . "</td>";
			$out .= "<td>" . $child->matter . "</td>";
			$out .= "</tr>";
		}
	}

	$out .= "</table>";

	return $out;
}

$body .= renderHearings($page);

