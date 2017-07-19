<?php 

function renderData($page, $user, $languages) {

	include("language.php");

	$judges = "";

        foreach($page->case_judges as $judge) {
		$judges .= "<a href=\"" . $judge->path . "\">" . $judge->title . "</a><br/>";
	}

	$acts = "";

        foreach($page->case_acts as $act) {
		if ($act->act_document->url == "") {
                        $acts .= $act->act_date . ": " . $act->act_text . "<br/>";
		} else {
	                $acts .= $act->act_date . ": <a href=\"" . $act->act_document->url . "\">" . $act->act_text . "</a><br/>";
		}
        }
	
	$out =	"\n<table>";
	$out .= "\n\t<tbody>";
       	$out .= "\n\t<tr><th>" . $l_kind . "</th><td>" . $page->case_kind . "</td></tr>";
        $out .=  "\n\t<tr><th>" . $l_division . "</th><td><a href=\"" . $page->case_division->path . "\">" . $page->case_division->title . "</a></td></tr>";
        $out .= "\n\t<tr><th>" . $l_lead . "</th><td><a href=\"" . $page->case_lead->path . "\">" . $page->case_lead->title . "</a></td></tr>";

	if ($judges != "") {
        	$out .= "\n\t<tr><th>" . $l_judges . "</th><td>" . $judges . "</td></tr>";
	}

        if ($acts != "") {
                $out .= "\n\t<tr><th>" . $l_acts . "</th><td>" . $acts . "</td></tr>";
        }


	$out .= "\n\t</tbody>";
	$out .= "\n</table>";

	return $out;
}

function renderBody($page) {
	
	return $page->body;
}

$body = renderData($page, $user, $languages) . renderBody($page);

