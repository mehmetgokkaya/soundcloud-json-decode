<?php
$search = $_GET['search'];
$clientcode = "gsPNGqVqXY4QlaFqDv7WBWglYHdTPsh6";
$url = 'https://api-v2.soundcloud.com/search?q='.$search.'&variant_ids=&facet=model&client_id='.$clientcode.'&limit=20&offset=0&linked_partitioning=1&app_version=1664196962&app_locale=tr';
$str_data = file_get_contents("$url");
$data = json_decode($str_data, true);
$temp = "<table>";
$temp .= "<tr><th>Şarkı adı</th>";
$temp .= "<th>dinle</th>";
$temp .= "<th>indir</th></tr>";
for($i = 0; $i < sizeof($data["collection"]); $i++)
{
$json = file_get_contents($url);
$json = json_decode($json);
$lat = $json->collection[$i]->media->transcodings[1]->url;
$url2 ="$lat"."?client_id="."$clientcode";
$json = file_get_contents($url2);
$json = json_decode($json);
$lat2 = $json->url;
$temp .= "<tr>";
$temp .= "<td>" . $data["collection"][$i]["title"] . "</td>";
$temp .= "<td><audio controls> <source type='audio/mpeg' src="  . $lat2 ."></audio></td>";
$temp .= "<td><a target=blank_ href=" . $lat2 . ">indir</a></td>";
$temp .= "</tr>";
}
$temp .= "</table>";
echo $temp;
?>
