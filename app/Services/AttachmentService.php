<?php
declare(strict_types = 1);

namespace ModuleInfocms\Services;

use Symfony\Component\HttpFoundation\File\UploadedFile as SymfonyUploadedFile;
use Swoolecan\Foundation\Helpers\CommonTool;
use Swoolecan\Foundation\Services\TraitAttachmentService;

class AttachmentService extends AbstractService
{
    use TraitAttachmentService;

    public function dealLocalFiles()
    {
        $this->createFiles('local');
        //$this->createPaths('local', '');
        exit();
        //phpinfo();exit();
        /*$imageFile = '/data/files/tmp/selfdoc/图片/3.jpg';
        $imageFile = '/data/files/老家/老家/IMG_20160206_082514.jpg';
        $a = \exif_read_data($imageFile);
            $fileObj = new SymfonyUploadedFile($imageFile, $imageFile);
        print_r($fileObj);
        print_r($a);exit();*/


        $path = '';
        $driver = $this->getFileDriver('local');
        //$files = $driver->allFiles();
        $files = $driver->listContents($path, true);
        //$files = $driver->files($path);
        $i = 1;
        foreach ($files as $file) {
            echo $file['type'];
            var_dump($file->isFile());
            echo get_class($file);exit();
            $fPath = $file->path();
            $fullFile = $driver->path($fPile);
            echo $fullFile . "\n";
            $baseName = basename($file);
            $fileObj = new SymfonyUploadedFile($fullFile, $baseName);

            var_dump($a);
            //$data = $this->saveFile('local', $file, $fileObj);
            $i++;
        }
        var_dump($i);
        //print_r($files);exit();
    }
}
