<?php

use App\Models\File;
function UploadFile($pic,$path): File
{
    $fileName = time().'_'.$pic->getClientOriginalName();
    $pic->storeAs('public/'.$path,$fileName);

    return new File([
        'name'=> $fileName,
        'file_path'=> $path.'/'.$fileName,
    ]);
}
