<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1️⃣ Crear tabla roles
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->string('descripcion')->nullable();
            $table->timestamps();
        });

        // 2️⃣ Crear tabla sucursales
        Schema::create('sucursales', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('horario')->nullable(); // ejemplo: "Lun-Vie 9:00 - 18:00"
            $table->string('departamento')->nullable(); // provincia/departamento
            $table->string('ciudad')->nullable();
            $table->timestamps();
        });

        // 3️⃣ Crear tabla users (con FK hacia roles y sucursales)
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('document')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('direction')->nullable();
            $table->date('birth_date')->nullable(); 
            $table->string('password');
            $table->foreignId('role_id')->constrained('roles')->onDelete('restrict');
            $table->foreignId('sucursal_id')->nullable()->constrained('sucursales')->onDelete('set null');
            $table->rememberToken();
            $table->timestamps();
        });

        // 4️⃣ Agregar encargado_id a sucursales (ahora sí puede referenciar users)
        Schema::table('sucursales', function (Blueprint $table) {
            $table->foreignId('encargado_id')->nullable()->constrained('users')->onDelete('set null');
        });

        // 5️⃣ Insertar roles base
        DB::table('roles')->insert([
            ['nombre' => 'admin', 'descripcion' => 'Administrador general del sistema', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'gerente', 'descripcion' => 'Gerente de sucursal', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'supervisor', 'descripcion' => 'Supervisor de operaciones', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'cajero', 'descripcion' => 'Encargado de caja y pedidos', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'cocinero', 'descripcion' => 'Encargado de cocina y preparación', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // 6️⃣ Crear usuario administrador
        $adminRoleId = DB::table('roles')->where('nombre', 'admin')->value('id');

        DB::table('users')->insert([
            'name' => 'José Alejandro Prieto Salcedo',
            'document' => '00000001',
            'email' => 'admin@admin.com',
            'direction'=> 'Calle Falsa 123, Ciudad Ejemplo',
            'birth_date' => '2007-10-20',
            'password' => Hash::make('admin123'),
            'role_id' => $adminRoleId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 7️⃣ Tablas auxiliares de Laravel
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Orden inverso para evitar errores de FK
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');

        Schema::table('sucursales', function (Blueprint $table) {
            if (Schema::hasColumn('sucursales', 'encargado_id')) {
                $table->dropForeign(['encargado_id']);
                $table->dropColumn('encargado_id');
            }
        });

        Schema::dropIfExists('users');
        Schema::dropIfExists('sucursales');
        Schema::dropIfExists('roles');
    }
};
