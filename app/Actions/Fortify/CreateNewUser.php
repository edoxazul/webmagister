<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{

    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param array $input
     * @return \App\Models\User
     * @throws ValidationException
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'rut' => ['required', 'string', 'max:255'],
            'rol' => ['required', 'string', 'max:255'],
            'email' => ['required','string','email','max:255',Rule::unique(User::class),],
            'password' => $this->passwordRules(),
        ])->validate();

        $userreg = User::create([
            'name' => $input['name'],
            'rut' => $input['rut'],
            'rol' => $input['rol'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        $email = $input['email'];
        $data = ([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => $input['password'],
                ]);

        Mail::to($email)->send(new WelcomeMail($data));

        $userreg->save();
        //flash(‘User has been added!’,’success’)->important();
        return $userreg;

    }
    /**
    * Get the error messages for the defined validation rules.
    *
    * @return array
    */
    public function messages()
    {
        return [
            'name.required' => 'Ingrese el nombre',
            'rut.required' => 'Ingrese el rut',
            'rol.required' => 'Elija el rol',
            'email.required' => 'Ingrese el email',
            'email.unique' => 'Este email ya existe',

        ];
    }







}
