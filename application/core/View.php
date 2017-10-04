<?php
namespace application\core;
/**
 * Base class of view includes files of template
 * 	
 */

class View
{
    public function formatOutput($data)
    {
       $dataArr = explode('.',$data);
       if(count($dataArr)> 1)
       {
        $format = $dataArr[1];
       } 
       else
       {
        $format = DEF_FORMAT;
       }

       switch($format)
       {
        case 'txt':
            $this->dataFilterToText($data);
            break;
        case 'html':
            $this->dataFilterToiHtml($data);
            break;
        case 'xml':
            $this->dataFilterToXml($data);
            break;
        default:
            $this->dataFilterToJson($data);
       }
    }

    public function dataFilterToJson($data)
    {

            echo $data;
    }

    public function dataFilterToHtml($data)
    {

            echo $data;
    }

    public function dataFilterToXml($data)
    {

            echo $data;
    }

    public function dataFilterToText($data)
    {

            echo $data;
    }

}
