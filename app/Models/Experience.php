<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'company',
        'location',
        'start_date',
        'end_date',
        'description',
        'responsibilities',
        'order',
        'is_active'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'responsibilities' => 'array',
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    public function getIsCurrent()
    {
        return is_null($this->end_date);
    }

    public function getDuration()
    {
        $start = Carbon::parse($this->start_date);
        $end = $this->end_date ? Carbon::parse($this->end_date) : Carbon::now();
        
        return $start->format('M Y') . ' - ' . ($this->end_date ? $end->format('M Y') : 'Present');
    }
}
