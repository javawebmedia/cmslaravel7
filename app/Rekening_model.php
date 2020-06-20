<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Rekening_model extends Model
{
    public function listing()
    {
    	$query = DB::table('rekening')
            ->select('*')
            ->orderBy('id_rekening','DESC')
            ->get();
        return $query;
    }
}
