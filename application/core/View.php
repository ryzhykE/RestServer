<?php
namespace application\core;
/**
 * Base class of view includes files of template
 * 	
 */

class View
{
    public function formatOutput($formatStr, $data)
    {
       $dataArr = explode('.',$formatStr);
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
            $this->contentTypeHeader($format);
            $this->dataFilterToText($data);
            break;
        case 'html':
            $this->contentTypeHeader($format);
            $this->dataFilterToHtml($data);
            break;
        case 'xml':
            $this->contentTypeHeader($format);
            $this->dataFilterToXml($data);
            break;
        default:
            $this->contentTypeHeader($format);
            $this->dataFilterToJson($data);
       }
    }

    public function dataFilterToJson($data)
    {
            print_r(json_encode($data));
    }

    public function dataFilterToHtml($data)
    {
        if(is_array($data))
        {
            print_r('<head>');
            print_r('</head>');
            print_r('<body>');
            print_r('<pre>');
            foreach($data as $key => $value)
            {
             print_r($key . ':' . $value . '<br>');
            } 
            print_r('</pre>');
           
            return;
        }
            $data = '<pre>' .  $data . '</pre>';
            print_r($data);  
            print_r('</body>');
    }

    public function dataFilterToXml($data)
    {
            $xmlstr .="<?xml version='1.0' standalone='yes'?>";
            $xmlstr .='<data>';
            if(is_array($data))
            {
                foreach($data as $key => $value)
                {
                $xmlstr .= '<row>';
                $xmlstr .= '<key>' . $key . '</key>';
                $xmlstr .= '<value>' . $value . '</value>';
                $xmlstr .= '</row>';
                }
            }
            else
            {
                $xmlstr .= $data;
            }
            $xmlstr .= '</data>';

    $xml = new \SimpleXMLElement($xmlstr);
    print_r($xml->asXML());
    }

    public function dataFilterToText($data)
    {
            print_r($data);
    }

    public function restResponse($type)
    {
        switch($type)
        {
            case '200':
            $this->succResponse();
            break;
            case '201':
            $this->createdRespnse();
            break;
            case '202':
            $this->acceptResponse();
            break;
            case '204':
            $this->noContentResponse();
            break;
            case '500':
            $this->serverErrResponse();
            break;
            case '501':
            $this->serverImplementResponse();
            break;

            default:
                return false;
        } 
    }

    //200
    protected function succResponse()
    {
        header("HTTP/1.1 200 OK");
    }

    //201
    protected function createdRespnse()
    {

        header("HTTP/1.1 201 Created");
    }

    //204
    protected function noContentResponse()
    {
        header("HTTP/1.1 204 No Content");
    }
    
    //202
    protected function acceptResponse()
    {
        header("HTTP/1.1 202 Accepted");
    }

    //500
    protected function serverErrResponse()
    {
        header("HTTP/1.1 500 Internal Server Error");
    }
    //501
    protected function serverImplementResponse()
    {
        header("HTTP/1.1 501 Not Implemented");
    }

    protected function contentTypeHeader($type)
    {
        switch($type)
        {
        case 'txt':
            header("Content-Type:text/plain");
            break;
        case 'html':
            header("Content-Type:text/html");
            break;
        case 'xml':
            header("Content-Type:text/xml");
            break;
        default:
            header("Content-Type:application/json");
        }
    }

}
