<?php namespace Sentinel\Listeners;

use Illuminate\Session\Store;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Config\Repository;
use App\Loginlog;

class LogUserEventListener
{

    public function __construct(Store $session, Repository $config)
    {
        $this->session = $session;
        $this->config = $config;
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher $events
     * @return array
     */
    public function subscribe($events)
    {
        $events->listen('sentinel.log.user.login', 'Sentinel\Listeners\LogUserEventListener@onUserLogin', 10);
        $events->listen('sentinel.log.user.logout', 'Sentinel\Listeners\LogUserEventListener@onUserLogout', 10);
        $events->listen('sentinel.log.user.registered', 'Sentinel\Listeners\LogUserEventListener@welcome', 10);
        $events->listen('sentinel.log.user.resend', 'Sentinel\Listeners\LogUserEventListener@welcome', 10);
        $events->listen('sentinel.log.user.reset', 'Sentinel\Listeners\LogUserEventListener@passwordReset', 10);
    }

    /**
     * Handle user login events.
     */
    public function onUserLogin($user)
    {   
        // dd($user->groups);
        // $log = new Loginlog;
        // $log->users_id=$user->id;
        // $log->action='Login ';
        // $log->user=$user->email;
        // $log->save();
        // dd($user);
        // $this->session->put('nama_singkat_instansi', $user->groups->first()->nama_singkat_instansi);

        $this->session->put('nama_singkat_instansi', $user->groups[0]->nama_singkat_instansi);
        $this->session->put('nama_instansi', $user->groups[0]->nama_instansi);
        $this->session->put('group', $user->groups[0]->name);
        $this->session->put('userId', $user->id);
        $this->session->put('email', $user->email);
        // dd($this->session->all());
    }

    /**
     * Handle user logout events.
     */
    public function onUserLogout()
    {
        $this->session->flush();
    }

    /**
     * Send a welcome email to a new user.
     *
     * @param $user
     * @param $activated
     *
     * @return bool
     * @internal param string $email
     * @internal param int $userId
     * @internal param string $activationCode
     */
    public function welcome($user, $activated)
    {
        // $subject = $this->config->get('sentinel.subjects.welcome');
        // $view = 'Sentinel::emails.welcome';
        // $data['hash'] = $user->hash;
        // $data['code'] = $user->getActivationCode();
        // $data['email'] = $user->email;
// 
        // if (! $activated)
        // {
            // $this->sendTo( $user->email, $subject, $view, $data );
        // }

    }

    /**
     * Email Password Reset info to a user.
     *
     * @param $user
     * @param $code
     *
     * @internal param string $email
     * @internal param int $userId
     * @internal param string $resetCode
     */
    public function passwordReset($user, $code)
    {
        // $subject = $this->config->get('sentinel.subjects.reset_password');
        // $view = 'Sentinel::emails.reset';
        // $data['hash'] = $user->hash;
        // $data['code'] = $code;
        // $data['email'] = $user->email;

        // $this->sendTo($user->email, $subject, $view, $data );
    }

    /**
     * Convenience function for sending mail
     *
     * @param $email
     * @param $subject
     * @param $view
     * @param array $data
     */
    private function sendTo($email, $subject, $view, $data = array())
    {
        // $sender = $this->gatherSenderAddress();

        // Mail::queue($view, $data, function ($message) use ($email, $subject, $sender) {
        //     $message->to($email)
        //         ->from($sender['address'], $sender['name'])
        //         ->subject($subject);
        // });
    }

    /**
     * If the application does not have a valid "from" address configured, we should stub in
     * a temporary alternative so we have something to pass to the Mailer
     *
     * @return array|mixed
     */
    private function gatherSenderAddress()
    {
        // $sender = config('mail.from', []);

        // if (!array_key_exists('address', $sender) || is_null($sender['address'])) {
        //     return ['address' => 'noreply@example.com', 'name' => ''];
        // }

        // if (is_null($sender['name']))
        // {
        //     $sender['name'] = '';
        // }

        // return $sender;
    }
}