<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

    protected $table = 'users';

    protected $hidden = array('password');

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function getReminderEmail()
    {
        return $this->email;
    }

    public static $rules = array(
        'username' => 'required|Alpha|between:6,64',
        'email' => 'required|email',
        'password' => 'required|AlphaNum|between:6,20|confirmed'
    );

    public static function validate($input)
    {
        $rules = array(
            'username' => 'required|Alpha|between:6,64',
            'email' => 'required|email',
            'password' => 'required|AlphaNum|between:6,20|confirmed'
        );
        $messages = array(
            'username.required' => 'Nous avons besoin de votre pseudo.',
            'username.Alpha' => 'Le pseudo doit être composé de caractères alphabétiques.',
            'username.between' => 'Le nombre de caractères du pseudo doit être compris entre :min et :max.',
            'username.unique' => 'Ce pseudo est déjà utilisé.',
            'email.required' => 'Nous avons besoin de votre adresse mail.',
            'email.email' => 'Le format de l\'adresse mail n\'est pas correct.',
            'email.unique' => 'Cette adresse mail est déjà utilisée.',
            'password.required' => 'Nous avons besoin d\'un mot de passe.',
            'password.Alphanum' => 'Le pseudo doit être composé de caractères alphanumériques.',
            'password.between' => 'Le nombre de caractères du mot de passe doit être compris entre :min et :max.',
            'password.confirmed' => 'La confirmation du mot de passe n\'est pas correcte.'
        );
        return Validator::make($input, $rules, $messages);
    }

}
