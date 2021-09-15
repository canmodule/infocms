<?php
declare(strict_types = 1);

namespace ModuleInfocms\Services;

use Swoolecan\Foundation\Helpers\CommonTool;

class RubbingService extends AbstractService
{
    public function dealCalligrapher()
    {
        $model = $this->getModelObj('calligrapher');
        $infos = $model->get();
        foreach ($infos as $info) {
            $code = CommonTool::getSpellStr($info['name'], '');
            $info->code = $code;
            $info->dynasty = $this->getPointAttrCode('dynasty', $info->dynasty);
            print_r($info->toArray());exit();
            $info->save();

            print_R($code);exit();
            echo $code;
            print_R($info->toArray());exit();

        }
    }


    public function getPointAttrCode($type, $index)
    {
        $repository = $this->getRepositoryObj('rubbing');
        $method = "_{$type}KeyDatas";
        $datas = $repository->$method();
        $codes = array_keys($datas);
        return $codes[$index - 1];
    }

    public function dealRubbingDetails()
    {
        $driver = \Storage::disk('local');
        $files = $driver->files('c');
        $excelService = $this->getServiceObj('passport-excel');
        $fields = ['browse_num', 'pic', 'pic_file_name', 'wide', 'high', 'sort'];
        $detailModel = $this->getModelObj('rubbingDetail');
        $rubbingId = 60000;
        foreach ($files as $file) {
            $fullFile = $driver->getAdapter()->applyPathPrefix($file);
            $datas = $excelService->excelDatas($fullFile);
            foreach ($datas as $data) {
                $newData['rubbing_id'] = $rubbingId;;
                foreach ($fields as $key => $field) {
                    $newData[$field] = $data[$key];
                }
                $detailModel->create($newData);
            }
            $rubbingId += 1;
        }
    }
}
