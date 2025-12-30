<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginAttemptModel extends Model
{
    protected $table = 'login_attempts';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['ip_address', 'email', 'attempted_at', 'success'];

    // Dates
    protected $useTimestamps = false;

    /**
     * Record a login attempt
     */
    public function recordAttempt(string $ipAddress, ?string $email = null, bool $success = false): void
    {
        $this->insert([
            'ip_address' => $ipAddress,
            'email' => $email,
            'attempted_at' => date('Y-m-d H:i:s'),
            'success' => $success ? 1 : 0,
        ]);
    }

    /**
     * Get failed attempts count for an IP address within timeframe
     */
    public function getFailedAttempts(string $ipAddress, int $minutes = 15): int
    {
        $timeframe = date('Y-m-d H:i:s', strtotime("-{$minutes} minutes"));

        return $this->where('ip_address', $ipAddress)
            ->where('success', 0)
            ->where('attempted_at >', $timeframe)
            ->countAllResults();
    }

    /**
     * Check if IP is rate limited (5 failed attempts within 15 minutes)
     */
    public function isRateLimited(string $ipAddress, int $maxAttempts = 5, int $minutes = 15): bool
    {
        $failedAttempts = $this->getFailedAttempts($ipAddress, $minutes);
        return $failedAttempts >= $maxAttempts;
    }

    /**
     * Get time until rate limit expires
     */
    public function getRateLimitExpiry(string $ipAddress, int $minutes = 15): ?string
    {
        $timeframe = date('Y-m-d H:i:s', strtotime("-{$minutes} minutes"));

        $oldestAttempt = $this->where('ip_address', $ipAddress)
            ->where('success', 0)
            ->where('attempted_at >', $timeframe)
            ->orderBy('attempted_at', 'ASC')
            ->first();

        if (!$oldestAttempt) {
            return null;
        }

        $expiryTime = strtotime($oldestAttempt['attempted_at']) + ($minutes * 60);
        return date('Y-m-d H:i:s', $expiryTime);
    }

    /**
     * Clean old attempts (older than 24 hours)
     */
    public function cleanOldAttempts(): void
    {
        $timeframe = date('Y-m-d H:i:s', strtotime('-24 hours'));
        $this->where('attempted_at <', $timeframe)->delete();
    }

    /**
     * Clear failed attempts for an IP after successful login
     */
    public function clearAttempts(string $ipAddress): void
    {
        $this->where('ip_address', $ipAddress)->where('success', 0)->delete();
    }
}
