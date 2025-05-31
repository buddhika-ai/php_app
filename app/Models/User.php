<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    // Define Role Constants
    public const ROLE_DEAN = 'dean';
    public const ROLE_MANAGER = 'manager';
    public const ROLE_COORDINATOR = 'coordinator';
    public const ROLE_VET_DOCTOR = 'vet_doctor';
    public const ROLE_SUPERVISOR = 'supervisor';
    public const ROLE_FARM_SALE_OPERATOR = 'farm_sale_operator';
    public const ROLE_CUSTOMER = 'customer';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Ensure 'role' is fillable if you plan to set it during mass assignment
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Helper methods to check roles (optional but recommended)
    public function hasRole(string ...$rolesToCompare): bool // Changed to accept variadic arguments to match middleware
    {
        // If your CheckRole middleware passes a single role string, this is fine:
        // return $this->role === $role;

        // If your CheckRole middleware can pass multiple roles (e.g., 'checkrole:dean,manager')
        // and you want to check if the user has ANY of those roles:
        return in_array($this->role, $rolesToCompare);
    }

    public function isDean(): bool
    {
        return $this->role === self::ROLE_DEAN;
    }

    public function isManager(): bool
    {
        return $this->role === self::ROLE_MANAGER;
    }

    public function isCoordinator(): bool
    {
        return $this->role === self::ROLE_COORDINATOR;
    }
    public function isVetDoctor(): bool
    {
        return $this->role === self::ROLE_VET_DOCTOR;
    }

    public function isSupervisor(): bool
    {
        return $this->role === self::ROLE_SUPERVISOR;
    }

    public function isFarmSaleOperator(): bool
    {
        return $this->role === self::ROLE_FARM_SALE_OPERATOR;
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function creditPurchases()
    {
        return $this->hasMany(CreditPurchase::class);
    }

    public function isCustomer(): bool
    {
        return $this->role === self::ROLE_CUSTOMER;
    }
}
