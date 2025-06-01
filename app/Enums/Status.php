<?php

namespace App\Enums;

enum Status: string
{
  case AVAILABLE = 'available';
  case UNAVAILABLE = 'unavailable';
  case PENDING = 'pending';
  case APPROVED = 'approved';
  case REJECTED = 'rejected';
  case COMPLETED = 'completed';

  public function label(): string{
    return match($this){
        self::AVAILABLE => 'tersedia',
        self::UNAVAILABLE => 'tidak tersedia',
        self::PENDING => 'menunggu',
        self::APPROVED => 'diterima',
        self::REJECTED => 'ditolak',
        self::COMPLETED => 'selesai',
    };

    }

}
