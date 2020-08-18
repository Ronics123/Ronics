<?

class SendXml
{
//    private $url = 'http://my-domain.com/';
    private $url = '';
    private $arResult = array();

    public function __construct($files)
    {
        $this->url = 'http://' . $_SERVER["SERVER_NAME"] . '/api/xmlSend.php'; // url сервера на который отправляем
        $uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/upload/';
        $nameFile = basename($files['fileXml']['name']);
        $uploadfile = $uploaddir . $nameFile;
        if (move_uploaded_file($files['fileXml']['tmp_name'], $uploadfile)) {
            $xml = file_get_contents('http://' . $_SERVER["SERVER_NAME"] . '/upload/' . $nameFile); //читаем файл
            $this->send($xml);
        }
        else {
            throw new \Exception("Not load file");
        }
    }

    private function send($xml)
    {
        $params = array(
            'xml' => $xml
        );
        $this->arResult = file_get_contents($this->url, false, stream_context_create(array(
            'http' => array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => http_build_query($params)
            )
        )));
    }

    public function getResult()
    {
        return json_decode($this->arResult);
    }
}