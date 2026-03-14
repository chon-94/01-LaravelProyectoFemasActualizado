<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Command
{
    protected $signature = 'admin:create';
    protected $description = 'Crear usuario administrador';

    public function handle()
    {
        $email = $this->ask('Email del admin');
        $password = $this->secret('Contraseña');
        $name = $this->ask('Nombre', 'Admin Femas');

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $this->info('✅ Usuario admin creado exitosamente.');
        $this->info("Email: {$email}");
        
        return Command::SUCCESS;
    }
}
