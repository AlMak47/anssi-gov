<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //
    protected $table = 'documents';
    protected $keyType = 'string';
    protected $primaryKey = 'slug';

    public static function getLois() {
      $docs = Document::where('type','loi')->get();
      return $docs;
    }

    public static function getArrete() {
      $docs = Document::where('type','arrete')->get();
      return $docs;
    }
    public static function getGuide() {
      $docs = Document::where('type','guide')->get();
      return $docs;
    }

    public static function getDecrets() {
      $docs = Document::where('type','decret')->get();
      return $docs;
    }

    public static function getFile(Array $tab) {
      $file = Document::whereIn('type',$tab)->get();
      return $file;
    }

}
