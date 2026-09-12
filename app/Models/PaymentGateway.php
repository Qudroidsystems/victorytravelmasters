<?php
// app/Models/PaymentGateway.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentGateway extends Model
{
    use HasFactory;

    protected $table = 'payment_gateways';

    protected $fillable = [
        'name', 'provider_key', 'secret_key', 'public_key', 'mode',
        'fee_percentage', 'fee_fixed', 'config', 'is_active'
    ];

    protected $casts = [
        'config' => 'array',
        'fee_percentage' => 'decimal:2',
        'fee_fixed' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByProvider($query, $provider)
    {
        return $query->where('provider_key', $provider);
    }

    // Accessors
    public function getFormattedFeeAttribute()
    {
        if ($this->fee_percentage > 0) {
            return $this->fee_percentage . '% + ₦' . number_format($this->fee_fixed, 2);
        }
        return '₦' . number_format($this->fee_fixed, 2);
    }

    public function getIsLiveAttribute()
    {
        return $this->mode === 'live';
    }

    public function getIsSandboxAttribute()
    {
        return $this->mode === 'sandbox';
    }
}
