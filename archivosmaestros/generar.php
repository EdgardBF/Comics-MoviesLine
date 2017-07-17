<?php 

class generar
{
    private $cadena;
    private $logintud;
    private $passw;

    public function nueva ($long)
        {
            $this->nc = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            $this->passw = '';
            $logi_cadena = strlen($this->nc);
            $this->logintud = $long;

            for ($x = 1; $x <= $this->logintud; $x++)
            {
                $aleatorio = mt_rand(0, $logi_cadena-1);
                $this->passw .= substr($this->nc, $aleatorio, 1);

            }
                return $this->passw;

        }


}


?>