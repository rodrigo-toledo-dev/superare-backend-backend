<?php
namespace App\Shell;

use Cake\Console\Shell;
use Cake\Http\Client;
use Cake\Mailer\Email;

class CheckServerStatusShell extends Shell
{
    public function main()
    {
        $http = new Client();
        $inactiveServers = $http->get('http://localhost:3000/servers/inactives')->getStringBody();
        foreach(json_decode($inactiveServers) as $server){
          if($this->pingAddress($server->serverIp)){
            $message = "Cliente '$server->client' com ip '$server->serverIp' nao respondendo, email sendo disparado";
            $this->out($message);
            // $email = new Email('default');
            // $email->from(['rodrigo.toledo.dev@gmail.com' => 'Test Superare'])
            //     ->to($server->user->email)
            //     ->setSubject('Superare - Servidor Inativo')
            //     ->send($message);
          }
        }

    }

    protected function pingAddress($ip) {
        $pingresult = exec("ping -c2 $ip", $outcome, $status);
        return (0 == $status);
    }
}

?>
