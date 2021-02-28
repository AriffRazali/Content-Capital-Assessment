<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class csvController extends Controller
{
	public function exportCSV($id)
	{
        $path = public_path() . "/database/evaluation-20190711.json";

        $userdata = json_decode(file_get_contents($path), true);

        $data = $userdata['data'];

        $selected = null;
        $fileName = 'userdata.csv';

        foreach ($data as $key => $user) {
            if($user['id'] == $id){
                $selected = $user['evaluation'];
                $fileName = $user['name']." Evaluation Test.csv";
            }
        }
        //dd($selected,$selected['score'],$data,$selected['title'],\Carbon\Carbon::parse($selected['created_at'])->setTimezone('Asia/Kuala_Lumpur'),$selected['created_at']);
       	$headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );
        // dd(\Carbon\Carbon::parse($selected['created_at'])->setTimezone('Asia/Kuala_Lumpur')->format('d/m/Y'),\Carbon\Carbon::parse($selected['created_at'])->setTimezone('Asia/Kuala_Lumpur'));
       	$callback = function() use($selected) {
            $file = fopen('php://output', 'w');
            fputcsv($file,['Title','Test','Score','Evaluated At']);

            foreach ($selected['score'] as $keyScore => $valueScore) {
                foreach ($valueScore as $key => $value) {

                    fputcsv($file, [$selected['title'], $key,$value,\Carbon\Carbon::parse($selected['created_at'])->setTimezone('Asia/Kuala_Lumpur')->format('d/m/Y')]);
                }
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);	
	}	
}
