<?php 

function renderActiveCases($page)
{
	$out = "<table>";
	$out .= "<tr>";
	$out .= "<th colspan=\"4\">Laufende Verfahren</th>";
	$out .= "</tr>";
	$out .= "<tr>";
	$out .= "<th style=\"width:16%\">Aktenzeichen</th>";
	$out .= "<th style=\"width:28%\">Verfahrensart</th>";
	$out .= "<th style=\"width:28%\" rowspan=\"2\">Thematik</th>";
	$out .= "<th style=\"width:28%\" rowspan=\"2\">Verfahrensstand</th>";
	$out .= "</tr>";
	$out .= "<tr>";
	$out .= "<th>Eingangsdatum</th>";
	$out .= "<th>Berichterstatter</th>";
	$out .= "</tr>";

	foreach($page->children as $child)
	{
		if (!$child->completed)
		{
			$out .= "<tr>";
			$out .= "<td>" . $child->casenumber . "</td>";
			$out .= "<td>" . $child->casetype->title . "</td>";
			$out .= "<td rowspan=\"2\">" . $child->matter . "</td>";
			if ($child->docurl != '') {
				$out .= "<td rowspan=\"2\"><a href=\"" . $child->docurl . "\">" . $child->progress . "</a></td>";
			} else {
				$out .= "<td rowspan=\"2\">" . $child->progress . "</td>";
			}
			$out .= "</tr>";
			$out .= "<tr>";
			$out .= "<td>" . $child->startdate . "</td>";
			$out .= "<td>" . $child->rapporteur->title . "</td>";
			$out .= "</tr>";
		}
	}

	$out .= "</table>";

	return $out;
}

function renderCompletedCases($page)
{
	$out = "<table>";
	$out .= "<tr>";
	$out .= "<th colspan=\"4\">Laufende Verfahren</th>";
	$out .= "</tr>";
	$out .= "<tr>";
	$out .= "<th style=\"width:16%\">Aktenzeichen</th>";
	$out .= "<th style=\"width:28%\">Verfahrensart</th>";
	$out .= "<th style=\"width:28%\" rowspan=\"2\">Thematik</th>";
	$out .= "<th style=\"width:28%\" rowspan=\"2\">Erledigung</th>";
	$out .= "</tr>";
	$out .= "<tr>";
	$out .= "<th>Eingangsdatum</th>";
	$out .= "<th>Berichterstatter</th>";
	$out .= "</tr>";

	foreach($page->children as $child)
	{
		if ($child->completed)
		{
			$out .= "<tr>";
			$out .= "<td>" . $child->casenumber . "</td>";
			$out .= "<td>" . $child->casetype->title . "</td>";
			$out .= "<td rowspan=\"2\">" . $child->matter . "</td>";
			$out .= "<td rowspan=\"2\">" . $child->progress . "</td>";
			$out .= "</tr>";
			$out .= "<tr>";
			$out .= "<td>" . $child->startdate . "</td>";
			$out .= "<td>" . $child->rapporteur->title . "</td>";
			$out .= "</tr>";
		}
	}

	$out .= "</table>";

	return $out;
}


$body .= renderActiveCases($page) . "<br/><br/>" . renderCompletedCases($page);

